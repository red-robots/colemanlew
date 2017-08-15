<?php
/**
 * Template Name: Advisory Board
 */

get_header(); ?>
<nav class="sub-nav with-pad">
	<?php wp_nav_menu( array( 'theme_location' => 'about' ) ); ?>
</nav>
<div class="content-wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.


			if(have_rows('advisory_board')) : while(have_rows('advisory_board')) : the_row();
				$name = get_sub_field('name');
				$desc = get_sub_field('description');
			?>

			<div class="entry-content">
				<h2><?php echo $name; ?></h2>
				<?php echo $desc; ?>
			</div>

		<?php endwhile; endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar(); ?>
</div><!-- wrapper -->
<?php
get_footer();
