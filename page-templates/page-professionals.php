<?php
/**
 * Template Name: Professionals
 */

get_header(); 

$content = get_field('page_content');

// Extra box
$enableBox = get_field('enabe_box');
$extraBox = get_field('extra_box');
$boxLink = get_field('box_link');

?>
<nav class="sub-nav with-pad">
	
		<?php wp_nav_menu( array( 'theme_location' => 'about' ) ); ?>
	
</nav>
<div class="small-wrapper">
	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

			<header class="entry-header">
				<h1 class="entry-title js-last-word"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->

			<div class="entry-content center">
				<?php echo $content; ?>
			</div>
			

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- wrapper -->


<section class="professionals">

<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'professional',
	'posts_per_page' => -1,
	'orderby' => 'menu_order', 
	'order' => 'ASC'
));
	if ($wp_query->have_posts()) : ?>
    <?php while ($wp_query->have_posts()) : ?>
        
    <?php $wp_query->the_post(); 

    $position = get_field('position');
    $bio = get_field('bio');
    $image = get_field('photo');
    $smallsize = 'large-square';
    $largesize = 'large-hero';
    $title = get_the_title();
    $sanitized = sanitize_title_with_dashes($title);

    ?>

    <div class="professional">

    	<div class="professional-hover">
    		<a class="professionals" href="<?php the_permalink();//echo $sanitized; ?>">
	    		<h2><?php the_title(); ?></h2>
	    		<?php if( $position != '' ) {
	    			echo '<div class="position">'.$position.'</div>';
	    		} ?>
    		</a>
    	</div>

    	<?php if( $image ) {
			echo wp_get_attachment_image( $image, $smallsize );
		} ?>
    </div><!-- professional -->


    <div style="display: none;">
    	<div class="profess-popup people" id="<?php echo $sanitized; ?>">
    		<div class="pop-fade-wrap">
    			<div class="pop-fade"></div>
    			<div class="pop-content">
    				<h2><?php the_title(); ?></h2>
    				<?php if( $position != '' ) {
		    			echo '<div class="position">'.$position.'</div>';
		    		} ?>
    				<?php echo $bio; ?>
    			</div>
    		</div>
    		<div class="pop-image">
	    		<?php if( $image ) {
					echo wp_get_attachment_image( $image, $largesize );
				} ?>
			</div><!-- pop image -->
    	</div><!-- profess-popup -->
    </div>

<?php endwhile; endif; ?>

<?php if( $enableBox == 'Enable' ) :?>

	<div class="professional-extra">

    		<a href="
	    		<?php if( $boxLink != '' ) { ?>
	    			<?php echo $boxLink; ?>
	    		<?php } else {
	    			echo '#';
	    		}?>
    		">
    		
	    			<?php if( $extraBox != '' ) { echo $extraBox; } ?>
    		
    			</a>
    		
    	

    </div><!-- professional -->
<?php endif; ?>

</section>


<?php
get_footer();
