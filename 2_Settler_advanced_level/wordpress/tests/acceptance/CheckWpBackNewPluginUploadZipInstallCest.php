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

php vendor/bin/codecept run --steps acceptance CheckWpBackNewPluginUploadZipInstallCest

php vendor/bin/codecept run --html --steps acceptance CheckWpBackNewPluginUploadZipInstallCest


php vendor/bin/codecept run -vvv --steps acceptance CheckWpBackNewPluginUploadZipInstallCest

php vendor/bin/codecept run --debug --steps acceptance CheckWpBackNewPluginUploadZipInstallCest

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

class CheckWpBackNewPluginUploadZipInstallCest
{
		

    public function selectPluginZipFileSendIt (AcceptanceTester $I)
    {

		/* LOGIN */
		$I->wantTo('ensure that I can select a plugin in a zip, send it and install it');

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


        $I->comment("\n--- SELECT, UPLOAD AND INSTALL PLUGIN");
		

        // PLUGINS
		// Click on Plugins
		$I->click('//*[@id="menu-plugins"]/ul/li[2]/a');
        $I->click(PLUGINS_NEW_LABEL);
        $I->see(PLUGINS_NEW_TITLE);
		$I->amOnPage('/wp-admin/plugins.php');

		// Click on Add New in Plugins main menu
		$I->click(PLUGINS_ADD_NEW_LABEL,'//*[@id="menu-plugins"]/ul/li[3]/a');
		$I->see(PLUGINS_ADD_PLUGINS_LABEL);
		$I->amOnPage('/wp-admin/plugin-install.php');

		//  Click on Upload Plugin in plugin-install.php
		$I->click('//*[@id="wpbody-content"]/div[3]/a/span[1]');

		// Send a plugin file
		// the file need to be in the directory /tests/_data
		$I->attachFile('//*[@id="pluginzip"]', 'files/codeception_modify_header_footer.zip');

		// BTN UPLOAD
		$I->click('//*[@id="install-plugin-submit"]');

		// Click on Plugins
		$I->click('//*[@id="menu-plugins"]/ul/li[2]/a');
		$I->see('Plugins');
		$I->amOnPage('/wp-admin/plugins.php');
		// Click on Active
		$I->click('//*[@id="wpbody-content"]/div[3]/ul/li[3]/a');
		$I->amOnPage('/wp-admin/plugins.php?plugin_status=inactive');

		// Plugins page with my plugin codeception_modify_header_footer installed but not active yet
		$I->lookForwardTo('to have WP Plugin codeception_modify_header_footer installed but not active yet');
		// Check the plugins list
		$I->see('codeception_modify_header_footer');

    }
}



/*



		


 */
