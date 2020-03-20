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

php vendor/bin/codecept run --steps acceptance SuperDuper
php vendor/bin/codecept run -vvv --steps acceptance SuperDuper
php vendor/bin/codecept run --debug --steps acceptance SuperDuper

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
