<?php

/**
 * Fichier d'options pour le Module DzUser
 *
 * PHP version 5.3.3
 *
 * @category Source
 * @package  DzUserModule\Options
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 */

namespace DzUserModule\Options;

use Zend\Stdlib\AbstractOptions;

/**
 * Classe d'options pour le Module DzUser
 *
 * @category Source
 * @package  DzUserModule\Options
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link     https://github.com/dieze/DzUserModule
 */
class ModuleOptions extends \ZfcUser\Options\ModuleOptions implements
    UserWidgetsOptionsInterface
{
    /**
     * Route de redirection de connexion
     * Ecrase la valeur de ZfcUser
     *
     * @var string
     */
    protected $loginRedirectRoute = 'dzuser';

    /**
     * Route de redirection de déconnexion
     * Ecrase la valeur de ZfcUser
     *
     * @var string
     */
    protected $logoutRedirectRoute = 'dzuser/login';

    /**
     * Entité utilisateur
     * Ecrase la valeur de ZfcUser
     *
     * @var string
     */
    protected $userEntityClass = 'DzUserModule\Entity\User';

    /**
     * Template de connexion pour le widget identity
     *
     * @var string
     */
    protected $userIdentityWidgetLoginViewTemplate = 'dz-user-module/user/login.phtml';

    /**
     * Template de profil pour le widget identity
     *
     * @var string
     */
    protected $userIdentityWidgetProfileViewTemplate = 'dz-user-module/user/profile.phtml';

    /**
     * Définit le template de connexion pour le widget identity
     *
     * @param string $userIdentityWidgetLoginViewTemplate Chemin vers le template
     *
     * @return ModuleOptions
     */
    public function setUserIdentityWidgetLoginViewTemplate($userIdentityWidgetLoginViewTemplate)
    {
        $this->$userIdentityWidgetLoginViewTemplate = $userIdentityWidgetLoginViewTemplate;
        return $this;
    }

    /**
     * Obtient le template connexion pour le widget identity
     *
     * @return string
     */
    public function getUserIdentityWidgetLoginViewTemplate()
    {
        return $this->userIdentityWidgetLoginViewTemplate;
    }

    /**
     * Définit le template de profil pour le widget identity
     *
     * @param string $userIdentityWidgetProfileViewTemplate Chemin vers le template
     *
     * @return ModuleOptions
     */
    public function setUserIdentityWidgetProfileViewTemplate($userIdentityWidgetProfileViewTemplate)
    {
        $this->$userIdentityWidgetProfileViewTemplate = $userIdentityWidgetProfileViewTemplate;
        return $this;
    }

    /**
     * Obtient le template connexion pour le widget identity
     *
     * @return string
     */
    public function getUserIdentityWidgetProfileViewTemplate()
    {
        return $this->userIdentityWidgetProfileViewTemplate;
    } 
}
