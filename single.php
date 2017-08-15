<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="content-wrapper">
	<div id="primary" class="content-area-post js-blocks">
		<main id="main" class="site-main single" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			//the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<div class="widget-area-post js-blocks">
	<h3>Archives</h3>
	<?php wp_get_archives( array( 
		'type' => 'monthly', 
		'limit' => 12,
		'format' => 'custom',
		'before' => '<li>',
		'after' => '<div class="plus">
		 				<svg class="icon  icon--plus-red" viewBox="0 0 5 5" >
						    <path d="M2 1 h1 v1 h1 v1 h-1 v1 h-1 v-1 h-1 v-1 h1 z" />
						</svg>
					</div><!-- plus --></li>'
	) ); ?>
</div><!-- widget area -->


</div><!-- wrapper -->
<?php
get_footer();
