<?php
/**
 * Template Name: Completed Assigments
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


<nav class="assignments">

	<button class="filter-assignments js-filter-button">
		Filter Assignments
		<div class="arrow-toggle">
			<svg viewbox="0 0 100 100">
			    <path class="arrow" d="M 50,0 L 60,10 L 20,50 L 60,90 L 50,100 L 0,50 Z "transform="translate(0,90) rotate(270) ">
			</svg>
		</div><!-- arrow toggle -->
	</button>

</nav>
<section class="assignment-links js-toggled-off">
<?php 
// Get the current page
$ID = get_the_ID();
$pageLink = get_page_link($ID);

// If the url parameter is set, we'll filter the results below
if(isset($_GET["focus_area"])) {
	$focusArea = $_GET["focus_area"];
} else {
	$focusArea = '';
}

// Run through the focus areas
$args = array( 
		'hide_empty' => false,
	);
 
$terms = get_terms( 'focus_area', $args );
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
    $count = count( $terms );
    
    echo '<ul>';

    foreach ( $terms as $term ) {
        
        echo '<li>';
        echo '<a href="'. $pageLink .'?focus_area='. $term->slug .'">' . $term->name . '</a>';
        echo '</li>';
    }

   echo '</ul>';
} ?>
</section>

<section class="completed" >
	<div id="assignments"></div>
	<div class="wrapper">
	<?php
	$wp_query = new WP_Query();

	// Depending on query, filter results
	if( $focusArea != '' ) {
		$wp_query->query(array(
			'post_type'=>'position',
			'posts_per_page' => -1,
			//'paged' => $paged,
			'tax_query' => array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'status', // taxonomy
					'field' => 'slug',
					'terms' => array( 'completed' ) // the terms 
				),
				array(
					'taxonomy' => 'focus_area', // taxonomy
					'field' => 'slug',
					'terms' => array( $focusArea ), // the terms 
					'operator' => 'AND'
				),
			)
		));

	} else {

		$wp_query->query(array(
			'post_type'=>'position',
			'posts_per_page' => -1,
			//'paged' => $paged,
			'tax_query' => array(
				array(
					'taxonomy' => 'status', // taxonomy
					'field' => 'slug',
					'terms' => array( 'completed' ) // the terms 
				)
			)
		));
	} // endif;
	
	if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); 

	$forWho = get_field('for_who');

	?>

		<div class="jobsquare">
			<div class="completed-square">
				<h3 class="completed"><?php the_title(); ?></h3>
				<?php if( $forWho != '' ) {echo '<p>'.$forWho.'</p>';}?>
			</div>
		</div><!-- jobsquare -->
	<?php endwhile; ?>
		
		<div class="jobsquare ">
			<a class="job-completed" href="<?php bloginfo('url'); ?>/contact">
			<div class="completed-square-red">
				<h3 class="talk">Let's Talk</h3>
				<p>about your open chair</p>
			</div>
			</a>
		</div><!-- jobsquare -->


		<?php	else:

				echo '<h3>There are no Completed Assignments in this Focus Area.</h3>';
	?>
<?php endif; ?>
</div><!-- wrapper -->
</section>	
<script type="text/javascript">

jQuery(document).ready(function ($) {

});// END #####################################    END
</script>
<?php
get_footer();
