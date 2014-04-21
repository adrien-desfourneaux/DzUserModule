<?php

/**
 * Fichier de source du IdentityWidget
 * Widget qui affiche le formulaire de connexion au visiteur
 * ou le profil de l'utilisateur connecté.
 *
 * PHP version 5.3.3
 *
 * @category Source
 * @package  DzUserModule\View\Helper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 */

namespace DzUserModule\View\Helper;

use DzViewModule\View\Helper\Widget;

use Zend\View\Model\ModelInterface;

/**
 * Widget d'affichage de l'identité de l'utilisateur.
 *
 * Affiche le formulaire de connexion au visiteur
 * ou le profil de l'utilisateur connecté.
 *
 * @category Source
 * @package  DzUserModule\View\Helper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 */
class IdentityWidget extends Widget
{
    /**
     * {@inheritdoc}
     */
    protected $validOptions = array(
        'hasTitle',
        'hasRegistration',
        'redirectLoginSuccess',
        'redirectLoginFailure',
        'redirectLogout'
    );

    /**
     * ViewModel de connexion
     *
     * @var ModelInterface
     */
    protected $loginViewModel;

    /**
     * ViewModel de profil
     *
     * @var ModelInterface
     */
    protected $profileViewModel;

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        $viewModel = $this->getViewModel();

        // Renommage pour les ViewModel
        $redirectLoginSuccess = $viewModel->getVariable('redirectLoginSuccess');
        $redirectLoginFailure = $viewModel->getVariable('redirectLoginFailure');
        $redirectLogout       = $viewModel->getVariable('redirectLogout');

        if ($redirectLoginSuccess) {
            $viewModel->setVariable('redirectSuccess', $redirectLoginSuccess);
        }

        if ($redirectLoginFailure) {
            $viewModel->setVariable('redirectFailure', $redirectLoginFailure);
        }

        if ($redirectLogout) {
            $viewModel->setVariable('redirect', $redirectLogout);
        } 
    }

    /**
     * Obtient le modèle pour le widget.
     *
     * @return ViewModel
     */
    public function getViewModel()
    {
        $identity = $this->getView()->zfcUserIdentity();

        if ($identity) {
            $viewModel = $this->getProfileViewModel();
        } else {
            $viewModel = $this->getLoginViewModel();
        }

        return $viewModel;
    }

    /**
     * Définit le ViewModel de connexion.
     * 
     * @param ModelInterface $model Nouveau model
     *
     * @return IdentityWidget
     */
    public function setLoginViewModel($model)
    {
        $this->loginViewModel = $model;
        return $this;
    }

    /**
     * Obtient le ViewModel de connexion
     *
     * @return ModelInterface
     */
    public function getLoginViewModel()
    {
        return $this->loginViewModel;
    }

    /**
     * Définit le ViewModel de profil utilisateur.
     *
     * @param ModelInterface $model Nouveau model.
     *
     * @return IdentityWidget
     */
    public function setProfileViewModel($model)
    {
        $this->profileViewModel = $model;
        return $this;
    }

    /**
     * Obtient le ViewModel de profil utilisateur.
     *
     * @return ModelInterface
     */
    public function getProfileViewModel()
    {
        return $this->profileViewModel;
    }
}