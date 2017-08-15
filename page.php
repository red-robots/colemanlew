<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

<?php if(is_tree(5)) { ?>
	<nav class="sub-nav with-pad">
		<?php wp_nav_menu( array( 'theme_location' => 'about' ) ); ?>
	</nav>
<?php } ?>
<?php if(is_tree(456)) { ?>
	<nav class="sub-nav with-pad">
		<?php wp_nav_menu( array( 'theme_location' => 'capabilities' ) ); ?>
	</nav>
<?php } ?>

<div class="content-wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar(); ?>
</div><!-- wrapper -->
<?php
get_footer();
