<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>
<code>content-journalist.php</code><br>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( is_sticky() && is_home() ) :
		echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
	endif;
	?>
	<header class="entry-header">
		<?php
		if ( 'post' === get_post_type() ) {
			echo '<div class="entry-meta">';
			if ( is_single() ) {
				twentyseventeen_posted_on();
			} else {
				echo twentyseventeen_time_link();
				twentyseventeen_edit_link();
			};
			echo '</div><!-- .entry-meta -->';
		};

		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} elseif ( is_front_page() && is_home() ) {
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		} else {
			//To grab more easily the journalist name, I insert 
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" aria-label="' . $post->post_title . '">', '</a></h2>' );
			
			
		}

		?>

<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>	



<!--  plugin codeception_journalist_extended_profile  -->
<div class="entry-meta">

<!-- post_meta twitter_account -->
<b>Twitter:</b>&nbsp;<a href="https://www.twitter.com/<?php echo get_post_meta(get_the_ID(), 'twitter_account', TRUE); ?>" target="_blank" <?php /* echo ('aria-label="'.get_post_meta(get_the_ID(), 'twitter_account', TRUE).'"'); */ ?> ><?php echo get_post_meta(get_the_ID(), 'twitter_account', TRUE); ?></a><br>


<!-- post_meta facebook_account -->
<b>Facebook:</b>&nbsp;<a href="https://www.facebook.com/<?php echo get_post_meta(get_the_ID(), 'facebook_account', TRUE); ?>" target="_blank" <?php /* echo ('aria-label="'.get_post_meta(get_the_ID(), 'facebook_account', TRUE).'"'); */ ?> ><?php echo get_post_meta(get_the_ID(), 'facebook_account', TRUE); ?></a><br>

<!-- post_meta linkedin_account -->
<b>Linkedin:</b>&nbsp;<a href="https://www.linkedin.com/in/<?php echo get_post_meta(get_the_ID(), 'linkedin_account', TRUE); ?>" target="_blank" <?php /* echo ('aria-label="'.get_post_meta(get_the_ID(), 'linkedin_account', TRUE).'"'); */ ?> ><?php echo get_post_meta(get_the_ID(), 'linkedin_account', TRUE); ?></a><br>
</div><br>

<!-- custom_taxonomy expertises -->

<?php 
// Version 1 
// the_terms( $post->ID, 'expertises', '<b>Expertises:</b> ', ' / '); 
// echo ('<br>');

// Version 2
$terms = wp_get_post_terms( $post->ID, 'expertises', array( 'fields' => 'all' ) );
echo ('<b>Expertises:</b>');
echo '';
// Loop through all terms with a foreach loop
foreach( $terms as $term ) {
    // Use get_term_link to get terms permalink
    // USe $term->name to return term name
    echo ' <a href="'. get_term_link( $term ) .'" rel="tag" aria-label="'. $term->name .'">'. $term->name .'</a>&nbsp;';
}
echo '<br>';


/*  MODELS
//Returns All Term Items for "my_taxonomy".
$term_list = wp_get_post_terms( $post->ID, 'expertises', array( 'fields' => 'all' ) );
// print_r( $term_list );
 
// Returns Array of Term Names for "my_taxonomy".
$term_list = wp_get_post_terms( $post->ID, 'expertises', array( 'fields' => 'names' ) );
// print_r( $term_list );
 
// Returns Array of Term ID's for "my_taxonomy".
$term_list = wp_get_post_terms( $post->ID, 'expertises', array( 'fields' => 'ids' ) );
// print_r( $term_list );
*/

?>


<!-- custom_taxonomy languages -->
<?php
// Version 1 
// the_terms( $post->ID, 'languages', '<b>Languages:</b> ', ' / '); 
// echo ('<br>');

// Version 2
$terms = wp_get_post_terms( $post->ID, 'languages', array( 'fields' => 'all' ) );
echo ('<b>Expertises:</b>');
echo '';
// Loop through all terms with a foreach loop
foreach( $terms as $term ) {
    // Use get_term_link to get terms permalink
    // USe $term->name to return term name
    echo ' <a href="'. get_term_link( $term ) .'" rel="tag" aria-label="'. $term->name .'">'. $term->name .'</a>&nbsp;';
}
echo '<br>';


?>

<hr>
<!-- // plugin codeception_journalist_extended_profile -->


	</header><!-- .entry-header -->



	<div class="entry-content">
		<?php
		/* translators: %s: Name of current post */
		the_content(
			sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php
	if ( is_single() ) {
		twentyseventeen_entry_footer();
	}
	?>

</article><!-- #post-## -->
