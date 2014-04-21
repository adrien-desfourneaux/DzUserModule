<?php

/**
 * Spécification de l'entité Utilisateur
 *
 * PHP version 5.3.3
 *
 * @category Spec
 * @package  DzUserModule\Entity
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 */

namespace spec\DzUserModule\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Zend\Stdlib\Exception;

/**
 * Classe de spécification du comportement
 * de l'entité utilisteur.
 *
 * @category Spec
 * @package  DzUserModule\Entity
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 * @see      ObjectBehavior
 */
class UserSpec extends ObjectBehavior
{
    /**
     * Le User doit être initialisable.
     *
     * @return null
     */
    function it_is_initializable()
    {
        $this->shouldHaveType('DzUserModule\Entity\User');
    }

    /**
     * Le User doit avoir un attribut username
     * disponible en lecture et en écriture.
     *
     * @return null
     */
    function it_has_a_rw_username()
    {
        $username = 'test';
        $this->setUsername($username);
        $this->getUsername()->shouldReturn($username);
    }

    /**
     * Le User retourne son instance 
     * quand on définit son attribut username.
     *
     * @return null
     */
    function it_returns_itself_when_setting_username()
    {
        $this->setUsername('test')->shouldReturn($this);
    }


    /**
     * Le User doit avoir un attribut displayName
     * disponible en lecture et en écriture.
     *
     * @return null
     */
    function it_has_a_rw_display_name()
    {
        $display_name = 'test';
        $this->setDisplayName($display_name);
        $this->getDisplayName()->shouldReturn($display_name);
    }

    /**
     * Le Project retourne son instance 
     * quand on définit son attribut displayName.
     *
     * @return null
     */
    function it_returns_itself_when_setting_display_name()
    {
        $this->setDisplayName('test')->shouldReturn($this);
    }

    /**
     * Le Project accepte uniquement
     * une chaine de caractère en
     * valeur d'attribut displayName.
     *
     * @return null
     */
    function it_only_accepts_string_as_display_name()
    {
        // negative integer
        $display_name = -1;
        $this->shouldThrow(new Exception\InvalidArgumentException())->duringSetDisplayName($display_name);

        // zero integer
        $display_name = 0;
        $this->shouldThrow(new Exception\InvalidArgumentException())->duringSetDisplayName($display_name);

        // positive integer
        $display_name = 1;
        $this->shouldThrow(new Exception\InvalidArgumentException())->duringSetDisplayName($display_name);

        // boolean
        $display_name = true;
        $this->shouldThrow(new Exception\InvalidArgumentException())->duringSetDisplayName($display_name);

        // float
        $display_name = 1.1;
        $this->shouldThrow(new Exception\InvalidArgumentException())->duringSetDisplayName($display_name);

        // null
        $display_name = null; 
        $this->shouldThrow(new Exception\InvalidArgumentException())->duringSetDisplayName($display_name);

        // array
        $display_name = array();
        $this->shouldThrow(new Exception\InvalidArgumentException())->duringSetDisplayName($display_name);
    }

    /**
     * @todo
     * spec functions
     */
}
