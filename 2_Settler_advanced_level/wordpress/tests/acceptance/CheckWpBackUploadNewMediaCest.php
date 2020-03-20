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

php vendor/bin/codecept run --steps acceptance CheckWpBackUploadNewMediaCest

php vendor/bin/codecept run --html --steps acceptance CheckWpBackUploadNewMediaCest


php vendor/bin/codecept run -vvv --steps acceptance CheckWpBackUploadNewMediaCest

php vendor/bin/codecept run --debug --steps acceptance CheckWpBackUploadNewMediaCest

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



class CheckWpBackUploadNewMediaCest
{

// General
    public function addNewMedia (AcceptanceTester $I)
    {
	/* LOGIN */
		$I->wantTo('ensure that I can send an image in the media library');

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


        $I->comment("\n--- UPLOAD MEDIA");

		// Go direct to the Add New link in Media
		$I->click('//*[@id="menu-media"]/ul/li[3]/a');
		$I->see('Upload New Media');

		// SINGLE-FILE UPLOADER
		// the file need to be in the directory /tests/_data
		$I->attachFile('//*[@id="async-upload"]', 'pictures/cobweb_with_raindrops.jpg');

		// BTN UPLOAD
		$I->click('//*[@id="html-upload"]');

	}


}
