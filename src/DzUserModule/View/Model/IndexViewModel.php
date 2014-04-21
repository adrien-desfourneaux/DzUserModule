<?php

/**
 * Fichier de source du IndexViewModel.
 *
 * PHP version 5.3.0
 *
 * @category Source
 * @package  DzUserModule\View\Model
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 */

namespace DzUserModule\View\Model;

use DzViewModule\View\Model\ViewModel;

/**
 * Classe IndexViewModel.
 * Vue-Modèle pour les informations du module.
 *
 * PHP version 5.3.0
 *
 * @category Source
 * @package  DzUserModule\View\Model
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 */
class IndexViewModel extends ViewModel
{
    /**
     * {@inheritdoc}
     */
    protected $template = 'dz-user-module/user/index.phtml';

    /**
     * {@inheritdoc}
     */
    protected $assets = array(
        'head' => array(
            'css' => array(
                '/dzuser/css/dzuser.css',
                '/dzuser/vendor/bootstrap/dist/css/bootstrap.min.css',
            ),
        ),
    );
}