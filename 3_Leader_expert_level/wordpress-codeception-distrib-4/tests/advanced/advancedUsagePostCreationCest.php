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


cd /Users/brunoflaven/Documents/02_copy/_technical_training_zambia_znbc/13_testing_wp/codeception-distrib-4/


php vendor/bin/codecept run --steps advanced advancedUsagePostCreationCest

php vendor/bin/codecept run --html --steps advanced advancedUsagePostCreationCest


php vendor/bin/codecept run -vvv --steps advanced advancedUsagePostCreationCest

php vendor/bin/codecept run --debug --steps advanced advancedUsagePostCreationCest

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


class advancedUsagePostCreationCest
{
    
    public function createAdvancedPostNew (AdvancedTester $I, \Page\Advanced\advancedUsageLogin $VariableWpLoginForm, \Page\Advanced\createPostPlus $VariableWpPostForm)
    {

		/* LOGIN */
		$I->wantTo('ensure that I publish a Advanced Post, adding excerpt, tags and existing categories');

        /* LOGIN */
        $I->comment("\n--- LOGIN");

      	$VariableWpLoginForm->WpLoginForm(LOGIN_USERNAME, LOGIN_PASSWORD);


        $I->comment("\n--- ADVANCED POST");
		
		$VariableWpPostForm->WpPostForm();

    }
}


