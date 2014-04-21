<?php

/**
 * Fichier de module de DzUser
 *
 * PHP version 5.3.3
 *
 * @category Source
 * @package  DzUser
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 */

namespace DzUserModule;

use DzViewModule\ModuleManager\Feature\ViewModelProviderInterface;

use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

/**
 * Classe module de DzUserModule.
 *
 * @category Source
 * @package  DzUser
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 */
class Module implements
    BootstrapListenerInterface,
    AutoloaderProviderInterface,
    ConfigProviderInterface,
    ViewModelProviderInterface,
    ViewHelperProviderInterface,
    ServiceProviderInterface
{
    /**
     * Ecoute l'événement Bootstrap
     *
     * @param EventInterface $mvcEvent Représentation d'un événement
     *
     * @return array
     */
    public function onBootstrap(EventInterface $mvcEvent)
    {
        // ZfcUser
        $eventManager = $mvcEvent->getApplication()->getEventManager();
        $em           = $eventManager->getSharedManager();

        $zfcServiceEvents = $mvcEvent->getApplication()->getServiceManager()->get('zfcuser_user_service')->getEventManager();

        // Modification du formulaire de connexion
        $em->attach(
            'ZfcUser\Form\Login', 'init', function ($event) {
                $form = $event->getTarget();

                $form->get('credential')->setLabel('Mot de passe');
                $form->get('submit')->setLabel('Authentification');
            }
        );

        // Modification du formulaire d'enregistrement
        $em->attach(
            'ZfcUser\Form\Register', 'init', function ($event) {
                $form = $event->getTarget();

                // Ajout des nouveaux champs
                $form->add(
                    array(
                        'name' => 'role',
                        'options' => array(
                            'label' => 'Rôle',
                        ),
                        'attributes' => array(
                            'type' => 'text'
                        ),
                    )
                );
            }
        );

        // Validation des nouveaux champs
        $em->attach(
            'ZfcUser\Form\RegisterFilter', 'init', function ($event) {
                $filter = $event->getTarget();
                $filter->add(
                    array(
                        'name'       => 'role',
                        'required'   => true,
                        'allowEmpty' => false,
                        'filters'    => array(array('name' => 'StringTrim')),
                        'validators' => array(
                            array(
                                'name' => 'NotEmpty',
                            )
                        ),
                    )
                );
            }
        );

        // Stocke le champ
        $zfcServiceEvents->attach(
            'register', function ($event) {
                $form = $event->getParam('form');
                $user = $event->getParam('user');

                /* @var $user \DzUserModule\Entity\User */
                $user->setRole($form->get('role')->getValue());
            }
        );
    }

    /**
     * Retourne un tableau à parser par Zend\Loader\AutoloaderFactory.
     *
     * @return array
     *
     * @see AutoloaderProviderInterface
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/../../autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }

    /**
     * Retourne la configuration à fusionner avec
     * la configuration de l'application
     *
     * @return array|\Traversable
     *
     * @see ConfigProviderInterface
     */
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    /**
     * Doit retourner un objet de type \Zend\ServiceManager\Config
     * ou un tableau pour créer un tel objet.
     *
     * @return array|\Zend\ServiceManager\Config
     */
    public function getViewModelConfig()
    {
        return array(
            'factories' => array(
                'DzUserModule\LoginViewModel'   => 'DzUserModule\View\Model\Factory\LoginViewModelFactory',
            ),
            'invokables' => array(
                'DzUserModule\IndexViewModel'   => 'DzUserModule\View\Model\IndexViewModel',
                'DzUserModule\ProfileViewModel' => 'Zend\View\Model\ViewModel',
            ),
            'shared' => array(
                'DzUserModule\ProfileViewModel' => false,
            ),
        );
    }

    /**
     * Doit retourner un objet de type \Zend\ServiceManager\Config
     * ou un tableau pour créer un tel objet.
     *
     * @return array|\Zend\ServiceManager\Config
     */
    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'DzUserModule\IdentityWidget' => 'DzUserModule\View\Helper\Factory\IdentityWidgetFactory',
            ),
            'aliases' => array(
                'dzUserIdentityWidget' => 'DzUserModule\IdentityWidget',
            ),
        );
    }

    /**
     * Doit retourner un objet de type \Zend\ServiceManager\Config
     * ou un tableau pour créer un tel objet.
     *
     * @return array|\Zend\ServiceManager\Config
     *
     * @see ServiceProviderInterface
     */
    public function getServiceConfig()
    {
        return array(
            'alias' => array(
                // Ne pas utiliser les options de zfcuser,
                // utiliser celles de dzuser à la place
                'zfcuser_module_options' => 'DzUserModule\ModuleOptions',
            ),

            'invokables' => array(
                'dzuser_user_service' => 'DzUserModule\Service\User',
                'dzuser_user_hydrator' => 'Zend\Stdlib\Hydrator\ClassMethods'
            ),
            'factories' => array(
                'DzUserModule\ModuleOptions' => 'DzUserModule\Factory\ModuleOptionsFactory',
                'dzuser_user_mapper' => function ($serviceManager) {
                    $options = $serviceManager->get('dzuser_module_options');
                    $entityManager = $serviceManager->get('doctrine.entitymanager.orm_default');
                    $entityClass = $options->getUserEntityClass();
                    return new Mapper\User($entityManager, $entityClass);
                },
            ),
        );
    }
}
