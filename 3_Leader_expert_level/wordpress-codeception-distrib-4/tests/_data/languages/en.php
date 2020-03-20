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

define ('LANGUAGE_CHOSEN','en_US');

// Login
define('BASE_URL_LINK', 'http://codecept.mydomain.priv/wordpress');
define('LOGIN_USERNAME', 'admin');
define('LOGIN_PASSWORD', 'admin');

// Backoffice
define('DASHBOARD_H1', 'Dashboard');

// Settings Backoffice
define('GENERAL_SETTINGS_H1', 'General Settings');
define('GENERAL_BLOGNAME_VALUE','codecept_test_site');
define('GENERAL_BLOGDESCRIPTION_VALUE', 'Just another WordPress site');
define('GENERAL_SITEURL_VALUE', 'http://codecept.mydomain.priv/wordpress');
define('GENERAL_HOME_VALUE', 'http://codecept.mydomain.priv/wordpress');
define('GENERAL_NEW_ADMIN_EMAIL_VALUE', 'admin@test.com');


define('WRITING_SETTINGS_H1', 'Writing Settings');
define('READING_SETTINGS_H1', 'Reading Settings');
define('DISCUSSION_SETTINGS_H1', 'Discussion Settings');
define('MEDIA_SETTINGS_H1', 'Media Settings');
define('PERMALINK_SETTINGS_H1', 'Permalink Settings');
define('PRIVACY_SETTINGS_H1', 'Privacy Settings');


// Post Backoffice
define('POST_NEW_LABEL', 'Add New');
define('POST_NEW_TITLE', 'Add New Post');
define('POST_VIEW_POST_LABEL', 'View Post');

// Category Backoffice
define('CATEGORIES_NEW_LABEL', 'Categories');
define('CATEGORIES_NEW_TITLE', 'Categories');
             

// Tags Backoffice
define('TAGS_NEW_LABEL', 'Tags');
define('TAGS_NEW_TITLE', 'Tags');


//Datas for advanced post CheckWpBackCreateAdvancedPostPlusCest.php

// Works as of PHP 7
	/*
			First set of post's categories and tags  
	*/

define('POST_CATEGORY_CHECKLIST', array(
    '#in-category-4',
    '#in-category-8',
    '#in-category-12',
    '#in-category-7',
    '#in-category-5'
));

define('POST_TAGS_LIST', 'Test, Testing, WordPress, Backoffice, Frontoffice, Creation, Blog, PHP,  Codeception, Development, Q/A, Agile, Continuous integration, Product Owner, User story, Gherkin, Tutorial');



/*
			Second set of post's categories and tags  
	*/

/*
define('POST_CATEGORY_CHECKLIST', array(
    '#in-category-3',
    '#in-category-9',
    '#in-category-6',
    '#in-category-12',
    '#in-category-11'
));

define('POST_TAGS_LIST', 'WordPress, Plugin, Drupal, PHP, Development, CI, Cypress, Feature, Gherkin, Laravel, Symfony, OOP');
*/

// Plugins Backoffice
define('PLUGINS_NEW_LABEL', 'Plugins');
define('PLUGINS_NEW_TITLE', 'Plugins');
define('PLUGINS_ADD_NEW_LABEL', 'Add New');
define('PLUGINS_ADD_PLUGINS_LABEL', 'Add Plugins');
define('PLUGINS_UPLOAD_PLUGIN_LABEL', 'Upload Plugin');

//Datas for advanced post CheckWpBackPluginActivationDesactivationCest.php
// Useful for bulk action,  All | Active | Inactive | Recently Active

define('PLUGINS_INACTIVE_BULK_ACTION_CHECKLIST', array(
'codeception_modify_header_footer',
'Hello Dolly'
));
/*
define('PLUGINS_ACTIVE_BULK_ACTION_CHECKLIST', array(
'codeception_modify_header_footer',
'Hello Dolly'
));
*/

define('PLUGINS_ACTIVE_BULK_ACTION_CHECKLIST', array(
'Classic Editor',
'codeception_insert_shortcode',
'Debug Bar',
'Debug This',
'Duplicate Post',
'Query Monitor',
'Reveal IDs',
'Simple Tags'
));

//Datas for plugin testing
// CheckWpBackNewPluginSearchAndInstallPluginsDirectoryCest.php
/*
Keyword: wordpressdotorg (term)
Author: Automattic (author)
Tag : Editor (tag)
*/

define('PLUGINS_ADD_PLUGINS_KEYWORD_SEARCH', 'wordpressdotorg');
define('PLUGINS_ADD_PLUGINS_AUTHOR_SEARCH', 'Automattic');
define('PLUGINS_ADD_PLUGINS_TAG_SEARCH', 'Editor');

//Datas for theme testing
// CheckWpBackNewThemeUploadZipInstallCest.php
// CheckWpBackNewThemeSearchThemesDirectoryCest.php
// CheckWpBackNewThemeUploadZipInstallPlusCest.php
// Themes Backoffice
define('THEMES_NEW_LABEL', 'Themes');
define('THEMES_ADD_NEW_LABEL', 'Add Themes');
define('THEMES_TESTING_SOURCE', 'files/aaa-ladybird-prisca.zip');
define('THEMES_TESTING_SOURCE_LABEL', 'aaa-ladybird-prisca');
define('THEMES_TESTING_SEARCH_WORD', 'Mobile responsive');


//Datas for plugin testing codeception_journalist_extended_profile
// TODO


//Datas for plugin testing codeception_journalist_extended_profile
define('CP_CODECEPTION_JOURNALIST_EXTENDED_PROFILE_VALUE_TWITTER_ACCOUNT', 'post_meta twitter_account');
define('CP_CODECEPTION_JOURNALIST_EXTENDED_PROFILE_VALUE_FACEBOOK_ACCOUNT', 'post_meta facebook_account');
define('CP_CODECEPTION_JOURNALIST_EXTENDED_PROFILE_VALUE_LINKEDIN_ACCOUNT', 'post_meta linkedin_account');


define('CP_CODECEPTION_JOURNALIST_EXTENDED_PROFILE_VALUE_CUSTOM_TAXONOMY_EXPERTISES', 'custom_taxonomy expertises');
define('CP_CODECEPTION_JOURNALIST_EXTENDED_PROFILE_VALUE_CUSTOM_TAXONOMY_LANGUAGES', 'custom_taxonomy languages');


?>
