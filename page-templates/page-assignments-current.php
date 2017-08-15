<?php
/**
 * Template Name: Current Assignments
 */

get_header(); ?>
<div class="small-wrapper">
	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">
<?php while(have_posts()) : the_post(); ?>
			<header class="entry-header">
				<h1 class="entry-title js-last-word"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->

			<div class="entry-content center">
				<?php the_content(); ?>
			</div>
			
<?php endwhile; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- wrapper -->

<section class="completed">
	<div class="wrapper">
	<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
		'post_type'=>'position',
		'posts_per_page' => -1,
		//'paged' => $paged,
		'tax_query' => array(
			array(
				'taxonomy' => 'status', // taxonomy
				'field' => 'slug',
				'terms' => array( 'active' ) // the terms 
			)
		)
	));
	
	if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

		<div class="jobsquare job-acitve">
			<a class="job-active" href="<?php the_permalink(); ?>">
				<h3 class="current"><?php the_title(); ?></h3>
				<div class="focus-block-plus">
						<svg class="icon  icon--plus" viewBox="0 0 5 5" >
					    <path d="M2 1 h1 v1 h1 v1 h-1 v1 h-1 v-1 h-1 v-1 h1 z" />
					</svg>
				</div><!-- plus -->
			</a>
		</div><!-- jobsquare -->
	<?php endwhile; 

			else:

				echo '<h3>There are no Active Assignments.</h3>';
	?>
<?php endif; ?>
</div><!-- wrapper -->
</section>	

<?php
get_footer();
