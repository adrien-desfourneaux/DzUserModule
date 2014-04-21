<?php

/**
 * Superclass mappée pour l'entité User.
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
use DzBaseModule\Exception;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Superclass mappée pour l'entité User.
 *
 * @category Source
 * @package  DzUserModule\Entity
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     http://github.com/dieze/DzUserModule
 *
 * @ORM\MappedSuperclass
 */
class UserMappedSuperclass implements UserInterface
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
     * @ORM\ManyToMany(targetEntity="DzUserModule\Entity\Role")
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
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function setId($id)
    {
        $this->id = (int) $id;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * {@inheritdoc}
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * {@inheritdoc}
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
     */
    public function getRoles()
    {
        return $this->roles->getValues();
    }

    /**
     * {@inheritdoc}
     */
    public function addRole($role)
    {
        $this->roles[] = $role;
    }
}
