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
                $I->seeNumRecords(59, 'wp_users');   //executed on default database
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
                // $I->see(PRIVACY_SETTINGS_H1, '#wpbody-content > div.wrap > h1');

                $I->comment("\n--- NO TEST the page exists, that's all folks!");


        }


}
