<?php
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

php vendor/bin/codecept build


NOTE: *** MAKE IT WORK ***

cd /Volumes/mi_disco/_technical_training_zambia_znbc/13_testing_wp/codeception-distrib-4/


#CAUTION IT IS REQUIRED
php vendor/bin/codecept build


php vendor/bin/codecept run --steps functional ExampleOneFunctionalTestCest
php vendor/bin/codecept run -vvv --steps functional ExampleOneFunctionalTestCest
php vendor/bin/codecept run --debug --steps functional ExampleOneFunctionalTestCest
php vendor/bin/codecept run --debug --steps functional ExampleOneFunctionalTestCest
php vendor/bin/codecept run --debug --steps functional ExampleOneFunctionalTestCest:CheckRecordsDb
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

class ExampleOneFunctionalTestCest
{
	/**
   * @param \FunctionalTester $I
   * 
   */
  public function CheckRecordsDb(FunctionalTester $I) {
    $I->wantTo('Test - I can see post and page in the WP database');

      // Test for post
      $I->haveInDatabase('wp_posts', array('post_type' => 'post', 'post_title' => 'Hello world!', 'post_date' => ''.date("Y-m-d H:i:s", time()).'', 'post_date_gmt' => ''.date("Y-m-d H:i:s", time()).'', 'post_modified' => ''.date("Y-m-d H:i:s", time()).'', 'post_modified_gmt' => ''.date("Y-m-d H:i:s", time()).'', 'post_content' => 'Fake content for Hello world Post!!!',  'post_excerpt' => 'Fake post_excerpt for Hello world Post!!!','to_ping' => '', 'pinged' => '', 'post_content_filtered' => '' ));


      // Test for page
      $I->haveInDatabase('wp_posts', array('post_type' => 'page', 'post_title' => 'Sample Page', 'post_date' => ''.date("Y-m-d H:i:s", time()).'', 'post_date_gmt' => ''.date("Y-m-d H:i:s", time()).'', 'post_modified' => ''.date("Y-m-d H:i:s", time()).'', 'post_modified_gmt' => ''.date("Y-m-d H:i:s", time()).'', 'post_content' => 'Fake content for Hello world Post!!!',  'post_excerpt' => 'Fake post_excerpt for Hello world Post!!!','to_ping' => '', 'pinged' => '', 'post_content_filtered' => '' ));

      // SELECT * FROM `wp_posts` ORDER BY `wp_posts`.`comment_count` ASC
      // SELECT * FROM `wp_posts` WHERE `comment_count` != '0';
      // $I->seeInDatabase('wp_posts', ['comment_count LIKE' => '0']);
      $I->seeInDatabase('wp_posts', ['comment_count LIKE' => '0']);

      // SELECT *  FROM `wp_users` WHERE `user_email` LIKE '%gmail.com'
      $I->seeInDatabase('wp_users', ['user_email LIKE' => '%test.com']);
    

      // Check admin email
      $I->seeInDatabase('wp_users', ['user_login' => 'admin', 'user_email' => 'admin@test.com']);
      
	}//EOF      

}//EOC


/* VERSION 0
class ExampleOneFunctionalTestCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
    }
}
*/
