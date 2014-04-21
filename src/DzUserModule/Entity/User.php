<?php

/**
 * Fichier de source de l'entité utilisateur
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
 * Utilisateur
 *
 * @category Source
 * @package  DzUserModule\Entity
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     http://github.com/dieze/DzUserModule/blob/master/src/DzUserModule/Entity/User.php
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User extends UserMappedSuperclass
{
}
