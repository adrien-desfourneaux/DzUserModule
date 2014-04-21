<?php

/**
 * Superclass mappée Doctrine pour l'entité rôle.
 *
 * PHP version 5.3.0
 *
 * @category Source
 * @package  DzUserModule\Entity
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 */

namespace DzUserModule\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Superclass mappée Doctrine pour l'entité rôle.
 *
 * @category Source
 * @package  DzUserModule\Entity
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     http://github.com/dieze/DzUserModule
 *
 * @ORM\MappedSuperclass
 */
class RoleMappedSuperclass implements RoleInterface
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
     * @ORM\ManyToOne(targetEntity="DzUserModule\Entity\Role")
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
