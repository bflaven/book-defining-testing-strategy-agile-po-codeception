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

#CAUTION
php vendor/bin/codecept build


NOTE: *** MAKE IT WORK ***

cd /Users/brunoflaven/Documents/02_copy/_technical_training_zambia_znbc/13_testing_wp/codeception-distrib-4/

#CAUTION IT IS REQUIRED
php vendor/bin/codecept build


php vendor/bin/codecept run --steps documentation advancedUsageDocumentationCest
php vendor/bin/codecept run -vvv --steps documentation advancedUsageDocumentationCest
php vendor/bin/codecept run --debug --steps documentation advancedUsageDocumentationCest
php vendor/bin/codecept run --debug --steps documentation advancedUsageDocumentationCest

php vendor/bin/codecept run --steps documentation advancedUsageDocumentationCest:checkEndpoints

php vendor/bin/codecept run --steps documentation advancedUsageDocumentationCest:staticPagesJsonStyle

php vendor/bin/codecept run --steps documentation advancedUsageDocumentationCest:staticPagesDoctrineStyle


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


