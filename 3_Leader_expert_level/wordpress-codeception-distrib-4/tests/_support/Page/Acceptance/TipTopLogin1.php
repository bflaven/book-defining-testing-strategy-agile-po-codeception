<?php
namespace Page\Acceptance;

class TipTopLogin1
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
        * VERSION 0
     */ 
    /*
    It is expected that you will populate it with the UI locators of a page it represents. Locators can be added as public properties
    */
   /*    */
    public $usernameField = '#user_login';
    public $passwordField = '#user_pass';
    public $loginButton = '//*[@id="wp-submit"]';
 
    /*
        $I->fillField($this->usernameField, $name);
        $I->fillField($this->passwordField, $password);
        $I->click($this->loginButton);

     */
    
    /*
        * VERSION 1
     */ 
    
    /*
    public static $usernameField = '#user_login';
    public static $passwordField = '#user_pass';
    public static $loginButton = '//*[@id="wp-submit"]';
    */
    
    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: Page\Edit::route('/123-post');
     */
    // public static function route($param)
    // {
    //     return static::$URL.$param;
    // }

    /**
     * @var \AcceptanceTester;
     */
    // protected $acceptanceTester;

    // public function __construct(\AcceptanceTester $I)
    // {
    //     $this->acceptanceTester = $I;
    // }


    /**
     * @var \AcceptanceTester
     */
    protected $monAcceptanceTesteurCon;

    // we inject AcceptanceTester into our class
    public function __construct(\AcceptanceTester $I)
    {
        $this->monAcceptanceTesteurCon = $I;
    }

    public function WpCocoLogin($name, $password)
    {
        $I = $this->monAcceptanceTesteurCon;

        $I->amOnPage(self::$URL_WP_LOGIN);
        
        /* no static */
        /* */
        $I->fillField($this->usernameField, $name);
        $I->fillField($this->passwordField, $password);
        $I->click($this->loginButton);
        

        /* static */
        /*
        $I->fillField(self::$usernameField, $name);
        $I->fillField(self::$passwordField, $password);
        $I->click(self::$loginButton);
        */

        $I->amOnPage(self::$URL_WP_ADMIN);

        // return $this;
    }

}//EOC

