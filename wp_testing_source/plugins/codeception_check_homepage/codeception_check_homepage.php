<?php
/**
 * @package codeception_check_homepage
 * @version 1.0
 */
/*
Plugin Name: codeception_check_homepage
Plugin URI: http://flaven.fr/
Description: Show class usage and check the homepage by inserting a comment. This plugin is part of the book package: "Defining a test strategy for a P.O? Introduction to a "testing" framework CODECEPTION_. Usecase with WordPress."
Author: Bruno Flaven
Version: 1.0
Author URI: http://flaven.fr/
*/

namespace codeceptCheckHomepage;

// If this file is accessed directory, then abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

Class codeceptCheckHomepage {

// Test with made with plugin codeceptjs_check_homepage
const PLUGIN_CHECK_HOMEPAGE_NAME='codecept_check_homepage';
const PLUGIN_CHECK_HOMEPAGE_SEEINSOURCE='codecept-source-code-testing-value-homepage-ok';
const PLUGIN_CHECK_HOMEPAGE_DONTSEEINSOURCE='codecept-source-code-testing-value-homepage-ko';

    
    public function __construct() {            
                    $this->init();
                }//EOF

     private function init() {

                // Hooks
                // add_action( 'admin_init', array( &$this, 'registerSettings' ) );
                // add_action( 'admin_menu', array( &$this, 'adminPanelsAndMetaBoxes' ) );
        

                // Frontend Hooks
                add_action( 'wp_head', array( &$this, 'frontendHomepage' ) );

                //Frontend Filter
                // add_filter('the_content', array( &$this, 'replace_content' ));

              
            }

    public function frontendHomepage() {

        
        if ( is_front_page() ) :
            
                // You are on the homepage
                $output = "\n\n";

/*
    * Ensure name (Site Title) and description (Tagline)
 */
/*
        $name = get_bloginfo( 'name' );
        $description = get_bloginfo( 'description' );
        
        $output .= '<!-- name: '.$name.' -->';
        $output .= "\n";
        $output .= '<!-- description: '.$description.' -->';
        $output .= "\n\n";
*/

                $output .= '<!-- '.trim(self::PLUGIN_CHECK_HOMEPAGE_NAME).' -->';
                $output .= "\n";
                $output .= '<!-- '.trim(self::PLUGIN_CHECK_HOMEPAGE_SEEINSOURCE).' -->';
                $output .= "\n\n";

        else :

                // You are somewhere else
                $output = "\n\n";
                $output .= '<!-- '.trim(self::PLUGIN_CHECK_HOMEPAGE_NAME).' -->';
                $output .= "\n";
                $output .= '<!-- '.trim(self::PLUGIN_CHECK_HOMEPAGE_DONTSEEINSOURCE).' -->';
                $output .= "\n\n";

        endif;

                echo $output;

    }

    

}//EOC
    
    /* Instantiate the Class in a variable */
    $changeHomepage = new codeceptCheckHomepage();
                    

?>
