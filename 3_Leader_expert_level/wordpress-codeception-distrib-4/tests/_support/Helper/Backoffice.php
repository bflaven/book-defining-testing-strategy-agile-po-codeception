<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Backoffice extends \Codeception\Module
{

	public function GetIntoTheAdmin () {

				$I->amGoingTo('to pass the login page');
                $I->amOnPage('/wp-login.php');
                $I->comment('Backoffice :: enter username and password for WP');
                $I->fillField('#user_login', LOGIN_USERNAME);
                $I->fillField('#user_pass', LOGIN_PASSWORD);
                $I->click('//*[@id="wp-submit"]');


	}


}
