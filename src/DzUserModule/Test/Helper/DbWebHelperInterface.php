<?php

/**
 * Interface pour WebHelper qui utilise les méthodes de Db
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

/**
 * Interface pour WebHelper qui utilise les méthodes de Db
 *
 * @category Source
 * @package  DzUserModule\Test\Helper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 */
interface DbWebHelperInterface
{
	/**
     * Insère les rôles utilisateurs par défaut
     * dans la base de données
     *
     * @return void
     */
    public function haveDefaultUserRolesInDatabase();

    /**
     * Insère les utilisateurs par défaut
     * dans la base de données.
     *
     * @return void
     */
    public function haveDefaultUsersInDatabase();

    /**
     * Définit dans la base de données
     * les rôles par défaut pour les utilisateur.
     *
     * @return void
     */
    public function haveDefaultUserRoleLinkersInDatabase();

    /**
     * Définit tout par défaut
     * dans la base de données
     *
     * @return void
     */
    public function haveAllUserDefaultsInDatabase();
}