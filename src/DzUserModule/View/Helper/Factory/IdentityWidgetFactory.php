<?php

/**
 * Fichier source pour le IdentityWidgetFactory.
 *
 * PHP version 5.3.0
 *
 * @category Source
 * @package  DzUserModule\View\Helper\Factory
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 */

namespace DzUserModule\View\Helper\Factory;

use DzUserModule\View\Helper\IdentityWidget;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Classe IdentityWidgetFactory.
 *
 * Classe usine pour le widget d'affichage
 * de l'identité de l'utilisateur.
 *
 * @category Source
 * @package  DzUserModule\View\Helper\Factory
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 */
class IdentityWidgetFactory implements FactoryInterface
{
	/**
     * Cré et retourne le widget d'affichage
     * de l'identité de l'utilisateur.
     *
     * @param  ServiceLocatorInterface $serviceLocator Localisateur de service.
     *
     * @return IdentityWidget
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $locator    = $serviceLocator->getServiceLocator();

        $viewModels = $locator->get('ViewModelManager');
        $options    = $locator->get('DzUserModule\ModuleOptions');

        $loginViewModel   = $viewModels->get('DzUserModule\LoginViewModel');
        $profileViewModel = $viewModels->get('DzUserModule\ProfileViewModel');

        $loginViewTemplate   = $options->getUserIdentityWidgetLoginViewTemplate();
        $profileViewTemplate = $options->getUserIdentityWidgetProfileViewTemplate();

        if ($loginViewTemplate != '') {
            $loginViewModel->setTemplate($loginViewTemplate);
        }

        if ($profileViewTemplate != '') {
        	$profileViewModel->setTemplate($profileViewTemplate);
        }

        // Comme il n'y a pas la possibilité de résoudre les dépendances
        // dans le ViewModel, on doit le faire ici... :\

        $loginForm = $locator->get('zfcuser_login_form');
        $redirect  = false;
        $enableRegistration = $options->getEnableRegistration();

        $loginViewModel->setVariable('loginForm', $loginForm);
        $loginViewModel->setVariable('redirect', $redirect);
        $loginViewModel->setVariable('enableRegistration', $enableRegistration);

        $widget = new IdentityWidget;
        $widget->setLoginViewModel($loginViewModel);
        $widget->setProfileViewModel($profileViewModel);
        
        return $widget;
    }
}