<?php

/**
 * Fichier de source de l'entité utilisateur
 * Entité Doctrine2
 *
 * PHP version 5.4.0
 *
 * @category Source
 * @package  DzUser\Entity
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     https://github.com/dieze/DzUser/blob/master/src/DzUser/Entity/User.php
 */

namespace DzUser\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @category Source
 * @package  DzUser\Entity
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     http://github.com/dieze/DzUser/blob/master/src/DzUser/Entity/User.php
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User implements UserInterface
{
    use UserTrait;
}
