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

php vendor/bin/codecept run --steps acceptance CheckWpBackCreateAdvancedPostCest

php vendor/bin/codecept run --html --steps acceptance CheckWpBackCreateAdvancedPostCest


php vendor/bin/codecept run -vvv --steps acceptance CheckWpBackCreateAdvancedPostCest

php vendor/bin/codecept run --debug --steps acceptance CheckWpBackCreateAdvancedPostCest

*/
/*

    NOTE: *** SET THE LANGUAGES IT WORK ***

 */

require_once('tests/_data/inc/functions.php');

// Set the languages
include_once('tests/_data/languages/en.php');
// include_once('tests/_data/languages/es.php');
// include_once('tests/_data/languages/fr.php');
// include_once('tests/_data/languages/it.php');
// include_once('tests/_data/languages/ru.php');
// include_once('tests/_data/languages/cn.php');



class CheckWpBackCreateAdvancedPostCest
{
	// extra functions
    public function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
    }//EOF
    
    public function createAdvancedPostNew (AcceptanceTester $I)
    {

		/* LOGIN */
		$I->wantTo('ensure that I publish a Advanced Post, adding excerpt, tags and existing categories');

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


        $I->comment("\n--- ADVANCED POST");
		// Add a post
		$I->click(POST_NEW_LABEL);
		$I->see(POST_NEW_TITLE);


		// Add a title for Post
		$I->fillField('#title', 'Test title article Cept '.generateRandomString().'');
		// Add a content for Post
		$I->fillField('#content', 'Test content article Cept '.generateRandomString().' ');


		// Add a content for Post
		$I->fillField('#excerpt', 'Test article excerpt Cept '.generateRandomString().' ');

		// select categories for Post
		// XPATH selector
		// $I->checkOption('//*[@id="in-category-4"]'); // Communications
		// $I->checkOption('//*[@id="in-expertises-8"]'); // Databases
		// $I->checkOption('//*[@id="in-expertises-12"]'); // Ethics
		// $I->checkOption('//*[@id="in-expertises-7"]'); // Green IT
		// $I->checkOption('//*[@id="in-expertises-5"]'); // Video



		// CSS selector
		$I->checkOption('#in-category-4'); // Communications
		$I->checkOption('#in-category-8'); // Databases
		$I->checkOption('#in-category-12'); // Ethics
		$I->checkOption('#in-category-7'); // Green IT
		$I->checkOption('#in-category-5'); // Video
		

		// Add tags
      	// Required the plugin Simple Tags for WordPress
      	// https://wordpress.org/plugins/simple-tags/
		$I->fillField('textarea[name=adv-tags-input]', 'Test, Testing, WordPress, Backoffice, Frontoffice, Creation, Blog, PHP,  Codeception, Development, Q/A, Agile, Continuous integration, Product Owner, User story, Gherkin, Tutorial');



		// Publish
		$I->click('#publish');

		// Add a content for Post
		$I->click(POST_VIEW_POST_LABEL);

		// Post with no plugin
		$I->see('Test content article Cept');
		


    }
}
