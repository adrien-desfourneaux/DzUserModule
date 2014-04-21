<?php

/**
 * Interface pour une entité qui possède un rôle.
 *
 * PHP version 5.3.3
 *
 * @category Source
 * @package  DzUserModule\Entity
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 */

namespace DzUserModule\Entity;

use BjyAuthorize\Provider\Role\ProviderInterface;

/**
 * Interface pour une entité qui possède un rôle.
 *
 * @category Source
 * @package  DzUserModule\Entity
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     http://github.com/dieze/DzUserModule/blob/master/src/DzUserModule/Entity/RoleAwareInterface.php
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
