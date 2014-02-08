<?php

/**
 * Interface pour WebHelper qui utilise les méthodes de Db
 * 
 * PHP version 5.3.3
 *
 * @category Source
 * @package  DzUser\Test\Helper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     https://github.com/dieze/DzUser/blob/master/src/DzUser/Test/Helper/WebHelperDbInterface.php
 */

namespace DzUser\Test\Helper;

/**
 * Interface pour WebHelper qui utilise les méthodes de Db
 *
 * @category Source
 * @package  DzUser\Test\Helper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     https://github.com/dieze/DzUser/blob/master/src/DzUser/Test/Helper/WebHelperDbInterface.php
 */
interface WebHelperDbInterface
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
}
