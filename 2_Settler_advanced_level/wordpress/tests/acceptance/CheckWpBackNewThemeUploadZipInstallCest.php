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

php vendor/bin/codecept run --steps acceptance CheckWpBackNewThemeUploadZipInstallCest

php vendor/bin/codecept run --html --steps acceptance CheckWpBackNewThemeUploadZipInstallCest


php vendor/bin/codecept run -vvv --steps acceptance CheckWpBackNewThemeUploadZipInstallCest

php vendor/bin/codecept run --debug --steps acceptance CheckWpBackNewThemeUploadZipInstallCest

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


class CheckWpBackNewThemeUploadZipInstallCest
{
		
    public function setUploadInstallTheme (AcceptanceTester $I)
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


        $I->comment("\n--- SELECT, UPLOAD AND INSTALL THEME");
		
		// Click on Appearance
		$I->click('//*[@id="menu-appearance"]/a/div[3]');
		$I->see(THEMES_NEW_LABEL);
		$I->amOnPage('/wp-admin/themes.php');
		// Click on Add New in Themes
		$I->click('//*[@id="wpbody-content"]/div[3]/a');
		$I->amOnPage('/wp-admin/theme-install.php?browse=featured');
		$I->see(THEMES_ADD_NEW_LABEL);


		// UPLOAD A THEME
		// Click on Upload Theme
		$I->click('//*[@id="wpbody-content"]/div[3]/button');


		// // Send a Theme file in zip format
		// // the file need to be in the directory /tests/_data
		$I->attachFile('//*[@id="themezip"]', THEMES_TESTING_SOURCE);

		// // BTN UPLOAD
		$I->click('//*[@id="install-theme-submit"]');

		// // Click on Appearance
		$I->click('//*[@id="menu-appearance"]/a/div[3]');
		$I->see('Themes');
		$I->amOnPage('/wp-admin/themes.php');

		// See the themes list
        $I->expect('to see the new theme aaa-ladybird-prisca in the themes listing');
		// // Check the Themes list
		$I->see(THEMES_TESTING_SOURCE_LABEL);

		// link to activate the theme in context
		$I->click('Activate', '//*[@id="wpbody-content"]/div[3]/div[1]/div/div[2]/div[3]/div/a[1]');
		
    }
}



