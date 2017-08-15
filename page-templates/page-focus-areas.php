<?php
/**
 * Template Name: Focus Areas
 */

get_header(); 

// Get the Terms for Focus Areas
$cat_args=array(
  'orderby' => 'name',
  'order' => 'ASC',
  'hide_empty' => false
);
$categories=get_terms( 'focus_area', $cat_args );


?>

<nav class="sub-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'focus-areas' ) ); ?>
</nav>	


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

<aside id="secondary" class="widget-area" role="complementary">
	<?php //dynamic_sidebar( 'sidebar-1' ); ?>

	<?php 

	$blockquotes = get_field('blockquote');

	if( $blockquotes != '' ) { ?>
			<blockquote class="chair">
				<?php echo $blockquotes; ?>
			</blockquote>
		<?php } ?>

</aside><!-- #secondary -->
</div><!-- wrapper -->

<!-- 

			Focus Areas

################################################-->

<section class="focus-areas ">

	
	<?php 

	// Get my gallery from theme options
	$images = get_field('focus_area_photos', 'option');

	// Radomize them
	shuffle($images);

	// Remember, we got the terms when we started the page.

	// Loop through categories and randomly assign the image gallery to each category.
	foreach($categories as $category) : 
		
		echo '<div class="focus-block focus-block-large">';
		echo '<a href="'. get_bloginfo('url') . '/focus-area' . '/' . $category->slug . '">';
			// pop an image off;
			$element = array_pop($images);
			echo '<img src="'.$element['sizes']['large-square'] .'" alt="'.$element['alt'].'" />';

				// div info contents
				echo '<div class="focus-block-info">';
					echo '<div class="focus-block-pad">';
						echo '<h2>' . $category->name . '</h2>';
						echo '<div class="focus-block-plus"><svg class="icon  icon--plus" viewBox="0 0 5 5" ><path d="M2 1 h1 v1 h1 v1 h-1 v1 h-1 v-1 h-1 v-1 h1 z" /></svg></div>';
					echo '</div><!-- focus block pad -->';
				echo '</div><!-- focus block info -->';
				
			echo '</a>';
		echo '</div><!-- focus block -->';
			
	// echo '<pre>';
	// print_r($category);
	// echo '</pre>';
	 endforeach;


?>
	 <!-- Ending Block -->
	<div class="focus-block focus-block-large">
		<div class="focus-block-first-info">
			<!-- <h3 class="js-last-word">Our Focus Areas</h3> -->
			<p>Let us help you find <br> the <b>right person</b> for <br>the <b>right role</b>.</p>
		</div><!-- focus block first info -->
	</div><!-- focus block -->


</section><!-- focus areas -->
<?php
get_footer();
