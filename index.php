<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

<!-- 

			Hero

################################################-->
<?php 
//if( is_home() ) :
	// Query Home Page
	$post = get_post(2); 
	setup_postdata( $post ); 

	$image = get_field('hero_image');
	$headline = get_field('headline');
	$subHeadOne = get_field('sub_headline_1');
	$subHeadTwo = get_field('sub_headline_2');
	$size = 'full';

	

	if( $image ) {
		echo '<div class="hero">';
		echo '<div class="hero-grad"></div>';
		echo wp_get_attachment_image( $image, $size );

			if( $headline ) {
				echo '<div class="hero-headline-box">';
				echo '<div class="hero-headline wow zoomIn" data-wow-duration=".5s">' . $headline . '</div>';
			}
			if( $subHeadOne ) {
				echo '<div class="hero-headline-sub-1 wow fadeInUp" data-wow-duration=".8s">' . $subHeadOne . '</div>';
			}
			if( $subHeadTwo ) {
				echo '<div class="hero-headline-sub-2 wow fadeInUp" data-wow-duration="1.2s">' . $subHeadTwo . '</div>';
			}
				echo '</div><!-- hero-headline-box -->';

		echo '</div><!-- hero -->';
	} 

// Get some stuff for the next section
	$sectionTitle = get_field('section_title');
	$sectionCopy = get_field('section_copy');


	?>


<section class="intro">
	 <div class="home-intro-content">
		<h2 class="js-last-word"><?php echo $sectionTitle; ?></h2>
		<?php echo $sectionCopy; ?>

	<?php if(have_rows('section_links')) : while(have_rows('section_links')) : the_row();

		$id = get_sub_field('link');
		$num = $id[0];
		// echo '<pre>';
		// print_r($id);
		// echo '</pre>';
	 ?>



	<div class="link-square">
		<a href="<?php echo get_permalink($num); ?>">
			<div class="wrapme">
				<h3>
					<?php echo get_the_title($num); ?>

					<div class="plus">
		 				<svg class="icon  icon--plus" viewBox="0 0 5 5" >
						    <path d="M2 1 h1 v1 h1 v1 h-1 v1 h-1 v-1 h-1 v-1 h1 z" />
						</svg>
					</div><!-- plus -->
				</h3>
			</div>
		</a>
	</div><!-- link square -->

	 

<?php endwhile; endif; ?>
</div><!-- small wrapper -->
</section>

<?php	wp_reset_postdata(); // close the homepage query.
//endif; // end if home
?>

<!-- 

			Focus Areas

################################################-->
	<div id="primary" class="">
		<main id="main" class="site-main" role="main">

		<section class="focus-areas">

			<!-- Starter Block -->
			<div class="focus-block  focus-block-large squareme">
				<div class="focus-block-first-info">
					<h3 class="js-last-word">Our Focus Areas</h3>
					<p>Let us help you find <br> the <b>right person</b> for <br>the <b>right role</b>.</p>
				</div><!-- focus block first info -->
			</div><!-- focus block -->
			<?php 

			// Get my gallery from theme options
			$images = get_field('focus_area_photos', 'option');

			// Radomize them
			shuffle($images);

			// Get the Terms for Focus Areas
			$cat_args=array(
			  'orderby' => 'name',
			  'order' => 'ASC',
			  'hide_empty' => false
			);
			$categories=get_terms( 'focus_area', $cat_args );

			// Loop through categories and randomly assign the image gallery to each category.
			foreach($categories as $category) : 
				
				echo '<div class="focus-block  focus-block-large">';
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

		</main><!-- #main -->
	</div><!-- #primary -->
<!-- 

			Search Process Section

################################################-->

<?php 
/*  
*		Query Our Process Page
*/
$post = get_post(9); 
setup_postdata( $post );

	echo '<div class="content-wrapper">';
	get_template_part('template-parts/process-steps');
	echo '</div>';

wp_reset_postdata();
 ?>
<!-- 

			About Section

################################################-->
 <section class="about">
 	<?php 

	// Query About Page
	$post = get_post(5); 
	setup_postdata( $post ); 

	$fImage = get_field('featured_image');
	$pContent = get_field('homepage_content');
	$size = 'full';

	if( $fImage ) {
		echo '<div class="map">';
		echo wp_get_attachment_image( $fImage, $size );
		echo '<div class="map-wrapper">';
		
		if( $pContent ) {
			echo '<div class="map-contents">';
				echo '<h2 class="js-last-word"><a href="'.get_bloginfo('url').'/about">' . get_the_title() . '</a></h2>';
 				echo $pContent;
			echo '</div><!-- map-contents -->';
		}
		echo '</div><!-- wrapper -->';
		echo '</div><!-- map -->';
	}

	wp_reset_postdata();
?>
 </section>

<!-- 

			News and Resources

################################################-->
 <section class="news-resources">
 	<div class="wrapper">
 		<h2>News &amp Resources</h2>
 		<div class="clear"></div>
 		<?php
 		$i=0;
		$wp_query = new WP_Query();
		$wp_query->query(array(
		'post_type'=>'post',
		'posts_per_page' => 3
	));
		if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); 

		$i++;
		if( $i == 3 ) {
			$class = 'last-post';
			$i=0;
		} else {
			$class = 'first-post';
		}
		?>	
	 		<article class="home-post <?php echo $class; ?>">
	 			<h3><?php the_title(); ?></h3>
	 			<?php the_excerpt(); ?>
	 			<div class="readmore">
	 				<a href="<?php the_permalink(); ?>">Continue Reading</a>
	 				<div class="plus">
		 				<svg class="icon  icon--plus" viewBox="0 0 5 5" >
						    <path d="M2 1 h1 v1 h1 v1 h-1 v1 h-1 v-1 h-1 v-1 h1 z" />
						</svg>
					</div><!-- plus -->
	 			</div>
	 		</article>
	 	<?php endwhile; endif; ?>
 	</div><!-- wrapper -->
 </section>

<?php
get_footer();
