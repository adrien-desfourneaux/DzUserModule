<?php

/**
 * Test d'acceptation UserLogin
 * Connexion d'un utilisateur.
 *
 * PHP version 5.3.0
 *
 * @category   Test
 * @package    DzUserModule
 * @subpackage Acceptance
 * @author     Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link       https://github.com/dieze/DzUserModule
 */

$I = new WebGuy($scenario);
$I->wantTo('Me connecter');

$I->haveDefaultUserRolesInDatabase();
$I->haveDefaultUsersInDatabase();
$I->haveDefaultUserRoleLinkersInDatabase();

$I->seeInDatabase(
	'user',
	array(
		'email' => 'john@doe.com',
	)
);

$I->amOnPage('/user/login');

$I->canSee('Connexion');
$I->canSee('Email');
$I->canSee('Mot de passe');
$I->canSee('Authentification');
$I->canSee('Inscription');

// Mauvais utilisateur
$I->fillField("identity", "foo@bar.com");
$I->fillField("credential", "foobar");
$I->click("Authentification");

$I->cantSeeCookie('PHPSESSID');
$I->canSeeInCurrentUrl('/user/login');
$I->canSee('Erreur auth erroné');

// Bon utilisateur
$I->fillField("identity", "john@doe.com");
$I->fillField("credential", "johndoe");
$I->click("Authentification");

$I->canSeeCookie('PHPSESSID');