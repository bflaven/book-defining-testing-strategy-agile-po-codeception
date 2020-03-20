<?php 
/**
 * This file is part of the book package: "Defining a test strategy for a P.O? Introduction to a "testing" framework CODECEPTION_. Usecase with WordPress."
 *
 * (c) Bruno Flaven <info@flaven.fr>
 * 
 * Intended to test a website FRONTOFFICE made with WP
 * Running Twenty Nineteen theme 1.4
 *
 * @package Codeception WordPress Testing 
 * @subpackage FRONTOFFICE
 * @since Codeception 3.1.1, WordPress 5.2.3
 */

/*
    NOTE: *** MAKE IT WORK ***
    
cd /Applications/MAMP/htdocs/wordpress
php vendor/bin/codecept build

php vendor/bin/codecept run --steps acceptance CheckWpFrontCest
php vendor/bin/codecept run -vvv --steps acceptance CheckWpFrontCest
php vendor/bin/codecept run --debug --steps acceptance CheckWpFrontCest

*/
class CheckWpFrontCest
{
    const BASE_URL_LINK = 'http://codecept.mydomain.priv/wordpress';  


	public function FoMainContent(AcceptanceTester $I)
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
        $I->see('Just another WordPress site', '#masthead > div > div > p');
        /* **  Check the site description with XPath selector ** */        
        $I->see('Just another WordPress site', '//*[@id="masthead"]/div/div/p');         
        /* **  Check the site description with strict CSS selector or CSS locator ** */
        $I->see('Just another WordPress site', ['css' => '#masthead > div > div > p']);
        /* **  Check the site description with strict XPath selector or XPath locator ** */
        $I->see('Just another WordPress site', ['xpath' => '//*[@id="masthead"]/div/div/p']); 
                            
  	}//EOF
}//EOC


