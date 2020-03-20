<?php
namespace Page\Acceptance;

class TipTopLogin2 extends \AcceptanceTester
{
    public static $URL_WP_LOGIN = '/wp-login.php';
    public static $URL_WP_ADMIN = '/wp-admin/';
    public static $usernameField = '#user_login';
    public static $passwordField = '#user_pass';
    public static $loginButton = '//*[@id="wp-submit"]';

    // Sign in helper function to be called and used whenever needed
    public function WpCocoLogin($name, $password)
    {
        $this->amOnPage(TipTopLogin2::$URL_WP_LOGIN);
        $this->fillField(TipTopLogin2::$usernameField, $name);
        $this->fillField(TipTopLogin2::$passwordField, $password);
        $this->click(TipTopLogin2::$loginButton);
        $this->amOnPage(TipTopLogin2::$URL_WP_ADMIN);

    }
 }

