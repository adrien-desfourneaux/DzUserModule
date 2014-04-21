<?php

/**
 * Fichier de source de l'entité rôle
 * Entité Doctrine2
 *
 * PHP version 5.4.0
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
 * Rôle
 *
 * @category Source
 * @package  DzUserModule\Entity
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     http://github.com/dieze/DzUserModule/blob/master/src/DzUserModule/Entity/Role.php
 *
 * @ORM\Table(name="user_role")
 * @ORM\Entity
 */
class Role extends RoleMappedSuperclass
{
}
