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

php vendor/bin/codecept run --steps acceptance CheckWpFrontModifyHeaderFooterCest

php vendor/bin/codecept run --html --steps acceptance CheckWpFrontModifyHeaderFooterCest


php vendor/bin/codecept run -vvv --steps acceptance CheckWpFrontModifyHeaderFooterCest

php vendor/bin/codecept run --debug --steps acceptance CheckWpFrontModifyHeaderFooterCest

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




class CheckWpFrontModifyHeaderFooterCest
{
	const BASE_URL_LINK = WP_HP_URL;
    // Test with made with plugin codeception_check_homepage
    const TESTING_VALUE_HEADER = TESTING_VALUE_HEADER;
    const TESTING_VALUE_FOOTER = TESTING_VALUE_HEADER;

    public function checkModifydHeaderFooter (AcceptanceTester $I)
    {
    	// Frontoffice
        // Try to see "Just another WordPress site"
        $I->wantTo('Frontoffice :: perform actions and see result');
        $I->amOnPage(self::BASE_URL_LINK);
        $I->comment('Frontoffice :: want to see some changes in code source');

/*

What we are looking for: 

<!--  codeception_modify_header_footer -->
<!--  cp-source-code-testing-value-header -->


<!--  codeception_modify_header_footer -->
<!--  cp-source-code-testing-value-footer -->

 */

/*
Be sure to have activated the plugin codeception_modify_header_footer
 */

        $I->expect('to see change in header and footer'); 
        $I->comment("\n--- CHECK THE SOURCE");

        $I->comment("\n--- CHECK THE SOURCE :: HEADER");
		$I->expect('to see the plugin codeception_modify_header_footer change in HEADER');
        $I->seeInSource(self::TESTING_VALUE_HEADER);

        $I->comment("\n--- CHECK THE SOURCE :: FOOTER");
		$I->expect('to see the plugin codeception_modify_header_footer change in FOOTER');
        $I->seeInSource(self::TESTING_VALUE_FOOTER);

/*
Be sure to have desactivated the plugin codeception_modify_header_footer
 */
		/*
		$I->expect('not to see change in header and footer'); 
        $I->comment("\n--- CHECK THE SOURCE");

        $I->comment("\n--- CHECK THE SOURCE :: HEADER");
		$I->expect('not to see the plugin codeception_modify_header_footer change in HEADER');
        $I->dontSeeInSource(CP_SOURCE_CODE_TESTING_VALUE_HEADER);

        $I->comment("\n--- CHECK THE SOURCE :: FOOTER");
		$I->expect('not to see the plugin codeception_modify_header_footer change in FOOTER');
        $I->dontSeeInSource(CP_SOURCE_CODE_TESTING_VALUE_FOOTER);
		*/


   }//EOF

}//EOC



