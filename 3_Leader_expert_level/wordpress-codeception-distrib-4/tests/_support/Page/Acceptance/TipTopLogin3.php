<?php
namespace Page\Acceptance;

class TipTopLogin3 extends \AcceptanceTester
{
    public static $URL_WP_LOGIN = '/wp-login.php';
    public static $URL_WP_ADMIN = '/wp-admin/';
    public static $usernameField = '#user_login';
    public static $passwordField = '#user_pass';
    public static $loginButton = '//*[@id="wp-submit"]';

    // Sign in helper function to be called and used whenever needed
    public function WpCocoLogin($name, $password)
    {
        $this->amOnPage(WpCocoLogin::$URL_WP_LOGIN);
        $this->fillField(WpCocoLogin::$usernameField, $namea);
        $this->fillField(WpCocoLogin::$passwordField, $passworda);
        $this->click(WpCocoLogin::$loginButton);
        $this->amOnPage(WpCocoLogin::$URL_WP_ADMIN);

    }
 }

