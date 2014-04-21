<?php

/**
 * Fichier de source du LoginViewModel.
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

use Zend\Form\Form;

/**
 * Classe LoginViewModel.
 * Vue-Modèle pour la connexion utilisateur.
 *
 * PHP version 5.3.0
 *
 * @category Source
 * @package  DzUserModule\View\Model
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 */
class LoginViewModel extends ViewModel
{
    /**
     * {@inheritdoc}
     */
    protected $template = 'dz-user-module/user/login.phtml';

    /**
     * {@inheritdoc}
     */
    protected $defaults = array(
        'hasTitle'           => false,
        'hasRegistration'    => false,
        'enableRegistration' => false,
        'redirectSuccess'    => false,
        'redirectFailure'    => false,
        'isWidget'           => false,
    );

    /**
     * {@inheritdoc}
     */
    protected $assets = array(
        'head' => array(
            'css' => array(
                '/dzuser/css/dzuser.css',
            ),
        ),
    );

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        $form = $this->getLoginForm();

        $flashMessenger = $this->plugin('flashMessenger');
        $fm = $flashMessenger->setNamespace('zfcuser-login-form')->getMessages();
        if (isset($fm[0])) {
            $this->loginForm->setMessages(
                array('identity' => array($fm[0]))
            );
        }

        $this->setVariable('loginForm', $form);
    }

    /**
     * Définit le formulaire de connexion.
     *
     * @param Form $loginForm Nouveau formulaire.
     *
     * @return LoginViewModel
     */
    public function setLoginForm(Form $loginForm)
    {        
        $this->loginForm = $loginForm;
        return $this;
    }

    /**
     * Obtient le formulaire de connexion.
     *
     * @return Form
     */
    public function getLoginForm()
    {
        return $this->loginForm;
    }
}