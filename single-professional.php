<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

wp_head(); ?>

<div class="black">
		<?php
		while ( have_posts() ) : the_post();

	$position = get_field('position');
    $bio = get_field('bio');
    $image = get_field('photo');
    $smallsize = 'large-square';
    $largesize = 'professional';
    $title = get_the_title();

    $personID = get_the_ID();

    if( $personID == 818 ){
    	$wordClass = 'double';
    } else{
    	$wordClass = 'last';
    }

		// echo '<pre>';
		// print_r($image);
		// echo '</pre>';

		endwhile; // End of the loop.
		?>
		<div class="profess-popup people" id="<?php echo $sanitized; ?>" >
    		<div class="pop-image" style="background-image: url(<?php echo wp_get_attachment_url($image); ?>);">
	    		<?php 
	   //  		if( $image ) {
				// 	echo wp_get_attachment_image( $image, $largesize );
				// } 
				?>
			</div><!-- pop image -->
    		<div class="pop-fade-wrap">
    			<!-- <div class="pop-fade"></div> -->
    			<div class="pop-content">
    				<h2 class="js-<?php echo $wordClass; ?>-word"><?php the_title(); ?></h2>
    				<?php if( $position != '' ) {
		    			echo '<div class="position">'.$position.'</div>';
		    		} ?>
    				<?php echo $bio; ?>
    			</div>
    		</div>
    		
    	</div><!-- profess-popup -->

</div>
<?php
wp_footer();
