<?php

/**
 * Fichier de source de l'entité rôle
 * Entité Doctrine2
 *
 * PHP version 5.3.3
 *
 * @category Source
 * @package  DzUser\Entity
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     https://github.com/dieze/DzUser/blob/master/src/DzUser/Entity/Role.php
 */

namespace DzUser\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Exception;
use BjyAuthorize\Acl\HierarchicalRoleInterface;

/**
 * Rôle
 *
 * @category Source
 * @package  DzUser\Entity
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     http://github.com/dieze/DzUser/blob/master/src/DzUser/Entity/Role.php
 *
 * @ORM\Table(name="user_role")
 * @ORM\Entity
 */
class Role implements HierarchicalRoleInterface
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, unique=true, nullable=true)
     */
    protected $roleId;

    /**
     * @var Role
     * @ORM\ManyToOne(targetEntity="Role")
     */
    protected $parent;

    /**
     * Get the id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the id.
     *
     * @param int $id Nouvel identifiant
     *
     * @return void
     */
    public function setId($id)
    {
        $this->id = (int)$id;
    }

    /**
     * Get the role id.
     *
     * @return string
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * Set the role id.
     *
     * @param string $roleId Nouveau nom identifiant du rôle
     *
     * @return void
     */
    public function setRoleId($roleId)
    {
        $this->roleId = (string) $roleId;
    }

    /**
     * Get the parent role
     *
     * @return Role
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set the parent role.
     *
     * @param Role $parent Nom identifiant du parent de ce rôle
     *
     * @return void
     */
    public function setParent(Role $parent)
    {
        $this->parent = $parent;
    }
}
