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


php vendor/bin/codecept run --steps frontoffice CheckWpFrontCest
php vendor/bin/codecept run -vvv --steps frontoffice CheckWpFrontCest
php vendor/bin/codecept run --debug --steps frontoffice CheckWpFrontCest
php vendor/bin/codecept run --debug --steps frontoffice CheckWpFrontCest
php vendor/bin/codecept run --debug --steps frontoffice CheckWpFrontCest:FoMainContent
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


class CheckWpFrontCest 
{

    const BASE_URL_LINK = 'http://codecept.mydomain.priv/wordpress';  

    // tests
    public function tryToTest(FrontofficeTester $I)
    {
    	$I->wantTo('Ensure that the suite frontoffice is working ');
    }

	public function FoMainContent(FrontofficeTester $I)
  	{
        // Frontoffice
        // Try to see "Just another WordPress site"
        $I->wantTo('Frontoffice :: perform actions and see result');
        $I->amOnPage(self::BASE_URL_LINK);
        $I->comment('Frontoffice :: want to see the WP default site description install'); 
        $I->comment("\n--- CHECK THE SITE DESCRIPTION x5");      
        /* **  Check the site description anywhere in the homepage ** */        
        $I->see('Just another WordPress site');
        /* **  Check the site description with CSS selector ** */
        // $I->see('Just another WordPress site', '#masthead > div > div > p');
        $I->see('Just another WordPress site', '#masthead > div.custom-header > div.site-branding > div > div > p');

        /* **  Check the site description with XPath selector ** */        
        // $I->see('Just another WordPress site', '//*[@id="masthead"]/div/div/p');
        $I->see('Just another WordPress site', '//*[@id="masthead"]/div[1]/div[2]/div/div/p');




        /* **  Check the site description with strict CSS selector or CSS locator ** */
        // $I->see('Just another WordPress site', ['css' => '#masthead > div > div > p']);
        $I->see('Just another WordPress site', ['css' => '#masthead > div.custom-header > div.site-branding > div > div > p']);

        /* **  Check the site description with strict XPath selector or XPath locator ** */
        // $I->see('Just another WordPress site', ['xpath' => '//*[@id="masthead"]/div/div/p']);
        $I->see('Just another WordPress site', ['xpath' => '//*[@id="masthead"]/div[1]/div[2]/div/div/p']); 
                            
  	}//EOF
}//EOC


/* version 0
class CheckWpFrontCest
{
    public function _before(FrontofficeTester $I)
    {
    }

    // tests
    public function tryToTest(FrontofficeTester $I)
    {
    }
}

*/

