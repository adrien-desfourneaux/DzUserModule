<?php

/**
 * Configuration du module DzUser
 *
 * PHP version 5.3.3
 *
 * @category Config
 * @package  DzUser
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     https://github.com/dieze/DzUser/blob/master/config/module.config.php
 */

/**
 * Utiliser différentes base de données selon l'environnement (development ou test)
 */
if (defined('DZUSER_ENV') && DZUSER_ENV == 'test') {
    $db_path = __DIR__ . '/../tests/_data/dzuser.sqlite';
} else {
    $db_path = __DIR__ . '/../data/dzuser.sqlite';
}

return array(
    'view_manager' => array(
        // Le module doit traiter les erreurs
        // afin d'être utilisé seul en développement et test.
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'error/404'     => __DIR__ . '/../view/error/404.phtml',
            'error/index'   => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            'dzuser' => __DIR__ . '/../view',
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'dzuser' => 'DzUser\Controller\UserController',
        ),
    ),
    'router' => array(
        'routes' => array(

            // Profil de l'utilisateur connecté
            // zfcuser

            // Connexion utilisateur
            // zfcuser/login

            // Authentification
            // zfcuser/authenticate

            // Déconnexion utilisateur
            // zfcuser/logout

            // Enregistrement utilisateur
            // zfcuser/register

            // Changement de mot de passe
            // zfcuser/changepassword

            // Changement d'email
            // zfcuser/changeemail

            // Information du module
            'dzuser' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/user/module[/]',
                    'defaults' => array(
                        'controller' => 'dzuser',
                        'action'     => 'module',
                    ),
                ),

                'may_terminate' => true,
                'child_routes' => array(

                    // Suppression d'un utilisateur
                    'delete' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => 'delete[/:id][/]',
                            'constraints' => array(
                                'id' => '\d',
                            ),
                            'defaults' => array(
                                'action' => 'delete',
                            ),
                        ),
                    ),

                    // Visualisation de la liste des utilisateurs
                    'showall' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => 'show-all[/:role]',
                            'constraints' => array(
                                'role' => '[a-z]+',
                            ),
                            'defaults' => array(
                                'action' => 'showall',
                                'role' => 'any',
                            ),
                        ),
                    ),

                    // L'administrateur se fait passer pour un chef de projet
                    'switch' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => 'switch/:id[/]',
                            'constraints' => array(
                                'id' => '\d',
                            ),
                            'defaults' => array(
                                'action' => 'switch'
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),

    // DoctrineORMModule options
    'doctrine' => array(
        'driver' => array(
            'dzuser_entity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'paths' => __DIR__ . '/../src/DzUser/Entity'
            ),
            'orm_default' => array(
                'drivers' => array(
                    'DzUser\Entity' => 'dzuser_entity'
                )
            )
        ),
        'connection' => array(
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOSqlite\Driver',
                'params' => array(
                    'user' => '',
                    'password' => '',
                    'path' => $db_path,
                )
            )
        )
    ),

    // ZfcUserDoctrineORM options
    'zfcuserdoctrineorm' => array(
        
        /**
         * Active les entités par défaut
         * Détermine si l'entité utilisateur par défaut doit être activée.
         * Mettre à false pour étendre ZfcUser\Entity\User avec votre propre entité.
         * 
         * Valeur par défaut: true
         * Valeur acceptées: (booléen) true ou false
         */

        'enable_default_entities' => false,
    ),

    // ZfcUser options
    'zfcuser' => array(

        /**
         * Classe d'entité utilisateur
         *
         * Nom de la classe d'entité à utiliser. Utile pour utiliser sa propre
         * classe d'entité au lieu de celle par défaut. La classe par défaut
         * est ZfcUser\Entity\User. Cette classe d'entité doit implémenter
         * ZfcUser\Entity\UserInterface
         */
        'user_entity_class' => 'DzUser\Entity\User',

        /**
         * Active le nom d'utilisateur
         *
         * Active le champ nom d'utilisateur username sur le formulaire d'inscription
         * et autorise les utilisateur à se connecter en utilisant leur nom d'utilisateur
         * OU leur adresse email. La valeur par défaut est false.
         *
         * Valeurs acceptées: booléen true ou false
         */
        'enable_username' => false,

        /**
         * Active le nom d'affichage
         *
         * Active le champ nom d'affichage dans le formulaire d'enregistrement.
         * Le nom d'affichage est alors enregistré dans la base de données.
         * La valeur par défaut est false
         *
         * Valeurs acceptées : booléen true ou false
         */
        'enable_display_name' => true,



        /**
         * Active l'enregistrement
         *
         * Autorise les utilisateurs à s'enregistrer sur le site.
         *
         * Valeurs acceptées: (booléen) true ou false
         */
        //'enable_registration' => false,
    ),

    // BjyAuthorize options
    'bjyauthorize' => array(

        /**
         * Définit l'identity provider DoctrineEntity , fonctionne quand l'identity
         * d'authentification est une entité
         */
        'identity_provider'     => 'BjyAuthorize\Provider\Identity\AuthenticationIdentityProvider',

        /**
         * Fournit une liste de rôles possibles. 
         */
        'role_providers' => array(

            /**
             * Utilise le role provider pour utiliser les entités Doctrine
             */
            'BjyAuthorize\Provider\Role\ObjectRepositoryProvider' => array(
                'object_manager'    => 'doctrine.entitymanager.orm_default',
                'role_entity_class' => 'DzUser\Entity\Role',
             ),
        ),
    ),
);
