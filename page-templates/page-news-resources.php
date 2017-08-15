<?php
/**
 * Template Name: News and Resources
 */

get_header(); ?>
<div class="content-wrapper">
	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

			<header class="entry-header">
				<h1 class="entry-title js-last-word"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->

			<?php
 		$i=0;
		$wp_query = new WP_Query();
		$wp_query->query(array(
		'post_type'=>'post',
		'paged' => $paged,
		'posts_per_page' => 12
	));
		if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); 

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

	 		pagi_posts_nav();

	 	endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->


</div><!-- wrapper -->
<?php
get_footer();
