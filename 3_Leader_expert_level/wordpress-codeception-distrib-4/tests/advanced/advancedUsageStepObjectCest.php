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

php vendor/bin/codecept run --steps advanced advancedUsageStepObjectCest
php vendor/bin/codecept run -vvv --steps advanced advancedUsageStepObjectCest
php vendor/bin/codecept run --debug --steps advanced advancedUsageStepObjectCest
php vendor/bin/codecept run --debug --steps advanced advancedUsageStepObjectCest
php vendor/bin/codecept run --debug --steps advanced advancedUsageStepObjectCest:checkWhatLanguageAndLogin
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
 


class advancedUsageStepObjectCest
{
    /* version 1 to call the StepObject */
    /* public function checkWhatLanguageAndLogin (AdvancedTester $I, \Step\Advanced\Admin $VariableWpLoginForm) */
    

    /* version 2 to call the StepObject */
    public function checkWhatLanguageAndLogin (\Step\Advanced\Admin $I) 
    {
            
            $I->wantTo('Language :: ensure a language is selected');
            $I->comment("\n--- LANGUAGE");
            $I->comment("Language :: language selected :: ".LANGUAGE_CHOSEN."");


            $I->wantTo('Backoffice :: ensure that I can check and change General Settings');
            /* LOGIN */
            $I->comment("\n--- LOGIN");

            /* version 1 to call the StepObject */
            // $VariableWpLoginForm->loginAsAdmin(LOGIN_USERNAME, LOGIN_PASSWORD);
             
            /* version 2 to call the StepObject */
            $I->loginAsAdmin(LOGIN_USERNAME, LOGIN_PASSWORD);

            // Go to the Admin page
            $I->expect('to be connected and I can access to the WP dashboard');
            $I->amOnPage('/wp-admin/');
            $I->see(DASHBOARD_H1);

    } 
}

