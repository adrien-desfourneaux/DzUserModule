<?php

/**
 * Interface pour une entité qui possède un rôle
 *
 * PHP version 5.3.3
 *
 * @category Source
 * @package  DzUser\Entity
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     https://github.com/dieze/DzUser/blob/master/src/DzUser/Entity/RoleAwareInterface.php
 */

namespace DzUser\Entity;

use BjyAuthorize\Provider\Role\ProviderInterface;;

/**
 * Interface pour une entité qui possède un rôle
 *
 * @category Source
 * @package  DzUser\Entity
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     http://github.com/dieze/DzUser/blob/master/src/DzUser/Entity/RoleAwareInterface.php
 */
interface RoleAwareInterface extends ProviderInterface
{
    /**
     * Obtient les rôles
     *
     * @return array
     *
     * @see ProviderInterface
     */
    //public function getRoles();

    /**
     * Ajoute un rôle
     *
     * @param RoleInterface $role Nouveau rôle
     *
     * @return void
     */
    public function addRole($role);
}