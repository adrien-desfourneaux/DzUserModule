<?php
/**
 * Fichier de source du UserController
 *
 * PHP version 5.3.3
 *
 * @category Source
 * @package  DzUser\Controller
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     https://github.com/dieze/DzUser/blob/master/src/DzUser/Controller/UserController.php
 */

namespace DzUser\Controller;

use Zend\Form\Form;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use DzUser\Service\User as UserService;
use Zend\Stdlib\Exception;

/**
 * Classe contrôleur de utilistateur.
 *
 * @category Source
 * @package  DzUser\Controller
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     http://github.com/dieze/DzUser/blob/master/src/DzUser/Controller/UserController.php
 * @see      AbstractActionController Contrôleur d'actions abstrait.
 */
class UserController extends \ZfcUser\Controller\UserController
{
    /**
     * Information du module
     *
     * @return ViewModel
     */
    public function indexAction()
    {
        return new ViewModel();
    }
}