<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause()
 *
 * @SuppressWarnings(PHPMD)
*/
class GherkinTester extends \Codeception\Actor
{
    use _generated\GherkinTesterActions;

   /**
    * Define custom actions here
    */
   

 /* ----------------------------------------- */

/**
     * @Given I have installed codeception:
     */
     public function iHaveInstalledCodeception()
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I have installed codeception:` is not defined");


                // This is my very light Definition of Done (DoD) for iHaveInstalledCodeception ()
                 
         $this->comment("Trust me you have CP installed!");
          
     }

    /**
     * @Then I should see in file :arg1 :arg2
     */
    /*
     public function iShouldSeeInFile($arg1, $arg2)
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `I should see in file :arg1 :arg2` is not defined");
     }
     */
     public function iShouldSeeInFile($fileName, $fileContents)
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I should see in file :arg1 :arg2` is not defined");

        // note: module "Asserts" is enabled in this suite
        // check gherkin.suite.yml
        if (!file_exists($fileName)) {
            $this->fail("File $fileName not found");
        }
        $this->assertEquals(file_get_contents($fileName), $fileContents);
     }

 /**
     * @Given I have posts in database:
     */
     public function iHavePostsInDatabase()
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I have posts in database:` is not defined");
            // SELECT count(*) FROM `wp_users` WHERE `ID` != 0
                $this->seeInDatabase('wp_posts', ['ID >' => '0']);
     }

    /**
     * @When I am on page :arg1
     */
    
     public function iAmOnPage($page)
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I am on page :arg1` is not defined");
         $this->amOnPage($page);

     }
    
    /**
     * @Then I see number of elements :arg1 and expected :arg2
     */
     public function iSeeNumberOfElementsAndExpected($selector, $expected)
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I see number of elements :arg1 and expected :arg2` is not defined");
         $this->seeNumberOfElements($selector, $expected);

     }

/**
     * @Then I should be on :arg1
     */
     
     public function iShouldBeOn($arg1)
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I should be on :arg1` is not defined");
         $this->amOnPage($arg1);
     }
     

    /**
     * @Given I am logged in as :arg1
     */
     public function iAmLoggedInAs($arg1)
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I am logged in as :arg1` is not defined");
     }

    /**
     * @Given I am on admin dashboard
     */
     public function iAmOnAdminDashboard()
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I am on admin dashboard` is not defined");
         // Go to the Admin page
        $this->amOnPage('/wp-admin/');
        $this->see('Dashboard');
     }

    /**
     * @When I follow :arg1 within :arg2
     */
     public function iFollowWithin($arg1, $arg2)
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I follow :arg1 within :arg2` is not defined");
         $this->click($arg1, $arg2);
     }

     /*
      > ul > li:nth-child(3) > a

      */

    /**
     * @Then I should see :arg1
     */
     
     public function iShouldSee($string)
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I should see :arg1` is not defined");
         // NOT 2 arguments
         // $this->see('Add New Post', ['xpath' => '//*[@id="wpbody-content"]/div[3]/h1']);
         // #wpbody-content > div.wrap > h1
         $this->see($string);
     }
    
   
    /**
     * @When I fill in :arg1 with :arg2
     */
    
     public function iFillInWith($arg1, $arg2)
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I fill in :arg1 with :arg2` is not defined");
         $this->fillField($arg1, $arg2);
     }
    
    /**
     * @When I press :arg1
     */
    
     public function iPress($arg1)
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I press :arg1` is not defined");
         $this->click($arg1);
     }
    
   
    /**
     * @Then there should be :num1 post
     */
     public function thereShouldBePost($num1)
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `there should be :num1 post` is not defined");

                // SELECT count(*) FROM `wp_posts` WHERE `ID` != 0
                $this->seeInDatabase('wp_posts', ['ID !=' => '0']);
     }

    /**
     * @Given I am on homepage
     */
     public function iAmOnHomepage()
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I am on homepage` is not defined");
         $this->amOnPage('/');
     }

    /**
     * @Given I have a vanilla wordpress installation
     */
     
     public function iHaveAVanillaWordpressInstallation()
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I have a vanilla wordpress installation` is not defined");
                
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
    
   
    /**
     * @Given there are users
     */
     public function thereAreUsers()
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `there are users` is not defined");
         
        // CAUTION Supported operators: <, >, >=, <=, !=, like.
        // CAUTION you must know the number of users inside the table wp_users
        // e.g. SELECT COUNT(*) FROM wp_users
        $this->seeNumRecords(13, 'wp_users');

        // SELECT count(*) FROM `wp_users` WHERE `ID` != 0
        $this->seeInDatabase('wp_users', ['ID !=' => '0']);

        // SELECT count(*) FROM `wp_users` WHERE `ID` > 0                
        $this->seeInDatabase('wp_users', ['ID >' => '0']);

        // SELECT count(*) FROM `wp_users` WHERE `user_login` = 'admin' AND `user_email` = 'admin@test.com';
         $this->seeInDatabase('wp_users', ['user_login' => 'admin', 'user_email' => 'admin@test.com']);
           
         
     }

    /**
     * @Given I am on :arg1
     */
    
     public function iAmOn($uri)
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I am on :arg1` is not defined");
         $this->amOnPage($uri);
     }
     

/**
     * @When the admin menu should appear as
     */
        public function theAdminMenuShouldAppearAs(\Behat\Gherkin\Node\TableNode $items)
        {
        
        $rows = $items->getRows();

        // throw new \PHPUnit\Framework\IncompleteTestError("Step `the admin menu should appear as` is not defined");             
                foreach ($rows as $index => $row) {
                    
                    if ($index === 0) { 
                        $keys = $row;
                        continue; 
                        }

                    foreach (array_keys($row) as $col) {
                            $this->see($row[$col]); 
                        }
                }
            
        }

/**
     * @When I go to :arg1
     */
     public function iGoTo($arg1)
     {
         // throw new \PHPUnit\Framework\IncompleteTestError("Step `I go to :arg1` is not defined");
        $this->amOnPage($arg1);
     }
 /* ----------------------------------------- */
}
