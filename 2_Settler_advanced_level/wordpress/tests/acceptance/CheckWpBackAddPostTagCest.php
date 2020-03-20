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
php vendor/bin/codecept run --steps acceptance CheckWpBackAddPostTagCest
php vendor/bin/codecept run -vvv --steps acceptance CheckWpBackAddPostTagCest
php vendor/bin/codecept run --debug --steps acceptance CheckWpBackAddPostTagCest

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

		// extra functions
		function generateRandomString($length = 10) {
		    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}//EOF



class CheckWpBackAddPostTagCest
{
	

    // General
    public function addNewCategory (AcceptanceTester $I)
    {

		/* LOGIN */
		$I->wantTo('ensure that I publish a post and test a shortcode');

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


        $I->comment("\n--- TAGS");
		// Add a category
		$I->click(TAGS_NEW_LABEL);
		$I->see(TAGS_NEW_TITLE);

		// Add a category name 
		$I->fillField('#tag-name', 'Test tag name Cept '.generateRandomString().''); 

		// Add a category description
		$I->fillField('#tag-description', 'Test tag description Cept '.generateRandomString().'');
	
		// Publish
		$I->click('#submit');
		
		$I->lookForwardTo('Have a new Tag added');


    }
}

