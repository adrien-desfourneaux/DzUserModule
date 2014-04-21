<?php

/**
 * Classe pour WebHelper qui utilise les méthodes de Db
 * 
 * PHP version 5.3.0
 *
 * @category Source
 * @package  DzUserModule\Test\Helper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 */

namespace DzUserModule\Test\Helper;

use Codeception\Module\Db as DbModule;

/**
 * Classe pour WebHelper qui utilise les méthodes de Db
 *
 * @category Source
 * @package  DzUserModule\Test\Helper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 */
class DbWebHelper implements DbWebHelperInterface
{
    /**
     * Module Codeception de base de données.
     *
     * @var DbModule
     */
    protected $db;

    /**
     * Constructeur de DbWebHelper.
     *
     * @param DbModule $db Module de Base de données.
     *
     * @return void
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * {@inheritdoc}
     */
    public function haveDefaultUserRolesInDatabase()
    {
        $dbh = $this->db->dbh;
        $db = new Db($dbh);
        $db->insertUserRoles();
    }

    /**
     * {@inheritdoc}
     */
    public function haveDefaultUsersInDatabase()
    {
        $dbh = $this->db->dbh;
        $db = new Db($dbh);
        $db->insertUsers();
    }

    /**
     * {@inheritdoc}
     */
    public function haveDefaultUserRoleLinkersInDatabase()
    {
        $dbh = $this->db->dbh;
        $db = new Db($dbh);
        $db->insertUserRoleLinkers();
    }

    /**
     * {@inheritdoc}
     */
    public function haveAllUserDefaultsInDatabase()
    {
        $dbh = $this->db->dbh;
        $db = new Db($dbh);
        $db->execDumpFile();
    }
}
