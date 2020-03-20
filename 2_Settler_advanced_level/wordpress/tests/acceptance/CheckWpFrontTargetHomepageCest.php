-<?php 
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

php vendor/bin/codecept run --steps acceptance CheckWpFrontTargetHomepageCest

php vendor/bin/codecept run --html --steps acceptance CheckWpFrontTargetHomepageCest


php vendor/bin/codecept run -vvv --steps acceptance CheckWpFrontTargetHomepageCest

php vendor/bin/codecept run --debug --steps acceptance CheckWpFrontTargetHomepageCest

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


class CheckWpFrontTargetHomepageCest
{
	const BASE_URL_LINK = WP_HP_URL;
    // Test with made with plugin codeception_check_homepage
    const PLUGIN_CHECK_HOMEPAGE_SEEINSOURCE = PLUGIN_CHECK_HOMEPAGE_SEEINSOURCE;
    const PLUGIN_CHECK_HOMEPAGE_DONTSEEINSOURCE = PLUGIN_CHECK_HOMEPAGE_DONTSEEINSOURCE;
    
    public function checkExistingLMainNavigation (AcceptanceTester $I)  {
        $I->wantTo('Frontoffice :: ensure the main navigation is existing');
        $I->amOnPage(self::BASE_URL_LINK);
        $mainnavLinks = $I->grabMultiple('li', 'id');
        // Remove empty
        $mainnavLinks = array_filter($mainnavLinks); 
        // print_r($mainnavLinks);
        // $mainnavLinksLabel = $I->grabMultiple('a', 'href');
        // print_r($mainnavLinksLabel);

        // print_r($mainnavLinks);
        foreach ($mainnavLinks as $key => $link) {
            // print_r($link);
            $I->comment("\n--- CHECK EACH LINK IN MAIN NAVIGATION");
            $I->click('#'.$link.'');
        }//EOL

        $I->lookForwardTo('to test the source code for some pages');
    }

    public function checkDistinctHomepageFromOtherPages (AcceptanceTester $I) {
    	// Frontoffice
        // Try to see "Just another WordPress site"
        $I->wantTo('Frontoffice :: perform actions and see result');
        $I->amOnPage(self::BASE_URL_LINK);
        $I->comment("\n--- HOMEPAGE");
        $I->expect('to see source on the Homepage');
        $I->seeInSource(self::PLUGIN_CHECK_HOMEPAGE_SEEINSOURCE);
        
        $I->comment("\n--- MAIN NAVIGATION");
        
        foreach (PLUGIN_CHECK_HOMEPAGE_PAGES_CHECKLIST_LABEL as $key => $pageLabel) {
                    // $I->comment('DEBUG :: '.$pageLabel.' '.PLUGIN_CHECK_HOMEPAGE_PAGES_CHECKLIST_SLUG[$key].' ');
                    $I->comment("\n--- For ".$pageLabel."");
                    $I->expect('to see source on '.$pageLabel.' Page');
                    $I->click($pageLabel);
                    $I->amOnPage(PLUGIN_CHECK_HOMEPAGE_PAGES_CHECKLIST_SLUG[$key]);
                    $I->seeInSource(self::PLUGIN_CHECK_HOMEPAGE_DONTSEEINSOURCE);
                    $I->moveBack(1);
            
                }   
        $I->lookForwardTo('have ensure that I can distinct Homepage from the other pages');

   }//EOF

}//EOC

