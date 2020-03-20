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

php vendor/bin/codecept run --steps acceptance CheckWpBackAddAJournalistProfileCest

php vendor/bin/codecept run --html --steps acceptance CheckWpBackAddAJournalistProfileCest


php vendor/bin/codecept run -vvv --steps acceptance CheckWpBackAddAJournalistProfileCest

php vendor/bin/codecept run --debug --steps acceptance CheckWpBackAddAJournalistProfileCest

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


class CheckWpBackAddAJournalistProfileCest
{
		
    public function createNewournalistProfile (AcceptanceTester $I)
    {

		/* LOGIN */
		$I->wantTo('Ensure the views for Journalists in Front, based on plugin post_type check codeception_journalist_extended_profile');

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


        $I->comment("\n--- ADD NEW JOURNALIST PROFILE");	
		$I->click('Journalists');
		// $I->click('#menu-posts-journalists > a > div.wp-menu-name');
		// $I->click('//*[@id="menu-posts-journalists"]/a/div[3]');
		$I->amOnPage('/wp-admin/edit.php?post_type=journalists');


		$I->see(LABEL_POST_TYPE_JOURNALISTS);
		$I->click(LABEL_POST_TYPE_JOURNALISTS_STATUS);

		// Add a new journalist
		$I->click(LABEL_POST_TYPE_JOURNALISTS_ADD_NEW);
		$I->see(LABEL_POST_TYPE_JOURNALISTS_ADD_NEW);

		// Add a title for journalist
		$I->fillField('#title', 'Test journalist profile title Cept '.generateRandomString().''); 

		// Add a content for journalist
		$I->fillField('#content', 'Test journalist profile content Cept '.generateRandomString().' ');

		// Add a excerpt for journalist
		$I->fillField('#excerpt', 'Test journalist profile excerpt Cept '.generateRandomString().' ');


		// ID
		// Grab id from input from the page WP plugins active
		// $inputCheckboxExpertises = $I->grabMultiple('input', 'id');
		//$inputCheckboxExpertises = $I->grabTextFrom('//*[@id="expertiseschecklist"]');


		$inputCheckboxValues = $I->grabMultiple('input', 'id');
		$matches = array_filter($inputCheckboxValues); 

		 $I->comment("DEBUG :: required ACF plugin activated :: twitter_account, facebook_account, linkedin_account");


		foreach ($matches as $key => $match) {


			// Filter and select random among expertises. Check for string in-expertises-
			if (preg_match("#in-expertises-#", $match))
			{	
				$match = '#'.$match;
				$I->expect('to choose the expertise: '.$match.' ');
				$I->checkOption($match); // Check option

			}
			
			// Filter and select random among languages. Check for string in-languages-
			if (preg_match("#in-languages-#", $match))
			{
				$match = '#'.$match;
				$I->expect('choose among languages: '.$match.' ');
				$I->checkOption($match); // Check option
			}

			// FILL CUSTOM VAR FOR JOURNALIST
			// var_dump($match);
			if (preg_match("#acf-field_#", $match))
			{
			
			$acf_group_id = str_replace('acf-field_', '', $match);
			$acf_group_id = trim($acf_group_id);
			$acf_group_id = 'div.acf-field.acf-field-text.acf-field-'.$acf_group_id.'';
			//var_dump($acf_group_id);



		 	$dataName = $I->grabAttributeFrom($acf_group_id, 'data-name');
		 	// var_dump($dataName);

		 		$match = '#'.$match;
				$I->expect('to fill the custom var '.$dataName.' for journalist: '.$match.' ');

				$I->fillField($match, 'Test journalist profile '.$dataName.' Cept '.generateRandomString().'');
			}


		}//EOL


		// Publish
		$I->click('#publish');
		
   }//EOF

}//EOC


/*


 */





