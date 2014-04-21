<?php

/**
 * Fichier source pour le LoginViewModelFactory.
 *
 * PHP version 5.3.0
 *
 * @category Source
 * @package  DzUserModule\View\Model\Factory
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 */

namespace DzUserModule\View\Model\Factory;

use DzUserModule\View\Model\LoginViewModel;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Classe LoginViewModelFactory.
 *
 * Classe usine pour le ViewModel de connexion utilisateur.
 *
 * @category Source
 * @package  DzUserModule\View\Model\Factory
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 */
class LoginViewModelFactory implements FactoryInterface
{
	/**
     * Cré et retourne le ViewModel de connexion utilisateur.
     *
     * @param  ServiceLocatorInterface $serviceLocator Localisateur de service.
     *
     * @return LoginViewModel
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $locator = $serviceLocator->getServiceLocator();
        $options = $locator->get('zfcuser_module_options');

        $enableRegistration = $options->getEnableRegistration();
        $loginForm = $locator->get('zfcuser_login_form');

        $viewModel = new LoginViewModel;
        $viewModel->setVariable('enableRegistration', $enableRegistration);
        $viewModel->setLoginForm($loginForm);
        
        return $viewModel;
    }
}