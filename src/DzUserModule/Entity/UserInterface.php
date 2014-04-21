<?php

/**
 * Interface pour l'entité User
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

/**
 * Interface pour l'entité User
 *
 * @category Source
 * @package  DzUserModule\Entity
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     http://github.com/dieze/DzUserModule/blob/master/src/DzUserModule/Entity/UserInterface.php
 */
interface UserInterface extends RoleAwareInterface
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
     * @return UserInterface
     */
    public function setId($id);

    /**
     * Obtient le nom d'utilisateur
     *
     * @return string
     */
    public function getUsername();

    /**
     * Définit le nom d'utilisateur
     *
     * @param string $username Nouveau nom d'utilisateur
     *
     * @return UserInterface
     */
    public function setUsername($username);

    /**
     * Obtient l'adresse email
     *
     * @return string
     */
    public function getEmail();

    /**
     * Définit l'adresse email
     *
     * @param string $email Nouvelle adresse email
     *
     * @return UserInterface
     */
    public function setEmail($email);

    /**
     * Obtient le nom d'affichage
     *
     * @return string
     */
    public function getDisplayName();

    /**
     * Définit le nom d'affichage
     *
     * @param string $displayName Nouveau nom d'affichage
     *
     * @return UserInterface
     */
    public function setDisplayName($displayName);

    /**
     * Obtient le mot de passe
     *
     * @return string
     */
    public function getPassword();

    /**
     * Définit le mot de passe
     *
     * @param string $password Nouveau mot de passe
     *
     * @return UserInterface
     */
    public function setPassword($password);

    /**
     * Obtient l'état du compte
     *
     * @return int
     */
    //public function getState();

    /**
     * Définit l'état du compte.
     *
     * @param int $state Nouvel état du compte
     *
     * @return UserInterface
     */
    //public function setState($state);
}
