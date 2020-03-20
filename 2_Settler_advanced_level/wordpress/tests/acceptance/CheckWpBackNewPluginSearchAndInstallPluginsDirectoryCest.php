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

php vendor/bin/codecept run --steps acceptance CheckWpBackNewPluginSearchAndInstallPluginsDirectoryCest

php vendor/bin/codecept run --html --steps acceptance CheckWpBackNewPluginSearchAndInstallPluginsDirectoryCest


php vendor/bin/codecept run -vvv --steps acceptance CheckWpBackNewPluginSearchAndInstallPluginsDirectoryCest

php vendor/bin/codecept run --debug --steps acceptance CheckWpBackNewPluginSearchAndInstallPluginsDirectoryCest

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

class CheckWpBackNewPluginSearchAndInstallPluginsDirectoryCest
{
		
    public function setSearchAndInstallPluginActivationDesactivation (AcceptanceTester $I)
    {

		/* LOGIN */
		$I->wantTo('ensure that I can Activate/Desactivate a list of plugins');

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

		## SEARCH FOR A PLUGIN careful this ajax
		## source https://codeception.com/docs/modules/PhpBrowser#submitForm
		# Examples of searches


		// Select in drop-down menu

		// Keyword
		$I->comment("\n--- SEARCH BY KEYWORD");
		$I->expect('to search in WP plugins directory with Keyword: wordpressdotorg');
		$default_search_value = $I->grabTextFrom('//*[@id="typeselector"]/option[1]');
		$I->selectOption("select[name=type]", $default_search_value);
		// This prints the value selected
		$I->comment("--- DEBUG :: select[name=type] :: $default_search_value ");
		// Keyword: wordpressdotorg (term)
		$I->submitForm('form.search-form.search-plugins', ['//*[@id="wpbody-content"]/div[3]/div[2]/form/label[2]/input' => PLUGINS_ADD_PLUGINS_KEYWORD_SEARCH]);
		
		
		// Author
		$I->comment("\n--- SEARCH BY AUTHOR");
		$I->expect('to search in WP plugins directory with Author: Mel Choyce');
		$default_search_value = $I->grabTextFrom('//*[@id="typeselector"]/option[2]');
		$I->selectOption("select[name=type]", $default_search_value);
		// This prints the value selected
		$I->comment("--- DEBUG :: select[name=type] :: $default_search_value ");
		// Author: Mel Choyce (author)
		$I->submitForm('form.search-form.search-plugins', ['//*[@id="wpbody-content"]/div[3]/div[2]/form/label[2]/input' => PLUGINS_ADD_PLUGINS_AUTHOR_SEARCH]);
		

		// Tag
		$I->comment("\n--- SEARCH BY TAG");
		$I->expect('to search in WP plugins directory with Tag: editor');
		$default_search_value = $I->grabTextFrom('//*[@id="typeselector"]/option[3]');
		$I->selectOption("select[name=type]", $default_search_value);
		// This prints the value selected
		$I->comment("--- DEBUG :: select[name=type] :: $default_search_value ");
		// Tag : editor (tag)
		$I->submitForm('form.search-form.search-plugins', ['//*[@id="wpbody-content"]/div[3]/div[2]/form/label[2]/input' => PLUGINS_ADD_PLUGINS_TAG_SEARCH]);

		
    }
}



