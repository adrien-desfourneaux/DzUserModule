#!/bin/sh

# /*!
#     Lance tous les scripts dans ce répertoire
#     @author Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
#  */

# SCRIPTPATH = zf2_app/module/DzUser/script
SCRIPTPATH=$( cd "$(dirname "$0")" ; pwd -P )
cd $SCRIPTPATH

for r in run_*.sh; do
  if [ $r != 'run_all.sh' ]; then
    printf "\n\n========== $r ==========\n\n"; ./$r;
  fi
done
