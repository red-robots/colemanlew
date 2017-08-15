<?php
/**
   Taxonomy template for Focus Areas
 
		
*/

get_header();

// get some info about the term queried
$queried_object = get_queried_object(); 
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id; 
$slug = $queried_object->slug; 
$name = $queried_object->name; 

// Custom Fields
$blockquote = get_field('block_quote', $taxonomy . '_' . $term_id);
$desc = get_field('description', $taxonomy . '_' . $term_id);

// Get my gallery from theme options
$images = get_field('focus_area_photos', 'option');
// Radomize them
shuffle($images);
// pop an image off one time to show the hero.
// We'll also use that image below to match the page to it's image.
$firstElement = array_pop($images);
// echo '<pre>';
// print_r($firstElement);
// echo '</pre>';

// Get the Terms for Focus Areas but use different Args 
// from the get_terms below where we exclude the current term.
$navArgs=array(
  'orderby' => 'name',
  'order' => 'ASC',
  'hide_empty' => false
);
$navCategories = get_terms( 'focus_area', $navArgs );
?>

<nav class="sub-nav">

	<li class="first-in-nav">
		<a href="<?php bloginfo('url'); ?>/focus-areas">focus areas</a>
	</li>

	<?php foreach($navCategories as $nav) : 

		echo '<li>';
			echo '<a href="'. get_bloginfo('url') . '/focus-area' . '/' . $nav->slug . '">';
				echo $nav->name;
			echo '</a>';
		echo '</li>';
	endforeach;
	?>
</nav>	

<div class="tax-hero">
	
	<?php echo '<img src="'.$firstElement['sizes']['large-hero'] .'" alt="'.$firstElement['alt'].'" />'; ?>

	<div class="content-wrapper">

		<div id="primary" class="content-area pusher">
			<main id="main" class="site-main" role="main">

				<header class="entry-header">
					<h1 class="entry-title js-last-word"><?php echo get_queried_object()->name; ?></h1>
				</header><!-- .entry-header -->

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<?php echo $desc; ?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->
				

				
				<div class="tax-view-listings">
	 				<a href="<?php echo get_bloginfo('url') . '/completed-assignments/?focus_area='. $slug ?>">View examples of completed <?php echo $name ?> assignments</a>
	 				<div class="plus">
		 				<svg class="icon  icon--plus-red" viewBox="0 0 5 5" >
						    <path d="M2 1 h1 v1 h1 v1 h-1 v1 h-1 v-1 h-1 v-1 h1 z" />
						</svg>
					</div><!-- plus -->
	 			</div>
	 			

			</main>
		</div><!-- content area -->


		<aside id="secondary" class="widget-area pusher" role="complementary">
			<?php 
			// get blockquote
			if( $blockquote != '' ) { ?>
					<blockquote class="chair">
						<?php echo $blockquote; ?>
					</blockquote>
				<?php } ?>
		</aside><!-- #secondary -->


	</div><!-- content-wrapper -->

</div><!-- tax hero -->





<!-- 

			Focus Areas

################################################-->

<section class="focus-areas">
	<?php 
	/*


			Run the Current Term First

	*/
	echo '<div class="focus-block focus-block-small">';
		// Repeat the Hero of the page here first.
			echo '<img src="'.$firstElement['sizes']['large-square'] .'" alt="'.$firstElement['alt'].'" />';
		//echo '<a href="'. get_bloginfo('url') . '/focus-area' . '/' . $slug . '">';
		
			
			

				// div info contents
				echo '<div class="focus-block-info">';
					echo '<div class="focus-block-pad">';
						echo '<h2>' . $name . '</h2>';
						echo '<div class="focus-block-plus"><svg class="icon  icon--plus" viewBox="0 0 5 5" ><path d="M2 1 h1 v1 h1 v1 h-1 v1 h-1 v-1 h-1 v-1 h1 z" /></svg></div>';
					echo '</div><!-- focus block pad -->';
				echo '</div><!-- focus block info -->';
				echo '<div class="focus-active"></div>';
			//echo '</a>';
			
		echo '</div><!-- focus block -->';


	/*


			Run the Rest of the Terms and exclude the current

	*/
	$cat_args=array(
	  'orderby' => 'name',
	  'order' => 'ASC',
	  'exclude' => $term_id, // exclude the current Term
	  'hide_empty' => false
	);
	$categories = get_terms( 'focus_area', $cat_args );

	
	// Loop through categories and randomly assign the image gallery to each category.
	foreach($categories as $category) : 
		
		echo '<div class="focus-block focus-block-small">';
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
	 


</section><!-- focus areas -->
<?php
get_footer();
