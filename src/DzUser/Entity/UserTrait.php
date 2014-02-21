<?php

/**
 * Trait pour l'entité User
 * Utile pour les entités Doctrine, car il n'est pas
 * possible de faire un extends d'une classe entité Doctrine
 *
 * PHP version 5.4.0
 *
 * @category Source
 * @package  DzUser\Entity
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     https://github.com/dieze/DzUser/blob/master/src/DzUser/Entity/UserTrait.php
 */

namespace DzUser\Entity;

use Doctrine\ORM\Mapping as ORM;
use DzBaseModule\Exception;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Trait pour l'entité User
 *
 * @category Source
 * @package  DzUser\Entity
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     http://github.com/dieze/DzUser/blob/master/src/DzUser/Entity/UserTrait.php
 */
trait UserTrait
{
    /**
     * Identifiant
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * Nom d'utilisateur
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */
    protected $username;

    /**
     * Adresse email
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    protected $email;

    /**
     * Nom d'affichage
     * @var string
     *
     * @ORM\Column(name="display_name", type="string", length=50)
     */
    protected $displayName;

    /**
     * Mot de passe
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=128, nullable=false)
     */
    protected $password;

    /**
     * Etat du compte
     * @var int
     *
     * @ORM\Column(name="state", type="integer")
     */
    protected $state;

    /**
     * Rôles de l'utilisateur
     *
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\ManyToMany(targetEntity="DzUser\Entity\Role")
     * @ORM\JoinTable(name="user_role_linker",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="user_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="role_id")}
     * )
     */
    protected $roles;


    /**
     * Initialise la variable roles
     */
    public function __construct()
    {
        $this->roles = new ArrayCollection();
    }
    
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
     * @return UserInterface
     */
    public function setId($id)
    {
        $this->id = (int) $id;
        return $this;
    }

    /**
     * Obtient le nom d'utilisateur
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Définit le nom d'utilisateur
     *
     * @param string $username Nouveau nom d'utilisateur
     *
     * @return UserInterface
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Obtient l'adresse email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Définit l'adresse email
     *
     * @param string $email Nouvelle adresse email
     *
     * @return UserInterface
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Obtient le nom d'affichage
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Définit le nom d'affichage
     *
     * @param string $displayName Nouveau nom d'affichage
     *
     * @return UserInterface
     */
    public function setDisplayName($displayName)
    {
        if (!is_string($displayName)) {
            throw new Exception\InvalidArgumentException('Argument invalide : displayName = ' . $displayName);
        }

        $this->displayName = $displayName;
        return $this;
    }

    /**
     * Obtient le mot de passe
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Définit le mot de passe
     *
     * @param string $password Nouveau mot de passe
     *
     * @return UserInterface
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Obtient l'état du compte
     *
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Définit l'état du compte
     *
     * @param int $state Nouvel état du compte
     *
     * @return UserInterface
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * Obtient les rôles de l'utilisateur
     *
     * @return array
     */
    public function getRoles()
    {
        return $this->roles->getValues();
    }

    /**
     * Ajoute un rôle à l'utilisateur
     *
     * @param Role $role Nouveau rôle de l'utilisateur
     *
     * @return void
     */
    public function addRole($role)
    {
        $this->roles[] = $role;
    }
}
