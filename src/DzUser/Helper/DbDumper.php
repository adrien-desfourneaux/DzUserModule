<?php

/**
 * Méthodes d'aide d'insertion de données
 * depuis les fichiers data/*.dump.sqlite.sql
 * 
 * PHP version 5.3.3
 *
 * @category Source
 * @package  DzUser\Helper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     https://github.com/dieze/DzUser/blob/master/src/DzUser/Helper/DbDumper.php
 */

namespace DzUser\Helper;

/**
 * Méthodes d'aide d'insertion de données
 * depuis les fichiers data/*.dump.sqlite.sql
 *
 * @category Source
 * @package  DzUser\Helper
 * @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
 * @link     https://github.com/dieze/DzUser/blob/master/src/DzUser/Helper/DbDumper.php
 */
class DbDumper
{
    /**
     * Connection PDO
     * @var \PDO
     */
    protected $dbh;

    /**
     * Chemin vers le fichier de dump
     * @var string
     */
    protected $dumpFile;

    /**
     * Constructeur de DbDumper
     *
     * @param \PDO $dbh Connection PDO
     *
     * @return void
     */
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
        $this->dumpFile = __DIR__ . '/../../../data/dzuser.dump.sqlite.sql';
    }

    /**
     * Insère les rôles utilisateur
     * dans la base de données
     *
     * @return void
     */
    public function insertUserRoles()
    {
        $sql = file_get_contents($this->getDumpFile());

        preg_match_all("/INSERT INTO '?user_role'? .*?;/s", $sql, $matches);
        $inserts = $matches[0];

        foreach ($inserts as $insert) {
            $this->dbh->exec($insert);
        }
    }

    /**
     * Insère les utilisateurs
     * dans la base de données
     *
     * @return void
     */
    public function insertUsers()
    {
        $sql = file_get_contents($this->getDumpFile());

        preg_match_all("/INSERT INTO '?user'? .*?;/s", $sql, $matches);
        $inserts = $matches[0];

        foreach ($inserts as $insert) {
            $this->dbh->exec($insert);
        }
    }

    /**
     * Insère les les rôles par défaut
     * pour les utilisateurs
     * dans la base de données
     *
     * @return void
     */
    public function insertUserRoleLinkers()
    {
        $sql = file_get_contents($this->getDumpFile());

        preg_match_all("/INSERT INTO '?user_role_linker'? .*?;/s", $sql, $matches);
        $inserts = $matches[0];

        foreach ($inserts as $insert) {
            $this->dbh->exec($insert);
        }
    }

    /**
     * Obtient le chemin vers le fichier de dump
     *
     * @return string
     */
    public function getDumpFile()
    {
        return $this->dumpFile;
    }

    /**
     * Définit le chemin vers le fichier de dump
     *
     * @param string $dumpFile Nouveau chemin
     *
     * @return DbDumper
     */
    public function setDumpFile($dumpFile)
    {
        $this->dumpFile = $dumpFile;
        return $this;
    }
}
