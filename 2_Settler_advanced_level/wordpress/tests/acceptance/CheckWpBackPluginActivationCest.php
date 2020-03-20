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

php vendor/bin/codecept run --steps acceptance CheckWpBackPluginActivationCest

php vendor/bin/codecept run --html --steps acceptance CheckWpBackPluginActivationCest


php vendor/bin/codecept run -vvv --steps acceptance CheckWpBackPluginActivationCest

php vendor/bin/codecept run --debug --steps acceptance CheckWpBackPluginActivationCest

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

class CheckWpBackPluginActivationCest
{
		
    public function setPluginActivation (AcceptanceTester $I)
    {

		/* LOGIN */
		$I->wantTo('ensure that I can Activate/Deactivate a list of plugins');

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

        	
        // PLUGINS
		// Click on Plugins
		$I->click('//*[@id="menu-plugins"]/ul/li[2]/a');
        $I->click(PLUGINS_NEW_LABEL);
        $I->see(PLUGINS_NEW_TITLE);
		$I->amOnPage('/wp-admin/plugins.php');
		

		$I->comment("\n--- ACTIVATION PLUGINS LIST");	

		$I->see(PLUGINS_ACTIVATION_DEACTIVATION_LABEL_INACTIVE);
		// Click on Inactive
		$I->click(PLUGINS_ACTIVATION_DEACTIVATION_LABEL_INACTIVE);
		// $I->click('//*[@id="wpbody-content"]/div[3]/ul/li[3]');
		$I->amOnPage('/wp-admin/plugins.php?plugin_status=inactive');		
		// See the inactive plugins list
        $I->expect('to see the inactive plugins list');
		// Grab id from input from the page WP plugins inactive
		$inputCheckboxPlugin = $I->grabMultiple('input', 'id');		
		$PluginLabelName = $I->grabMultiple('input','value');
		
		// Get rid of the empty line
		$titles = array_filter($PluginLabelName);
		// Filter in the haystack what has the pattern e.g checkbox_e99cdecfab36d1915319bf82c9c5d00a"
		$matches  = preg_grep ('/^checkbox(\w+)/i', ($inputCheckboxPlugin));
		 
		foreach ($matches as $key => $line) {
					$I->comment("\n--- DEBUG :: plugin ".$key." ");					
					$I->comment('Plugins :: '.$titles[$key].'');
					$I->comment('Backoffice :: '.trim($line).'');
					$I->checkOption('//*[@id="'.trim($line).'"]');

				// $default_role = $I->grabTextFrom('#bulk-action-selector-top > option:nth-child(2)');
                $default_action = $I->grabTextFrom('//*[@id="bulk-action-selector-top"]/option[2]');
                $I->selectOption("select[name=action]", $default_action);
                }
                // Activate the plugins list
        		$I->click('//*[@id="doaction"]');
                // Plugins active with my 2 plugins activated codeception_modify_header_footer installed but not active yet
				$I->lookForwardTo('to see my WP Plugins activated now!');
		
				// Click on Plugins
				$I->click('//*[@id="menu-plugins"]/ul/li[2]/a');
				$I->see('Plugins');
				$I->amOnPage('/wp-admin/plugins.php');
								
				// Click on Active
				$I->click('//*[@id="wpbody-content"]/div[3]/ul/li[2]/a');
				$I->amOnPage('/wp-admin/plugins.php?plugin_status=active');
				
				// Loop to check the active plugins list, see /Applications/MAMP/htdocs/wordpress/tests/_data/languages/en.php
				$I->comment("\n--- Check the ACTIVATION PLUGINS LIST");
				$I->expect('to see activated plugins I have in my list');
				foreach (PLUGINS_ACTIVE_BULK_ACTION_CHECKLIST as $pluginTitle) {
					$I->see($pluginTitle);
		  		}
    }
}

