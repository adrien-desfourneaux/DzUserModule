<?php

/**
 * Aides pour les tests d'acceptation
 * 
 * PHP version 5.4.0
 *
 * @category   Test
 * @package    DzUser
 * @subpackage Helper
 * @author     Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license    http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link       https://github.com/dieze/DzUser/blob/master/tests/_helpers/WebHelper.php
 */

namespace Codeception\Module;

use DzUser\Test\Helper\WebHelperDbTrait;

/**
 * Classe helper pour les tests d'acceptation.
 * Fonctions personnalisés pour le WebGuy.
 *
 * @category   Test
 * @package    DzUser
 * @subpackage Helper
 * @author     Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license    http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link       https://github.com/dieze/DzUser/blob/master/tests/_helpers/WebHelper.php
 */
class WebHelper extends \Codeception\Module
{
    use WebHelperDbTrait;
}
