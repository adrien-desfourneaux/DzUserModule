<?php

/**
 * Fichier de source pour le UserMapper
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

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

/**
 * Mapper pour les utilisateurs.
 *
 * @category Source
 * @package  DzUserModule\Mapper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     http://github.com/dieze/DzUserModule/blob/master/src/DzUserModule/Mapper/User.php
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
