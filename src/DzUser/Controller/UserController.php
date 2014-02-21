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
use Zend\Http\Reponse;
use ZfcUser\Options\UserControllerOptionsInterface;

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
    const ROUTE_LOGIN     = 'dzuser/login';

    const CONTROLLER_NAME = 'dzuser';
    const ROUTE_PROFILE   = 'dzuser/profile';

    /**
     * Constructeur de UserController
     *
     * @return void
     */
    public function __construct()
    {
        $this->failedLoginMessage = "Erreur auth erroné";
    }

    /**
     * Information du module
     * ROUTE: dzuser
     * URL: /user
     *
     * @return ViewModel
     */
    public function indexAction()
    {
        return new ViewModel();
    }

    /**
     * Profil de l'utilisateur connecté
     * ROUTE: dzuser/profile
     * URL: /user/profile
     *
     * @return ViewModel
     */
    public function profileAction()
    {
        if (!$this->zfcUserAuthentication()->hasIdentity()) {
            return $this->redirect()->toRoute(static::ROUTE_LOGIN);
        }

        $request = $this->getRequest();

        if ($request->getQuery()->get('redirectLogout')) {
            $redirectLogout = $request->getQuery()->get('redirectLogout');
        } else {
            $redirectLogout = false;
        }

        if ($request->getQuery()->get('hasTitle') !== null) {
            $hasTitle = $request->getQuery()->get('hasTitle');
        } else {
            // Toujours afficher le titre dans la vue retournée par un controller
            $hasTitle = true;
        }

        return new ViewModel(
            array(
                'hasTitle' => $hasTitle,
                'redirectLogout' => $redirectLogout,
            )
        );
    }

    /**
     * Connexion utilisateur
     * Remplacement de ZfcUser\Controller\UserController::loginAction()
     *
     * ROUTE: dzuser/login
     * URL: /user/login
     *
     * @return mixed
     */
    public function loginAction()
    {
        $request = $this->getRequest();
        $form = $this->getLoginForm();

        if ($this->getOptions()->getUseRedirectParameterIfPresent()) {
            
            if ($request->getQuery()->get('redirectSuccess')) {
                $redirectSuccess = $request->getQuery()->get('redirectSuccess');
            } else {
                $redirectSuccess = false;
            }

            if ($request->getQuery()->get('redirectFailure')) {
                $redirectFailure = $request->getQuery()->get('redirectFailure');
            } else {
                $redirectFailure = false;
            }
        }

        if ($request->getQuery()->get('hasTitle') !== null) {
            $hasTitle = $request->getQuery()->get('hasTitle');
        } else {
            // Toujours afficher le titre dans la vue retournée par un controller
            $hasTitle = true;
        }

        if ($request->getQuery()->get('hasRegistration') !== null) {
            $hasRegistration = $request->getQuery()->get('hasRegistration');
        } else {
            // Toujours afficher le lien d'inscription
            $hasRegistration = true;
        }

        $enableRegistration = $this->getOptions()->getEnableRegistration();

        if ($enableRegistration && !$hasRegistration) {
            $enableRegistration = false;
        }

        if (!$request->isPost()) {
            return array(
                'loginForm' => $form,
                'redirectSuccess'  => $redirectSuccess,
                'redirectFailure' => $redirectFailure,
                'hasTitle' => $hasTitle,
                'enableRegistration' => $enableRegistration,
            );
        }

        $form->setData($request->getPost());

        if (!$form->isValid()) {
            $this->flashMessenger()->setNamespace('zfcuser-login-form')->addMessage($this->failedLoginMessage);

            $redirectFailure = $this->params()->fromPost('redirectFailure', $this->params()->fromQuery('redirectFailure', false));

            if ($redirectFailure) {
                return $this->redirect()->toUrl($redirectFailure);
            } else {
                return $this->redirect()->toUrl($this->url()->fromRoute(static::ROUTE_LOGIN).($redirectSuccess ? '?redirectSuccess='.$redirectSuccess : ''));
            }
        }

        // clear adapters
        $this->zfcUserAuthentication()->getAuthAdapter()->resetAdapters();
        $this->zfcUserAuthentication()->getAuthService()->clearIdentity();

        return $this->forward()->dispatch(static::CONTROLLER_NAME, array('action' => 'authenticate'));
    }

    /**
     * Authentification utilisateur
     * Remplacement de ZfcUser\Controller\UserController::authenticateAction()
     *
     * ROUTE: dzuser/authenticate
     *
     * @return Response
     */
    public function authenticateAction()
    {
        if ($this->zfcUserAuthentication()->getAuthService()->hasIdentity()) {
            return $this->redirect()->toRoute($this->getOptions()->getLoginRedirectRoute());
        }
        $adapter = $this->zfcUserAuthentication()->getAuthAdapter();
        $redirectSuccess = $this->params()->fromPost('redirectSuccess', $this->params()->fromQuery('redirectSuccess', false));
        $redirectFailure = $this->params()->fromPost('redirectFailure', $this->params()->fromQuery('redirectFailure', false));

        $result = $adapter->prepareForAuthentication($this->getRequest());

        // Return early if an adapter returned a response
        if ($result instanceof Response) {
            return $result;
        }

        $auth = $this->zfcUserAuthentication()->getAuthService()->authenticate($adapter);

        if (!$auth->isValid()) {
            $this->flashMessenger()->setNamespace('zfcuser-login-form')->addMessage($this->failedLoginMessage);
            $adapter->resetAdapters();

            if ($redirectFailure) {
                return $this->redirect()->toUrl($redirectFailure);
            } else {
                return $this->redirect()->toUrl(
                    $this->url()->fromRoute(static::ROUTE_LOGIN)
                    . ($redirectSuccess ? '?redirectSuccess='.$redirectSuccess : '')
                );
            } 
        }

        if ($this->getOptions()->getUseRedirectParameterIfPresent() && $redirectSuccess) {
            return $this->redirect()->toUrl($redirectSuccess);
        }

        return $this->redirect()->toRoute($this->getOptions()->getLoginRedirectRoute());
    }

    /**
     * Obtient les options de l'UserController
     *
     * @return UserControllerOptionsInterface
     */
    public function getOptions()
    {
        if (!$this->options instanceof UserControllerOptionsInterface) {
            $this->setOptions($this->getServiceLocator()->get('dzuser_module_options'));
        }
        return $this->options;
    }
}
