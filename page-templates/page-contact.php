<?php
/**
 * Template Name: Contact
 */

get_header(); ?>
<div class="content-wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title js-last-word">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php
							$content = get_field('contact_info');
							$map = get_field('map');
							$aboveForm = get_field('above_form');
							$form_object = get_field('form');


							echo $content;

							
						?>
					</div><!-- .entry-content -->

					<div class="map">
						<?php echo $map; ?>
					</div>

					
				</article><!-- #post-## -->

			<?php endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<aside id="secondary" class="widget-area" role="complementary">
	<?php //dynamic_sidebar( 'sidebar-1' ); ?>

	<div class="widget">
		<?php echo $aboveForm; ?>
	</div>

	<div class="widget">
		<?php echo do_shortcode('[gravityform id="' . $form_object['id'] . '" title="false" description="false" ajax="false"]'); ?>
	</div>

</aside><!-- #secondary -->
</div><!-- wrapper -->
<?php
get_footer();
