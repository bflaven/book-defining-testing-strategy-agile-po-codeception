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


cd /Volumes/mi_disco/_technical_training_zambia_znbc/13_testing_wp/codeception-distrib-4/



#CAUTION IT IS REQUIRED
php vendor/bin/codecept build


php vendor/bin/codecept run --steps backoffice CheckWpBackCest
php vendor/bin/codecept run -vvv --steps backoffice CheckWpBackCest
php vendor/bin/codecept run --debug --steps backoffice CheckWpBackCest
php vendor/bin/codecept run --debug --steps backoffice CheckWpBackCest
php vendor/bin/codecept run --debug --steps backoffice CheckWpBackCest:checkOptionsGeneral
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


class CheckWpBackCest 
{

	public function checkWhatLanguage (BackofficeTester $I) 
    {
            $I->wantTo('Language :: ensure a language is selected');
            $I->comment("\n--- LANGUAGE");
            $I->comment("Language :: language selected :: ".LANGUAGE_CHOSEN."");
    }

    public function checkUserExist (BackofficeTester $I)
    {
                /* DB * */
                $I->wantTo('Db :: ensure there is an existing user');
                $I->comment("\n--- DB");
                $I->amGoingTo('see if the admin user exist to pass the login page');
                $I->seeNumRecords(13, 'wp_users');   //executed on default database
    }

    // General
    public function checkOptionsGeneral (BackofficeTester $I)
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


                $I->comment("\n--- SETTING");
                // SETTING
                # Check some values from http://project.test/wordpress/wp-admin/options-general.php
                # Click on Settings
                $I->click('//*[@id="menu-settings"]/a/div[3]');
                # Check I am on /wp-admin/options-general.php
                $I->amOnPage('/wp-admin/options-general.php');
                # See General Settings
                $I->see(GENERAL_SETTINGS_H1, '#wpbody-content > div.wrap > h1');


                # SOURCE : https://codeception.com/docs/modules/PhpBrowser
                // Update and Check
                # //*[@id="blogname"] # codecept_test_site
                # //*[@id="blogdescription"] # Just another WordPress site
                # //*[@id="siteurl"] # http://codecept.mydomain.priv/wordpress
                # //*[@id="home"] # http://codecept.mydomain.priv/wordpress
                # //*[@id="new_admin_email"] # admin@test.com

                # Check Site Title
                $I->seeInField('//*[@id="blogname"]', GENERAL_BLOGNAME_VALUE);
                # Check Tagline
                $I->seeInField('//*[@id="blogdescription"]', GENERAL_BLOGDESCRIPTION_VALUE);
                # Check WordPress Address (URL)	
                $I->seeInField('//*[@id="siteurl"]', GENERAL_SITEURL_VALUE);
                # Check Site Address (URL)	
                $I->seeInField('//*[@id="home"]', GENERAL_HOME_VALUE);
                # Check Email Address
                $I->seeInField('//*[@id="new_admin_email"]', GENERAL_NEW_ADMIN_EMAIL_VALUE);


                # Membership
                # Anyone can register, the answer is NO
                $I->dontSeeCheckboxIsChecked('#users_can_register');

                # Anyone can register, the answer is Yes
                // $I->seeCheckboxIsChecked('#users_can_register');


                # Test against Administrator
                # //*[@id="default_role"]
                # Subscriber

                $default_role = $I->grabTextFrom('#default_role > option:nth-child(1)');
                $default_role = $I->grabTextFrom('//*[@id="default_role"]/option[1]');
                $I->selectOption("select[name=default_role]", $default_role);

                // This prints the value selected
                $I->comment("\n--- DEBUG :: select[name=default_role] :: $default_role ");
                $I->seeOptionIsSelected('//*[@id="default_role"]', $default_role);


                # Site Language	
                # //*[@id="WPLANG"]
                // $I->seeOptionIsSelected('//*[@id="WPLANG"]', 'English (United States)');
                // $I->seeOptionIsSelected('//*[@id="WPLANG"]', 'Français');
                // $I->seeOptionIsSelected('//*[@id="WPLANG"]', 'Italiano');


                # Timezone
                // $I->seeOptionIsSelected('//*[@id="timezone_string"]', 'UTC+0');
                // $I->seeOptionIsSelected('//*[@id="timezone_string"]', 'Budapest');
                // $I->seeOptionIsSelected('//*[@id="timezone_string"]', 'Bucarest');
                // $I->seeOptionIsSelected('//*[@id="timezone_string"]', 'Vladivostok');



                # Date Format
                // $I->seeOptionIsSelected('input[name=date_format]', 'j F Y');
                // $I->seeOptionIsSelected('input[name=date_format]', 'Y-m-d');
                // $I->seeOptionIsSelected('input[name=date_format]', 'm/d/Y');
                // $I->seeOptionIsSelected('input[name=date_format]', 'd/m/Y');
                // $I->seeOptionIsSelected('input[name=date_format]', '\c\u\s\t\o\m');

                // # Time Format	
                // $I->seeOptionIsSelected('input[name=time_format]', 'H:i');
                // $I->seeOptionIsSelected('input[name=time_format]', 'g:i A');
                // $I->seeOptionIsSelected('input[name=time_format]', '\c\u\s\t\o\m');


                # Week Starts On
                # Monday is #start_of_week > option:nth-child(2), option set by default	
                # //*[@id="start_of_week"]
                // $I->seeOptionIsSelected('//*[@id="start_of_week"]', 'Monday');
                // $I->seeOptionIsSelected('//*[@id="start_of_week"]', 'Lundi');
                // $I->seeOptionIsSelected('//*[@id="start_of_week"]', 'lunedì');
                // $I->seeOptionIsSelected('select[name=start_of_week]', 'sabato');


                $start_of_week = $I->grabTextFrom('select[name=start_of_week] option:nth-child(2)');
                $I->selectOption("select[name=start_of_week]", $start_of_week);
                // This prints the value selected
                $I->comment("\n--- DEBUG :: select[name=start_of_week] :: $start_of_week ");
                $I->seeOptionIsSelected('select[name=start_of_week]', $start_of_week);

            
    }
}//EOC




/* version 0

class CheckWpBackCest
{
    public function _before(BackofficeTester $I)
    {
    }

    // tests
    public function tryToTest(BackofficeTester $I)
    {
    }
}

*/