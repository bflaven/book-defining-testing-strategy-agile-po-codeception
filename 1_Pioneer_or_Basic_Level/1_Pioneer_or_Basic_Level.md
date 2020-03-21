# 1 Pioneer or Basic Level

**This file is designed to facilitate understanding and eventual cut-paste for code chunks appearing in chapter "1 Pioneer or Basic Level" of the book "Defining a testing automation strategy for a P.O. with CODECEPTION_ & WordPress"**


## Commmands from the video

```diff
+ BOOK

Book #2

Defining a testing automation strategy for a P.O 
with CODECEPTION_ & WordPress 
(The continuous learning trilogy Book 2)

https://github.com/bflaven/book-defining-testing-strategy-agile-po-codeception

https://www.amazon.com/dp/B0864VS2Y6/


+ ENVIRONMENT

- local LAMP
MAMP Download

- access to localhost
http://localhost/ or http://127.0.0.1/

- access to phpMyAdmin
http://localhost/phpMyAdmin/

- editor 1
Sublime Text Download
https://www.sublimetext.com/

- editor 2
Visual Studio Code Download
https://code.visualstudio.com/download


+ WP

- CMS
Worpresss Download
https://wordpress.org/download/

- 1 -  create a custom URL
# add for the testing session for the video
127.0.0.1 codecept2.mydomain.priv


- 2 -  install WP
--- mysql
dbname: demo_cp_test_site
root:root

--- mysite
demo_cp_test_site
admin:admin
admin@test.com



+ WORKING CODECEPTION (CP)

- CODECEPTION (CP)
Codeception Install
https://codeception.com/install

--- cd /Applications/MAMP/htdocs/wordpress/
- cd /Applications/MAMP/htdocs/wordpress-demo


--- url: http://codecept.mydomain.priv/wordpress
- url: http://codecept2.mydomain.priv/wordpress-demo/


- with phar
php codecept.phar g:cest acceptance First


- with composer
php vendor/bin/codecept g:cest acceptance First

```
## Commmands from the book

```bash
# add for the testing session
127.0.0.1 codecept.mydomain.priv

# add for the testing session
127.0.0.1 wp.codecept.flaven.fr.priv

# add for the testing session
127.0.0.1 wp.flaven.fr.priv

```


```bash
sudo -s
#get the password for admin
vi /etc/hosts
```



``` bash
# Go to the project directory in your MAMP installation
cd /Applications/MAMP/htdocs/wordpress/
# Copy and paste the file `codecept.phar` in  this directory

# just to check we are in WP
pwd

#Just to check if php is OK
php -v

```


``` bash
# Initialize test classes inside the root of your project
php codecept.phar bootstrap


```


```yaml
        # later, inside acceptance.suite.yml file, you will make this replacement.
        
        PhpBrowser:
            # check in the General Settings > WordPress Address (URL) and
            # General Settings > Site Address (URL) and add the custom URL in
            # the fields siteurl and home wp-admin/options-general.php
            url: http://codecept.mydomain.priv/wordpress
```



``` bash

# The example given does no work codecept g:cest acceptance First
# You need to pass this command

# first way to generate your first test g stand for generate
# It will generate a first test in tests/acceptance/FirstCest.php
php codecept.phar g:cest acceptance First

# second way to generate your second test.
# It will generate a first test in tests/acceptance/SecondCest.php
php codecept.phar generate:cest acceptance Second

# generate your third test with another name SuperDuper.
# It will generate a first test in tests/acceptance/SuperDuperCest.php
php codecept.phar generate:cest acceptance SuperDuper


# acceptance is the {SuiteName}
# First is the {TestName}, it can be
# php codecept.phar generate:cest {SuiteName} {TestName}


```


``` bash
# be sure to be at the root of your project
cd /Applications/MAMP/htdocs/wordpress

# launch the suite
php codecept.phar run --steps acceptance

# launch the first test only
php codecept.phar run --steps acceptance FirstCest
php codecept.phar run -vvv --steps acceptance FirstCest
php codecept.phar run --debug --steps acceptance FirstCest


```



``` ruby
# testing the baseline on the frontoffice
Feature: Checking website made with WordPress
In order to make sure this is a WordPress installation
As a user
I need to see the default WordPress site description

  Background:
    Given I have a WordPress installation
  
  Scenario: A user access to the WP website (frontoffice)
     When I go to "/"
     Then I should be on the homepage
      And I should see "Just another WordPress site"
  
  # testing the login in the backoffice
  Feature: Login into WP admin
  In order to login into the WP admin (backoffice)
  As an valid user
  I need to know my credentials
  
  Background:
    Given I have a WordPress installation
      | email          | username | password |
      | admin@test.com | admin    | admin    |
      And I am logged in as "admin" with password "admin"
  
  Scenario: A valid user access to the platform
     When I go to "/"
      And I fill in "user_login" with "admin"
      And I fill in "pwd" with "admin"
      And I press "Log In"
     Then I should be on the "Dashboard" page
      And I should see "Dashboard"
      And I should see "Howdy, admin"

```

**The code by default**
``` php
class FirstCest
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




``` html
<!--
I select the option "Copy selector"
I got the CSS selector for the default WP site description
"Just another WordPress site"

CSS selector for site description: #masthead > div > div > p
*/

/*
I select the option "Copy Xpath"
I got the XPATH selector for the the default WP site description
"Just another WordPress site"

XPATH selector for site description: //*[@id="masthead"]/div/div/p

 -->

<!-- extract from the Twenty Nineteen theme 1.4 -->
<div class="site-branding">

                                <h1 class="site-title"><a href="http://codecept.mydomain.priv/wordpress/" rel="home">codecept_test_site</a></h1>
            
                <p class="site-description">
                Just another WordPress site         </p>
            </div>
```

``` php
// Check the site description anywhere in the homepage
$I->see('Just another WordPress site');

// Check the site description with CSS selector
$I->see('Just another WordPress site', '#masthead > div > div > p');

// Check the site description with XPath selector
$I->see('Just another WordPress site', '//*[@id="masthead"]/div/div/p');

// Check the site description with strict CSS selector or CSS locator
$I->see('Just another WordPress site', ['css' => '#masthead > div > div > p']);

// Check the site description with strict XPath selector or XPath locator
$I->see('Just another WordPress site', ['xpath' => '//*[@id="masthead"]/div/div/p']);
```




``` bash
# be sure to be at the root of your project
cd /Applications/MAMP/htdocs/wordpress

# Launch the test named FrontCest. The file is named FrontCest.php and it is in the acceptance directory
php vendor/bin/codecept run --steps acceptance FrontCest
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


php vendor/bin/codecept run --steps acceptance FrontCest
php vendor/bin/codecept run -vvv --steps acceptance FrontCest
php vendor/bin/codecept run --debug --steps acceptance FrontCest

*/

Class FrontCest
{

    public function FrontOfficeWorks(AcceptanceTester $I)
    {
            // Frontoffice
            // Try to see "Just another WordPress site"
            $I->wantTo('Frontoffice :: perform actions and see result');
            $I->amOnPage('/');
            $I->comment('Frontoffice :: want to see the classical baseline from WP install');
            $I->see('Just another WordPress site');
    }
}

```

``` bash
# be sure to be at the root of your project
cd /Applications/MAMP/htdocs/wordpress


php vendor/bin/codecept run --html --steps acceptance FrontCest
```


``` bash
# be sure to be at the root of your project
cd /Applications/MAMP/htdocs/wordpress

php vendor/bin/codecept run --debug --html --steps acceptance FrontCest
```

``` ruby
# testing the baseline on the frontoffice
Feature: Checking website made with WordPress
In order to make sure this is a WordPress installation
As a user
I need to see the default WordPress site description

  Background:
    Given I have a WordPress installation
  
  Scenario: A user access to the WP website (frontoffice)
     When I go to "/"
     Then I should be on the homepage
     # Successful
     And I should see "Just another WordPress site"
     # Failed
     And I should see "Just a new WordPress site"

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
php vendor/bin/codecept build

php vendor/bin/codecept run --steps acceptance CheckWpFrontCest
php vendor/bin/codecept run --html --steps acceptance CheckWpFrontCest
php vendor/bin/codecept run -vvv --steps acceptance CheckWpFrontCest
php vendor/bin/codecept run --debug --steps acceptance CheckWpFrontCest

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
        // $I->see('Just another WordPress site');
        
        // Failed
        $I->see('Just a new WordPress site');

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

class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        // Frontoffice
        // Try to see "Just another WordPress site"
        $I->wantTo('Frontoffice :: perform actions and see result');
        $I->amOnPage('/');
        $I->comment('Frontoffice :: want to see the WP default site description install');
        
        /* **  Check the site description anywhere in the homepage ** */
        
        //Successful
        // $I->see('Just another WordPress site');
        
        // Failed
        //$I->see('Just a new WordPress site');

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
}

```



``` html
<!--
For each element of the login, I select the option "Copy selector"
I got the CSS selector for each element

CSS selector for Username field: #user_login
CSS selector for Password field: #user_pass
CSS selector for Log In button: #wp-submit
*/

/*
For each element of the login, I select the option "Copy Xpath"
I got the XPATH selector for each element


XPATH selector for Username field: //*[@id="user_login"]
XPATH selector for Password field: //*[@id="user_pass"]
XPATH selector for Log In button: //*[@id="wp-submit"]

 -->


<!-- The html from the WP login form -->
<form name="loginform" id="loginform" action="http://codecept.mydomain.priv/wordpress/wp-login.php" method="post">
    <p>
        <label for="user_login">Username or Email Address<br>
        <input type="text" name="log" id="user_login" class="input" value="" size="20" autocapitalize="off"></label>
    </p>
    <p>
        <label for="user_pass">Password<br>
        <input type="password" name="pwd" id="user_pass" class="input" value="" size="20"></label>
    </p>
            <p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember Me</label></p>
    <p class="submit">
        <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Log In">
                <input type="hidden" name="redirect_to" value="http://codecept.mydomain.priv/wordpress/wp-admin/">
                    <input type="hidden" name="testcookie" value="1">
    </p>
    </form>
```




``` ruby
  # testing the login in the backoffice
  Feature: Login into WP admin
  In order to login into the WP admin (backoffice)
  As an valid user
  I need to know my credentials
  
  Background:
    Given I have a WordPress installation
      | email          | username | password |
      | admin@test.com | admin    | admin    |
      And I am logged in as "admin" with password "admin"
  
  Scenario: A valid user access to the platform
     When I go to "/"
      And I fill in "user_login" with "admin"
      And I fill in "pwd" with "admin"
      And I press "Log In"
     Then I should be on the "Dashboard" page
      And I should see "Dashboard"
      And I should see "Howdy, admin"

```

``` php

class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    
            //Backoffice
            // Try to login with the administrator user account
            $I->wantTo('Backoffice :: Login into WP admin');
            $I->amOnPage('/wp-login.php');
            $I->comment('Backoffice :: enter username and password for WP');
            
            // First way
            // CSS selector
            // $I->comment('Backoffice :: CSS selector');
            // $I->fillField('#user_login', 'admin');
            // $I->fillField('#user_pass','admin');
            

            // Second way
            // XPATH selector
            $I->comment('Backoffice :: XPATH selector');
            $I->fillField('//*[@id="user_login"]', 'admin');
            $I->fillField('//*[@id="user_pass"]','admin');
            
            // Find on button label
            $I->click('Log In');


            // Go to the Admin page
            $I->amOnPage('/wp-admin/');
            $I->see('Dashboard');
            

            // And I should see "Howdy, admin"
            $I->see('Howdy, admin');
            // $I->see('Just another WordPress site', ['xpath' => '//*[@id="wp-admin-bar-my-account"]/a']);
            // $I->see('Just another WordPress site', ['css' => '#wp-admin-bar-my-account > a]);

    }
}

```



``` php

$I->comment('Backoffice :: XPATH selector');


$I->comment('Frontoffice :: want to see the WP default site description install');

```



``` php
 
            
            // Find on button label
            $I->click('Log In');

            // Find with CSS button
            $I->click('#loginform input[type=submit]');

            // Find in context
            $I->click('Log In', '#wp-submit');



```




```python

# spanish
    #: wp-login.php:1056 wp-login.php:1089 wp-includes/general-template.php:466
msgid "Log In"
msgstr "Acceder"

# brazilian
#: wp-login.php:1056 wp-login.php:1089 wp-includes/general-template.php:466
msgid "Log In"
msgstr "Acessar"

# traditional chinese
msgid "Log In"
msgstr "登入"

# russian
#: wp-login.php:1056 wp-login.php:1089 wp-includes/general-template.php:466
msgid "Log In"
msgstr "Войти"

# italian
#: wp-login.php:1056 wp-login.php:1089 wp-includes/general-template.php:466
msgid "Log In"
msgstr "Login"

```





``` bash
#You need to select a suite name
# in our example we choose acceptance
# The acceptance directory contains 1 file named FirstCest.php
php codecept.phar generate:scenarios acceptance

# Generated scenarios will be stored in your _data directory in text files.
```

``` php
class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    
            //Backoffice
            // Try to login with the administrator user account
            $I->wantTo('Backoffice :: Login into WP admin');
            $I->amOnPage('/wp-login.php');
            $I->comment('Backoffice :: enter username and password for WP');
            $I->comment('Backoffice :: XPATH selector');
            $I->fillField('//*[@id="user_login"]', 'admin');
            $I->fillField('//*[@id="user_pass"]','admin');
            $I->click('Log In', '#wp-submit');
            $I->amOnPage('/wp-admin/');
            $I->see('Dashboard');
            $I->see('Howdy, admin');

    }
}

 

```




```ruby
I WANT TO BACKOFFICE :: LOGIN INTO WP ADMIN

I am on page '/wp-login.php'
I comment 'Backoffice :: enter username and password for WP'
I comment 'Backoffice :: XPATH selector'
I fill field '//*[@id="user_login"]'," 'admin'
I fill field '//*[@id="user_pass"]','admin'
I click 'Log In'," '#wp-submit'
I am on page '/wp-admin/'
I see 'Dashboard'
I see 'Howdy"," admin'

```








- [CODECEPTION_ Quickstart, https://codeception.com/quickstart](https://codeception.com/quickstart "CODECEPTION_ Quickstart")
- [CODECEPTION_ Install, https://codeception.com/install](https://codeception.com/install "CODECEPTION_ install")
