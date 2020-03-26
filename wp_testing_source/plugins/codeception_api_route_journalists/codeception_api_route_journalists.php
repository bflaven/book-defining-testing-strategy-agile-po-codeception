<?php
/**
 * @package codeception_api_route_journalists
 * @version 1.0
 */
/*
Plugin Name: codeception_api_route_journalists
Plugin URI: http://flaven.fr/
Description: Show class usage and change header and footer. This plugin is part of the book package: "Defining a test strategy for a P.O? Introduction to a "testing" framework CODECEPTION_. Usecase with WordPress.". It requires the plugins: codeception_journalist_extended_profile, ACF to REST API,    
Advanced Custom Fields.
Author: Bruno Flaven
Version: 1.0
Author URI: http://flaven.fr/
*/

namespace codeceptionApiRouteJournalists;

// If this file is accessed directory, then abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

Class codeceptionApiRouteJournalists {

// Test with made with plugin codeception_journalist_extended_profile
const PLUGIN_POST_TYPE='journalists';

const PLUGIN_POST_TYPE_FIELD_AUTHOR='author';
const PLUGIN_POST_TYPE_FIELD_TITLE='title';
const PLUGIN_POST_TYPE_FIELD_EXCERPT='excerpt';
const PLUGIN_POST_TYPE_FIELD_CONTENT='content';


const PLUGIN_POST_TYPE_ACF_TWITTER_ACCOUNT='twitter_account';
const PLUGIN_POST_TYPE_ACF_FACEBOOK_ACCOUNT='facebook_account';
const PLUGIN_POST_TYPE_ACF_LINKEDIN_ACCOUNT='linkedin_account';
const PLUGIN_POST_TYPE_TAXO_EXPERTISES='expertises';
const PLUGIN_POST_TYPE_TAXO_LANGUAGES='languages';


                public function __construct() {            
                                $this->init();
                            }

                private function init() {

                    add_action('rest_api_init', array($this, 'register'));
              
                }

                //methods
                public function activate() {
                    flush_rewrite_rules();
                }

                public function deactivate() {
                    flush_rewrite_rules();
                }

                public function register() {

                    register_rest_route( 'journalists/v1', '/profiles', array(
                            'methods' => 'GET',
                            'callback' => array($this,'get_journalists'),
                            )
                    );
                    /*
                    (?P<id>\d+)
                    (?P<id>[\\d]+)
                     */
                    register_rest_route( 'journalists/v1', '/profile/(?P<id>\d+)', array(
                            'methods' => 'GET',
                            'callback' => array($this,'get_journalist'),
                            
                            ));


                }//EOF

                
                public function get_journalists() {
                // default the author list to all
                $post_author = 'all';

                /*
                    * Post_type for journalists
                 */
                // Define the post_type journalists
                $args_get_journalists = array(
                        'numberposts'      => -1,
                        'orderby'         => 'title', // or 'date', 'rand'
                        'order'       => 'ASC', // or 'DESC'
                        'post_status' => 'publish',
                        // 'category'         => 0,
                        // 'orderby'          => 'date',
                        // 'order'            => 'DESC',
                        // 'include'          => array(),
                        // 'exclude'          => array(),
                        // 'meta_key'         => '',
                        // 'meta_value'       => '',
                        'post_type'        => ''.trim(self::PLUGIN_POST_TYPE).'',
                        // 'post_type'        => 'journalists',
                        
                        );

                // var_dump($args_get_journalists);


                // get the posts
                $posts_list = get_posts( $args_get_journalists);
                
                // var_dump($posts_list);

                $post_data = array();

/*
                foreach( $posts_list as $posts) {
                    $post_id = $posts->ID;
                 }

*/
                
                foreach( $posts_list as $posts) {
                    $post_id = $posts->ID;
                    $post_author = get_the_author_meta( 'display_name', $posts->post_author );
                    $post_title = $posts->post_title;
                    $post_content = $posts->post_content;
                    $post_excerpt = $posts->post_excerpt;

                    // Custom fields made with ACF
                    $post_twitter = get_field(''.trim(self::PLUGIN_POST_TYPE_ACF_TWITTER_ACCOUNT).'', $posts->ID); 
                    $post_facebook = get_field(''.trim(self::PLUGIN_POST_TYPE_ACF_FACEBOOK_ACCOUNT).'', $posts->ID); 
                    $post_linkedin = get_field(''.trim(self::PLUGIN_POST_TYPE_ACF_LINKEDIN_ACCOUNT).'', $posts->ID); 
                    

                    /*
                        * Taxonomies attched to the post_type
                        * expertises, languages
                     */
                    /* V1 */                    
                    // $expertises = get_the_terms( $posts->ID , 'expertises');
                    // $languages = get_the_terms( $posts->ID , 'languages');

                    /* V2 */
                     $expertises = wp_get_post_terms( $posts->ID, ''.trim(self::PLUGIN_POST_TYPE_TAXO_EXPERTISES).'', array( 'fields' => 'all' ) );
                    $languages = wp_get_post_terms( $posts->ID, ''.trim(self::PLUGIN_POST_TYPE_TAXO_LANGUAGES).'', array( 'fields' => 'all' ) );


                    // Add to json
                    
                    $post_data[ $post_id ][ ''.trim(self::PLUGIN_POST_TYPE_FIELD_AUTHOR).'' ] = $post_author;
                    $post_data[ $post_id ][ ''.trim(self::PLUGIN_POST_TYPE_FIELD_TITLE).'' ] = $post_title;
                    $post_data[ $post_id ][ ''.trim(self::PLUGIN_POST_TYPE_FIELD_EXCERPT).'' ] = $post_excerpt;
                    $post_data[ $post_id ][ ''.trim(self::PLUGIN_POST_TYPE_FIELD_CONTENT).'' ] = $post_content;
                    $post_data[ $post_id ][ ''.trim(self::PLUGIN_POST_TYPE_ACF_TWITTER_ACCOUNT).'' ] = $post_twitter;
                    $post_data[ $post_id ][ ''.trim(self::PLUGIN_POST_TYPE_ACF_FACEBOOK_ACCOUNT).'' ] = $post_facebook;
                    $post_data[ $post_id ][ ''.trim(self::PLUGIN_POST_TYPE_ACF_LINKEDIN_ACCOUNT).'' ] = $post_linkedin;
                    $post_data[ $post_id ][ ''.trim(self::PLUGIN_POST_TYPE_TAXO_EXPERTISES).'' ] =  $expertises;
                    $post_data[ $post_id ][ ''.trim(self::PLUGIN_POST_TYPE_TAXO_LANGUAGES).'' ] =  $languages;         
                
                }
                
                wp_reset_postdata();
                
                return rest_ensure_response( $post_data );
            }//EOF

            
            function get_journalist( $data ) {
            
                    $post_id = $data[ 'id' ];
                   // print_r($post_id);
                    
                    // if ID is set
                    if( isset( $data[ 'id' ] ) ) {
                          $post_id = $data[ 'id' ];
                    }
                    
                    
                    $post = get_post( $post_id);
                    $post_data = array();


                    $post_id = $post->ID;
                    $post_author = get_the_author_meta( 'display_name', $post->post_author );
                    $post_title = $post->post_title;
                    $post_content = $post->post_content;
                    $post_excerpt = $post->post_excerpt;

                    // Custom fields made with ACF
                    $post_twitter = get_field(''.trim(self::PLUGIN_POST_TYPE_ACF_TWITTER_ACCOUNT).'', $post->ID); 
                    $post_facebook = get_field(''.trim(self::PLUGIN_POST_TYPE_ACF_FACEBOOK_ACCOUNT).'', $post->ID); 
                    $post_linkedin = get_field(''.trim(self::PLUGIN_POST_TYPE_ACF_LINKEDIN_ACCOUNT).'', $post->ID); 
                    

                    /*
                        * Taxonomies attched to the post_type
                        * expertises, languages
                     */
                    /* V1 */                    
                    // $expertises = get_the_terms( $post->ID , 'expertises');
                    // $languages = get_the_terms( $post->ID , 'languages');

                    /* V2 */
                    $expertises = wp_get_post_terms( $post->ID, ''.trim(self::PLUGIN_POST_TYPE_TAXO_EXPERTISES).'', array( 'fields' => 'all' ) );
                    $languages = wp_get_post_terms( $post->ID, ''.trim(self::PLUGIN_POST_TYPE_TAXO_LANGUAGES).'', array( 'fields' => 'all' ) );


                    // Add to json
                    $post_data[ $post_id ][ ''.trim(self::PLUGIN_POST_TYPE_FIELD_AUTHOR).'' ] = $post_author;
                    $post_data[ $post_id ][ ''.trim(self::PLUGIN_POST_TYPE_FIELD_TITLE).'' ] = $post_title;
                    $post_data[ $post_id ][ ''.trim(self::PLUGIN_POST_TYPE_FIELD_EXCERPT).'' ] = $post_excerpt;
                    $post_data[ $post_id ][ ''.trim(self::PLUGIN_POST_TYPE_FIELD_CONTENT).'' ] = $post_content;
                    $post_data[ $post_id ][ ''.trim(self::PLUGIN_POST_TYPE_ACF_TWITTER_ACCOUNT).'' ] = $post_twitter;
                    $post_data[ $post_id ][ ''.trim(self::PLUGIN_POST_TYPE_ACF_FACEBOOK_ACCOUNT).'' ] = $post_facebook;
                    $post_data[ $post_id ][ ''.trim(self::PLUGIN_POST_TYPE_ACF_LINKEDIN_ACCOUNT).'' ] = $post_linkedin;
                    $post_data[ $post_id ][ ''.trim(self::PLUGIN_POST_TYPE_TAXO_EXPERTISES).'' ] =  $expertises;
                    $post_data[ $post_id ][ ''.trim(self::PLUGIN_POST_TYPE_TAXO_LANGUAGES).'' ] =  $languages;      

                    // wp_reset_postdata();
                    return rest_ensure_response( $post_data );
                }
        
            

            public function get_twitter_account(WP_REST_Request $request) {
                            extract($request->get_params());
                                return ['rating' => get_post_meta($id, 'rating', true)];
                }

}//EOC
    
    /* Instantiate the Class in a variable */
    $ApiRouteJournalists = new codeceptionApiRouteJournalists();
                    

?>
