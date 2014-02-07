<?php

/**
 * Aides pour les tests d'acceptation
 * 
 * PHP version 5.3.3
 *
 * @category   Test
 * @package    DzUser
 * @subpackage Helper
 * @author     Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license    http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link       https://github.com/dieze/DzUser/blob/master/tests/_helpers/WebHelper.php
 */

namespace Codeception\Module;

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
    /**
     * Insère les rôles utilisateurs par défaut
     * dans la base de données
     *
     * @return void
     */
    public function haveDefaultUserRolesInDatabase()
    {
        $dbh = $this->getModule('Db')->dbh;
        $sql = file_get_contents(__DIR__ . '/../../data/dzuser.dump.sqlite.sql');

        preg_match_all("/INSERT INTO '?user_role'? .*?;/s", $sql, $matches);
        $inserts = $matches[0];

        foreach ($inserts as $insert) {
            $dbh->exec($insert);
        }
    }

    /**
     * Insère les utilisateurs par défaut
     * dans la base de données.
     *
     * @return void
     */
    public function haveDefaultUsersInDatabase()
    {
        $dbh = $this->getModule('Db')->dbh;
        $sql = file_get_contents(__DIR__ . '/../../data/dzuser.dump.sqlite.sql');

        preg_match_all("/INSERT INTO '?user'? .*?;/s", $sql, $matches);
        $inserts = $matches[0];

        foreach ($inserts as $insert) {
            $dbh->exec($insert);
        }
    }

    /**
     * Définit dans la base de données
     * les rôles par défaut pour les utilisateur.
     *
     * @return void
     */
    public function haveDefaultUserRoleLinkersInDatabase()
    {
        $dbh = $this->getModule('Db')->dbh;
        $sql = file_get_contents(__DIR__ . '/../../data/dzuser.dump.sqlite.sql');

        preg_match_all("/INSERT INTO '?user_role_linker'? .*?;/s", $sql, $matches);
        $inserts = $matches[0];

        foreach ($inserts as $insert) {
            $dbh->exec($insert);
        }
    }
}
