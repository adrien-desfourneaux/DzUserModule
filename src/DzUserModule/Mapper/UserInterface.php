<?php

/**
 * Fichier de source pour le UserInterface
 *
 * PHP version 5.3.3
 *
 * @category Source
 * @package  DzUserModule\Mapper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 */

namespace DzUserModule\Mapper;

/**
 * Interface pour le mapper de utilisateur
 *
 * @category Source
 * @package  DzUserModule\Mapper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 */
interface UserInterface extends \ZfcUser\Mapper\UserInterface
{
    /**
     * Trouve des utilisateurs selon leur role
     *
     * @param string $role Role des utilisateurs à trouver
     *
     * @return \Doctrine\ORM\Common\Collections\ArrayCollection
     */
    public function findByRole($role);
}
