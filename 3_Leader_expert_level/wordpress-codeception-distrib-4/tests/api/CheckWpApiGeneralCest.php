
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

NOTE: *** MAKE IT WORK ***

cd /Users/brunoflaven/Documents/02_copy/_technical_training_zambia_znbc/13_testing_wp/codeception-distrib-4/

#CAUTION IT IS REQUIRED
php vendor/bin/codecept build


php vendor/bin/codecept run --steps api CheckWpApiGeneralCest

php vendor/bin/codecept run --html --steps api CheckWpApiGeneralCest


php vendor/bin/codecept run -vvv --steps api CheckWpApiGeneralCest

php vendor/bin/codecept run --debug --steps api CheckWpApiGeneralCest

*/

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
