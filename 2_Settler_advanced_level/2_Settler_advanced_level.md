# 2 Settler or Advanced Level 

**This file is designed to facilitate understanding and eventual cut-paste for code chunks appearing in chapter "2 Settler or Advanced Level " of the book "Defining a testing automation strategy for a P.O. with CODECEPTION_ & WordPress"**

``` bash
# Install Homebrew if not already done
$ ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"


# Update homebrew
$ brew update

# Install php and composer
$ brew install php
$ brew install composer

# Install php and composer
$ composer -v
```


``` bash
# be sure to be at the root of your project
cd /Applications/MAMP/htdocs/wordpress

#Install codeception via Composer
composer require "codeception/codeception" --dev

#This creates configuration file codeception.yml and tests directory and default test suites.
php vendor/bin/codecept bootstrap

# Configure Acceptance Tests
# In tests/acceptance.suite.yml update the
# CHECK HEADS-UP: Configuring CodeCeption a WP in MAMP
# this my custom local WP
# url: http://codecept.mydomain.priv/wordpress

# The example given does no work codecept g:cest acceptance First
# You need to pass this command

# first way to generate your first test g stand for generate
# It will generate a first test in tests/acceptance/FirstCest.php
php vendor/bin/codecept g:cest acceptance First

# second way to generate your second test.
# It will generate a first test in tests/acceptance/SecondCest.php
php vendor/bin/codecept generate:cest acceptance Second

# generate your third test with another name SuperDuper.
# It will generate a first test in tests/acceptance/SuperDuperCest.php
php vendor/bin/codecept generate:cest acceptance SuperDuper


# launch the suite
php vendor/bin/codecept run --steps acceptance

# launch the first test only
php vendor/bin/codecept run --steps acceptance FirstCest
php vendor/bin/codecept run -vvv --steps acceptance FirstCest
php vendor/bin/codecept run --debug --steps acceptance FirstCest


php vendor/bin/codecept run --steps acceptance SecondCest
```



``` php

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


```


``` php

/*
    NOTE: *** MAKE IT WORK ***
    
cd /Applications/MAMP/htdocs/wordpress
php vendor/bin/codecept build

php vendor/bin/codecept run --steps acceptance BackCest
php vendor/bin/codecept run --html --steps acceptance BackCest
php vendor/bin/codecept run -vvv --steps acceptance BackCest
php vendor/bin/codecept run --debug --steps acceptance BackCest

*/

class BackCest
{
    
    public function BackOfficeWorks(AcceptanceTester $I)
    {
    
            //Go to the login
            $I->wantTo('Backoffice :: perform actions and see result');
            $I->amOnPage('/wp-login.php');
            $I->comment('Backoffice :: enter username and password for WP');
            $I->fillField('#user_login', 'admin');
            $I->fillField('#user_pass','admin');
            $I->click('Log In');
    }
}

```


```php
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
```



``` yaml
Dashboard
    Home
    Updates
Posts
    All Posts
    Add New
    Categories
    Tags
Media
    Library
    Add New

... and so on

Settings
    General
    Writing
    Reading
    Discussion
    Media
    Permalinks
    Privacy

```



``` html

<!-- for the BackOffice -->
Wordpress > BackOffice > Settings > General
Wordpress > BackOffice > General

<!-- for the FrontOffice -->
Wordpress > FrontOffice > Homepage
Wordpress > FrontOffice > Page > About
Wordpress > FrontOffice > Category > Culture
Wordpress > FrontOffice > Category > Sports

<!-- to be continued -->

```



``` html

<!-- for the FrontOffice -->
Category Archives: Culture
Category Archives: Sports
Tag Archives: Spanish
Tag Archives: Russian
<!-- to be continued -->

<!-- for the BackOffice -->
Dashboard
Posts
Media Library
<!-- to be continued -->

```



``` html

<!-- for the FrontOffice -->
http://codecept.mydomain.priv/wordpress/about-us/
http://codecept.mydomain.priv/wordpress/careers/
http://codecept.mydomain.priv/wordpress/category/gaming/
http://codecept.mydomain.priv/wordpress/category/culture/
http://codecept.mydomain.priv/wordpress/tag/russian/
http://codecept.mydomain.priv/wordpress/tag/spanish/
<!-- to be continued -->

<!-- for the BackOffice -->
http://codecept.mydomain.priv/wordpress/wp-admin/options-general.php
http://codecept.mydomain.priv/wordpress/wp-admin/options-writing.php
http://codecept.mydomain.priv/wordpress/wp-admin/options-reading.php

```

``` bash
# be sure to be at the root of your project
cd /Applications/MAMP/htdocs/wordpress

# generate files for test

# create /tests/acceptance/CheckWpBackCest.php
php vendor/bin/codecept generate:cest acceptance CheckWpBack


# create /tests/acceptance/CheckWpFrontCest.php
php vendor/bin/codecept generate:cest acceptance CheckWpFront

```


``` php
// class names created automatically
class CheckWpBackCest {}
class CheckWpFrontCest {}


```


``` php

public function checkOptionsGeneral (AcceptanceTester $I)
    {

        $login_username = "admin";
        $login_password = "admin";
        $general_settings_h1 = "General Settings";
        $general_blogname_value = "codecept_test_site";
        $general_blogdescription_value = "Just another WordPress site";
        $general_siteurl_value = "http://codecept.mydomain.priv/wordpress";
        $general_home_value = "http://codecept.mydomain.priv/wordpress";
        $general_new_admin_email_value = "admin@test.com";

}
```


``` php

class CheckWpBackCest
{
    const LANGUAGE_CHOSEN = 'en';
    const BASE_URL_LINK  = 'http://codecept.mydomain.priv/wordpress';
    const LOGIN_USERNAME = "admin";
    const LOGIN_PASSWORD = "admin";
    const GENERAL_SETTINGS_H1 = "General Settings";
    const GENERAL_BLOGNAME_VALUE = "codecept_test_site";
    const GENERAL_BLOGDESCRIPTION_VALUE  = "Just another WordPress site";
    const GENERAL_SITEURL_VALUE = "http://codecept.mydomain.priv/wordpress";
    const GENERAL_HOME_VALUE  = "http://codecept.mydomain.priv/wordpress";
    const GENERAL_NEW_ADMIN_EMAIL_VALUE = "admin@test.com";

    public function checkOptionsGeneral (AcceptanceTester $I)
    {

            $I->comment("\n--- Test made for language ".LANGUAGE_CHOSEN."");
            $I->wantTo('Backoffice :: ensure that I can check and change general settings');
            /*** DB ***/
            $I->comment("\n--- DB");
            $I->amGoingTo('see if the admin user exist to pass the login page');
            $I->seeNumRecords(1, 'wp_users');   //executed on default database

            /*** LOGIN ***/
            $I->comment("\n--- LOGIN");

            //Go to the login
            $I->amGoingTo('to pass the login page');
            $I->amOnPage('/wp-login.php');
            $I->comment('Backoffice :: enter username and password for WP');
            $I->fillField('#user_login', self::LOGIN_USERNAME);
            $I->fillField('#user_pass', self::LOGIN_PASSWORD);
            $I->click('//*[@id="wp-submit"]');
    }
}

```


``` php

define ('LANGUAGE_CHOSEN','en');

define('BASE_URL_LINK', 'http://codecept.mydomain.priv/wordpress');
define('LOGIN_USERNAME', 'admin');
define('LOGIN_PASSWORD', 'admin');
define('DASHBOARD_H1', 'Dashboard');
define('GENERAL_SETTINGS_H1', 'General Settings');
define('GENERAL_BLOGNAME_VALUE','codecept_test_site');
define('GENERAL_BLOGDESCRIPTION_VALUE', 'Just another WordPress site');
define('GENERAL_SITEURL_VALUE', 'http://codecept.mydomain.priv/wordpress');
define('GENERAL_HOME_VALUE', 'http://codecept.mydomain.priv/wordpress');
define('GENERAL_NEW_ADMIN_EMAIL_VALUE', 'admin@test.com');


```





```java
class Loading {}
class ComponentLogic {}
```



```java
eat();
eatSlow();
preheatTheOven();
```


```java
int i;
char c;
float myWidth;
```


```php
// Declaring variables
$txt = "Hello World!";
$number = 10;
```




```java
static final int MAX_PARTICIPANTS = 10;
```

```php
// Defining constant
define("MY_WEBSITE_URL", "https://flaven.fr/");
```


```bash

+ CheckWpBackCest # Class; The WP Settings Section
     │
    checkWhatLanguage # Function; What is the language selected for WP?
     │
    checkUserExist  # Function; Is there an existing admin user for WP?
     │
    checkOptionsGeneral # Function; Check the WP General Options Settings Page

    checkOptionsWriting # Function; Check the WP Writing Options Settings Page
     │
    checkOptionsReading # Function; Check the WP Reading Options Settings Page
     │
    checkOptionsDiscussion # Function; Check the WP Discussion Options Settings Page
     │
    checkOptionsMedia # Function; Check the WP Media Options Settings Page
     │
    checkOptionsPermalink # Function; Check the WP Permalink Options Settings Page
     │
    checkOptionsPrivacy # Function; Check the WP Privacy Options Settings Page
```



```php
    class CheckWpBackCest
    {
        
        // Check default language
        public function checkWhatLanguage {}

        // Check existing admin
        public function checkLoginAdmin {}


        // General
        public function checkOptionsGeneral {}

        // Writing
        public function checkOptionsWriting {}

        // Reading
        public function checkOptionsReading {}

        // Discussion
        public function checkOptionsDiscussion {}

        // Media
        public function checkOptionsMedia {}

        // Permalink
        public function checkOptionsPermalink {}

        // Privacy
        public function checkOptionsPrivacy {}
    
    }

```


``` php

/* Case using Variables in Class */
class CheckWpBackCest
{
        
        public function checkLoginAdmin (AcceptanceTester $I)
    {
    
            //Go to the login
            $I->wantTo('Backoffice :: perform actions and see result');
            $I->amOnPage('/wp-login.php');
            $I->comment('Backoffice :: enter username and password for WP');
            $I->fillField('#user_login', 'admin');
            $I->fillField('#user_pass','admin');
            $I->click('Log In');
    }

    public function checkOptionsGeneral (AcceptanceTester $I)
    {

                $login_username = "admin";
                $login_password = "admin";
                $general_settings_h1 = "General Settings";

                $general_blogname_value = "codecept_test_site";
                $general_blogdescription_value = "Just another WordPress site";
                $general_siteurl_value = "http://codecept.mydomain.priv/wordpress";
                $general_home_value = "http://codecept.mydomain.priv/wordpress";
                $general_new_admin_email_value = "admin@test.com";


                $I->wantTo('ensure that I can check and change general settings');
                /* DB * */
                $I->comment("\n--- DB");
                $I->amGoingTo('see if the admin user exist to pass the login page');
                $I->seeNumRecords(1, 'wp_users');   //executed on default database

                /* LOGIN */
                $I->comment("\n--- LOGIN");

                //Go to the login
                $I->amGoingTo('to pass the login page');
                $I->amOnPage('/wp-login.php');
                $I->fillField('#user_login', $login_username);
                $I->fillField('#user_pass',$login_password);
                $I->click('//*[@id="wp-submit"]');

                // Go to the Admin page
                $I->expect('to be connected and I can access to the WP dashboard');
                $I->amOnPage('/wp-admin/');
                $I->see('Dashboard');


                $I->comment("\n--- SETTING");
                // SETTING
                # Check some values from http://project.test/wordpress/wp-admin/options-general.php
                # Click on Settings
                $I->click('//*[@id="menu-settings"]/a/div[3]');
                # Check I am on /wp-admin/options-general.php
                $I->amOnPage('/wp-admin/options-general.php');
                # See General Settings
                $I->see($general_settings_h1, '#wpbody-content > div.wrap > h1');

                // to be continued
                
    }
}
```


``` php
/* Case using Constants in Class */

class CheckWpBackCest
{
                
                const BASE_URL_LINK  = 'http://codecept.mydomain.priv/wordpress';
                const LOGIN_USERNAME = "admin";
                const LOGIN_PASSWORD = "admin";
                const GENERAL_SETTINGS_H1 = "General Settings";
                const GENERAL_BLOGNAME_VALUE = "codecept_test_site";
                const GENERAL_BLOGDESCRIPTION_VALUE  = "Just another WordPress site";
                const GENERAL_SITEURL_VALUE = "http://codecept.mydomain.priv/wordpress";
                const GENERAL_HOME_VALUE  = "http://codecept.mydomain.priv/wordpress";
                const GENERAL_NEW_ADMIN_EMAIL_VALUE = "admin@test.com";


    public function checkOptionsGeneral (AcceptanceTester $I)
    {

                $I->comment("\n--- Test made by ".MY_CONSTANT_NAME."");



                $I->wantTo('Backoffice :: ensure that I can check and change general settings');
                /*** DB ***/
                $I->comment("\n--- DB");
                $I->amGoingTo('see if the admin user exist to pass the login page');
                $I->seeNumRecords(1, 'wp_users');   //executed on default database

                /*** LOGIN ***/
                $I->comment("\n--- LOGIN");

                //Go to the login
                $I->amGoingTo('to pass the login page');
                $I->amOnPage('/wp-login.php');
                $I->comment('Backoffice :: enter username and password for WP');
                $I->fillField('#user_login', self::LOGIN_USERNAME);
                $I->fillField('#user_pass', self::LOGIN_PASSWORD);
                $I->click('//*[@id="wp-submit"]');

                // Go to the Admin page
                $I->expect('to be connected and I can access to the WP dashboard');
                $I->amOnPage('/wp-admin/');
                $I->see('Dashboard');


                $I->comment("\n--- SETTING");
                // SETTING
                # Check some values from http://project.test/wordpress/wp-admin/options-general.php
                # Click on Settings
                $I->click('//*[@id="menu-settings"]/a/div[3]');
                # Check I am on /wp-admin/options-general.php
                $I->amOnPage('/wp-admin/options-general.php');
                # See General Settings
                $I->see(self::GENERAL_SETTINGS_H1, '#wpbody-content > div.wrap > h1');
                // to be continued
                
    }
}
```

```php
// Set the languages
// include_once('tests/_data/languages/en.php');
// include_once('tests/_data/languages/es.php');
// include_once('tests/_data/languages/fr.php');
// include_once('tests/_data/languages/it.php');
// include_once('tests/_data/languages/ru.php');
 include_once('tests/_data/languages/cn.php');
```



```php
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

define ('LANGUAGE_CHOSEN','zh_TW');

define('BASE_URL_LINK', 'http://codecept.mydomain.priv/wordpress');
define('LOGIN_USERNAME', 'admin');
define('LOGIN_PASSWORD', 'admin');

define('DASHBOARD_H1', '控制台');

define('GENERAL_SETTINGS_H1', '一般設定');
define('GENERAL_BLOGNAME_VALUE','codecept_test_site');
define('GENERAL_BLOGDESCRIPTION_VALUE', 'Just another WordPress site');
define('GENERAL_SITEURL_VALUE', 'http://codecept.mydomain.priv/wordpress');
define('GENERAL_HOME_VALUE', 'http://codecept.mydomain.priv/wordpress');
define('GENERAL_NEW_ADMIN_EMAIL_VALUE', 'admin@test.com');


define('WRITING_SETTINGS_H1', '寫作設定');

define('READING_SETTINGS_H1', '閱讀設定');

define('DISCUSSION_SETTINGS_H1', '討論設定');

define('MEDIA_SETTINGS_H1', '媒體設定');

define('PERMALINK_SETTINGS_H1', '永久連結設定');

define('PRIVACY_SETTINGS_H1', '隱私權設定');

/*

To be continued

 */
```


``` bash
# be sure to be at the root of your project
cd /Applications/MAMP/htdocs/wordpress

# create /tests/acceptance/CheckWpBackCest.php
php vendor/bin/codecept generate:cest acceptance CheckWpBack
```


``` php
                // Update and Check
                # //*[@id="blogname"] # codecept_test_site
                #
                # Check Site Title
                $I->seeInField('//*[@id="blogname"]', GENERAL_BLOGNAME_VALUE);
```



``` php
                $default_role = $I->grabTextFrom('//*[@id="default_role"]/option[1]');
                $I->selectOption("select[name=default_role]", $default_role);
```

``` php

                # Membership
                # Anyone can register, the answer is NO
                $I->dontSeeCheckboxIsChecked('#users_can_register');

                # Anyone can register, the answer is Yes
                // $I->seeCheckboxIsChecked('#users_can_register');
                //
                //
                
```




``` php
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

php vendor/bin/codecept run --steps acceptance CheckWpBackCest
php vendor/bin/codecept run -vvv --steps acceptance CheckWpBackCest
php vendor/bin/codecept run --debug --steps acceptance CheckWpBackCest

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
# include_once('tests/_data/languages/cn.php');



class CheckWpBackCest
{

    public function checkWhatLanguage (AcceptanceTester $I)
    {
            $I->wantTo('Language :: ensure a language is selected');
            $I->comment("\n--- LANGUAGE");
            $I->comment("Language :: language selected :: ".LANGUAGE_CHOSEN."");
    }

    public function checkUserExist (AcceptanceTester $I)
    {
                /* DB * */
                $I->wantTo('Db :: ensure there is an existing user');
                $I->comment("\n--- DB");
                $I->amGoingTo('see if the admin user exist to pass the login page');
                $I->seeNumRecords(1, 'wp_users');   //executed on default database
    }

    // General
    public function checkOptionsGeneral (AcceptanceTester $I)
    {

                
                $I->wantTo('Backoffice :: ensure that I can check and change General Settings');
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


                $I->comment("\n--- SETTING");
                // SETTING
                # Check some values from http://project.test/wordpress/wp-admin/options-general.php
                # Click on Settings
                $I->click('//*[@id="menu-settings"]/a/div[3]');
                # Check I am on /wp-admin/options-general.php
                $I->amOnPage('/wp-admin/options-general.php');
                # See General Settings
                $I->see(GENERAL_SETTINGS_H1, '#wpbody-content > div.wrap > h1');


                # SOURCE : https://codeception.com/docs/modules/PhpBrowser
                // Update and Check
                # //*[@id="blogname"] # codecept_test_site
                # //*[@id="blogdescription"] # Just another WordPress site
                # //*[@id="siteurl"] # http://codecept.mydomain.priv/wordpress
                # //*[@id="home"] # http://codecept.mydomain.priv/wordpress
                # //*[@id="new_admin_email"] # admin@test.com

                # Check Site Title
                $I->seeInField('//*[@id="blogname"]', GENERAL_BLOGNAME_VALUE);
                # Check Tagline
                $I->seeInField('//*[@id="blogdescription"]', GENERAL_BLOGDESCRIPTION_VALUE);
                # Check WordPress Address (URL)
                $I->seeInField('//*[@id="siteurl"]', GENERAL_SITEURL_VALUE);
                # Check Site Address (URL)
                $I->seeInField('//*[@id="home"]', GENERAL_HOME_VALUE);
                # Check Email Address
                $I->seeInField('//*[@id="new_admin_email"]', GENERAL_NEW_ADMIN_EMAIL_VALUE);


                # Membership
                # Anyone can register, the answer is NO
                $I->dontSeeCheckboxIsChecked('#users_can_register');

                # Anyone can register, the answer is Yes
                // $I->seeCheckboxIsChecked('#users_can_register');


                # Test against Administrator
                # //*[@id="default_role"]
                # Subscriber

                $default_role = $I->grabTextFrom('#default_role > option:nth-child(1)');
                $default_role = $I->grabTextFrom('//*[@id="default_role"]/option[1]');
                $I->selectOption("select[name=default_role]", $default_role);

                // This prints the value selected
                $I->comment("\n--- DEBUG :: select[name=default_role] :: $default_role ");
                $I->seeOptionIsSelected('//*[@id="default_role"]', $default_role);


                # Site Language
                # //*[@id="WPLANG"]
                // $I->seeOptionIsSelected('//*[@id="WPLANG"]', 'English (United States)');
                // $I->seeOptionIsSelected('//*[@id="WPLANG"]', 'Français');
                // $I->seeOptionIsSelected('//*[@id="WPLANG"]', 'Italiano');


                # Timezone
                // $I->seeOptionIsSelected('//*[@id="timezone_string"]', 'UTC+0');
                // $I->seeOptionIsSelected('//*[@id="timezone_string"]', 'Budapest');
                // $I->seeOptionIsSelected('//*[@id="timezone_string"]', 'Bucarest');
                // $I->seeOptionIsSelected('//*[@id="timezone_string"]', 'Vladivostok');



                # Date Format
                // $I->seeOptionIsSelected('input[name=date_format]', 'j F Y');
                // $I->seeOptionIsSelected('input[name=date_format]', 'Y-m-d');
                // $I->seeOptionIsSelected('input[name=date_format]', 'm/d/Y');
                // $I->seeOptionIsSelected('input[name=date_format]', 'd/m/Y');
                // $I->seeOptionIsSelected('input[name=date_format]', '\c\u\s\t\o\m');

                // # Time Format
                // $I->seeOptionIsSelected('input[name=time_format]', 'H:i');
                // $I->seeOptionIsSelected('input[name=time_format]', 'g:i A');
                // $I->seeOptionIsSelected('input[name=time_format]', '\c\u\s\t\o\m');


                # Week Starts On
                # Monday is #start_of_week > option:nth-child(2), option set by default
                # //*[@id="start_of_week"]
                // $I->seeOptionIsSelected('//*[@id="start_of_week"]', 'Monday');
                // $I->seeOptionIsSelected('//*[@id="start_of_week"]', 'Lundi');
                // $I->seeOptionIsSelected('//*[@id="start_of_week"]', 'lunedì');
                // $I->seeOptionIsSelected('select[name=start_of_week]', 'sabato');


                $start_of_week = $I->grabTextFrom('select[name=start_of_week] option:nth-child(2)');
                $I->selectOption("select[name=start_of_week]", $start_of_week);
                // This prints the value selected
                $I->comment("\n--- DEBUG :: select[name=start_of_week] :: $start_of_week ");
                $I->seeOptionIsSelected('select[name=start_of_week]', $start_of_week);

            
    }

        

        // Writing
        public function checkOptionsWriting (AcceptanceTester $I) {
            $I->wantTo('Backoffice :: ensure that I can check and change Writing Settings');


            // SETTING
            # Check some values from http://project.test/wordpress/wp-admin/options-writing.php
            $I->wantTo('ensure that I can check and change Writing Settings');


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

            # Click on Writing Settings
            $I->comment("--- Check if I am on the page for Writing Settings");
            $I->click('//*[@id="menu-settings"]/ul/li[3]/a');
            # Check I am on /wp-admin/options-writing.php
            $I->amOnPage('/wp-admin/options-writing.php');

            # See Writing Settings
            $I->see(WRITING_SETTINGS_H1, '#wpbody-content > div.wrap > h1');

            // Default Post Category
            $I->comment("--- Check the value for Dropdown Default Post Category");
            // $options = $I->grabTextFrom('//*[@id="default_email_category"]/option[7]');
            $options = $I->grabTextFrom('//*[@id="default_category"]/option');
            $I->selectOption("select[name=default_category]", $options);
            // This prints the value selected
            $I->comment('--- DEBUG :: select[name=default_category] :: '.$options.'');
            $I->seeOptionIsSelected('select[name=default_category]', $options);





            // Default Post Format
            $I->comment("--- Check the value for Dropdown Default Post Format");
            $options = $I->grabTextFrom('//*[@id="default_post_format"]/option[1]');
            $I->selectOption("select[name=default_post_format]", $options);
            // This prints the value selected
            $I->comment('--- DEBUG :: select[name=default_post_format] :: '.$options.'');
            $I->seeOptionIsSelected('select[name=default_post_format]', $options);

            /*** if you installed and activated pluginClassic Editor  ***/

            /*
            // Default editor for all users
            $I->comment("--- Check the value for Radio Button Default editor");
            $options = $I->grabAttributeFrom('input[name=classic-editor-replace]', 'value');
            $I->comment('--- DEBUG :: input[name=classic-editor-replace] :: '.$options.'');
            # classic or block
            $I->seeOptionIsSelected('input[name=classic-editor-replace]',  $options);

            // Allow users to switch editors
            $I->comment("--- Check the value for Radio Button Allow users to switch editors");
            $options = $I->grabAttributeFrom('input[name=classic-editor-allow-users]', 'value');
            $I->comment('--- DEBUG :: input[name=classic-editor-allow-users] :: '.$options.'');
            # classic or block
            $I->dontSeeOptionIsSelected('input[name=classic-editor-allow-users]',  $options);
            */
           
            /* Post via email */
            $I->comment("--- Check the values for Post via email");

            // Post via email
            $options = $I->grabAttributeFrom('input[name=mailserver_url]', 'value');
            // $I->comment('--- DEBUG :: select[name=mailserver_url] :: '.$options.'');
            $I->seeInField('//*[@id="mailserver_url"]', $options);

            $options = $I->grabAttributeFrom('input[name=mailserver_port]', 'value');
            // $I->comment('--- DEBUG :: select[name=mailserver_port] :: '.$options.'');
            $I->seeInField('//*[@id="mailserver_port"]', $options);

            $options = $I->grabAttributeFrom('input[name=mailserver_login]', 'value');
            // $I->comment('--- DEBUG :: select[name=mailserver_login] :: '.$options.'');
            $I->seeInField('//*[@id="mailserver_login"]', $options);

            $options = $I->grabAttributeFrom('input[name=mailserver_pass]', 'value');
            // $I->comment('--- DEBUG :: select[name=mailserver_pass] :: '.$options.'');
            $I->seeInField('//*[@id="mailserver_pass"]', $options);

            // Default Mail Category
            $I->comment("--- Check the value for Dropdown Default Mail Category ");
            // $options = $I->grabTextFrom('//*[@id="default_email_category"]/option[7]');
            $options = $I->grabTextFrom('//*[@id="default_email_category"]/option');
            $I->selectOption("select[name=default_email_category]", $options);
            // This prints the value selected
            $I->comment('--- DEBUG :: select[name=default_email_category] :: '.$options.'');
            $I->seeOptionIsSelected('select[name=default_email_category]', $options);

            /*
            $options = $I->grabTextFrom('textarea[name=ping_sites]', 'value');
            $I->comment('--- DEBUG :: textarea[name=ping_sites] :: '.$options.'');
            $I->seeInField('textarea[name=ping_sites]', $options);
            */
           
            // $value = 'http://rpc.pingomatic.com/';
            // $I->comment(--- DEBUG :: textarea[name=ping_sites] :: '.$value.'');
            // $I->seeInField('textarea[name=ping_sites]', $value);




            /*
            Name: mailserver_url # Value: mail.example.com
            Name: mailserver_port # Value: 110
            Name: mailserver_login # Value: login@example.com
            Name: mailserver_pass # Value: password
            Name: default_email_category # Value: //*[@id="default_email_category"]/option[7]
            Name: ping_sites # Value: http://rpc.pingomatic.com/

            */


        }

        // Reading
        public function checkOptionsReading (AcceptanceTester $I) {
            $I->wantTo('Backoffice :: ensure that I can check and change Reading Settings');

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

                // Main Navigation
                $I->comment('--- TESTING :: Check options-reading');


                // SETTING
                # Check some values from http://project.test/wordpress/wp-admin/options-reading.php
                # Click on Settings
                $I->click('//*[@id="menu-settings"]/ul/li[4]/a');
                //
                # Check I am on /wp-admin/options-general.php
                $I->amOnPage('/wp-admin/options-reading.php');

                # See Reading Settings
                $I->see(READING_SETTINGS_H1, '#wpbody-content > div.wrap > h1');

                # Your homepage displays
                $I->comment('--- TESTING :: Your homepage displays :: Your latest posts :: default (posts)');
                $options = $I->grabAttributeFrom('input[name=show_on_front]', 'value');
                $I->comment('--- DEBUG :: input[name=show_on_front] :: '.$options.'');
                $I->comment('--- TESTING :: Your homepage displays :: Your latest posts :: default (posts)');
                $I->seeOptionIsSelected('input[name=show_on_front]', $options);



                $I->comment('--- TESTING :: Your homepage displays :: Your latest posts :: change default (page)');
                // $I->click('//*[@id="front-static-pages"]/fieldset/p[2]/label/a');
                $I->selectOption('input[name=show_on_front]', array('value' => 'page'));
                $I->selectOption('select[name=page_on_front]', array('value' => '0'));
                $I->click('//*[@id="submit"]');

                $I->comment('--- TESTING :: Your homepage displays :: Your latest posts :: back to default (page)');
                $I->selectOption('input[name=show_on_front]', array('value' => 'posts'));
                $I->click('//*[@id="submit"]');


                // Blog pages show at most
                $I->comment('--- TESTING :: Blog pages show at most');
                $options = $I->grabAttributeFrom('//*[@id="posts_per_page"]', 'value');
                $I->comment('--- DEBUG :: select[name=posts_per_page] :: '.$options.'');
                $I->seeInField('//*[@id="posts_per_page"]',$options);

                // Syndication feeds show the most recent
                $I->comment('--- TESTING :: Syndication feeds show the most recent');
                $options = $I->grabAttributeFrom('//*[@id="posts_per_rss"]', 'value');
                $I->comment('--- DEBUG :: select[name=posts_per_rss] :: '.$options.'');
                $I->seeInField('//*[@id="posts_per_rss"]',$options);


                // For each article in a feed, show
                $I->comment('--- TESTING :: For each article in a feed, show');
                $options = $I->grabAttributeFrom('input[name=rss_use_excerpt]', 'value');
                $I->comment('--- DEBUG :: input[name=rss_use_excerpt] :: '.$options.'');
                $I->comment('--- TESTING :: For each article in a feed, show :: Full text (0) ');
                $I->seeOptionIsSelected('input[name=rss_use_excerpt]', $options);
                $I->comment('--- TESTING :: For each article in a feed, show :: Summary (1) ');
                $I->selectOption('input[name=rss_use_excerpt]', array('value' => '1'));
                $I->click('//*[@id="submit"]');
                $I->comment('--- TESTING :: For each article in a feed, show :: no more Full text (0)');
                $I->dontSeeOptionIsSelected('input[name=rss_use_excerpt]', array('value' => '0'));
                $I->comment('--- TESTING :: For each article in a feed, show :: back to Full text (0)');
                $I->selectOption('input[name=rss_use_excerpt]', array('value' => '0'));
                $I->click('//*[@id="submit"]');
                $options = $I->grabAttributeFrom('input[name=rss_use_excerpt]', 'value');
                $I->comment('--- DEBUG :: input[name=rss_use_excerpt] :: '.$options.'');
                $I->seeOptionIsSelected('input[name=rss_use_excerpt]', $options);

                // Search Engine Visibility
                # show_avatars (checkbox, checked)
                
                // $I->comment('--- TESTING :: Search Engine Visibility :: unchecked');
                // $I->dontSeeCheckboxIsChecked('//*[@id="blog_public"]'); // NO unchecked
                // $I->dontSeeCheckboxIsChecked('#blog_public');
                // $I->checkOption('#blog_public');
                // $I->click('//*[@id="submit"]');
                
                $I->comment('--- TESTING :: Search Engine Visibility :: checked');
                // $I->seeCheckboxIsChecked('#blog_public'); // YES checked

                // $I->comment('--- TESTING :: Search Engine Visibility :: unchecked again to proceed to more testing');
                // $I->uncheckOption('//*[@id="blog_public"]');
                // $I->click('//*[@id="submit"]');
                $I->dontSeeCheckboxIsChecked('//*[@id="blog_public"]'); // NO unchecked

        
        }

        // Discussion
        public function checkOptionsDiscussion (AcceptanceTester $I) {


    $I->wantTo('Backoffice :: ensure that I can check and change Discussion Settings');
        
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

            // Main Navigation
            $I->comment('--- TESTING :: Check options-discussion');


            // SETTING
            # Check some values from http://project.test/wordpress/wp-admin/options-discussion.php
            # Click on Settings
            $I->click('//*[@id="menu-settings"]/ul/li[5]/a');

            //
            # Check I am on /wp-admin/options-general.php
            $I->amOnPage('/wp-admin/options-discussion.php');

            # See General Settings
            $I->see(DISCUSSION_SETTINGS_H1, '#wpbody-content > div.wrap > h1');


            # Membership
            # Anyone can register, the answer is NO
            $I->dontSeeCheckboxIsChecked('#default_pingback_flag'); // NO unchecked
            // $I->seeCheckboxIsChecked('#default_pingback_flag'); // YES checked
            $I->seeCheckboxIsChecked('#default_ping_status'); // YES checked
            $I->seeCheckboxIsChecked('#default_comment_status'); // YES checked




            // Other comment settings
            # require_name_email (checkbox, checked)
            $I->seeCheckboxIsChecked('#require_name_email'); // YES checked

            # comment_registration (checkbox, unchecked)
            $I->dontSeeCheckboxIsChecked('#comment_registration'); // NO unchecked

            # close_comments_for_old_posts (checkbox, unchecked)
            $I->dontSeeCheckboxIsChecked('#close_comments_for_old_posts'); // NO unchecked

            # close_comments_days_old (field, value 14)
            $I->seeElement(['css' => '#close_comments_days_old'], ['value' => '14']);


            # show_comments_cookies_opt_in (checkbox, checked)
            $I->seeCheckboxIsChecked('#show_comments_cookies_opt_in'); // YES checked

            # thread_comments (checkbox, checked)
            $I->comment('--- TESTING :: Enable threaded (nested) comments "5" levels deep');
            $I->seeCheckboxIsChecked('#thread_comments'); // YES checked

            # thread_comments_depth (field, value 5)
            #V0 static
            // $I->seeElement(['xpath' => '//*[@id="thread_comments_depth"]/option[4]'], ['value' => '5']);
            // $I->seeElement(['css' => '#thread_comments_depth > option:nth-child(4)'], ['value' => '5']);

            #V1 dynamic
            $options = $I->grabAttributeFrom('//*[@id="thread_comments_depth"]/option[4]', 'value');
            // $I->comment('--- DEBUG :: //*[@id="thread_comments_depth"]/option[4] :: '.$options.'');

            // DO NOT USE IT IS JUST THE INSURANCE THAT THE FIELD EXISTS IN THE PAGE
            // $I->seeElement(['xpath' => '//*[@id="thread_comments_depth"]/option[4]'], ['value' => ''.$options.'']);
            // $I->seeElement(['css' => '#thread_comments_depth > option:nth-child(4)'], ['value' => ''.$options.'']);
            // USE THIS ONE, IS REALLY TESTING THE VALUE
            $I->seeInField('select[name=thread_comments_depth]',  $options);


            # page_comments (checkbox, unchecked)
            $I->comment("--- TESTING :: Check Break comments into pages with \"50\" top level comments per page and the \"last\" or \"first\" page displayed by default");
            $I->dontSeeCheckboxIsChecked('#page_comments'); // NO unchecked


            # comments_per_page (field, value 50)
            $I->comment('--- TESTING :: Break comments into pages with "50" top level comments per page');
            $options = $I->grabAttributeFrom('//*[@id="comments_per_page"]', 'value');
            $I->comment('--- DEBUG :: //*[@id="comments_per_page"] :: '.$options.'');
            // YOU CAN USE ANY OF THESE TESTS
            // $I->seeElement(['xpath' => '//*[@id="comments_per_page"]'], ['value' => ''.$options.'']);
            // $I->seeElement(['css' => '#comments_per_page'], ['value' => ''.$options.'']);
            $I->seeInField('input[name=comments_per_page]',  $options);

            # default_comments_page (select, value newest)

            # First Method with grabAttributeFrom
            // $options = $I->grabAttributeFrom('//*[@id="default_comments_page"]/option[1]', 'value');
            // $I->comment('--- DEBUG :: //*[@id="default_comments_page"]/option[1] :: '.$options.'');
            // $I->seeInField('//*[@id="default_comments_page"]',''.$options.'');
            // $I->seeInField('#default_comments_page',''.$options.'');
            // $I->seeInField('select[name=default_comments_page]',''.$options.'');

            # comment_order (select, value asc)

            $I->comment('--- TESTING :: Comments should be displayed with the "older" comments at the top of each page');
            $options = $I->grabAttributeFrom('//*[@id="comment_order"]/option[1]', 'value');
            $I->comment('--- DEBUG :: select[name=comment_order] :: '.$options.'');
            # asc or block
            // DO NOT USE IT IS JUST THE INSURANCE THAT THE FIELD EXISTS IN THE PAGE
            // $I->seeElement(['xpath' => '//*[@id="comment_order"]/option[1]'], ['value' => ''.$options.'']);

            // USE THIS ONE, IS REALLY TESTING THE VALUE
            $I->seeInField('select[name=comment_order]',  $options);



            // Email me whenever

            # comments_notify (checkbox, checked)
            $I->comment('--- TESTING :: Email me whenever :: Email me whenever Anyone posts a comment');
            $I->seeCheckboxIsChecked('#comments_notify'); // YES checked
            // $I->dontSeeCheckboxIsChecked('#comments_notify'); // NO unchecked

            # moderation_notify (checkbox, checked)
            $I->comment('--- TESTING :: Email me whenever :: A comment is held for moderation');
            $I->seeCheckboxIsChecked('#moderation_notify'); // YES checked
            // $I->dontSeeCheckboxIsChecked('#moderation_notify'); // NO unchecked

            // Before a comment appears
            # comment_moderation (checkbox, unchecked)
            $I->comment('--- TESTING :: Before a comment appears :: Comment must be manually approved');
            // $I->seeCheckboxIsChecked('#comment_moderation'); // YES checked
            $I->dontSeeCheckboxIsChecked('#comment_moderation'); // NO unchecked

            # comment_whitelist (checkbox, checked)
            $I->comment('--- TESTING :: Before a comment appears :: Comment author must have a previously approved comment');
            $I->seeCheckboxIsChecked('#comment_whitelist'); // YES checked
            // $I->dontSeeCheckboxIsChecked('#comment_whitelist'); // NO unchecked


            // Comment Moderation
            # comment_max_links (field, value 2)
            $I->comment('--- TESTING :: Comment Moderation :: Hold a comment in the queue if it contains "3" or more links.');
            $options = $I->grabAttributeFrom('//*[@id="comment_max_links"]', 'value');
            $I->comment('--- DEBUG :: //*[@id="comment_max_links"] :: '.$options.'');
            // YOU CAN USE ANY OF THESE TESTS
            $I->seeElement(['xpath' => '//*[@id="comment_max_links"]'], ['value' => ''.$options.'']);
            $I->seeElement(['css' => '#comment_max_links'], ['value' => ''.$options.'']);
            $I->seeInField('input[name=comment_max_links]',  $options);
            $I->fillField(['id' => 'comment_max_links'], '4');
            $I->click('//*[@id="submit"]');
            $I->dontSeeInField(['name' => 'comment_max_links'], '3');

            # moderation_keys (textarea)
            $I->comment('--- TESTING :: Comment Moderation :: When a comment contains any of these words in its content, name, URL, email, or IP address, it will be held in the moderation queue.');

            $options = $I->grabTextFrom('textarea[name=moderation_keys]');
            $options_changed = trim(preg_replace('/\s+/', ' ', $options));
            $I->comment('--- DEBUG :: //*[@id="moderation_keys"] :: '.$options_changed.'');
            // YOU CAN USE ANY OF THESE TESTS
            $I->seeInField('textarea[name=moderation_keys]',  $options);
            $I->fillField("textarea[name=moderation_keys]", "Fellatio");
            $I->click('//*[@id="submit"]');
            $options = $I->grabTextFrom('textarea[name=moderation_keys]');
            $I->seeInField('textarea[name=moderation_keys]',  $options);


            // Comment Blacklist
            # blacklist_keys (textarea)

            /*
            192.168.1.2
            30.12.4.10
            123.13.7.13
            */

            $I->comment('--- TESTING :: When a comment contains any of these words in its content, name, URL, email, or IP address, it will be put in the trash. One word or IP address per line.');

            $options = $I->grabTextFrom('textarea[name=blacklist_keys]');
            $options_changed = trim(preg_replace('/\s+/', ' ', $options));
            $I->comment('--- DEBUG :: //*[@id="blacklist_keys"] :: '.$options_changed.'');
            // YOU CAN USE ANY OF THESE TESTS
            $I->seeInField('textarea[name=blacklist_keys]',  $options);
            $I->fillField("textarea[name=blacklist_keys]", "751.11.2.17");
            $I->click('//*[@id="submit"]');
            $options = $I->grabTextFrom('textarea[name=moderation_keys]');
            $I->seeInField('textarea[name=moderation_keys]',  $options);


            // Avatars
            # show_avatars (checkbox, checked)
            $I->comment('--- TESTING :: Avatars ::  Show Avatars :: checked');
            $I->seeCheckboxIsChecked('#show_avatars'); // YES checked
            $I->uncheckOption('#show_avatars');
            $I->click('//*[@id="submit"]');
            $I->comment('--- TESTING :: Avatars ::  Show Avatars :: unchecked');
            $I->dontSeeCheckboxIsChecked('#show_avatars'); // NO unchecked
            $I->comment('--- TESTING :: Avatars ::  Show Avatars :: checked again to proceed to more testing');
            $I->checkOption('#show_avatars');
            $I->click('//*[@id="submit"]');
            $I->seeCheckboxIsChecked('#show_avatars'); // YES checked


            // Maximum Rating
            # avatar_rating (radio, value G — Suitable for all audiences)
            $I->comment('--- TESTING :: Avatars ::  Maximum Rating');
            $options = $I->grabAttributeFrom('input[name=avatar_rating]', 'value');
            $I->comment('--- DEBUG :: input[name=avatar_rating] :: '.$options.'');
            $I->comment('--- TESTING :: Avatars ::  Maximum Rating :: default (G)');
            $I->seeOptionIsSelected('input[name=avatar_rating]', $options);
            $I->comment('--- TESTING :: Avatars ::  Maximum Rating :: change default (R)');
            $I->selectOption('input[name=avatar_rating]', array('value' => 'R'));
            $I->click('//*[@id="submit"]');
            $I->comment('--- TESTING :: Avatars ::  Maximum Rating :: no more default (G)');
            $I->dontSeeOptionIsSelected('input[name=avatar_rating]', array('value' => 'G'));
            $I->comment('--- TESTING :: Avatars ::  Maximum Rating :: back to default (G)');
            $I->selectOption('input[name=avatar_rating]', array('value' => 'G'));
            $I->click('//*[@id="submit"]');
            $options = $I->grabAttributeFrom('input[name=avatar_rating]', 'value');
            $I->comment('--- DEBUG :: input[name=avatar_rating] :: '.$options.'');
            $I->seeOptionIsSelected('input[name=avatar_rating]', $options);


            /*
            G
            PG
            R
            X
            array('value' => 'G', 'value' => 'PG', 'value' => 'R', 'value' => 'X')
            */



            // Default Avatar
            # avatar_default (radio, value Mystery Person)
            $I->comment('--- TESTING :: Avatars ::  For users without a custom avatar of their own, you can either display a generic logo or a generated one based on their email address.');
            $options = $I->grabAttributeFrom('input[name=avatar_default]', 'value');
            $I->comment('--- DEBUG :: input[name=avatar_default] :: '.$options.'');
            $I->comment('--- TESTING :: Avatars ::  Default Avatar :: default (mystery)');
            $I->seeOptionIsSelected('input[name=avatar_default]', $options);
            $I->comment('--- TESTING :: Avatars ::  Default Avatar :: change default (monsterid)');
            $I->selectOption('input[name=avatar_default]', array('value' => 'monsterid'));
            $I->click('//*[@id="submit"]');
            $I->comment('--- TESTING :: Avatars ::  Default Avatar :: no more default (mystery)');
            $I->dontSeeOptionIsSelected('input[name=avatar_default]', array('value' => 'mystery'));
            $I->comment('--- TESTING :: Avatars ::  Default Avatar :: back to default (mystery)');
            $I->selectOption('input[name=avatar_default]', array('value' => 'mystery'));
            $I->click('//*[@id="submit"]');
            $options = $I->grabAttributeFrom('input[name=avatar_default]', 'value');
            $I->comment('--- DEBUG :: input[name=avatar_default] :: '.$options.'');
            $I->seeOptionIsSelected('input[name=avatar_default]', $options);
            /*
            mystery
            blank
            gravatar_default
            identicon
            wavatar
            monsterid
            retro

            */

        }
        
        // Media
        public function checkOptionsMedia (AcceptanceTester $I) {
            $I->wantTo('Backoffice :: ensure that I can check and change Media Settings');


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

                // SETTING
                # Check some values from http://project.test/wordpress/wp-admin/options-media.phpoptions-media.php
                // Main Navigation
                $I->comment('--- TESTING :: Check options-media');


                // SETTING
                # Check some values from http://project.test/wordpress/wp-admin/options-reading.php
                # Click on Settings
                $I->click('//*[@id="menu-settings"]/ul/li[6]/a');

                # Check I am on /wp-admin/options-media.php
                $I->amOnPage('/wp-admin/options-media.php');

                # See Settings Page
                $I->see(MEDIA_SETTINGS_H1, '#wpbody-content > div.wrap > h1');

                // Image sizes

                // Thumbnail size Width
                $I->comment('--- TESTING :: Image sizes :: Thumbnail size :: Width (150)');
                $options = $I->grabAttributeFrom('//*[@id="thumbnail_size_w"]', 'value');
                $I->comment('--- DEBUG :: //*[@id="thumbnail_size_w"] :: '.$options.'');
                $I->seeInField('//*[@id="thumbnail_size_w"]', $options);

                // Thumbnail size Height
                $I->comment('--- TESTING :: Image sizes :: Thumbnail size :: Height (150)');
                $options = $I->grabAttributeFrom('//*[@id="thumbnail_size_h"]', 'value');
                $I->comment('--- DEBUG :: //*[@id="thumbnail_size_h"] :: '.$options.'');
                $I->seeInField('//*[@id="thumbnail_size_h"]', $options);

                // Crop thumbnail to exact dimensions (normally thumbnails are proportional)
                // thumbnail_crop


                # thumbnail_crop (checkbox, checked)
                $I->comment('--- TESTING :: Image sizes :: Crop thumbnail to exact dimensions (normally thumbnails are proportional :: checked)');
                $I->seeCheckboxIsChecked('#thumbnail_crop'); // YES checked
                $I->uncheckOption('#thumbnail_crop');
                $I->click('//*[@id="submit"]');
                $I->comment('--- TESTING :: Image sizes :: Crop thumbnail to exact dimensions (normally thumbnails are proportional :: unchecked');
                $I->dontSeeCheckboxIsChecked('#thumbnail_crop'); // NO unchecked
                $I->comment('--- TESTING :: Image sizes :: Crop thumbnail to exact dimensions (normally thumbnails are proportional :: checked again to proceed to more testing');
                $I->checkOption('#thumbnail_crop');
                $I->click('//*[@id="submit"]');
                $I->seeCheckboxIsChecked('#thumbnail_crop'); // YES checked

                // Medium size
                // medium_size_w
                // medium_size_h

                // Medium size Width
                $I->comment('--- TESTING :: Image sizes :: Medium size :: Width (300)');
                $options = $I->grabAttributeFrom('//*[@id="medium_size_w"]', 'value');
                $I->comment('--- DEBUG :: //*[@id="medium_size_w"] :: '.$options.'');
                $I->seeInField('//*[@id="medium_size_w"]', $options);

                // Medium size Height
                $I->comment('--- TESTING :: Image sizes :: Medium size :: Height (300)');
                $options = $I->grabAttributeFrom('//*[@id="medium_size_h"]', 'value');
                $I->comment('--- DEBUG :: //*[@id="medium_size_h"] :: '.$options.'');
                $I->seeInField('//*[@id="medium_size_h"]', $options);


                // Large size
                // large_size_w
                // large_size_h

                // Large size Width
                $I->comment('--- TESTING :: Image sizes :: Large size :: Width (1024)');
                $options = $I->grabAttributeFrom('//*[@id="large_size_w"]', 'value');
                $I->comment('--- DEBUG :: //*[@id="large_size_w"] :: '.$options.'');
                $I->seeInField('//*[@id="large_size_w"]', $options);

                // Medium size Height
                $I->comment('--- TESTING :: Image sizes :: Large size :: Height (1024)');
                $options = $I->grabAttributeFrom('//*[@id="large_size_h"]', 'value');
                $I->comment('--- DEBUG :: //*[@id="large_size_h"] :: '.$options.'');
                $I->seeInField('//*[@id="large_size_h"]', $options);

                // Uploading Files
                //  Organize my uploads into month- and year-based folders
                // uploads_use_yearmonth_folders


                $I->comment('--- TESTING :: Uploading Files :: Organize my uploads into month- and year-based folders :: checked)');
                $I->seeCheckboxIsChecked('#uploads_use_yearmonth_folders'); // YES checked
                $I->uncheckOption('#uploads_use_yearmonth_folders');
                $I->click('//*[@id="submit"]');
                $I->comment('--- TESTING :: Uploading Files :: Organize my uploads into month- and year-based folders :: unchecked');
                $I->dontSeeCheckboxIsChecked('#uploads_use_yearmonth_folders'); // NO unchecked
                $I->comment('--- TESTING :: Uploading Files :: Organize my uploads into month- and year-based folders :: checked again to proceed to more testing');
                $I->checkOption('#uploads_use_yearmonth_folders');
                $I->click('//*[@id="submit"]');
                $I->seeCheckboxIsChecked('#uploads_use_yearmonth_folders'); // YES checked


        
        }

        // Permalink
        public function checkOptionsPermalink (AcceptanceTester $I) {
            $I->wantTo('Backoffice :: ensure that I can check and change Permalink Settings');

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

                # Click on Permalink Settings
                $I->comment("--- Check the values for Permalink Settings");
                $I->click('//*[@id="menu-settings"]/ul/li[7]/a');
                # Check I am on /wp-admin/options-permalink.php
                $I->amOnPage('/wp-admin/options-permalink.php');

                # See General Settings
                // $I->see('General Settings', '#wpbody-content > div.wrap > h1');
                // $I->see('Réglages généraux', '#wpbody-content > div.wrap > h1');
                $I->see(PERMALINK_SETTINGS_H1, '#wpbody-content > div.wrap > h1');


                // $I->dontSeeOptionIsSelected('input[name=selection]', '/%year%/%monthnum%/%postname%/');

                // $permalink_structure = $I->grabTextFrom('input[name="selection"]');
                // $I->selectOption("input[name=selection]", $permalink_structure);
                // $I->comment("\n--- DEBUG :: input[name=selection] :: $permalink_structure ");
                // $I->seeOptionIsSelected('input[name=selection]', $permalink_structure);



                // Plain # [empty]
                // // Day and name # /%year%/%monthnum%/%day%/%postname%/
                // // Month and name # /%year%/%monthnum%/%postname%/
                // // Numeric # /archives/%post_id%
                // // Post name # /%postname%/
                // // Custom Structure # custom
                $I->comment("check the value selected");
                $I->seeInField('//*[@id="permalink_structure"]','/%year%/%monthnum%/%day%/%postname%/');



        
        }

        // Privacy
        public function checkOptionsPrivacy (AcceptanceTester $I) {
            $I->wantTo('Backoffice :: ensure that I can check and change Privacy Settings');
            

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

                # Click on Permalink Settings
                $I->comment("--- Check the values for Privacy Settings");
                $I->click('//*[@id="menu-settings"]/ul/li[8]/a');
                # Check I am on /wp-admin/options-permalink.php
                $I->amOnPage('/wp-admin/privacy.php');

                # See General Settings
                // $I->see('General Settings', '#wpbody-content > div.wrap > h1');
                // $I->see('Réglages généraux', '#wpbody-content > div.wrap > h1');
                $I->see(PRIVACY_SETTINGS_H1, '#wpbody-content > div.wrap > h1');

                $I->comment("\n--- NO TEST the page exists, that's all folks!");


        }


}

```


``` bash
# be sure to be at the root of your project
cd /Applications/MAMP/htdocs/wordpress

# generate the testing Class CheckWpBackCreatePost in a file named CheckWpBackCreatePostCest.php
php vendor/bin/codecept generate:cest acceptance CheckWpBackCreatePost

# to run the test with steps
php vendor/bin/codecept run --steps acceptance CheckWpBackCreatePostCest


```


``` ruby
#Case_1_post_creation.feature
Feature: Case_1_post_creation
In order to login into my WP website
As an user
I need to know my credentials

  Background:
    Given I have a wordpress installation with one user admin
      | user_login | user_pass | user_email     | role          |
      | admin      | admin     | admin@test.com | administrator |

  #Scenario: try Case_1_post_creation
  Scenario: A valid user access to the platform
     When I am on "/wp-login.php"
      And I fill in "#user_login" with "admin"
      And I fill in "#user_pass" with "admin"
      And I press "#wp-submit"
      And I should be on "/wp-admin/"
      And I see "Dashboard"

 Scenario: A valid user create an article
    When I am on "/wp-admin/"
      And I press "Posts"
      And I see "Posts"
      And I press "Add New"
      # I am about to fill the post form with a random value generated
      And I fill in "#title" with "Test title article Cept <generateRandomString>"
      And I fill in "#content" with "Test content article Cept <generateRandomString>"
      And I press "#publish"
      And I press "View Post"
      And I see "Test content article Cept"
```


``` php
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
php vendor/bin/codecept run --steps acceptance CheckWpBackCreatePostCest
php vendor/bin/codecept run -vvv --steps acceptance CheckWpBackCreatePostCest
php vendor/bin/codecept run --debug --steps acceptance CheckWpBackCreatePostCest

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

        // extra functions
        function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }//EOF



class CheckWpBackCreatePostCest
{
        

    
    public function createPostNew (AcceptanceTester $I)
    {

        /* LOGIN */
        $I->wantTo('ensure that I publish a post and test a shortcode');

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

        $I->comment("\n--- POST");
        // Click on Posts
        $I->click(WP_MENU_NAME_LABEL_POSTS, '//*[@id="menu-posts"]/a');
        $I->see(WP_MENU_NAME_LABEL_POSTS, '//*[@id="wpbody-content"]/div[3]/h1');
        
        // Add a post
        $I->click(POST_NEW_LABEL);
        $I->see(POST_NEW_TITLE);

        // Add a title for Post
        $I->fillField('#title', 'Test title article Cept '.generateRandomString().'');
        
        // Add a content for Post
        $I->fillField('#content', 'Test content article Cept '.generateRandomString().' ');
        
        // Publish
        $I->click('#publish');
        $I->click(POST_VIEW_POST_LABEL);

        // Post with no plugin
        $I->see('Test content article Cept');
        


    }
}

```


``` php
                    // Add [codecept_welcome_msg] in a post
                    public function codeceptWelcomeMsg ($content) {
                        return $content .= '<b>Testing WordPress with CODECEPTION_ using a WordPress plugin. <br>Shortcode plugin codeception_insert_shortcode</b><br><b>Using [codecept_welcome_msg], add to $content</b><br>';

                    }
```


``` bash

# Go to the project directory
cd /Applications/MAMP/htdocs/wordpress

# Create the file for the shortcode test
php vendor/bin/codecept generate:cest acceptance CheckWpBackCreateShortcodePost


# Launch the test
php vendor/bin/codecept run --steps acceptance CheckWpBackCreateShortcodePostCest

```

``` php
        
        // Post with plugin codeception_insert_shortcode
        // Failed if plugin is desactivated or Succeeded if plugin is activated check codeception_insert_shortcode.php plugin
        
        // Succeeded
        $I->see('Testing WordPress with CODECEPTION_ using a WordPress plugin.');

        // Failed
        // $I->see('Testing WordPress with CODECEPTION_ using a WordPress plugin. WRONG');
        
```



``` bash

# Be sure to be at the root of your project
cd /Applications/MAMP/htdocs/wordpress

# Generate the testing Class CheckWpBackCreateAdvancedPost in a file named CheckWpBackCreateAdvancedPostCest.php
php vendor/bin/codecept generate:cest acceptance CheckWpBackCreateAdvancedPost

# To run the test with steps
php vendor/bin/codecept run --steps acceptance CheckWpBackCreateAdvancedPostCest

```

``` yml
Animation
Artificial Intelligence
Business Computing
Communications
Databases
Ethics
Green IT
Hypermedia
Tech
Video
```


``` yml
Test, Testing, WordPress, Backoffice, Frontoffice,
Creation, Blog, PHP,  Codeception, Development,
Q/A, Agile, Continuous integration, Product Owner,
User story, Gherkin, Tutorial
```

``` php
        // select categories for Post
        // XPATH selector
        // $I->checkOption('//*[@id="in-category-4"]'); // Communications
        // $I->checkOption('//*[@id="in-expertises-8"]'); // Databases
        // $I->checkOption('//*[@id="in-expertises-12"]'); // Ethics
        // $I->checkOption('//*[@id="in-expertises-7"]'); // Green IT
        // $I->checkOption('//*[@id="in-expertises-5"]'); // Video



        // CSS selector
        $I->checkOption('#in-category-4'); // Communications
        $I->checkOption('#in-category-8'); // Databases
        $I->checkOption('#in-category-12'); // Ethics
        $I->checkOption('#in-category-7'); // Green IT
        $I->checkOption('#in-category-5'); // Video
        
        // Required the plugin Simple Tags for WordPress
        // https://wordpress.org/plugins/simple-tags/
        $I->fillField('textarea[name=adv-tags-input]', 'Test, Testing, WordPress, Backoffice, Frontoffice, Creation, Blog, PHP,  Codeception, Development, Q/A, Agile, Continuous integration, Product Owner, User story, Gherkin, Tutorial');
        
```


``` bash
# Be sure to be at the root of your project
cd /Applications/MAMP/htdocs/wordpress

# Generate the testing Class CheckWpBackCreateAdvancedPostPlus in a file named CheckWpBackCreateAdvancedPostPlusCest.php
php vendor/bin/codecept generate:cest acceptance CheckWpBackCreateAdvancedPostPlus

# To run the test with steps
php vendor/bin/codecept run --steps acceptance CheckWpBackCreateAdvancedPostPlusCest

```

``` php
        // select categories for Post
        // XPATH selector
        /*
        foreach (POST_CATEGORY_CHECKLIST as $locator) {
            $I->checkOption($locator);
        }
          */
          
        // CSS selector
        foreach (POST_CATEGORY_CHECKLIST as $locator) {
            $I->checkOption($locator);
          }
          
        // Required the plugin Simple Tags for WordPress
        // https://wordpress.org/plugins/simple-tags/
        $I->fillField('textarea[name=adv-tags-input]', POST_TAGS_LIST);
        // Publish
        $I->click('#publish');

        // Add a content for Post
        $I->click(POST_VIEW_POST_LABEL);
        
        // Post with no plugin
        $I->lookForwardTo('to have a complete Post with Tags and Categories');
        $I->see('Test title article Cept');
        $I->see('Test content article Cept');
```


```php
//Datas for advanced post CheckWpBackCreateAdvancedPostPlusCest.php

// Works as of PHP 7
    /*
            First set of post's categories and tags
    */
/*
define('POST_CATEGORY_CHECKLIST', array(
    '#in-category-4',
    '#in-category-8',
    '#in-category-12',
    '#in-category-7',
    '#in-category-5'
));

define('POST_TAGS_LIST', 'Test, Testing, WordPress, Backoffice, Frontoffice, Creation, Blog, PHP,  Codeception, Development, Q/A, Agile, Continuous integration, Product Owner, User story, Gherkin, Tutorial');

*/

/*
            Second set of post's categories and tags
    */


define('POST_CATEGORY_CHECKLIST', array(
    '#in-category-3',
    '#in-category-9',
    '#in-category-6',
    '#in-category-12',
    '#in-category-11'
));

define('POST_TAGS_LIST', 'WordPress, Plugin, Drupal, PHP, Development, CI, Cypress, Feature, Gherkin, Laravel, Symfony, OOP');

```



``` bash

# Be sure to be at the root of your project
cd /Applications/MAMP/htdocs/wordpress

# Generate the testing Class CheckWpBackAddPostCategory in a file named CheckWpBackAddPostCategoryCest.php
php vendor/bin/codecept generate:cest acceptance CheckWpBackAddPostCategory

# To run the test with steps
php vendor/bin/codecept run --steps acceptance CheckWpBackAddPostCategoryCest


```


``` php

        $I->comment("\n--- CATEGORY");
        // Add a category
        $I->click(CATEGORIES_NEW_LABEL);
        $I->see(CATEGORIES_NEW_TITLE);

        // Add a category name
        $I->fillField('#tag-name', 'Test category name Cept '.generateRandomString().'');

        // Add a category description
        $I->fillField('#tag-description', 'Test category description Cept '.generateRandomString().'');
        
    
        // Publish
        $I->click('#submit');
        
        $I->lookForwardTo('Have a new Category added');

```


``` bash
# Be sure to be at the root of your project
cd /Applications/MAMP/htdocs/wordpress

# Generate the testing Class CheckWpBackAddPostCategory in a file named CheckWpBackAddPostCategoryCest.php
php vendor/bin/codecept generate:cest acceptance CheckWpBackAddPostTag

# To run the test with steps
php vendor/bin/codecept run --steps acceptance CheckWpBackAddPostTagCest

```


``` php
        $I->comment("\n--- TAGS");
        // Add a category
        $I->click(TAGS_NEW_LABEL);
        $I->see(TAGS_NEW_TITLE);

        // Add a category name
        $I->fillField('#tag-name', 'Test tag name Cept '.generateRandomString().'');

        // Add a category description
        $I->fillField('#tag-description', 'Test tag description Cept '.generateRandomString().'');
    
        // Publish
        $I->click('#submit');
        
        $I->lookForwardTo('Have a new Tag added');
```


``` bash

# Be sure to be at the root of your project
cd /Applications/MAMP/htdocs/wordpress

# Generate the testing Class CheckWpBackDeletePostCategory in a file named CheckWpBackDeletePostCategoryCest.php
php vendor/bin/codecept generate:cest acceptance CheckWpBackDeletePostCategory

# To run the test with steps
php vendor/bin/codecept run --steps acceptance CheckWpBackDeletePostCategoryCest
                                                

```



``` php
        $I->comment("\n--- DELETE CATEGORY");
        
        /* Add new category and save it */
        // Add a category
        $I->click(CATEGORIES_NEW_LABEL);
        $I->see(CATEGORIES_NEW_TITLE);


            for( $i = 0; $i<5; $i++ ) {
                // Add a category name
                $I->fillField('#tag-name', ''.$i.' Test category name Cept');
                // Add a category description
                $I->fillField('#tag-description', ''.$i.' Test category description Cept');
                // Publish
                $I->click('#submit');
                $I->lookForwardTo('Add category: '.$i.' Test category name Cept');
                $I->click(''.$i.' Test category name Cept', '.row-title');
                $I->click("Delete", "#delete-link > a");
                $I->lookForwardTo('Delete category: '.$i.' Test category name Cept');
            }
```



``` bash
# Be sure to be at the root of your project
cd /Applications/MAMP/htdocs/wordpress

# Generate the testing Class CheckWpBackDeletePostTag in a file named CheckWpBackDeletePostTagCest.php
php vendor/bin/codecept generate:cest acceptance CheckWpBackDeletePostTag

# To run the test with steps
php vendor/bin/codecept run --steps acceptance CheckWpBackDeletePostTagCest

```

``` php
        $I->comment("\n--- DELETE POST TAG");
        
        /* Add new tag and save it */
        $I->click(TAGS_NEW_LABEL);
        $I->see(TAGS_NEW_TITLE);


            for( $i = 0; $i<5; $i++ ) {
                // Add a category name
                $I->fillField('#tag-name', ''.$i.' Test tag name Cept');
                // Add a category description
                $I->fillField('#tag-description', ''.$i.' Test tag description Cept');
                // Publish
                $I->click('#submit');
                $I->lookForwardTo('Add category: '.$i.' Test tag name Cept');
                $I->click(''.$i.' Test tag name Cept', '.row-title');
                $I->click("Delete", "#delete-link > a");
                $I->lookForwardTo('Delete category: '.$i.' Test tag name Cept');
            }

```

``` bash

# Be sure to be at the root of your project
cd /Applications/MAMP/htdocs/wordpress

# Generate the testing Class CheckWpBackUploadNewMedia in a file named CheckWpBackUploadNewMediaCest.php
php vendor/bin/codecept generate:cest acceptance CheckWpBackUploadNewMedia

# To run the test with steps
php vendor/bin/codecept run --steps acceptance CheckWpBackUploadNewMediaCest

```

``` bash
# the defaulkt path for the sample images used for upload
# Image 1
/Applications/MAMP/htdocs/wordpress/tests/_data/pictures/cobweb_with_raindrops.jpg
# Image 2
/Applications/MAMP/htdocs/wordpress/tests/_data/pictures/southern_hawker_golden_ringed_dragonfly.jpg
```


``` bash
# Be sure to be at the root of your project
cd /Applications/MAMP/htdocs/wordpress

# Generate the testing Class CheckWpBackNewPluginUploadZipInstall in a file named CheckWpBackNewPluginUploadZipInstallCest.php
php vendor/bin/codecept generate:cest acceptance CheckWpBackNewPluginUploadZipInstall

# To run the test with steps
php vendor/bin/codecept run --steps acceptance CheckWpBackNewPluginUploadZipInstallCest



```

``` bash

# Be sure to be at the root of your project
cd /Applications/MAMP/htdocs/wordpress

# Generate the testing Class CheckWpBackPluginActivationDesactivation in a file named CheckWpBackPluginActivationCest.php
php vendor/bin/codecept generate:cest acceptance CheckWpBackPluginActivation

# Play it
php vendor/bin/codecept run --steps acceptance CheckWpBackPluginActivationCest

```

``` php
        // Grab id from input from the page WP plugins inactive
        $inputCheckboxPlugin = $I->grabMultiple('input', 'id');
        $PluginLabelName = $I->grabMultiple('input','value');

```

``` php
// Loop to check the active plugins list, see /Applications/MAMP/htdocs/wordpress/tests/_data/languages/en.php
                $I->comment("\n--- Check the ACTIVATION PLUGINS LIST");
                $I->expect('to see activated plugins I have in my list');
                foreach (PLUGINS_ACTIVE_BULK_ACTION_CHECKLIST as $pluginTitle) {
                    $I->see($pluginTitle);
                }
```

``` php
define('PLUGINS_ACTIVE_BULK_ACTION_CHECKLIST', array(
// 'Debug Bar', // make it fails
'Classic Editor',
'codeception_modify_header_footer',
'Hello Dolly'
));
```

``` php
define('PLUGINS_INACTIVE_BULK_ACTION_CHECKLIST', array(
// 'Debug Bar', // make it fails
'Classic Editor',
'codeception_modify_header_footer',
'Hello Dolly'
));


```


``` bash

# Be sure to be at the root of your project
cd /Applications/MAMP/htdocs/wordpress

# Generate the testing Class CheckWpBackPluginDeactivation in a file named CheckWpBackPluginDeactivationCest.php
php vendor/bin/codecept generate:cest acceptance CheckWpBackPluginDeactivation

# Play it
php vendor/bin/codecept run --steps acceptance CheckWpBackPluginDeactivationCest



```


``` php
define('PLUGINS_ACTIVE_BULK_ACTION_CHECKLIST', array(
'Debug Bar', // make it fails
'Classic Editor',
'codeception_modify_header_footer',
'Hello Dolly'
));
```

``` php
define('PLUGINS_INACTIVE_BULK_ACTION_CHECKLIST', array(
'Debug Bar', // make it fails
'Classic Editor',
'codeception_modify_header_footer',
'Hello Dolly'
));


```

``` bash
# Be sure to be at the root of your project
cd /Applications/MAMP/htdocs/wordpress

# Generate the testing Class CheckWpBackNewPluginSearchAndInstallPluginsDirectory in a file named CheckWpBackNewPluginSearchAndInstallPluginsDirectoryCest.php
php vendor/bin/codecept generate:cest acceptance CheckWpBackNewPluginSearchAndInstallPluginsDirectory

# Play it
php vendor/bin/codecept run --steps acceptance CheckWpBackNewPluginSearchAndInstallPluginsDirectoryCest


```

``` bash

# Be sure to be at the root of your project
cd /Applications/MAMP/htdocs/wordpress

#case 1
php vendor/bin/codecept generate:cest acceptance CheckWpBackNewThemeUploadZipInstall
#case 2
php vendor/bin/codecept generate:cest acceptance CheckWpBackNewThemeUploadZipInstallPlus
#case 3
php vendor/bin/codecept generate:cest acceptance CheckWpBackNewThemeSearchThemesDirectory


# Play it

#case 1
php vendor/bin/codecept run --steps acceptance CheckWpBackNewThemeUploadZipInstallCest
#case 2
php vendor/bin/codecept run --steps acceptance CheckWpBackNewThemeUploadZipInstallPlusCest

#case 3
php vendor/bin/codecept run --steps acceptance CheckWpBackNewThemeSearchThemesDirectoryCest

```

```php
define('THEMES_TESTING_SOURCE', 'files/aaa-ladybird-prisca.zip');
```

```php

// // Send a Theme file in zip format
        // // the file need to be in the directory /tests/_data
        $I->attachFile('//*[@id="themezip"]', THEMES_TESTING_SOURCE);



```

```php

define('THEMES_TESTING_SOURCE_LABEL', 'aaa-ladybird-prisca');

```

```php
// Check the Themes list
        $I->expect('to see the list of themes including the one I have just installed');
        // Grab div, data-slug from the page WP theme including the active theme
        $titleThemeDataSlug = $I->grabMultiple('h2', 'id');
        // theme-name
        // Get rid of the empty line
            $titles = array_filter($titleThemeDataSlug);
            $titles = str_replace("-name","",$titles);
            // print_r($titleThemeDataSlug);

            foreach ($titles as $key => $title) {

                // Ugly exception
                if ($title == '{{ data.id }}') {
                    // do nothing
                } else {
                    // Just show the real theme name
                    $I->expect('to see the theme: '.$title.' ');
                }

            }

        $I->see(THEMES_TESTING_SOURCE_LABEL);

```

```php
define('THEMES_TESTING_SEARCH_WORD', 'Mobile responsive');
```


```php

        $I->expect('to launch a search on the WP themes directory');
        // $I->submitForm('.search-form', ['#wp-filter-search-input' => 'Minimalist']);
        $I->submitForm('.search-form', ['#wp-filter-search-input' => THEMES_TESTING_SEARCH_WORD]);
        $I->lookForwardTo('to have some results and a theme count different of zero.');


```

``` yml
Marina McClure
Harvey DuBuque
Marcelle Rice
Madison Murazik
Doug Green
Kathlyn Cronin
Clementine Emard
Nannie Bruen
Hipolito Thiel
Elna Balistreri
```

``` yml
Animation
Artificial Intelligence
Business Computing
Communications
Databases
Ethics
Green IT
Hypermedia
Tech
Video
```


``` yml
Chinese
Spanish
English
Hindi
Arabic
Portuguese
Bengali
Russian
Japanese
Turkish
```

``` html

<!-- Name -->
Marina McClure

<!-- Social -->
Twitter: @marinamcclure
Facebook: marina.mcclure
Linkedin: marina.mcclure

<!-- Body -->
Body Marina McClure - Praesent non dolor tellus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis quis velit enim. Ut vitae tortor viverra, ultricies purus sit amet, accumsan justo. Donec congue purus finibus nunc egestas pharetra. Mauris aliquet sollicitudin interdum. Suspendisse ac ex lobortis, pretium metus at, egestas dolor. In varius feugiat venenatis. Sed scelerisque, velit id placerat dignissim, arcu ante convallis turpis, ut rutrum augue sem et dui. Duis convallis lacinia tortor, non cursus nulla tincidunt in. Pellentesque leo massa, tempor sit amet tincidunt eu, convallis nec augue. Aliquam at nulla eget sapien porta vehicula id ac nulla. Ut gravida facilisis convallis. Vestibulum volutpat leo libero, eget pretium arcu pharetra sit amet. Fusce elementum sem diam, nec dignissim arcu bibendum eget.

Donec elit risus, bibendum vel turpis in, blandit varius arcu. In faucibus orci ac purus eleifend porttitor. Cras varius sed augue fermentum eleifend. Aenean pellentesque enim id mollis cursus. Duis facilisis justo vitae lacus volutpat, quis sollicitudin nibh auctor. Vestibulum viverra turpis et enim auctor lacinia. Nunc commodo consequat orci a elementum. Etiam quis scelerisque turpis. Etiam faucibus feugiat diam vel condimentum. Donec enim ligula, dictum at cursus sit amet, sagittis in enim.

<!-- Excerpt -->
Excerpt Marina McClure - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ullamcorper consequat mattis. Duis porta finibus massa, a rhoncus purus eleifend in.

<!-- Expertises -->
Expertises: Animation, Business Computing, Databases, Green IT

<!-- Languages -->
Languages: Arabic, Chinese, Portuguese, Turkish


```

``` bash
# For the CPT journalists

# To show the CPT, make a copy of single.php, rename as single-{CPT}.php, add to the theme e.g single-journalists.php
single-{CPT}.php

# To show the CPT, make a copy of single.php, rename as archive-{CPT}.php, add to the theme e.g archive-journalists.php
archive-{CPT}.php

# For the CT expertises and languages

# To show the CPT, make a copy of taxonomy.php, rename as taxonomy-{CT}.php, add to the theme e.g taxonomy-expertises.php, taxonomy-languages.php
taxonomy-{CT}.php

```

``` bash

#main pages for journalists
/Applications/MAMP/htdocs/wordpress/wp-content/themes/twentyseventeen/single-journalists.php
/Applications/MAMP/htdocs/wordpress/wp-content/themes/twentyseventeen/archive-journalists.php

#main pages for the taxonomies expertises and languages
/Applications/MAMP/htdocs/wordpress/wp-content/themes/twentyseventeen/taxonomy-expertises.php
/Applications/MAMP/htdocs/wordpress/wp-content/themes/twentyseventeen/taxonomy-languages.php


# template-parts for journalist
/Applications/MAMP/htdocs/wordpress/wp-content/themes/twentyseventeen/template-parts/post/content-journalist.php
```




``` php
the_post_thumbnail('thumbnail');       // Thumbnail (default 150px x 150px max)
the_post_thumbnail('medium');          // Medium resolution (default 300px x 300px max)
the_post_thumbnail('medium_large');    // Medium Large resolution (default 768px x 0px max)
the_post_thumbnail('large');           // Large resolution (default 1024px x 1024px max)
the_post_thumbnail('full');            // Original image resolution (unmodified)

the_post_thumbnail( array(100,100) );  // Other resolutions
```


``` bash
# Be sure to be at the root of your project
cd /Applications/MAMP/htdocs/wordpress


# add a full profile and expertises and languages except avatar
php vendor/bin/codecept generate:cest acceptance CheckWpBackAddAJournalistProfile

# play it
php vendor/bin/codecept run --steps acceptance CheckWpBackAddAJournalistProfileCest



```

``` php
        $inputCheckboxValues = $I->grabMultiple('input', 'id');
        $matches = array_filter($inputCheckboxValues);

         $I->comment("DEBUG :: required ACF plugin activated :: twitter_account, facebook_account, linkedin_account");


        foreach ($matches as $key => $match) {


            // Filter and select random among expertises. Check for string in-expertises-
            if (preg_match("#in-expertises-#", $match))
            {
                $match = '#'.$match;
                $I->expect('to choose the expertise: '.$match.' ');
                $I->checkOption($match); // Check option

            }
            
            // Filter and select random among languages. Check for string in-languages-
            if (preg_match("#in-languages-#", $match))
            {
                $match = '#'.$match;
                $I->expect('choose among languages: '.$match.' ');
                $I->checkOption($match); // Check option
            }

            // FILL CUSTOM VAR FOR JOURNALIST
            // var_dump($match);
            if (preg_match("#acf-field_#", $match))
            {
            
            $acf_group_id = str_replace('acf-field_', '', $match);
            $acf_group_id = trim($acf_group_id);
            $acf_group_id = 'div.acf-field.acf-field-text.acf-field-'.$acf_group_id.'';
            //var_dump($acf_group_id);



            $dataName = $I->grabAttributeFrom($acf_group_id, 'data-name');
            // var_dump($dataName);

                $match = '#'.$match;
                $I->expect('to fill the custom var '.$dataName.' for journalist: '.$match.' ');

                $I->fillField($match, 'Test journalist profile '.$dataName.' Cept '.generateRandomString().'');
            }


        }//EOL

```


``` html

<!-- codeception_modify_header_footer -->
<!-- cp-source-code-testing-value-header -->



<!-- codeception_modify_header_footer -->
<!-- cp-source-code-testing-value-footer -->


```

``` html

<!-- codeception_check_homepage -->
<!-- codecept-source-code-testing-value-homepage-ok -->

```


``` html

<!-- codeception_check_homepage -->
<!-- codecept-source-code-testing-value-homepage-ko -->
```

``` bash
# Be sure to be at the root of your project
cd /Applications/MAMP/htdocs/wordpress

# check the codeception_check_homepage plugin's impact on Front
# Generate the testing Class CheckWpFrontTargetHomepage in a file named CheckWpFrontTargetHomepageCest.php
php vendor/bin/codecept generate:cest acceptance CheckWpFrontTargetHomepage

# To run the test with steps
php vendor/bin/codecept run --steps acceptance CheckWpFrontTargetHomepage



```

``` php
public function checkExistingLMainNavigation (AcceptanceTester $I)  {
        $I->wantTo('Frontoffice :: ensure the main navigation is existing');
        $I->amOnPage(self::BASE_URL_LINK);
        $mainnavLinks = $I->grabMultiple('li', 'id');
        // Remove empty
        $mainnavLinks = array_filter($mainnavLinks);
        // print_r($mainnavLinks);
        // $mainnavLinksLabel = $I->grabMultiple('a', 'href');
        // print_r($mainnavLinksLabel);

        // print_r($mainnavLinks);
        foreach ($mainnavLinks as $key => $link) {
            // print_r($link);
            $I->comment("\n--- CHECK EACH LINK IN MAIN NAVIGATION");
            $I->click('#'.$link.'');
        }//EOL

        $I->lookForwardTo('to test the source code for some pages');
    }

```

``` php
        public function checkDistinctHomepageFromOtherPages (AcceptanceTester $I) {
        // Frontoffice
        // Try to see "Just another WordPress site"
        $I->wantTo('Frontoffice :: perform actions and see result');
        $I->amOnPage(self::BASE_URL_LINK);
        $I->comment("\n--- HOMEPAGE");
        $I->expect('to see source on the Homepage');
        $I->seeInSource(self::PLUGIN_CHECK_HOMEPAGE_SEEINSOURCE);
        
        $I->comment("\n--- MAIN NAVIGATION");
        
        foreach (PLUGIN_CHECK_HOMEPAGE_PAGES_CHECKLIST_LABEL as $key => $pageLabel) {
                    // $I->comment('DEBUG :: '.$pageLabel.' '.PLUGIN_CHECK_HOMEPAGE_PAGES_CHECKLIST_SLUG[$key].' ');
                    $I->comment("\n--- For ".$pageLabel."");
                    $I->expect('to see source on '.$pageLabel.' Page');
                    $I->click($pageLabel);
                    $I->amOnPage(PLUGIN_CHECK_HOMEPAGE_PAGES_CHECKLIST_SLUG[$key]);
                    $I->seeInSource(self::PLUGIN_CHECK_HOMEPAGE_DONTSEEINSOURCE);
                    $I->moveBack(1);
            
                }
        $I->lookForwardTo('have ensure that I can distinct Homepage from the other pages');
```




``` bash

# Be sure to be at the root of your project
cd /Applications/MAMP/htdocs/wordpress

# check journalist listing page and a full profile with expertises and languages for one journalist.
# Generate the testing Class CheckWpFrontJournalistProfileArchiveDetails in a file named CheckWpFrontJournalistProfileArchiveDetailsCest.php
php vendor/bin/codecept generate:cest acceptance CheckWpFrontJournalistProfileArchiveDetails

# To run the test with steps
php vendor/bin/codecept run --steps acceptance CheckWpFrontJournalistProfileArchiveDetails

```



``` html

<!--  plugin codeception_journalist_extended_profile  -->
<div class="entry-meta">

<!-- post_meta twitter_account -->
<b>Twitter:</b>&nbsp;<a href="https://www.twitter.com/@ElnaBalistreri" target="_blank"  >@ElnaBalistreri</a><br>


<!-- post_meta facebook_account -->
<b>Facebook:</b>&nbsp;<a href="https://www.facebook.com/Elna.Balistreri" target="_blank"  >Elna.Balistreri</a><br>

<!-- post_meta linkedin_account -->
<b>Linkedin:</b>&nbsp;<a href="https://www.linkedin.com/in/ElnaBalistreri" target="_blank"  >ElnaBalistreri</a><br>
</div><br>

<!-- custom_taxonomy expertises -->

<b>Expertises:</b> <a href="http://codecept.mydomain.priv/wordpress/expertises/communications/" rel="tag" aria-label="Communications">Communications</a>&nbsp; <a href="http://codecept.mydomain.priv/wordpress/expertises/databases/" rel="tag" aria-label="Databases">Databases</a>&nbsp; <a href="http://codecept.mydomain.priv/wordpress/expertises/green-it/" rel="tag" aria-label="Green IT">Green IT</a>&nbsp;<br>

<!-- custom_taxonomy languages -->
<b>Expertises:</b> <a href="http://codecept.mydomain.priv/wordpress/languages/arabic/" rel="tag" aria-label="Arabic">Arabic</a>&nbsp; <a href="http://codecept.mydomain.priv/wordpress/languages/bengali/" rel="tag" aria-label="Bengali">Bengali</a>&nbsp; <a href="http://codecept.mydomain.priv/wordpress/languages/portuguese/" rel="tag" aria-label="Portuguese">Portuguese</a>&nbsp;<br>
<hr>
<!-- // plugin codeception_journalist_extended_profile -->

```


``` html
<!-- custom_taxonomy expertises -->
<b>Expertises:</b> <a href="http://codecept.mydomain.priv/wordpress/expertises/communications/" rel="tag" aria-label="Communications">Communications</a>&nbsp; <a href="http://codecept.mydomain.priv/wordpress/expertises/databases/" rel="tag" aria-label="Databases">Databases</a>&nbsp; <a href="http://codecept.mydomain.priv/wordpress/expertises/green-it/" rel="tag" aria-label="Green IT">Green IT</a>&nbsp;<br>
```


