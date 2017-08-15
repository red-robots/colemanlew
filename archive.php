<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="content-wrapper">
	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

		<?php
		$i=0;
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); 

			$i++;
			if( $i == 3 ) {
				$class = 'news-last-post';
				$i=0;
			} else {
				$class = 'news-first-post';
			}

			?>

				<article class="news-post <?php echo $class; ?>">
		 			<h2 class="js-title"><?php the_title(); ?></h2>
		 			<div class="excerpt js-paragraph">
			 			<?php echo get_excerpt(20); ?>
			 		</div><!-- excerpt -->
		 			<div class="readmore">
		 				<a href="<?php the_permalink(); ?>">Continue Reading</a>
		 				<div class="plus">
			 				<svg class="icon  icon--plus-red" viewBox="0 0 5 5" >
							    <path d="M2 1 h1 v1 h1 v1 h-1 v1 h-1 v-1 h-1 v-1 h1 z" />
							</svg>
						</div><!-- plus -->
		 			</div>
		 		</article>

			<?php endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar(); ?>
</div><!-- wrapper -->
<?php
get_footer();
