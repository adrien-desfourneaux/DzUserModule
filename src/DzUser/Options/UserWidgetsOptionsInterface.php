<?php

/**
 * Fichier d'interface pour les options des widgets
 *
 * PHP version 5.3.3
 *
 * @category Source
 * @package  DzUser\Options
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     https://github.com/dieze/DzUser/blob/master/src/DzUser/Options/UserWidgetsOptionsInterface.php
 */

namespace DzUser\Options;

/**
 * Interface pour les options des widgets
*
 * @category Source
 * @package  DzUser\Options
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     https://github.com/dieze/DzUser/blob/master/src/DzUser/Options/UserWidgetsOptionsInterface.php
 */
interface UserWidgetsOptionsInterface
{
    /**
     * Définit le template de connexion pour le widget identity
     *
     * @param string $userIdentityWidgetLoginViewTemplate Chemin vers le template
     *
     * @return ModuleOptions
     */
    public function setUserIdentityWidgetLoginViewTemplate($userIdentityWidgetLoginViewTemplate);

    /**
     * Obtient le template connexion pour le widget identity
     *
     * @return string
     */
    public function getUserIdentityWidgetLoginViewTemplate();

    /**
     * Définit le template de profil pour le widget identity
     *
     * @param string $userIdentityWidgetProfileViewTemplate Chemin vers le template
     *
     * @return ModuleOptions
     */
    public function setUserIdentityWidgetProfileViewTemplate($userIdentityWidgetProfileViewTemplate);

    /**
     * Obtient le template connexion pour le widget identity
     *
     * @return string
     */
    public function getUserIdentityWidgetProfileViewTemplate();
}
