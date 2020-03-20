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

php vendor/bin/codecept run --steps acceptance CheckWpBackDeletePostCategoryCest

php vendor/bin/codecept run --html --steps acceptance CheckWpBackDeletePostCategoryCest


php vendor/bin/codecept run -vvv --steps acceptance CheckWpBackDeletePostCategoryCest

php vendor/bin/codecept run --debug --steps acceptance CheckWpBackDeletePostCategoryCest

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


class CheckWpBackDeletePostCategoryCest
{
		

    // General
    public function deletePostCategory (AcceptanceTester $I)
    {

		/* LOGIN */
		$I->wantTo('ensure that I delete a category tag');

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


        $I->comment("\n--- DELETE CATEGORY");
		
        /* Add new category and save it */
        // Add a category
        $I->click(CATEGORIES_NEW_LABEL);
        $I->see(CATEGORIES_NEW_TITLE);


            for( $i = 0; $i<5; $i++ ) {
                // Add a category name 
                $I->fillField('#tag-name', ''.$i.' Test category name Cept'); 
                // Add a category description
                $I->fillField('#tag-description', ''.$i.' Test category description Cept');  
                // Publish
                $I->click('#submit');
                $I->lookForwardTo('Add category: '.$i.' Test category name Cept');
                $I->click(''.$i.' Test category name Cept', '.row-title');
                $I->click("Delete", "#delete-link > a");
                $I->lookForwardTo('Delete category: '.$i.' Test category name Cept');
            }
    }
}
