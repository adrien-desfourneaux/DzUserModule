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
use Zend\View\Model\ViewModel;
use ZfcUser\Controller\UserController;
use Zend\Http\Response;

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
     * Controleur d'utilisateur
     * @var UserController
     */
    protected $userController;

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
        $userController = $this->getUserController();

        if (array_key_exists('render', $options)) {
            $render = $options['render'];
        } else {
            $render = true;
        }
        
        if (array_key_exists('redirectLoginFailure', $options)) {
            $redirectLoginFailure = $options['redirectLoginFailure'];
        } else {
            $redirectLoginFailure = false;
        }

        if (array_key_exists('redirectLoginSuccess', $options)) {
            $redirectLoginSuccess = $options['redirectLoginSuccess'];
        } else {
            $redirectLoginSuccess = false;
        }

        if (array_key_exists('redirectLogout', $options)) {
            $redirectLogout = $options['redirectLogout'];
        } else {
            $redirectLogout = false;
        }

        if (array_key_exists('hasTitle', $options)) {
            $hasTitle = $options['hasTitle'];
        } else {
            // Pas de titre par défaut dans le widget
            $hasTitle = false;
        }

        if (array_key_exists('hasRegistration', $options)) {
            $hasRegistration = $options['hasRegistration'];
        } else {
            // Toujours afficher le lien de registration par défaut
            $hasRegistration = true;
        }

        if ($userController->zfcUserAuthentication()->hasIdentity()) {

            $viewModel = new ViewModel();
            
            $viewModel->setVariables(
                array(
                    'hasTitle' => $hasTitle,
                    'redirectLogout' => $redirectLogout,
                )
            )->setTemplate($this->profileViewTemplate);
            
        } else {
            
            if ($redirectLoginSuccess) {
                $userController->getRequest()->getQuery()->set('redirectSuccess', $redirectLoginSuccess);
            }

            if ($redirectLoginFailure) {
                $userController->getRequest()->getQuery()->set('redirectFailure', $redirectLoginFailure);
            }

            $userController->getRequest()->getQuery()->set('hasTitle', $hasTitle);
            $userController->getRequest()->getQuery()->set('hasRegistration', $hasRegistration);

            $return = $userController->loginAction();

            if (is_array($return)) {
                $viewModel = new ViewModel($return);
            } elseif ($return instanceof ViewModel) {
                $viewModel = $return;
            } elseif ($return instanceof Response) {
                return $return;
            }

            $viewModel->setTemplate($this->loginViewTemplate);
        }

        $viewModel->setVariable('isWidget', true);
        
        if ($render) {
            return $this->getView()->render($viewModel);
        } else {
            return $viewModel;
        }
    }

    /**
     * Définit le contrôleur d'utilisateurs
     * 
     * @param UserController $userController Contrôleur d'utilisateurs
     *
     * @return DzUserIdentityWidget
     */
    public function setUserController($userController)
    {
        $this->userController = $userController;
        return $this;
    }

    /**
     * Obtient le contrôleur d'utilisateurs
     *
     * @return UserController
     */
    public function getUserController()
    {
        return $this->userController;
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
}
