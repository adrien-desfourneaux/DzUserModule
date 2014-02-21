<?php

/**
 * Interface pour l'entité rôle
 *
 * PHP version 5.4.0
 *
 * @category Source
 * @package  DzUser\Entity
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     https://github.com/dieze/DzUser/blob/master/src/DzUser/Entity/RoleInterface.php
 */

namespace DzUser\Entity;

use BjyAuthorize\Acl\HierarchicalRoleInterface;

/**
 * Interface pour l'entité rôle
 *
 * @category Source
 * @package  DzUser\Entity
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     http://github.com/dieze/DzUser/blob/master/src/DzUser/Entity/RoleInterface.php
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
