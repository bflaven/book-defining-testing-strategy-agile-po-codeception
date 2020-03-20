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
php vendor/bin/codecept build

php vendor/bin/codecept run --steps acceptance SuperDuperCest
php vendor/bin/codecept run --html --steps acceptance SuperDuperCest
php vendor/bin/codecept run -vvv --steps acceptance SuperDuperCest
php vendor/bin/codecept run --debug --steps acceptance SuperDuperCest

*/
class SuperDuperCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    }
}
