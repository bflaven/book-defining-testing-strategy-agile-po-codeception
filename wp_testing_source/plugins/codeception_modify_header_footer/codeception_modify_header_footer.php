<?php
/**
 * @package codeception_modify_header_footer
 * @version 1.0
 */
/*
Plugin Name: codeception_modify_header_footer
Plugin URI: http://flaven.fr/
Description: Show class usage and change header and footer. This plugin is part of the book package: "Defining a test strategy for a P.O? Introduction to a "testing" framework CODECEPTION_. Usecase with WordPress."
Author: Bruno Flaven
Version: 1.0
Author URI: http://flaven.fr/
*/

namespace codeceptModifyHeaderFooter;

// If this file is accessed directory, then abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

Class codeceptModifyHeaderFooter {

// Test with made with plugin codeceptjs_check_homepage
const PLUGIN_CHECK_HOMEPAGE_NAME='codeception_modify_header_footer';
const PLUGIN_CHECK_HEADER='     cp-source-code-testing-value-header';
const PLUGIN_CHECK_FOOTER='cp-source-code-testing-value-footer';

    
    public function __construct() {            
                    $this->init();
                }//EOF

     private function init() {

                // Hooks
                // add_action( 'admin_init', array( &$this, 'registerSettings' ) );
                // add_action( 'admin_menu', array( &$this, 'adminPanelsAndMetaBoxes' ) );
        

                // Frontend Hooks
                add_action( 'wp_head', array( &$this, 'frontendHeader' ) );
                add_action( 'wp_footer', array( &$this, 'frontendFooter' ) );

                //Frontend Filter
                // add_filter('the_content', array( &$this, 'replace_content' ));

              
            }

    public function frontendHeader() {
    
        $output = "\n\n";
        $output .= '<!-- '.trim(self::PLUGIN_CHECK_HOMEPAGE_NAME).' -->';
        $output .= "\n";
        $output .= '<!-- '.trim(self::PLUGIN_CHECK_HEADER).' -->';
        $output .= "\n\n";

        echo $output;
    }

    public function frontendFooter() {
    
        $output = "\n\n";
        $output .= '<!-- '.trim(self::PLUGIN_CHECK_HOMEPAGE_NAME).' -->';
        $output .= "\n";
        $output .= '<!-- '.trim(self::PLUGIN_CHECK_FOOTER).' -->';
        $output .= "\n\n";
        echo $output;
    }


    

}//EOC
    
    /* Instantiate the Class in a variable */
    $changeTheme = new codeceptModifyHeaderFooter();
                    

?>
