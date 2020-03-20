<?php
/* Version 2 */

namespace Page\Advanced;

class advancedUsageLogin
{
    // include url of current page
    // public static $URL = '';

    public static $URL_WP_LOGIN = '/wp-login.php';
    public static $URL_WP_ADMIN = '/wp-admin/';


    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */


    
    /*
    It is expected that you will populate it with the UI locators of a page it represents. Locators can be added as public properties
    */

    /*
        * NON STATIC
     */ 
    public $usernameField = '#user_login';
    public $passwordField = '#user_pass';
    public $loginButton = '//*[@id="wp-submit"]';
 
    /*
        $I->fillField($this->usernameField, $name);
        $I->fillField($this->passwordField, $password);
        $I->click($this->loginButton);

     */
    
    /*
        * STATIC
     */ 
    
    /*
    public static $usernameField = '#user_login';
    public static $passwordField = '#user_pass';
    public static $loginButton = '//*[@id="wp-submit"]';
    */
    

    /**
     * @var \AdvancedTester
     */
    protected $AdvancedTester;

    // we inject AdvancedTester into our class
    public function __construct(\AdvancedTester $I)
    {
        $this->AdvancedTester = $I;
    }

    public function WpLoginForm($name, $password)
    {
        $I = $this->AdvancedTester;

        $I->amOnPage(self::$URL_WP_LOGIN);
        

        /*
        * NON STATIC
        */ 
        /* */
        $I->fillField($this->usernameField, $name);
        $I->fillField($this->passwordField, $password);
        $I->click($this->loginButton);
        
  
        /*
        * STATIC
        */ 
        /*
        $I->fillField(self::$usernameField, $name);
        $I->fillField(self::$passwordField, $password);
        $I->click(self::$loginButton);
        */

        $I->amOnPage(self::$URL_WP_ADMIN);
    }

}//EOC