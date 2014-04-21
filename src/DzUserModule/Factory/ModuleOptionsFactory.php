<?php

/**
 * Fichier source pour le ModuleOptionsFactory.
 *
 * PHP version 5.3.0
 *
 * @category Source
 * @package  DzUserModule\Factory
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 */

namespace DzUserModule\Factory;

use DzUserModule\Options\ModuleOptions;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Classe ModuleOptionsFactory.
 *
 * Classe usine pour les options du module.
 *
 * @category Source
 * @package  DzUserModule\Factory
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 */
class ModuleOptionsFactory implements FactoryInterface
{
	/**
     * Cré et retourne les options du module.
     *
     * @param  ServiceLocatorInterface $serviceLocator Localisateur de service.
     *
     * @return ModuleOptions
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
    	$config = $serviceLocator->get('Config');

    	if (isset($config['dzuser'])) {
    		$config = $config['dzuser'];
    	} else {
    		$config = array();
    	}

        return new ModuleOptions($config);
    }
}