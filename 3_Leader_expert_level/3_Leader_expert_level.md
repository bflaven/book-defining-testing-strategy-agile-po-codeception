# 3 Leader or Expert Level

**This file is designed to facilitate understanding and eventual cut-paste for code chunks appearing in chapter "3. Leader or Expert Level" of the book "Defining a testing automation strategy for a P.O. with CODECEPTION_ & WordPress"**

``` bash

# 1. go to the correct dir named codeception-distrib-4
cd /Users/brunoflaven/Documents/codeception-distrib-4/

# 2. Install codeception
composer require "codeception/codeception" --dev

#3. Finish the install
#This creates configuration file codeception.yml and tests directory and default test suites.
php vendor/bin/codecept bootstrap


```

``` bash
# go to the correct dir named codeception-distrib-4
cd /Users/brunoflaven/Documents/02_copy/codeception-distrib-4/

# generate the suite name backoffice
php vendor/bin/codecept generate:suite backoffice

# generate the suite name frontoffice
php vendor/bin/codecept generate:suite frontoffice

#CAUTION IT IS REQUIRED
php vendor/bin/codecept build


# CAUTION
#check the backoffice.suite.yml, frontoffice.suite.yml
#Just cut and paste the same .yml as for the acceptance
#add the url http://codecept.mydomain.priv/wordpress/

# generate the first test named "CheckWpFront" for the suite "frontoffice"
php vendor/bin/codecept generate:cest frontoffice CheckWpFront

# generate the first test named "CheckWpBack" for the suite "backoffice"
php vendor/bin/codecept generate:cest backoffice CheckWpBack


```


``` yaml

actor: BackofficeTester
modules:
    enabled:
        # caution keep the helper for Backoffice
        - \Helper\Backoffice
        - PhpBrowser
        - Db
        - Filesystem
    config:
        PhpBrowser:
            # url: http://localhost/myapp
            url: http://codecept.mydomain.priv/wordpress
        Db:
            dsn: 'mysql:host=127.0.0.1;dbname=codecept_test_site;port=3306'
            user: 'root'
            password: 'root'
            #dump: 'tests/_data/sql_dump/codecept_test_site_0_empty.sql'
            #dump: 'tests/_data/sql_dump/codecept_test_site_1_origin.sql'
            dump: 'tests/_data/sql_dump/codecept_test_site_2_changed.sql'
            populate: false # run populator before all tests
            cleanup: false # run populator before all tests
            reconnect: true
            #not in use
            #populator: 'mysql -u $user -h $host $dbname < $dump'
    step_decorators: ~
           
```


``` bash
# go to the correct dir named codeception-distrib-4
cd /Users/brunoflaven/Documents/02_copy/codeception-distrib-4/

# create the .env file named .env.codeception.distrib
touch .env.codeception.distrib

# CAUTION
# nedd to install `vlucas/phpdotenv` library is required to parse .env files.
composer require vlucas/phpdotenv --dev

```





``` php

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'codecept_test_site' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
```



``` bash

# The .env file to extrenalize the core values
# .env.codeception.distrib

# default setting for WP install
WP_HOST="http://codecept.mydomain.priv/wordpress"

# Check `wp-config.php` top get the MySQL settings for WP
MYSQL_DB_HOST="127.0.0.1"
# MYSQL_DB_HOST="localhost"
MYSQL_DB_NAME="codecept_test_site"
MYSQL_DB_USER="root"
MYSQL_DB_PASSWORD="root"
MYSQL_DB_PORT="3306"
MYSQL_DB_DUMP_FILE_PATH="tests/_data/sql_dump/codecept_test_site_2_changed.sql"

# API for WP
WP_API_HOST="http://codecept.mydomain.priv/wordpress/wp-json/wp/v2/"



```


```yaml
paths:
    tests: tests
    output: tests/_output
    data: tests/_data
    support: tests/_support
    envs: tests/_envs
actor_suffix: Tester
extensions:
    enabled:
        - Codeception\Extension\RunFailed

# version 1
# load parameters from .env files (Laravel)
params:
    # load params from environment vars
    #- .env
    - .env.codeception.distrib

# version 2
# load parameters from YAML file (Symfony)
# params:
  # load params from environment vars
    # - app/config/parameters.yml
```



``` yaml
actor: ApiTester
modules:
    enabled:
        - Helper\Api
        - JsonSchema
        - REST:
            depends: PhpBrowser
            part: Json
    config:
      Helper\Api:
        #pathToWpApi: http://codecept.mydomain.priv/wordpress/wp-json/wp/v2/
        pathToWpApi: %WP_API_HOST%

```



``` bash

# go to the correct dir named codeception-distrib-4
cd /Users/brunoflaven/Documents/codeception-distrib-4/

#CAUTION IT IS REQUIRED
composer require cnam/codeception-json-schema --dev


```


```php
# go to the correct dir named codeception-distrib-4
cd /Users/brunoflaven/Documents/codeception-distrib-4/

# generate the suite name BackOffice
# generate the suite name FrontOffice
php vendor/bin/codecept generate:suite api

#check the api.suite.yml
#add the url http://codecept.mydomain.priv/wordpress/

#CAUTION IT IS REQUIRED
php vendor/bin/codecept build

# generate the first test named "CheckWpApiGeneral" for the suite "api"
# generate your first test in suite api
php vendor/bin/codecept generate:cest api CheckWpApiGeneral

# several ways to run your tests from suite api
# php vendor/bin/codecept run --debug {suite} {filenameCest.php or filenameCest}:{name of the function in the class}

php vendor/bin/codecept run api CheckWpApiGeneralCest
php vendor/bin/codecept run --steps api CheckWpApiGeneralCest
php vendor/bin/codecept run --debug --steps api CheckWpApiGeneralCest

# target a specific fucntion from the class
php vendor/bin/codecept run --debug --steps api CheckWpApiGeneralCest:getPosts


```

```json
{
  "type": "object",
  "required": [
    "id",
    "slug",
    "type",
    "title",
    "content",
    "expertises",
    "languages",
    "acf"
  ],
  "properties": {
    "id": {
      "type": "integer"
    },
    "slug": {
      "type": "string"
    },
    "type": {
      "type": "string"
    },
    "title": {
      "type": "object",
      "required": [
        "rendered"
      ],
      "properties": {
        "rendered": {
          "type": "string"
        }
      }
    },
    "content": {
      "type": "object",
      "required": [
        "rendered",
        "protected"
      ],
      "properties": {
        "rendered": {
          "type": "string"
        },
        "protected": {
          "type": "boolean"
        }
      }
    },
    "expertises": {
      "type": "array",
      "items": {
        "type": "integer"
      }
    },
    "languages": {
      "type": "array",
      "items": {
        "type": "integer"
      }
    },
    "acf": {
      "type": "object",
      "required": [
        "twitter_account",
        "facebook_account",
        "linkedin_account"
      ],
      "properties": {
        "twitter_account": {
          "type": "string"
        },
        "facebook_account": {
          "type": "string"
        },
        "linkedin_account": {
          "type": "string"
        }
      }
    }
  }
}
```

```php

class CheckWpApiGeneralCest
{
    
    /**
   * @param ApiTester $I
   */
  public function _before(ApiTester $I) {
    $I->getUrlFromConfiguration('pathToWpApi');
  }

 /**
   * @param ApiTester $I
   */
  public function _after(ApiTester $I) {
  }


/**
   * @param ApiTester $I
   */
  public function getPosts(ApiTester $I) {
    $I->wantTo('validate /posts response');
    $I->comment('CAUTION :: API url :: '.getenv("WP_API_HOST").'/wp/v2/posts');
    $I->sendGET('/wp/v2/posts');
    $I->seeResponseIsJson();
    $I->canSeeResponseIsValidOnSchemaFile($I->getSchemaFile('ListPostsSchemaWordpress3.json'));
  }

  /**
   * @param ApiTester $I
   */
  public function getUsers(ApiTester $I) {
    $I->wantTo('validate /users response');
    $I->comment('CAUTION :: API url :: '.getenv("WP_API_HOST").'/wp/v2/users');
    $I->sendGET('/wp/v2/users');
    $I->seeResponseIsJson();
    $I->canSeeResponseIsValidOnSchemaFile($I->getSchemaFile('ListUsersSchemaWordpress1.json'));
    // $I->seeResponseContainsJson(array('status' => '404'));

  }

/**
   * @param ApiTester $I
   */
  public function getSinglePost(ApiTester $I) {
    $I->wantTo('validate /posts/98 response');
    //Caution with post id
    $I->comment('CAUTION :: be sure your id exists!');
    $I->comment('CAUTION :: API url :: '.getenv("WP_API_HOST").'/wp/v2/posts/98');
    $I->sendGET('/wp/v2/posts/98');
    $I->seeResponseIsJson();
    $I->canSeeResponseIsValidOnSchemaFile($I->getSchemaFile('PostSchemaWordpress5.json'));
  }



  /**
   * @param ApiTester $I
   */
  public function getSingleUser(ApiTester $I) {
    $I->wantTo('validate /users/1 response');
    //Caution with user id
    $I->comment('CAUTION :: be sure that your id exists!');
    $I->comment('CAUTION :: API url :: '.getenv("WP_API_HOST").'/wp/v2/users/1');
    $I->sendGET('/wp/v2/users/1');
    $I->seeResponseIsJson();
    $I->canSeeResponseIsValidOnSchemaFile($I->getSchemaFile('UserSchemaWordpress1.json'));
    // $I->seeResponseContainsJson(array('status' => '404'));

  }

/**
   * @param ApiTester $I
   * Elna Balistreri has the ID 138
   */
  public function getSingleJournalist(ApiTester $I) {
    $I->wantTo('validate /journalists/138 response');
    $I->comment('CAUTION :: be sure that your id exists!');
    $I->comment('CAUTION :: API url :: '.getenv("WP_API_HOST").'/wp/v2/journalists/138');
    //Caution with post id
    $I->sendGET('/wp/v2/journalists/138');
    $I->seeResponseIsJson();
    $I->canSeeResponseIsValidOnSchemaFile($I->getSchemaFile('JournalistProfileSchemaWordpress1.json'));
  }
 

}

```


```php
# go to the correct dir named codeception-distrib-4
cd /Users/brunoflaven/Documents/02_copy/codeception-distrib-4/

# generate the suite name functional for functional testing
php vendor/bin/codecept generate:suite functional

#check the functional.suite.yml
# Cut and paste the code that you are already using in the acceptance suite.
# Be sure to use the correct url for your web application e.g.
# http://codecept.mydomain.priv/wordpress/


# CAUTION IT IS REQUIRED
# See HEADS-UP: do not forget to build Actor classes
#  If the actor classes are not created or updated as you expect, try to generate them manually with the build command:
# php vendor/bin/codecept build

# generate the first test named "ExampleOneFunctionalTest" for the suite "functional"
php vendor/bin/codecept generate:cest functional ExampleOneFunctionalTest

# several ways to run your tests from suite api
# php vendor/bin/codecept run --debug {suite} {filenameCest.php or filenameCest}:{name of the function in the class}

php vendor/bin/codecept run --steps functional ExampleOneFunctionalTestCest
php vendor/bin/codecept run --debug --steps functional ExampleOneFunctionalTestCest

# target a specific function from the class
php vendor/bin/codecept run --debug --steps functional ExampleOneFunctionalTestCest:CheckRecordsDb




```

```php
// Test for post
      $I->haveInDatabase('wp_posts', array('post_type' => 'post', 'post_title' => 'Hello world!', 'post_date' => ''.date("Y-m-d H:i:s", time()).'', 'post_date_gmt' => ''.date("Y-m-d H:i:s", time()).'', 'post_modified' => ''.date("Y-m-d H:i:s", time()).'', 'post_modified_gmt' => ''.date("Y-m-d H:i:s", time()).'', 'post_content' => 'Fake content for Hello world Post!!!',  'post_excerpt' => 'Fake post_excerpt for Hello world Post!!!','to_ping' => '', 'pinged' => '', 'post_content_filtered' => '' ));


      // Check admin email
      $I->seeInDatabase('wp_users', ['user_login' => 'admin', 'user_email' => 'admin@test.com']);
```




```bash
# Go in directory
cd /Applications/MAMP/htdocs/wordpress_3

# Tell Composer to download WordHat
composer require --dev paulgibbs/behat-wordpress-extension behat/mink-goutte-driver dmore/behat-chrome-extension

# Copy WordHat's sample configuration file into your project folder and rename it:
cp vendor/paulgibbs/behat-wordpress-extension/behat.yml.dist behat.yml

# - Change value inside the file behat.yml. For instance our base_url is: http://project.test/wordpress_3
# Update the base_url setting with the URL of the website that you intend to test.
# Update the path setting with either the relative or absolute path to your WordPress' files. Fir instance our path is: /Applications/MAMP/htdocs/wordpress_3



#Update the users section, and specify a username and password of an administrator user account in your WordPress. For instance, our password is: admin

# Initialise Behat:
vendor/bin/behat --init

# To confirm that everything is set up correctly, run:
vendor/bin/behat --definitions i

# To confirm that everything is set up correctly, run:
vendor/bin/behat
vendor/bin/behat -dl
#This command will return a list of available step definitions. Don't worry about parsing through the list now.

vendor/bin/behat --strict --colors  --format-settings='{"paths": false}'
vendor/bin/behat --strict --colors

```

```php
# go to the correct directory named codeception-distrib-4
cd /Users/brunoflaven/Documents/02_copy/codeception-distrib-4/

# generate the suite name gherkin
php vendor/bin/codecept generate:suite gherkin

#CAUTION: check the gherkin.suite.yml
# You can cut and paste for the moment the code used in frontoffice.suite.yml

```

```yaml
actor: GherkinTester
modules:
    enabled:
        # caution keep the helper for Gherkin
        - \Helper\Gherkin
        - PhpBrowser
        - Db
        - Filesystem
    config:
        PhpBrowser:
            # url: http://localhost/myapp
            url: '%WP_HOST%'
        Db:
            dsn: 'mysql:host=%MYSQL_DB_HOST%;dbname=%MYSQL_DB_NAME%;port=%MYSQL_DB_PORT%'
            user: '%MYSQL_DB_USER%'
            password: '%MYSQL_DB_PASSWORD%'
            #dump: 'tests/_data/sql_dump/codecept_test_site_0_empty.sql'
            #dump: 'tests/_data/sql_dump/codecept_test_site_1_origin.sql'
            dump: '%MYSQL_DB_DUMP_FILE_PATH%'
            populate: false # run populator before all tests
            cleanup: false # run populator before all tests
            reconnect: true
            #not in use
            #populator: 'mysql -u $user -h $host $dbname < $dump'
    step_decorators: ~
gherkin:
    contexts:
        default:
            - GherkinTester
            # - AcceptanceTester
            # - AdditionalSteps
```


```php

# let's generate our first feature. g stands for generate
php vendor/bin/codecept g:feature gherkin MyFirstGherkinFeature
php vendor/bin/codecept generate:feature gherkin MyFirstGherkinFeatureVerbose

# This comand will generate the feature named MyFirstGherkinFeature.feature or MyFirstGherkinFeatureVerbose.feature automatically in the directory wordpress_2/tests/acceptance.

```


```ruby
Feature: MyFirstGherkinFeature
  In order to ...
  As a ...
  I need to ...

  Scenario: try MyFirstGherkinFeature
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


```ruby

#BackofficeLoginAdminAdvanced_1.feature
Feature: BackofficeLoginAdminAdvanced_1
In order to login into my WP website
As an user
I need to know my credentials

  Background:
    Given I have a vanilla wordpress installation
      | user_login | user_pass | user_email     | role          |
      | admin      | admin     | admin@test.com | administrator |
  
  #Scenario: try BackofficeLoginAdminAdvanced_1
  Scenario: A valid user access to the platform
     When I am on "/wp-login.php"
      And I fill in "#user_login" with "admin"
      And I fill in "#user_pass" with "admin"
      And I press "#wp-submit"
      #And I press "Log In"
     Then I should be on "/wp-admin/"
      And I should see "Howdy, admin"

```

```php
# let's generate our BackofficeLoginAdmin.feature in the gherkin suite.
php vendor/bin/codecept g:feature gherkin BackofficeLoginAdminAdvanced_1

```



```php
#CAUTION You need to build Actor classes for suites especially for gherkin suite
php vendor/bin/codecept build

```


```php

#To dry run the feature, it will show the missing Step definitions.
php vendor/bin/codecept dry-run gherkin BackofficeLoginAdminAdvanced_1.feature


```



```php

# generate the steps or functions for our gherkin feature BackofficeLoginAdmin.feature
php vendor/bin/codecept gherkin:snippets gherkin BackofficeLoginAdminAdvanced_1.feature

```


```php
class GherkinTester extends \Codeception\Actor
{
    use _generated\GherkinTesterActions;

   /**
    * Define custom actions here
    */


   /*
        * Here, Cut and Paste the result of the command that generate the snippets
        * php vendor/bin/codecept gherkin:snippets gherkin BackofficeLoginAdminAdvanced_1.feature
   */

}

```



```php

# run with no steps
php vendor/bin/codecept run gherkin BackofficeLoginAdminAdvanced_1.feature

#To run the feature BackofficeLoginAdminAdvanced_1.feature
php vendor/bin/codecept run --steps gherkin BackofficeLoginAdminAdvanced_1.feature
# To run with debug
php vendor/bin/codecept run -vvv gherkin BackofficeLoginAdminAdvanced_1.feature

```

```php
/**
     * @Given I have a vanilla wordpress installation
     */
     
     public function iHaveAVanillaWordpressInstallation()
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I have a vanilla wordpress installation` is not defined");
        // $this->comment("Function exists :: FunctionName :: iHaveAVanillaWordpressInstallation");
        // $this->BuildMyPersonalErrorMsg ("iHaveAVanillaWordpressInstallation");
                
        // This is my Definition of Done (DoD) for iHaveAVanillaWordpressInstallation()
        
        $this->seeInDatabase('wp_options', ['option_name' => 'siteurl']);
        $this->seeInDatabase('wp_options', ['option_value' => 'http://codecept.mydomain.priv/wordpress']);

        $this->seeInDatabase('wp_options', ['option_name' => 'home']);
        $this->seeInDatabase('wp_options', ['option_value' => 'http://codecept.mydomain.priv/wordpress']);

        $this->seeInDatabase('wp_options', ['option_name' => 'blogname']);
        $this->seeInDatabase('wp_options', ['option_value' => 'codecept_test_site']);

        $this->seeInDatabase('wp_options', ['option_name' => 'blogdescription']);
        $this->seeInDatabase('wp_options', ['option_value LIKE' => 'Just another WordPress site']);

        $this->seeInDatabase('wp_options', ['option_name' => 'admin_email']);
        $this->seeInDatabase('wp_options', ['option_value LIKE' => 'admin@test.com']);


        $this->seeInDatabase('wp_options', ['option_name' => 'time_format']);
        $this->seeInDatabase('wp_options', ['option_value LIKE' => 'g:i a']);


        $this->seeInDatabase('wp_options', ['option_name' => 'date_format']);
        $this->seeInDatabase('wp_options', ['option_value LIKE' => 'F j, Y']);

        
        
     }

```

```php
/**
     * @Given I am on :arg1
     */
    
     public function iAmOn($uri)
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I am on :arg1` is not defined");
         $this->amOnPage($uri);
     }
     

```

```php
/*
iHaveAVanillaWordpressInstallation
iAmOn
iFillInWith
iPress
iAmOnPage
iShouldBeOn
iShouldSee
*/
```

```php

class GherkinTester extends \Codeception\Actor
{
    use _generated\GherkinTesterActions;

   /**
    * Define custom actions here
    */
   
   /**
     * Make a personnal message for existing function
     */
   
               public function BuildMyPersonalErrorMsg($FunctionName) {
                $this->comment("Function exists :: FunctionName :: ".$FunctionName."");
            }

    /**
     * @Given I have a vanilla wordpress installation
     */
     public function iHaveAVanillaWordpressInstallation()
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I have a vanilla wordpress installation` is not defined");
        // $this->comment("Function exists :: FunctionName :: iHaveAVanillaWordpressInstallation");
        // $this->BuildMyPersonalErrorMsg ("iHaveAVanillaWordpressInstallation");
         
     }


}

```

```php
#CAUTION IT IS REQUIRED
composer require edno/codeception-gherkin-param --dev
```


```php
#actor: Tester
paths:
    tests: tests
    log: tests/_output
    data: tests/_data
    support: tests/_support
    envs: tests/_envs
actor_suffix: Tester
settings:
    colors: true
    memory_limit: 1024M
extensions:
    enabled:
        - Codeception\Extension\RunFailed
        - Codeception\Extension\GherkinParam
coverage:
    enabled: true
# codecept run --coverage --coverage-xml --coverage-html

# version 1
# load parameters from .env files (Laravel)
params:
    # load params from environment vars
    #- .env
    - .env.codeception.distrib
# version 2
# load parameters from YAML file (Symfony)
# params:
  # load params from environment vars
    # - app/config/parameters.yml
```


```php

# The command line model to run a feature in a suite
# php vendor/bin/codecept run --steps {suiteName} {FileName.feature}

#CAUTION You need to build Actor classes for suites especially for gherkin suite
php vendor/bin/codecept build

#To dry run the feature BackofficeLoginAdminAdvanced_1.feature
php vendor/bin/codecept dry-run gherkin BackofficeLoginAdminAdvanced_1.feature

# To create the snippets for BackofficeLoginAdminAdvanced_1.feature
php vendor/bin/codecept gherkin:snippets gherkin BackofficeLoginAdminAdvanced_1.feature


# run with no steps
php vendor/bin/codecept run gherkin BackofficeLoginAdminAdvanced_1.feature


#To run the feature BackofficeLoginAdminAdvanced_1.feature
php vendor/bin/codecept run --steps gherkin BackofficeLoginAdminAdvanced_1.feature

#To run with debug the feature BackofficeLoginAdminAdvanced_1.feature
php vendor/bin/codecept run -vvv gherkin BackofficeLoginAdminAdvanced_1.feature


#the complete command lines sequence, replace {featureName}.feature
#by the name of the file e.g BackofficeLoginAdminAdvanced_9.feature
php vendor/bin/codecept gherkin:snippets gherkin {featureName}.feature
php vendor/bin/codecept dry-run gherkin {featureName}.feature
php vendor/bin/codecept run --steps gherkin {featureName}.feature


```


```php

# go to the correct directory named codeception-distrib-4
cd /Users/brunoflaven/codeception-distrib-4/

# Generate the testing Class advancedUsage in a file named advancedUsageCest.php
php vendor/bin/codecept  generate:cest acceptance advancedUsage

# CP can generate a PageObject class for you with command:
php vendor/bin/codecept generate:pageobject acceptance advancedLogin

# This will create a Login class in tests/_support/Page/Acceptance. The basic PageObject is nothing more than an empty class with a few stubs.
# PageObject was created in /Users/brunoflaven/codeception-distrib-4/tests/_support/Page/Acceptance/Login.php

```

```php
namespace Page\Acceptance;

class advancedLogin
{

    public static $URL_WP_LOGIN = '/wp-login.php';
    public static $URL_WP_ADMIN = '/wp-admin/';
    /*
        * VERSION 0
     */ 
    public $usernameField = '#user_login';
    public $passwordField = '#user_pass';
    public $loginButton = '//*[@id="wp-submit"]';
 
    
    
    /*
        * VERSION 1
     */ 
    
    /*
    public static $usernameField = '#user_login';
    public static $passwordField = '#user_pass';
    public static $loginButton = '//*[@id="wp-submit"]';
    */
    

    /**
     * @var \advancedAcceptanceTester
     */
    protected $advancedAcceptanceTester;

    // we inject advancedAcceptanceTester into our class
    public function __construct(\AcceptanceTester $I)
    {
        $this->advancedAcceptanceTester = $I;
    }

    public function Wplogin($name, $password)
    {
        $I = $this->advancedAcceptanceTester;

        $I->amOnPage(self::$URL_WP_LOGIN);
        
        /* no static */
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

        
    }

}//EOC
```


```php
// Set the languages
include_once('tests/_data/languages/en.php');
// include_once('tests/_data/languages/es.php');
// include_once('tests/_data/languages/fr.php');
// include_once('tests/_data/languages/it.php');
// include_once('tests/_data/languages/ru.php');
# include_once('tests/_data/languages/cn.php');
 

class advancedUsageCest
{

    public function checkWhatLanguage (AcceptanceTester $I) 
    {
            $I->wantTo('Language :: ensure a language is selected');
            $I->comment("\n--- LANGUAGE");
            $I->comment("Language :: language selected :: ".LANGUAGE_CHOSEN."");
    }



    public function doWpLogin (AcceptanceTester $I, \Page\Acceptance\advancedLogin $getIn) 
    {
            $I->wantTo('Backoffice :: ensure that I can login');
            $I->comment("\n--- LOGIN");
            // Login in a PageObject
            $getIn->Wplogin(LOGIN_USERNAME, LOGIN_PASSWORD);
    } 


}//EOC
```


```php
### CAUTION do the same thing but in a suite ###

# NOPE advanced_testing_strategyTester
# YEP AdvancedPoStrategy

#NOPE FOR SURE
php vendor/bin/codecept generate:suite advanced_testing_strategy

#YEP and NOPE
php vendor/bin/codecept generate:suite AdvancedPoStrategy

# ~ ~ ~ OUTPUT ~ ~ ~
#--- Suite Helper: \Helper\AdvancedPoStrategy
#--- File: AdvancedPoStrategy.php tests/_support/Helper/

#--- Suite Actor: AdvancedPoStrategyTester
#--- File: AdvancedPoStrategyTester.php /tests/_support/

#--- Suite config
#--- File: AdvancedPoStrategy.suite.yml

```


```php
# go to the correct directory named codeception-distrib-4
cd /Users/brunoflaven/Documents/codeception-distrib-4/
#cd /Volumes/mi_disco/codeception-distrib-4

#create the suite
php vendor/bin/codecept generate:suite advanced

#create the test in the suite
php vendor/bin/codecept generate:cest advanced advancedUsage

#CAUTION IT IS REQUIRED
php vendor/bin/codecept build

# CP can generate a PageObject class for you with command:
php vendor/bin/codecept generate:pageobject advanced advancedUsageLogin


php vendor/bin/codecept run --steps advanced advancedUsage

```

```php
// Set the languages
include_once('tests/_data/languages/en.php');
// include_once('tests/_data/languages/es.php');
// include_once('tests/_data/languages/fr.php');
// include_once('tests/_data/languages/it.php');
// include_once('tests/_data/languages/ru.php');
# include_once('tests/_data/languages/cn.php');

class advancedUsageCest
{
    public function checkWhatLanguageAndLogin (AdvancedTester $I)
    {
            
            $I->wantTo('Language :: ensure a language is selected');
            $I->comment("\n--- LANGUAGE");
            $I->comment("Language :: language selected :: ".LANGUAGE_CHOSEN."");


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

    }
}
```

```php

            //Go to the login
            $I->amGoingTo('to pass the login page');
            $I->amOnPage('/wp-login.php');
            $I->comment('Backoffice :: enter username and password for WP');
            $I->fillField('#user_login', LOGIN_USERNAME);
            $I->fillField('#user_pass', LOGIN_PASSWORD);
            $I->click('//*[@id="wp-submit"]');

```

```php
# go to the correct directory named codeception-distrib-4
cd /Users/brunoflaven/Documents/codeception-distrib-4/
#cd /Volumes/mi_disco/codeception-distrib-4
#
#
# CP can generate a PageObject class for you with command:
php vendor/bin/codecept generate:pageobject advanced advancedUsageLogin

```

```php
/* Version 1*/

namespace Page\Advanced;

class advancedUsageLogin
{
    // include url of current page
    public static $URL = '';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */

    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: Page\Edit::route('/123-post');
     */
    public static function route($param)
    {
        return static::$URL.$param;
    }

    /**
     * @var \AdvancedTester;
     */
    protected $advancedTester;

    public function __construct(\AdvancedTester $I)
    {
        $this->advancedTester = $I;
    }

}
```

```php
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
```


```php
// Set the languages
include_once('tests/_data/languages/en.php');
// include_once('tests/_data/languages/es.php');
// include_once('tests/_data/languages/fr.php');
// include_once('tests/_data/languages/it.php');
// include_once('tests/_data/languages/ru.php');
# include_once('tests/_data/languages/cn.php');
 
class advancedUsageCest
{
    public function checkWhatLanguageAndLogin (AdvancedTester $I, \Page\Advanced\advancedUsageLogin $VariableWpLoginForm) 
    {
            
            $I->wantTo('Language :: ensure a language is selected');
            $I->comment("\n--- LANGUAGE");
            $I->comment("Language :: language selected :: ".LANGUAGE_CHOSEN."");


            $I->wantTo('Backoffice :: ensure that I can check and change General Settings');
            /* LOGIN */
            $I->comment("\n--- LOGIN");

            $VariableWpLoginForm->WpLoginForm(LOGIN_USERNAME, LOGIN_PASSWORD);

            // Go to the Admin page
            $I->expect('to be connected and I can access to the WP dashboard');
            $I->amOnPage('/wp-admin/');
            $I->see(DASHBOARD_H1);

    } 
}
```


```php
# go to the correct directory named codeception-distrib-4
cd /Users/brunoflaven/Documents/codeception-distrib-4/

#create the test in the suite
php vendor/bin/codecept generate:cest advanced advancedUsagePostCreation

```


```php

class advancedUsagePostCreationCest
{
    
    public function createAdvancedPostNew (AcceptanceTester $I)
    {

        /* LOGIN */
        $I->wantTo('ensure that I publish a Advanced Post, adding excerpt, tags and existing categories');

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


        $I->comment("\n--- ADVANCED POST");
        // Add a post
        $I->click(POST_NEW_LABEL);
        $I->see(POST_NEW_TITLE);

        // Add a title for Post
        $I->fillField('#title', 'advancedUsagePostCreationCest Test title article Cept '.generateRandomString().'');
        // Add a content for Post
        $I->fillField('#content', 'advancedUsagePostCreationCest Test content article Cept '.generateRandomString().' ');
        // Add a content for Post
        $I->fillField('#excerpt', 'advancedUsagePostCreationCest Test article excerpt Cept '.generateRandomString().' ');
        
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
        $I->see('advancedUsagePostCreationCest Test title article Cept');
        $I->see('advancedUsagePostCreationCest Test content article Cept');

    }
}
```

```php
# go to the correct directory named codeception-distrib-4
cd /Users/brunoflaven/Documents/codeception-distrib-4/

# CP can generate a PageObject class for you with command:
php vendor/bin/codecept generate:pageobject advanced createPostPlus
```


```php
namespace Page\Advanced;

class createPostPlus
{
    
    /**
     * @var \AdvancedTester
     */
    protected $AdvancedTester;

    // we inject AdvancedTester into our class
    public function __construct(\AdvancedTester $I)
    {
        $this->AdvancedTester = $I;
    }


    public function WpPostForm ()
    {
        // do not forget this insert
        $I = $this->AdvancedTester;
        
        // Add a post
        $I->click(POST_NEW_LABEL);
        $I->see(POST_NEW_TITLE);

        // Add a title for Post
        $I->fillField('#title', 'advancedUsagePostCreationCest Test title article Cept '.generateRandomString().'');
        // Add a content for Post
        $I->fillField('#content', 'advancedUsagePostCreationCest Test content article Cept '.generateRandomString().' ');
        // Add a content for Post
        $I->fillField('#excerpt', 'advancedUsagePostCreationCest Test article excerpt Cept '.generateRandomString().' ');
        
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
        $I->see('advancedUsagePostCreationCest Test title article Cept');
        $I->see('advancedUsagePostCreationCest Test content article Cept');
    }

}// EOC
```



```php
class advancedUsagePostCreationCest
{
    
    public function createAdvancedPostNew (AdvancedTester $I, \Page\Advanced\advancedUsageLogin $VariableWpLoginForm, \Page\Advanced\createPostPlus $VariableWpPostForm)
    {

        /* LOGIN */
        $I->wantTo('ensure that I publish a Advanced Post, adding excerpt, tags and existing categories');

        /* LOGIN */
        $I->comment("\n--- LOGIN");

        $VariableWpLoginForm->WpLoginForm(LOGIN_USERNAME, LOGIN_PASSWORD);


        $I->comment("\n--- ADVANCED POST");
        
        $VariableWpPostForm->WpPostForm();

    }
}
```


```php

# go to the correct directory named codeception-distrib-4
cd /Users/brunoflaven/Documents/codeception-distrib-4/


# CP can generate an Admin StepObject class for you with command:
php vendor/bin/codecept generate:stepobject advanced Admin

# Enter loginAsAdmin
 
```


```php
namespace Step\Advanced;

class Admin extends \AdvancedTester
{

    public function loginAsAdmin()
    {
        $I = $this;
    }

}
```


```php
# go to the correct directory named codeception-distrib-4
cd /Users/brunoflaven/Documents/codeception-distrib-4/


#create the test in the suite
php vendor/bin/codecept generate:cest advanced advancedUsageStepObject


```

```php
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


```


```php
// Set the languages
include_once('tests/_data/languages/en.php');
// include_once('tests/_data/languages/es.php');
// include_once('tests/_data/languages/fr.php');
// include_once('tests/_data/languages/it.php');
// include_once('tests/_data/languages/ru.php');
# include_once('tests/_data/languages/cn.php');
 


class advancedUsageStepObjectCest
{
    /* version 1 to call the StepObject */
    /* public function checkWhatLanguageAndLogin (AdvancedTester $I, \Step\Advanced\Admin $VariableWpLoginForm) */
    

    /* version 2 to call the StepObject */
    public function checkWhatLanguageAndLogin (\Step\Advanced\Admin $I)
    {
            
            $I->wantTo('Language :: ensure a language is selected');
            $I->comment("\n--- LANGUAGE");
            $I->comment("Language :: language selected :: ".LANGUAGE_CHOSEN."");


            $I->wantTo('Backoffice :: ensure that I can check and change General Settings');
            /* LOGIN */
            $I->comment("\n--- LOGIN");

            /* version 1 to call the StepObject */
            // $VariableWpLoginForm->loginAsAdmin(LOGIN_USERNAME, LOGIN_PASSWORD);
             
            /* version 2 to call the StepObject */
            $I->loginAsAdmin(LOGIN_USERNAME, LOGIN_PASSWORD);

            // Go to the Admin page
            $I->expect('to be connected and I can access to the WP dashboard');
            $I->amOnPage('/wp-admin/');
            $I->see(DASHBOARD_H1);

    }
}
```





```php
# go to the correct directory named codeception-distrib-4
cd /Users/brunoflaven/Documents/codeception-distrib-4/

#create the suite
php vendor/bin/codecept generate:suite documentation

# edit and change the documentation.suite.yml
# Check the step below 3.8.1 Change `documentation.suite.yml`

#CAUTION IT IS REQUIRED
php vendor/bin/codecept build

#create the first test of your suite documentation
php vendor/bin/codecept generate:cest documentation advancedUsageDocumentation

# run the testing file
php vendor/bin/codecept run --steps documentation advancedUsageDocumentationCest


#launch the first function
php vendor/bin/codecept run --steps documentation advancedUsageDocumentationCest:checkEndpoints

#launch the second function
php vendor/bin/codecept run --steps documentation advancedUsageDocumentationCest:staticPagesJsonStyle

#launch the third function
php vendor/bin/codecept run --steps documentation advancedUsageDocumentationCest:staticPagesDoctrineStyle

```

 
``` yaml
actor: DocumentationTester
modules:
    enabled:
        # caution keep the helper for Documentation
        - \Helper\Documentation
        - Asserts
        - PhpBrowser
        - Db
        - Filesystem
        - REST:
             # http://codecept.mydomain.priv/wordpress/wp-json
             url: '%WP_API_HOST%'
             depends: PhpBrowser
             part: Json
    config:
        PhpBrowser:
            # url: http://localhost/myapp
            url: '%WP_HOST%'
        Db:
            dsn: 'mysql:host=%MYSQL_DB_HOST%;dbname=%MYSQL_DB_NAME%;port=%MYSQL_DB_PORT%'
            user: '%MYSQL_DB_USER%'
            password: '%MYSQL_DB_PASSWORD%'
            #dump: 'tests/_data/sql_dump/codecept_test_site_0_empty.sql'
            #dump: 'tests/_data/sql_dump/codecept_test_site_1_origin.sql'
            dump: '%MYSQL_DB_DUMP_FILE_PATH%'
            populate: false # run populator before all tests
            cleanup: false # run populator before all tests
            reconnect: true
            #not in use
            #populator: 'mysql -u $user -h $host $dbname < $dump'
    step_decorators: ~
```


``` php
 # Doctrine-style
 /**
  * @example ["/wp/v2/", 200]
  * @example ["/wp/v2/posts", 200]
  * @example ["/wp/v2/cooking-recipes", 404]
  */
  public function checkEndpoints(DocumentationTester $I, \Codeception\Example $example)
  {
    $I->sendGET($example[0]);
    $I->seeResponseCodeIs($example[1]);
  }
```


```html
<title>About Us &#8211; codecept_test_site</title>
....
<h1 class="entry-title">About Us</h1>
```

``` php
# JSON style
 /**
  * @example { "url": "/", "title": "codecept_test_site" }
  * @example { "url": "/about-us", "title": "About Us Wrong" } // WRONG
```

``` php
class advancedUsageDocumentationCest
{
 
  # Doctrine-style
 /**
  * @example ["/wp/v2/", 200]
  * @example ["/wp/v2/posts", 200]
  * @example ["/wp/v2/cooking-recipes", 404]
  */
  public function checkEndpoints(DocumentationTester $I, \Codeception\Example $example)
  {
    $I->sendGET($example[0]);
    $I->seeResponseCodeIs($example[1]);
  }


  # JSON style
 /**
  * @example { "url": "/", "title": "codecept_test_site" }
  * @example { "url": "/about-us", "title": "About Us" }
  * @example { "url": "/blog", "title": "Blog" }
  * @example { "url": "/careers", "title": "Careers" }
  * @example { "url": "/giving-back", "title": "Giving Back" }
  * @example { "url": "/our-work", "title": "Our Work" }
  * @example { "url": "/privacy-policy", "title": "Privacy Policy" }
  */
  public function staticPagesJsonStyle(DocumentationTester $I, \Codeception\Example $example)
  {
    $I->amOnPage($example['url']);
    $I->see($example['title'], 'h1');
    $I->seeInTitle($example['title']);
  }

# Key-value data in Doctrine-style annotation syntax style

/**
  * @example(comment="Testing the HP", url="/", title="codecept_test_site")
  * @example(comment="Testing the page About Us",url="/about-us/", title="About Us")
  * @example(comment="Testing the page Blog",url="/blog/", title="Blog")
  * @example(comment="Testing the page Careers",url="/careers/", title="Careers")
  * @example(comment="Testing the page Giving Back",url="/giving-back/", title="Giving Back")
  * @example(comment="Testing the page Our Work",url="/our-work/", title="Our Work")
  * @example(comment="Testing the page Privacy Policy",url="/privacy-policy/", title="Privacy Policy")
  */
  public function staticPagesDoctrineStyle(AcceptanceTester $I, \Codeception\Example $example)
  {
    $I->comment($example['comment']);
    $I->amOnPage($example['url']);
    $I->see($example['title'], 'h1');
    $I->seeInTitle($example['title']);
  }

}// EOC



```


``` bash
# you must be logged as admin
sudo -s
# edit your hosts file
vi /etc/hosts
```

``` bash
# add for the testing session
127.0.0.1 codecept.mydomain.priv
127.0.0.1 codecept.mydomain.priv
```


``` bash
.
├── proxy
│   └── docker-compose.yml  # for the proxy
├── docker-compose.yml # for the WP
└── Dockerfile # the Dockerfile will symlplify the WP management

```



``` bash

# Go to the project directory
cd /Volumes/mi_disco/codeception-distrib-8/


# go the proxy directory
cd /Volumes/mi_disco/codeception-distrib-8/proxy/

# to start the proxy
docker network create proxy
docker-compose up -d --build

# to list the networks
docker network ls

# to kill the networks
# example : docker network rm NETWORK [NETWORK...]
# examples to remove netwworks
# docker network rm proxy
# docker network rm bruno-method-8_default
# docker network rm bruno-method-8_backend




```



``` bash

# Go to the project directory in your MAMP installation
cd /Volumes/mi_disco/codeception-distrib-8/


# use the makefile to launch docker-compose up -d
make start


# use the makefile to launch docker-compose config
# this command will show the environment variables contain in the .env file
make config


```



```bash

#Site Title:
codecept_test_site
#User Admin
admin:admin
#Your email
admin@test.com

```


```yaml
WORDPRESS_DB_USER: codecept_wordpress
WORDPRESS_DB_PASSWORD: codecept_wordpress_password
```

```php
/** MySQL database username */
define( 'DB_USER', 'codecept_wordpress');

/** MySQL database password */
define( 'DB_PASSWORD', 'codecept_wordpress_password');
```



``` bash
# to get into the Docker WP installed
make cli
```


``` bash
# manage themes
wp theme list
wp theme activate twentynineteen #already active
wp theme activate twentyseventeen #active twentyseventeen
wp theme search bootstrap #search for new theme with the chain bootstrap
wp theme install ultrabootstrap --activate #install and activate the theme ultrabootstrap

# manage plugin
wp plugin list #list the plugins
wp plugin search "disable gutenberg" #search for plugin
wp plugin install classic-editor --activate #install and activate Classic Editor

# manage update
wp core update #update the fucking WP
wp core update-db #update the fucking DB
wp theme update --all #update the fucking themes
wp plugin update --all #update the fucking plugins

# manage content
wp post list
wp post create ./_fake_content_files/lorem_fake_post.txt --post_title='2 Fake post example from a txt file' --post_status=publish
wp post generate --count=100
```


```bash
# to enable docker-compose run --rm --entrypoint bash codecept
make codecept

# check version of composer
composer -v
# It will out put the Composer Version eg Composer version 1.9.0
```

```bash
# install codeception
composer require codeception/codeception --dev
```

```bash
composer require vlucas/phpdotenv --dev
composer require cnam/codeception-json-schema --dev
composer require edno/codeception-gherkin-param --dev
composer require codeception/module-db --dev 
composer require codeception/module-filesystem --dev  
```

```bash
codecept
# It should output your codeceptionvesrion e.g. Codeception 3.0.3
```

```bash
codecept bootstrap
```

```bash
# to build actors
codecept build

```

```bash

# generate the test
codecept g:cest acceptance First

```

```yaml
# Codeception Test Suite Configuration
#
# Suite for acceptance tests.
# Perform tests in browser using the WebDriver or PhpBrowser.
# If you need both WebDriver and PHPBrowser tests - create a separate suite.
actor: AcceptanceTester
modules:
    enabled:
        # caution keep the helper for Acceptance
        - \Helper\Acceptance
        - PhpBrowser
    config:
        PhpBrowser:
            # url: http://localhost/myapp
            url: '%WP_HOST%'
    step_decorators: ~          
```

```yaml
paths:
    tests: tests
    output: tests/_output
    data: tests/_data
    support: tests/_support
    envs: tests/_envs
actor_suffix: Tester
extensions:
    enabled:
        - Codeception\Extension\RunFailed
params:
    # load params from environment vars
    #- .env
    - .env.codeception.distrib
```

```bash
# The .env file to extrenalize the core values
# .env.codeception.distrib

# default setting for WP install
WP_HOST="http://codecept.mydomain.priv"

# Check `wp-config.php` top get the MySQL settings for WP
# MYSQL_DB_HOST="127.0.0.1"
# MYSQL_DB_HOST="localhost"
MYSQL_DB_HOST="db"
MYSQL_DB_NAME="codecept_wordpress"
MYSQL_DB_USER="codecept_wordpress"
MYSQL_DB_PASSWORD="codecept_wordpress_password"
MYSQL_DB_PORT="3306"
MYSQL_DB_DUMP_FILE_PATH="tests/_data/sql_dump/codecept_test_site_2_changed.sql"

# API for WP
WP_API_HOST="http://codecept.mydomain.priv/wp-json"
```



```bash

# same command
php vendor/bin/codecept build

# generate the test
php vendor/bin/codecept generate:cest acceptance Second


#run the test
php vendor/bin/codecept run --steps acceptance SecondCest

```


```bash
# go to the dir for WP
cd /Volumes/mi_disco/codeception-distrib-8/
# shutdown
make stop
make down

# go to the dir for proxy
cd /Volumes/mi_disco/codeception-distrib-8/proxy
# shutdown
docker-compose stop
docker-compose down
# check
docker network ls
# remove the network if needed
docker network rm proxy
```

```bash 

# --remove-orphans flag from docker-compose down allows the user to remove containers which were created in a previous run of docker-compose up
docker-compose down --remove-orphans

# just launch the build
docker-compose build

# start building the containers from docker-compose.yml, -d mean detached
docker-compose up -d

# stop the instance
docker-compose stop

# list the instances
docker-compose ps
```


```bash 

#List all containers (only IDs) 
docker ps -aq

#Stop all running containers. 
docker stop $(docker ps -aq)

#Remove all containers. 
docker rm $(docker ps -aq)

#Remove all images. 
docker rmi $(docker images -q)

#Be careful! This will remove all images
docker rmi -f $(docker images -q)

docker rmi -f <image_id>   

#list all the images
docker images -a
```


```applescript
(**
 * This file is part of the book package: "Defining a test strategy for a P.O?
 * Introduction to a "testing" framework CODECEPTION_. Usecase with WordPress."
 * (c) Bruno Flaven <info@flaven.fr>
 *
 * Intended to test a FRONTOFFICE and BACKOFFICE made with WP
 *
 * @package Codeception WordPress Testing
 * @subpackage BACKOFFICE
 * @since Codeception 3.1.1, WordPress 5.2.3
 *)

set MY_PATH to "open -a 'Terminal' /Volumes/mi_disco/codeception-distrib-4/"

-- set THEME to "Ocean"
set THEME to "Homebrew"
set CMD_1 to "pwd"
set CMD_2 to "php --version"
set CMD_3 to "php vendor/bin/codecept --version"
set CMD_4 to "clear"
(* do not use \n\n *)
set CMD_5 to "echo LAUNCH THE SHELL"

(* $set MY_SCRIPT to "php vendor/bin/codecept run --steps gherkin BackofficeLoginAdminAdvanced_1.feature" *)
set MY_SCRIPT to "sh launch_php_cp_good.sh"


if application "Terminal" is running then
    tell application "Terminal"
        do shell script MY_PATH
        set current settings of window 1 to settings set THEME
        do script CMD_1 in window 1
        do script CMD_2 in window 1
        do script CMD_3 in window 1
        delay 5
        do script CMD_4 in window 1
        do script MY_SCRIPT in window 1
    end tell
else
    tell application "Terminal"
        do shell script MY_PATH
        set current settings of window 1 to settings set THEME
        do script CMD_1 in window 1
        do script CMD_2 in window 1
        do script CMD_3 in window 1
        delay 5
        do script CMD_4 in window 1
        do script MY_SCRIPT in window 1
    end tell
end if
```


```bash
#!/bin/bash
# This file is part of the book package: "Defining a test strategy for a P.O?
# Introduction to a "testing" framework CODECEPTION_. Usecase with WordPress."
# (c) Bruno Flaven <info@flaven.fr>
#
# Intended to test a FRONTOFFICE and BACKOFFICE made with WP
#
# @package Codeception WordPress Testing
# @subpackage BACKOFFICE
# @since Codeception 3.1.1, WordPress 5.2.3
#

# #### USAGE
# cd /Volumes/mi_disco/codeception-distrib-4/
# sh launch_php_cp_good.sh
# chmod +x on a file (your script) only means, that you'll make it executable.
# chmod +x launch_php_cp_good.sh

### CONFIG ####
SCRIPT_VERB="run";
#SCRIPT_FILE="--steps frontoffice CheckWpFrontCest";
SCRIPT_FILE="--steps gherkin BackofficeLoginAdminAdvanced_1.feature";

# Other commands in comment
# php vendor/bin/codecept run --steps frontoffice CheckWpFrontCest
# php vendor/bin/codecept run --steps gherkin BackofficeLoginAdminAdvanced_1.feature

### ---  SCRIPT --- ###

### CONFIG ####
echo "\n"
echo "\033[1;33m ### START ### \033[0m"
echo "\n"


#SHOW
# echo "npx codeceptjs run --features  --steps"
echo "php vendor/bin/codecept "$SCRIPT_VERB" "$SCRIPT_FILE""
echo "\n"



### ---  EXECUTE --- ###
php vendor/bin/codecept $SCRIPT_VERB $SCRIPT_FILE



### ---  DONE --- ###
echo "\n\n"
echo "\033[1;33m ### END It is DONE !!! ### \033[0m"
echo "\n\n"
exit 0;
```

**To avoid any error regarding the terminal windows, I made a quick test to known if the terminal is open or not and then define a window e.g. window 1 where I set the settings and launch the script. The detection implies the fact if the terminal is closed we will get 2 windows.**


```bash
@echo off
: # This file is part of the book package: "Defining a test strategy for a P.O?
: # Introduction to a "testing" framework CODECEPTION_. Usecase with WordPress."
: # (c) Bruno Flaven <info@flaven.fr>
: #
: # Intended to test a FRONTOFFICE and BACKOFFICE made with WP
: # Codeception - PHP Testing framework
:
: # @package Codeception WordPress Testing
: # @subpackage BACKOFFICE
: # @since Codeception 3.1.1, WordPress 5.2.3
: #
    :::::::::::::::::::::::::::::::::::::::::::::
    ::                                         ::
    ::                                         ::
    ::      Launch Codeception PHP  Windows    ::
    ::                                         ::
    ::                                         ::
    ::                                         ::
    :: ======================================= ::
    ::                                         ::
    ::                                         ::
    ::                                         ::
    :::::::::::::::::::::::::::::::::::::::::::::

    :: copyright
 
    echo        === Run Codeception PHP on Windows ===
    echo        === version 1.0 ===
    echo.

    :: VALUES
 
    :: set your proper path
    set my_path_cp="C:\Users\bflaven\Documents\test_codeception\"

    set dd=%date:~0,2%
    set mm=%date:~3,2%
    set yyyy=%date:~6,4%
 
 
    set hour=%time:~0,2%
    set min=%time:~3,2%
    set sec=%time:~6,2%
    set mmsec=%time:~9,2%

    title  === Run Codeception PHP on Windows ===
    Color 0A
    :: Debug if needed
    :: cd "C:\Users\bflaven\Documents\test_codeception\"
    :: dir  /b /a-d
    :: dir \*
    echo === BEGIN ===
    echo.
    echo.
    cd %my_path_cp%
    echo.
    echo === DEBUG %my_path_cp% ===
    echo.
    echo.
        
            :: script goes here
            :: dir /b /a-d
            :: php vendor/bin/codecept run --steps frontoffice CheckWpFrontCest


            :: extra infos if needed
            :: php --version
            :: php vendor/bin/codecept --version

            :: SCRIPTS
             php vendor/bin/codecept run --steps frontoffice CheckWpFrontCest

            :: FEATURES
            :: php vendor/bin/codecept run --steps gherkin BackofficeLoginAdminAdvanced_1.feature

    :: ############################################################# // PUT YOUR CODE HERE
 
    pause>nul
```


```bash
# log as admin on your mac in the console
sudo -s

# edit the hosts file
vi /etc/hosts

# add to your hosts file for the jenkins tool
127.0.0.1 local.jenkins.flaven.net
```


```bash

# update homebrew
brew update
brew doctor

#launch the install, require java, required to login as admin on your machine
brew cask install homebrew/cask-versions/adoptopenjdk8

#launch the install of jenkins latest
brew install jenkins-lts

```

```bash
cat /Users/[your-mac-user-name]/.jenkins/secrets/initialAdminPassword
```


```bash
<string>--httpListenAddress=127.0.0.1</string>
```



```bash
<string>--httpListenAddress=0.0.0.0</string>
```



```bash
<string>--httpPort=9090</string>
```

```yaml
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
  <dict>
    <key>Label</key>
    <string>homebrew.mxcl.jenkins-lts</string>
    <key>ProgramArguments</key>
    <array>
      <string>/usr/libexec/java_home</string>
      <string>-v</string>
      <string>1.8</string>
      <string>--exec</string>
      <string>java</string>
      <string>-Dmail.smtp.starttls.enable=true</string>
      <string>-jar</string>
      <string>/usr/local/opt/jenkins-lts/libexec/jenkins.war</string>
      <string>--httpListenAddress=127.0.0.1</string>
      <string>--httpPort=9090</string>
    </array>
    <key>RunAtLoad</key>
    <true/>
  </dict>
</plist>

```

```bash
#To start Jenkins
brew services start jenkins-lts

#To stop Jenkins
brew services stop jenkins-lts

```


```bash
# add the PATH as Environment variables
# Print it in the console and add it to jenkins
echo $PATH
# Print out the path of your machine
#  just copy and paste /usr/local/sbin:/usr/local/opt/qt/bin:/anaconda3/bin:/usr/local/bin:/usr/bin:/bin:/usr/sbin:/sbin:/Library/TeX/texbin

```


```bash
# cp-using-jenkins-1
cd /Volumes/mi_disco/codeception-distrib-4/
sh launch_php_cp_good.sh
```

```bash
# cp-using-jenkins-2
cd /Volumes/mi_disco/codeception-distrib-4/
php vendor/bin/codecept run --steps frontoffice CheckWpFrontCest

```

```bash
# cp-using-jenkins-3
cd /Volumes/mi_disco/codeception-distrib-4/
php vendor/bin/codecept run --steps gherkin BackofficeLoginAdminAdvanced_1.feature
```

```bash
# cp-using-jenkins-4
cd /Volumes/mi_disco/codeception-distrib-4/
php vendor/bin/codecept run --steps api CheckWpApiGeneralCest
```


