<?php

/**
 * Fichier de source pour le UserMapper
 *
 * PHP version 5.3.3
 *
 * @category Source
 * @package  DzUser\Mapper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     https://github.com/dieze/DzUser/blob/master/src/DzUser/Mapper/User.php
 */

namespace DzUser\Mapper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

/**
 * Mapper pour les utilisateurs.
 *
 * @category Source
 * @package  DzUser\Mapper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     http://github.com/dieze/DzUser/blob/master/src/DzUser/Mapper/User.php
 */
class User extends \ZfcUserDoctrineORM\Mapper\User implements UserInterface
{
    /**
     * Trouve des utilisateurs selon leur role.
     *
     * @param string $role Role des utilisateurs à trouver
     *
     * @todo
     *
     * @return \Doctrine\ORM\Common\Collections\ArrayCollection
     */
    public function findByRole($role)
    {
        $entityRepository = $this->em->getRepository($this->options->getUserEntityClass());
        return $entityRepository->findOneBy(array('role' => $role));
    }
}
