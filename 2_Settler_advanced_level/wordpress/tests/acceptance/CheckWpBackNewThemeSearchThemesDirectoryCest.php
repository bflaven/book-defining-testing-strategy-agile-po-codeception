<?php 
/**
 * This file is part of the book package: "Defining a test strategy for a P.O? Introduction to a "testing" framework CODECEPTION_. Usecase with WordPress."
 *
 * (c) Bruno Flaven <info@flaven.fr>
 * 
 * Intended to test a website BACKOFFICE made with WP
 *
 * @package Codeception WordPress Testing 
 * @subpackage BACKOFFICE
 * @since Codeception 3.1.1, WordPress 5.2.3 
 */

 /*

NOTE: *** MAKE IT WORK ***

cd /Applications/MAMP/htdocs/wordpress

php vendor/bin/codecept run --steps acceptance CheckWpBackNewThemeSearchThemesDirectoryCest

php vendor/bin/codecept run --html --steps acceptance CheckWpBackNewThemeSearchThemesDirectoryCest


php vendor/bin/codecept run -vvv --steps acceptance CheckWpBackNewThemeSearchThemesDirectoryCest

php vendor/bin/codecept run --debug --steps acceptance CheckWpBackNewThemeSearchThemesDirectoryCest

*/
/*

    NOTE: *** SET THE LANGUAGES IT WORK ***

 */

// Set the languages
include_once('tests/_data/languages/en.php');
// include_once('tests/_data/languages/es.php');
// include_once('tests/_data/languages/fr.php');
// include_once('tests/_data/languages/it.php');
// include_once('tests/_data/languages/ru.php');
// include_once('tests/_data/languages/cn.php');

class CheckWpBackNewThemeSearchThemesDirectoryCest
{
		
    public function searchThemesDirectory (AcceptanceTester $I)
    {

		/* LOGIN */
		$I->wantTo('ensure that I can install a theme');

        /* LOGIN */
        $I->comment("\n--- LOGIN");

        //Go to the login
        $I->amGoingTo('to pass the login page');
        $I->amOnPage('/wp-login.php');
        $I->comment('Backoffice :: enter username and password for WP');
        $I->fillField('#user_login', LOGIN_USERNAME);
        $I->fillField('#user_pass', LOGIN_PASSWORD);
        $I->click('//*[@id="wp-submit"]');

        // Go to the Admin page
        $I->expect('to be connected and I can access to the WP dashboard');
        $I->amOnPage('/wp-admin/');
        $I->see(DASHBOARD_H1);


        $I->comment("\n--- SEARCH IN WP THEMES DIRECTORY");
		
		// Click on Appearance
		$I->click('//*[@id="menu-appearance"]/a/div[3]');
		$I->see(THEMES_NEW_LABEL);
		$I->amOnPage('/wp-admin/themes.php');
		// Click on Add New in Themes
		$I->click('//*[@id="wpbody-content"]/div[3]/a');
		$I->amOnPage('/wp-admin/theme-install.php?browse=featured');
		$I->see(THEMES_ADD_NEW_LABEL);


		// SEARCH A THEME
		/* SEARCH FOR A THEME careful this ajax
		source https://codeception.com/docs/modules/PhpBrowser#submitForm
		 Examples of searches
		 */
        $I->expect('to launch a search on the WP themes directory');
		// $I->submitForm('.search-form', ['#wp-filter-search-input' => 'Minimalist']);
		$I->submitForm('.search-form', ['#wp-filter-search-input' => THEMES_TESTING_SEARCH_WORD]);
		$I->lookForwardTo('to have some results and a theme count different of zero.');
		
		
		
    }
}



