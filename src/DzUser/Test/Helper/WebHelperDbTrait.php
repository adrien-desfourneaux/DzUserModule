<?php

/**
 * Trait pour WebHelper qui utilise les méthodes de Db
 * 
 * PHP version 5.4.0
 *
 * @category Source
 * @package  DzUser\Test\Helper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     https://github.com/dieze/DzUser/blob/master/src/DzUser/Test/Helper/WebHelperDbTrait.php
 */

namespace DzUser\Test\Helper;

/**
 * Trait pour WebHelper qui utilise les méthodes de Db
 *
 * @category Source
 * @package  DzUser\Test\Helper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     https://github.com/dieze/DzUser/blob/master/src/DzUser/Test/Helper/WebHelperDbTrait.php
 */
trait WebHelperDbTrait
{
    /**
     * Insère les rôles utilisateurs par défaut
     * dans la base de données
     *
     * @return void
     */
    public function haveDefaultUserRolesInDatabase()
    {
        $dbh = $this->getModule('Db')->dbh;
        $dbDumper = new \DzUser\Test\Helper\Db($dbh);
        $dbDumper->insertUserRoles();
    }

    /**
     * Insère les utilisateurs par défaut
     * dans la base de données.
     *
     * @return void
     */
    public function haveDefaultUsersInDatabase()
    {
        $dbh = $this->getModule('Db')->dbh;
        $dbDumper = new \DzUser\Test\Helper\Db($dbh);
        $dbDumper->insertUsers();
    }

    /**
     * Définit dans la base de données
     * les rôles par défaut pour les utilisateur.
     *
     * @return void
     */
    public function haveDefaultUserRoleLinkersInDatabase()
    {
        $dbh = $this->getModule('Db')->dbh;
        $dbDumper = new \DzProject\Test\Helper\Db($dbh);
        $dbDumper->insertUserRoleLinkers();
    }

    /**
     * Définit tout par défaut
     * dans la base de données
     *
     * @return void
     */
    public function haveAllDefaultsInDatabase()
    {
        $dbh = $this->getModule('Db')->dbh;
        $db = new \DzTask\Test\Helper\Db($dbh);
        $db->execDumpFile();
    }
}
