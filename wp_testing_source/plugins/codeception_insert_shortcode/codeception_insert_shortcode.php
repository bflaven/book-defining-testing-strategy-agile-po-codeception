<?php
/**
 * @package codeception_insert_shortcode
 * @version 1.0
 */
/*
Plugin Name: codeception_insert_shortcode
Plugin URI: http://flaven.fr/
Description: Show class usage and insert shortcode with [codecept_welcome_msg]. This plugin is part of the book package: "Defining a test strategy for a P.O? Introduction to a "testing" framework CODECEPTION_. Usecase with WordPress.".
Author: Bruno Flaven
Version: 1.0
Author URI: http://flaven.fr/
*/
// If this file is accessed directory, then abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}
                    class codeceptInsertWelcomeMessage {
 
                    var $pluginPath;
                    var $pluginUrl;
 
                    public function __construct()
                    {
                        // Set Plugin Path
                        $this->pluginPath = dirname(__FILE__);
 
                        // Set Plugin URL
                        $this->pluginUrl = WP_PLUGIN_URL . '/codeception_insert_shortcode';
                        // This is the shortcode, followed by the function
                        add_shortcode('codecept_welcome_msg', array($this, 'codeceptWelcomeMsg'));
 
                    }
                    // Add [codecept_welcome_msg] in a post
                    public function codeceptWelcomeMsg ($content) {
                        return $content .= '<b>Testing WordPress with CODECEPTION_ using a WordPress plugin. <br>Shortcode plugin codeception_insert_shortcode</b><br><b>Using [codecept_welcome_msg], add to $content</b><br>';

                    }
 
 
                }//EOC
 
                /* Instantiate the Class */
                $codeceptInsertWelcomeMessage = new codeceptInsertWelcomeMessage;


?>
