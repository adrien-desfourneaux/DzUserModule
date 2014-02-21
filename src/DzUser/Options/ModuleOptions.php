<?php

/**
 * Fichier d'options pour le Module DzUser
 *
 * PHP version 5.3.3
 *
 * @category Source
 * @package  DzUser\Options
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     https://github.com/dieze/DzUser/blob/master/src/DzUser/Options/ModuleOptions.php
 */

namespace DzUser\Options;

use Zend\Stdlib\AbstractOptions;

/**
 * Classe d'options pour le Module DzUser
 *
 * @category Source
 * @package  DzUser\Options
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     https://github.com/dieze/DzUser/blob/master/src/DzUser/Options/ModuleOptions.php
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
    protected $userEntityClass = 'DzUser\Entity\User';

    /**
     * Template de connexion pour le widget identity
     *
     * @var string
     */
    protected $userIdentityWidgetLoginViewTemplate = 'dz-user/user/login.phtml';

    /**
     * Template de profil pour le widget identity
     *
     * @var string
     */
    protected $userIdentityWidgetProfileViewTemplate = 'dz-user/user/profile.phtml';

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
