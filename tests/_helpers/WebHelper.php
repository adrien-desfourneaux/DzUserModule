<?php

/**
 * Aides pour les tests d'acceptation
 * 
 * PHP version 5.4.0
 *
 * @category   Test
 * @package    DzUser
 * @subpackage Helper
 * @author     Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license    http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link       https://github.com/dieze/DzUserModule
 */

namespace Codeception\Module;

use Codeception\Module;

use DzUserModule\Test\Helper\DbWebHelper;
use DzUserModule\Test\Helper\DbWebHelperInterface;

/**
 * Classe helper pour les tests d'acceptation.
 * Fonctions personnalisés pour le WebGuy.
 *
 * @category   Test
 * @package    DzUser
 * @subpackage Helper
 * @author     Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license    http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link       https://github.com/dieze/DzUserModule
 */
class WebHelper extends Module implements DbWebHelperInterface
{
	/**
     * Helper pour les méthodes de Db.
     *
     * @var DbWebHelper
     */
    protected $dbHelper;

    /**
     * Initialisation du Helper.
     *
     * @return void
     */
    public function _initialize()
    {
        parent::_initialize();

        $dbModule = $this->getModule('Db');
        $this->dbHelper = new DbWebHelper($dbModule);
    }

    /**
     * {@inheritdoc}
     */
    public function haveDefaultUserRolesInDatabase()
    {
    	return $this->dbHelper->haveDefaultUserRolesInDatabase();
    }

    /**
     * {@inheritdoc}
     */
    public function haveDefaultUsersInDatabase()
    {
    	return $this->dbHelper->haveDefaultUsersInDatabase();
    }

    /**
     * {@inheritdoc}
     */
    public function haveDefaultUserRoleLinkersInDatabase()
    {
    	return $this->dbHelper->haveDefaultUserRoleLinkersInDatabase();
    }

    /**
     * {@inheritdoc}
     */
    public function haveAllUserDefaultsInDatabase()
    {
    	return $this->dbHelper->haveAllUserDefaultsInDatabase();
    }
}
