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


cd /Volumes/mi_disco/codeception-distrib-8/site/


#CAUTION IT IS REQUIRED
php vendor/bin/codecept build

php vendor/bin/codecept run --steps acceptance FirstCest
php vendor/bin/codecept run -vvv --steps acceptance FirstCest
php vendor/bin/codecept run --debug --steps acceptance FirstCest


php vendor/bin/codecept run --debug --steps acceptance advancedUsage1Cest:FoTestingValuesIncode
*/

// Set the languages
include_once('tests/_data/languages/en.php');
// include_once('tests/_data/languages/es.php');
// include_once('tests/_data/languages/fr.php');
// include_once('tests/_data/languages/it.php');
// include_once('tests/_data/languages/ru.php');
# include_once('tests/_data/languages/cn.php');
# 
# 
class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {

            //Backoffice
            // Try to login with the administrator user account
            $I->wantTo('Backoffice :: Login into WP admin');
            $I->amOnPage('/wp-login.php');
            $I->comment('Backoffice :: enter username and password for WP');

            // First way
            // CSS selector
            // $I->comment('Backoffice :: CSS selector');
            // $I->fillField('#user_login', 'admin');
            // $I->fillField('#user_pass','admin');


            // Second way
            // XPATH selector
            $I->comment('Backoffice :: XPATH selector');
            $I->fillField('//*[@id="user_login"]', 'admin');
            $I->fillField('//*[@id="user_pass"]','admin');

            // Find on button label
            $I->click('Log In');


            // Go to the Admin page
            $I->amOnPage('/wp-admin/');
            $I->see('Dashboard');


            // And I should see "Howdy, admin"
            $I->see('Howdy, admin');
            // $I->see('Just another WordPress site', ['xpath' => '//*[@id="wp-admin-bar-my-account"]/a']);
            // $I->see('Just another WordPress site', ['css' => '#wp-admin-bar-my-account > a]);

    }
}
