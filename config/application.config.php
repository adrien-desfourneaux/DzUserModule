<?php
/**
 * Fichier de configuration de l'application de test.
 * 
 * Ce fichier contient uniquement les modules réellement nécéssaires
 * pour que le module fonctionne.
 *
 * Ce fichier devrait être lancé soit par /public/dzuser.php
 * ou /public/dzuser.test.php
 *
 * PHP version 5.3.3
 *
 * @category Config
 * @package  DzUser
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 */
return array(
    'modules' => array(
        'DzAssetModule',
        'DoctrineModule',
        'DoctrineORMModule',
        'ZfcBase',
        'ZfcUser',
        'ZfcUserDoctrineORM',
        'BjyAuthorize',
        'DzMessageModule',
        'DzViewModule',
        'DzServiceModule',
        'DzBaseModule',
        'DzUserModule'
    ),
    'module_listener_options' => array(
        'module_paths' => array(
            __DIR__ . '/../../../module',
            __DIR__ . '/vendor'
        )
    ),
);
