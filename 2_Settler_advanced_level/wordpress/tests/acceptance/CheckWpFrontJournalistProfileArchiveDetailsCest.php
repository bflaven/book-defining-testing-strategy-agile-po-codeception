
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

php vendor/bin/codecept run --steps acceptance CheckWpFrontJournalistProfileArchiveDetailsCest

php vendor/bin/codecept run --html --steps acceptance CheckWpFrontJournalistProfileArchiveDetailsCest


php vendor/bin/codecept run -vvv --steps acceptance CheckWpFrontJournalistProfileArchiveDetailsCest

php vendor/bin/codecept run --debug --steps acceptance CheckWpFrontJournalistProfileArchiveDetailsCest

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

class CheckWpFrontJournalistProfileArchiveDetailsCest
{
	const BASE_URL_LINK = BASE_URL_LINK;

    public function checkJournalistProfileExtraData (AcceptanceTester $I)
    {
    	// Frontoffice
        // Try to see "Just another WordPress site"
        $I->wantTo('Frontoffice :: perform actions and see result');
        $I->amOnPage(self::BASE_URL_LINK);
        $I->comment('Frontoffice :: want to see some changes in code source');

		$I->comment("\n--- GET THE JOURNALISTS");
		// matches <a href="/journalists/">Journalists</a>
		// Do not forget the trailloing slash at the end
        $I->seeLink('Journalists', '/journalists/'); 
        $I->click('Journalists');
        $I->amOnPage('/journalists');
/*
What we are looking for: 
<!--  plugin codeception_journalist_extended_profile  -->
Checking the html code between these 2 tags... available in the file named content-journalist.php  in /Applications/MAMP/htdocs/wordpress/wp-content/themes/twentyseventeen/template-parts/post/
<!-- // plugin codeception_journalist_extended_profile -->
*/
/*
Be sure to have activated the plugin codeception_journalist_extended_profile
*/

        $I->comment("\n--- CHECK THE SOURCE FOR JOURNALISTS LISTING");
        $I->expect('to see change in source code for journalists listing'); 

		$I->expect('to see the plugin codeception_journalist_extended_profile :: post_meta :: twitter_account');
        $I->seeInSource(CP_CODECEPTION_JOURNALIST_EXTENDED_PROFILE_VALUE_TWITTER_ACCOUNT);

        $I->expect('to see the plugin codeception_journalist_extended_profile :: post_meta ::  facebook_account');
        $I->seeInSource(CP_CODECEPTION_JOURNALIST_EXTENDED_PROFILE_VALUE_FACEBOOK_ACCOUNT);

        $I->expect('to see the plugin codeception_journalist_extended_profile :: post_meta ::  linkedin_account');
        $I->seeInSource(CP_CODECEPTION_JOURNALIST_EXTENDED_PROFILE_VALUE_LINKEDIN_ACCOUNT);

        $I->expect('to see the plugin codeception_journalist_extended_profile :: custom_taxonomy ::  expertises');
        $I->seeInSource(CP_CODECEPTION_JOURNALIST_EXTENDED_PROFILE_VALUE_CUSTOM_TAXONOMY_EXPERTISES);

        $I->expect('to see the plugin codeception_journalist_extended_profile :: custom_taxonomy ::  languages');
        $I->seeInSource(CP_CODECEPTION_JOURNALIST_EXTENDED_PROFILE_VALUE_CUSTOM_TAXONOMY_LANGUAGES);

        $I->comment("\n--- CHECK THE SOURCE FOR SINGLE JOURNALIST PROFILE");
        $I->expect('to see change in source code for single journalist profile'); 

        
		   $journalistLinks = $I->grabMultiple('article', 'id');
		   // var_dump($journalistLinks);

    		$matches = array_filter($journalistLinks);
		   	// Add some element in line 41 content-journalist.php
		   	$journalistLinksHref = $I->grabMultiple('a', 'href');
		   	$journalistLinksLabel = $I->grabMultiple('a', 'aria-label');
            //Cleaning the array
            $journalistLinksHref = str_replace("#content","",$journalistLinksHref);

            // Remove empty
            $journalistLinksHref = array_filter($journalistLinksHref); 
            $journalistLinksLabel = array_filter($journalistLinksLabel); 
		   	// print_r($journalistLinksHref);
		   	// print_r($journalistLinksLabel);

		   	foreach ($journalistLinksHref as $key => $link) {
                            if (preg_match("/journalists/" , $link) || preg_match("/expertises/" , $link) || preg_match("/languages/" , $link) ){
                                    // print_r($link);
                                    // echo "\n";
                                    $I->comment("\n--- CHECK EACH JOURNALIST PROFILE LINK");
                                    $I->expect('to see valid in journalist profiles link '.$link.'');
                                    $I->seeInSource($link);
                            } else {
                                // else do nothing
                            }
            }//EOL


		   	 foreach ($journalistLinksLabel as $key => $label) {
                    
                    // print_r($label);
                    // echo "\n";
                    
					$I->comment("\n--- CHECK EACH JOURNALIST PROFILE LABEL");
					$I->expect('to see valid in journalist profiles label '.$label.'');
					$I->seeInSource($label);
                    $I->click($label);
                    $I->moveBack(1);            

                    }//EOL
	   	
   }//EOF

}//EOC