<?php

/**
 * Trait pour l'entité rôle
 * Utile pour les entités Doctrine, car il n'est pas
 * possible de faire un extends d'une classe entité Doctrine
 *
 * PHP version 5.4.0
 *
 * @category Source
 * @package  DzUser\Entity
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     https://github.com/dieze/DzUser/blob/master/src/DzUser/Entity/RoleTrait.php
 */

namespace DzUser\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trait pour l'entité rôle
 *
 * @category Source
 * @package  DzUser\Entity
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     http://github.com/dieze/DzUser/blob/master/src/DzUser/Entity/RoleTrait.php
 */
trait RoleTrait
{
    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(name="role_id", type="string", length=255, unique=true, nullable=true)
     */
    protected $roleId;

    /*
     * @var string
     * @ORM\Column(name="parent", type="string")
     */
    protected $parentId;

    /**
     * @var Role
     * @ORM\ManyToOne(targetEntity="DzUser\Entity\Role")
     * @ORM\JoinColumn(name="parent", referencedColumnName="role_id")
     */
    protected $parent;

    /**
     * Obtient l'identifiant
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Définit l'identifiant
     *
     * @param int $id Nouvel identifiant
     *
     * @return RoleInterface
     */
    public function setId($id)
    {
        $this->id = (int)$id;
        return $this;
    }

    /**
     * Obtient le nom identifiant du rôle
     *
     * @return string
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

    
    /**
     * Définit le nom identifiant du rôle
     *
     * @param string $roleId Nouveau nom identifiant du rôle
     *
     * @return RoleInterface
     */
    public function setRoleId($roleId)
    {
        $this->roleId = (string) $roleId;
        return $this;
    }

    /**
     * Obtient le rôle parent
     *
     * @return RoleInterface
     */
    public function getParent()
    {
        return $this->parent;
    }
}
