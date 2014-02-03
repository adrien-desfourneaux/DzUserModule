<?php

/**
 * Fichier de source pour le UserInterface
 *
 * PHP version 5.3.3
 *
 * @category Source
 * @package  DzUser\Mapper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     https://github.com/dieze/DzUser/blob/master/src/DzUser/Mapper/UserInterface.php
 */

namespace DzUser\Mapper;

/**
 * Interface pour le mapper de utilisateur
 *
 * @category Source
 * @package  DzUser\Mapper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     https://github.com/dieze/DzUser/blob/master/src/DzUser/Mapper/UserInterface.php
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
