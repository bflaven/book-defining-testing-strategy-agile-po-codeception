<?php
namespace Step\Advanced;

class Admin extends \AdvancedTester
{

	public static $URL_WP_LOGIN = '/wp-login.php';
    public static $URL_WP_ADMIN = '/wp-admin/';

	/*
        * NON STATIC
     */ 
    /*
    public $usernameField = '#user_login';
    public $passwordField = '#user_pass';
    public $loginButton = '//*[@id="wp-submit"]';
	*/
    /*
        * STATIC
     */ 
    
    public static $usernameField = '#user_login';
    public static $passwordField = '#user_pass';
    public static $loginButton = '//*[@id="wp-submit"]';
    
	public function loginAsAdmin($name, $password)
    {
        $I = $this;
        $I->amOnPage(self::$URL_WP_LOGIN);
        
        /*
        * NON STATIC
        */ 
        /* 
        
        $I->fillField($this->usernameField, $name);
        $I->fillField($this->passwordField, $password);
        $I->click($this->loginButton);
        */
  
        /*
        * STATIC
        */ 
        /* */
        $I->fillField(self::$usernameField, $name);
        $I->fillField(self::$passwordField, $password);
        $I->click(self::$loginButton);
        

        $I->amOnPage(self::$URL_WP_ADMIN);
    }

}//EOC

