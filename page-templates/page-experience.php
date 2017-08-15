<?php
/**
 * Template Name: Our Experience
 */

get_header(); ?>
<?php
while ( have_posts() ) : the_post(); 
$image = get_field('background_image');
$content = get_field('page_content');
$size = 'full';
?>
<section class="experience">
	<div class="exp-content">
		<div class="small-wrapper">
			
			<header class="entry-header">
				<h1 class="entry-title js-last-word"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->

			<div class="entry-content"><?php echo $content; ?></div>

	</div><!-- small wrapper -->
	</div><!-- exp content -->
	
	<?php 
	if( !empty($image) ): 
		echo '<div class="bg-image">';
			echo wp_get_attachment_image( $image, $size );
		echo '</div>';
	endif;
	?>


<?php
endwhile; // End of the loop.
?>
	<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'story',
	'posts_per_page' => 10
));
	if ($wp_query->have_posts()) : ?>

<div class="flexslider-story">
	<header class="stories">
		Success Stories
	</header>
        <ul class="slides">
        <?php while ( $wp_query->have_posts() ) : ?>
			<?php $wp_query->the_post(); 

			$content = get_field('content');
			$quote = get_field('quote');
			?>
            
            <li> 
              
				<div class="slider-story">
					
					<div class="slider-story-right col">
						<header class="story-title">
							<div class="story-wrap">
							<?php the_title(); ?>
							</div>
						</header>
						<div class="story-wrap-cont">
							<?php echo $content; ?>
						</div><!-- story-wrap -->
					</div><!-- s right -->
				</div><!-- story -->
                
            </li>
            
           <?php endwhile; ?>
      	 </ul><!-- slides -->
</div><!-- .flexslider -->

<button class="see-below js-filter-button">
	See examples of positions we have filled below<br>
	
	<div class="arrow-toggle">
		<svg viewbox="0 0 100 100">
		    <path class="arrow" d="M 50,0 L 60,10 L 20,50 L 60,90 L 50,100 L 0,50 Z "transform="translate(0,90) rotate(270) ">
		</svg>
	</div><!-- arrow toggle -->
</button>

<?php endif; ?>
</section>

	
	
<?php // Get completed page content first

	$post = get_post(19); 
	setup_postdata( $post );  

	$pTitle = get_the_title();
	$pContent = get_the_content();


	wp_reset_postdata(); ?>
<section class="completed">
	
	<div class="small-wrapper">
		<div class="center">
		<h2 class="js-last-word"><?php echo $pTitle; ?></h2>

		<div class="entry-content"><?php echo $pContent; ?></div>

		<div class="viewall">
			<a href="<?php bloginfo('url'); ?>/completed-assignments">VIEW MORE</a>
		</div>

		</div>
	</div><!-- small wrapper -->

	<?php
	$wp_query = new WP_Query();

	

		$wp_query->query(array(
			'post_type'=>'position',
			'posts_per_page' => 10,
			//'paged' => $paged,
			'tax_query' => array(
				array(
					'taxonomy' => 'status', // taxonomy
					'field' => 'slug',
					'terms' => array( 'completed' ) // the terms 
				)
			)
		));
	
	
	if ($wp_query->have_posts()) : ?>
	<div class="flexslider carousel">
		<ul class="slides">
			<?php while ($wp_query->have_posts()) : $wp_query->the_post(); 

	$forWho = get_field('for_who');

	?>

		<li>
			<div class="jobsquare-slider ">
				<div class="completed-square">
					<div class="wrapme">
					<h3 class="completed"><?php the_title(); ?></h3>
					<?php if( $forWho != '' ) {echo '<p>'.$forWho.'</p>';}?>
					</div>
				</div>
			</div><!-- jobsquare -->
		</li>

			<?php endwhile; ?>
		</ul>
	</div><!-- flexslider -->
<?php endif; ?>
</section>	


<?php
get_footer();
