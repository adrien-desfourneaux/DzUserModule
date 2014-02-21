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
            // On change la route pour éviter les collisions
            // avec les routes de dzuser
            'zfcuser' => array(
                'options' => array(
                    'route' => '/zfc-user/user',
                ),

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
            ),

            // Information du module
            'dzuser' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/user[/]',
                    'defaults' => array(
                        'controller' => 'dzuser',
                        'action'     => 'index',
                    ),
                ),

                'may_terminate' => true,
                'child_routes' => array(

                    // Connexion utilisateur
                    'login' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => 'login[/]',
                            'defaults' => array(
                                'controller' => 'dzuser',
                                'action'     => 'login',
                            ),
                        ),
                    ),

                    // Autentification utilisateur
                    'authenticate' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => 'authenticate[/]',
                            'defaults' => array(
                                'controller' => 'dzuser',
                                'action'     => 'authenticate',
                            ),
                        ),
                    ),

                     // Déconnexion utilisateur
                    'logout' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => 'logout[/]',
                            'defaults' => array(
                                'controller' => 'dzuser',
                                'action'     => 'logout',
                            ),
                        ),
                    ),

                    'account' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => 'account[/]',
                            'defaults' => array(
                                'controller' => 'dzuser',
                                'action' => 'account',
                            ),
                        ),
                    ),

                    // Visualisation de la liste des utilisateurs
                    'list' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => 'list[/:role]',
                            'constraints' => array(
                                'role' => '[a-z]+',
                            ),
                            'defaults' => array(
                                'controller' => 'dzuser',
                                'action'     => 'list',
                                'role' => 'any',
                            ),
                        ),
                    ),

                   

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
