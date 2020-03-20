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

php vendor/bin/codecept build


NOTE: *** MAKE IT WORK ***

cd /Users/brunoflaven/Documents/02_copy/_technical_training_zambia_znbc/13_testing_wp/codeception-distrib-4/

#CAUTION IT IS REQUIRED
php vendor/bin/codecept build



php vendor/bin/codecept run --steps acceptance advancedUsageCest
php vendor/bin/codecept run -vvv --steps acceptance advancedUsageCest
php vendor/bin/codecept run --debug --steps acceptance advancedUsageCest
php vendor/bin/codecept run --debug --steps acceptance advancedUsageCest
php vendor/bin/codecept run --debug --steps acceptance advancedUsageCest:checkLoginWorking
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
# include_once('tests/_data/languages/cn.php');
 

class advancedUsageCest
{

	public function checkLoginWorking (AcceptanceTester $I)
	{

				$I->wantTo('Backoffice :: ensure that I can check and change General Settings');
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


    }

}//EOC
