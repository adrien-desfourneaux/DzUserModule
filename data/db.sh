#!/bin/sh

# /*!
#     Utilitaire pour la base de données de développement du module DzUser
#     @author Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
#  */

function cdscriptpath
{
	# SCRIPTPATH = zf2_app/module/DzUser/data
	SCRIPTPATH=$( cd "$(dirname "$0")" ; pwd -P )
	cd $SCRIPTPATH
}

function confirm
{
	while true; do
	    read -p "Continuer ? " on
	    case $on in
	        [Oo]* ) break;;
	        [Nn]* ) exit;;
	        * ) echo "Repondre par oui ou non.";;
	    esac
	done
}

function create
{	
	cdscriptpath;

	if [ -f dzuser.sqlite ]; then
		printf "Attention! Lancer ce script va supprimer la base de données de développement de DzUser ainsi que tout son contenu.\n";
		confirm;
    	
    	rm dzuser.sqlite;
    fi
    
    cat dzuser.sqlite.sql | sqlite3 dzuser.sqlite;
    chmod g+w dzuser.sqlite
}

function dump
{
	create;

	cdscriptpath;

	cat dzuser.dump.sqlite.sql | sqlite3 dzuser.sqlite;
}

function help
{
	printf "Usage: db.sh [action]\n";
	printf "help\taffiche cette aide\n"
	printf "create\tcre la base de donnees\n";
	printf "dump\tcre la base de donnees et y met les données de développement\n";
}

if [ $# -eq 0 ]; then help; fi
if [ "$1" = "help" ]; then help; fi
if [ "$1" = "create" ]; then create; fi
if [ "$1" = "dump" ]; then dump; fi