<?php
/**
 * Template Name: Our Process
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 

while ( have_posts() ) : the_post(); 

$content = get_field('page_content');
$steps = get_field('process');

$blockquotes = get_field('block_quotes', 'option');
$row_count = count($blockquotes);
$i = rand(0, $row_count - 1);



?>
<div class="content-wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title js-last-word">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php echo $content; ?>
				</div><!-- .entry-content -->

			</article><!-- #post-## -->

			
		</main><!-- #main -->
	</div><!-- #primary -->

	<div class="widget-area">
		<?php if( $blockquotes != '' ) { ?>
			<blockquote class="chair">
				<?php echo $blockquotes[ $i ]['block_quote']; ?>
			</blockquote>
		<?php } ?>
	</div><!-- side area -->

	<div class="clear"></div>

	<?php get_template_part('template-parts/process-steps') ?>

</div><!-- wrapper -->

<div class="div-border"></div>

<?php
endwhile; // End of the loop. ?>

<!-- 

			Curent Search Section

################################################-->
<section class="current-search-assignments">
<?php

/*  
*		Query Our Current Assignments Page's Content
*/
$post = get_post(17); 
setup_postdata( $post );
	echo '<h2 class="entry-title js-last-word">Current Search Assignments</h2>';
	echo '<div class="small-wrapper center-text entry-content">';
	the_content();
	echo '</div>';

wp_reset_postdata();


	$wp_query = new WP_Query();
	$wp_query->query(array(
		'post_type'=>'position',
		'posts_per_page' => -1,
		'paged' => $paged,
		'tax_query' => array(
			array(
				'taxonomy' => 'status', // taxonomy
				'field' => 'slug',
				'terms' => array( 'active' ) // the terms 
			)
		)
	));
	if ($wp_query->have_posts()) : ?>
	<div class="flexslider carousel">
		<ul class="slides">
			<?php while ($wp_query->have_posts()) : $wp_query->the_post(); 


?>	
			<li>
				<div class="jobsquare-slider ">
					<a class="" href="<?php the_permalink(); ?>">
						<h3><?php the_title(); ?></h3>
						<div class="focus-block-plus">
			 				<svg class="icon  icon--plus" viewBox="0 0 5 5" >
							    <path d="M2 1 h1 v1 h1 v1 h-1 v1 h-1 v-1 h-1 v-1 h1 z" />
							</svg>
						</div><!-- plus -->
					</a>
				</div><!-- jobsquare -->
			</li>

			<?php endwhile; ?>
		</ul>
	</div><!-- flexslider -->
<?php endif; ?>
</section>



<?php 
get_footer();
