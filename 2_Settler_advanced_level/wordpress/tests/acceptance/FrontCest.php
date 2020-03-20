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

php vendor/bin/codecept run --steps acceptance FrontCest
php vendor/bin/codecept run --html --steps acceptance FrontCest
php vendor/bin/codecept run -vvv --steps acceptance FrontCest
php vendor/bin/codecept run --debug --steps acceptance FrontCest

*/
class CheckWpFrontCest
{
    
	public function FrontOfficeWorks(AcceptanceTester $I)
    {
        // Frontoffice
        // Try to see "Just another WordPress site"
        $I->wantTo('Frontoffice :: perform actions and see result');
        $I->amOnPage('/');
        $I->comment('Frontoffice :: want to see the WP default site description install');
        
        /* **  Check the site description anywhere in the homepage ** */
        
        //Successful
        $I->see('Just another WordPress site');
        
        // Failed
        // $I->see('Just a new WordPress site'); 

        /* **  Check the site description with CSS selector ** */

        //Successful
        // $I->see('Just another WordPress site', '#masthead > div > div > p');

        // Failed
        // $I->see('Just another WordPress site', '#masthead > div > div > span');
        
        /* **  Check the site description with XPath selector ** */
        
        //Successful
        // $I->see('Just another WordPress site', '//*[@id="masthead"]/div/div/p'); 
        
        // Failed
        //$I->see('Just another WordPress site', '//*[@id="masthead"]/div/div/span'); 

        /* **  Check the site description with strict CSS selector or CSS locator ** */
        
        //Successful
        // $I->see('Just another WordPress site', ['css' => '#masthead > div > div > p']);
        
        // Failed
        //$I->see('Just another WordPress site', ['css' => '#masthead > div > div > span']);

        /* **  Check the site description with strict XPath selector or XPath locator ** */
        
        //Successful
        //$I->see('Just another WordPress site', ['xpath' => '//*[@id="masthead"]/div/div/p']); 
        
        // Failed
        //$I->see('Just another WordPress site', ['xpath' => '//*[@id="masthead"]/div/div/span']); 
    }

}//EOC

