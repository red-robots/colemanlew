<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title js-last-word">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php

		$content = get_field('content');
			//the_content();
		echo $content;

		if(is_page('sitemap') ) {
			wp_nav_menu( array( 'theme_location' => 'sitemap' ) );
		}

			
		?>
	</div><!-- .entry-content -->

	
</article><!-- #post-## -->
