<?php

/**
 * Fichier de source du DzUserIdentityWidget
 * Widget qui affiche le formulaire de connexion au visiteur
 * ou le profil de l'utilisateur connecté
 *
 * PHP version 5.3.3
 *
 * @category Source
 * @package  DzUser\View\Helper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     https://github.com/dieze/DzUser/blob/master/src/DzUser/View/Helper/DzUserIdentityWidget.php
 */

namespace DzUser\View\Helper;

use Zend\View\Helper\AbstractHelper;
use ZfcUser\Form\Login as LoginForm;
use Zend\View\Model\ViewModel;
use Zend\Authentication\AuthenticationService;

/**
 * Widget d'affichage de l'identité de l'utilisateur
 * Affiche le formulaire de connexion au visiteur
 * ou le profil de l'utilisateur connecté
 *
 * @category Source
 * @package  DzUser\View\Helper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     https://github.com/dieze/DzUser/blob/master/src/DzUser/View/Helper/DzUserIdentityWidget.php
 */
class DzUserIdentityWidget extends AbstractHelper
{
    /**
     * Formulaire de connexion
     * @var LoginForm
     */
    protected $loginForm;

    /**
     * Template de connexion
     * @var string Template utilisé pour la vue
     */
    protected $loginViewTemplate;

    /**
     * Template de profil
     * @var string Template utilisé pour la vue
     */
    protected $profileViewTemplate;

    /**
     * Service d'authentification
     * @var AuthenticationService
     */
    protected $authService;

    /**
     * __invoke
     *
     * @param array $options Tableau d'options
     *
     * @access public
     *
     * @return string
     */
    public function __invoke($options = array())
    {
        if (array_key_exists('render', $options)) {
            $render = $options['render'];
        } else {
            $render = true;
        }
        if (array_key_exists('redirect', $options)) {
            $redirect = $options['redirect'];
        } else {
            $redirect = false;
        }

        if ($this->getAuthService()->hasIdentity()) {
            $viewModel = new ViewModel();
            $viewModel->setTemplate($this->profileViewTemplate);
        } else {
            $viewModel = new ViewModel(
                array(
                    'loginForm' => $this->getLoginForm(),
                    'redirect'  => $redirect,
                )
            );
            $viewModel->setTemplate($this->loginViewTemplate);
        }
        
        if ($render) {
            return $this->getView()->render($viewModel);
        } else {
            return $viewModel;
        }
    }

    /**
     * Obtient le formulaire de Connexion
     *
     * @return LoginForm
     */
    public function getLoginForm()
    {
        return $this->loginForm;
    }

    /**
     * Définit le formulaire de connexion
     *
     * @param LoginForm $loginForm Nouveau formulaire de connexion
     *
     * @return DzUserIdentityWidget
     */
    public function setLoginForm(LoginForm $loginForm)
    {
        $this->loginForm = $loginForm;
        return $this;
    }

    /**
     * Obtient le template de connexion
     *
     * @return string
     */
    public function getLoginViewTemplate()
    {
        return $this->loginViewTemplate;
    }

    /**
     * Définit le template de connexion
     * 
     * @param string $viewTemplate Chemin vers le template de connexion
     *
     * @return DzUserIdentityWidget
     */
    public function setLoginViewTemplate($viewTemplate)
    {
        $this->loginViewTemplate = $viewTemplate;
        return $this;
    }

    /**
     * Obtient le template de profil utilisateur
     *
     * @return string
     */
    public function getProfileViewTemplate()
    {
        return $this->profileViewTemplate;
    }

    /**
     * Définit le template de profil utilisateur
     *
     * @param string $viewTemplate Chemin vers le template de profil
     *
     * @return DzUserIdentityWidget
     */
    public function setProfileViewTemplate($viewTemplate)
    {
        $this->profileViewTemplate = $viewTemplate;
        return $this;
    }

    /**
     * Obtient le service d'authentification
     *
     * @return AuthenticationService
     */
    public function getAuthService()
    {
        return $this->authService;
    }

    /**
     * Définit le service d'authentification
     *
     * @param AuthenticationService $authService Nouveau service d'authentification
     *
     * @return DzUserIdentityWidget
     */
    public function setAuthService($authService)
    {
        $this->authService = $authService;
        return $this;
    }
}
