<?php

/**
 * Interface pour l'entité rôle
 *
 * PHP version 5.4.0
 *
 * @category Source
 * @package  DzUserModule\Entity
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 */

namespace DzUserModule\Entity;

use BjyAuthorize\Acl\HierarchicalRoleInterface;

/**
 * Interface pour l'entité rôle
 *
 * @category Source
 * @package  DzUserModule\Entity
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     http://github.com/dieze/DzUserModule/blob/master/src/DzUserModule/Entity/RoleInterface.php
 */
interface RoleInterface extends HierarchicalRoleInterface
{
    /**
     * Obtient l'identifiant
     *
     * @return int
     */
    public function getId();

    /**
     * Définit l'identifiant
     *
     * @param int $id Nouvel identifiant
     *
     * @return RoleInterface
     */
    public function setId($id);

    /**
     * Obtient le nom identifiant du rôle
     *
     * @return string
     */
    public function getRoleId();

    /**
     * Définit le nom identifiant du rôle
     *
     * @param string $roleId Nouveau nom identifiant du rôle
     *
     * @return RoleInterface
     */
    public function setRoleId($roleId);

    /**
     * Obtient le rôle parent
     *
     * @return RoleInterface
     *
     * @see HierarchicalRoleInterface
     */
    //public function getParent();
}
