<?php
/**
 * Template Name: Capabilities
 */

get_header(); ?>
<nav class="sub-nav with-pad">
	<?php wp_nav_menu( array( 'theme_location' => 'capabilities' ) ); ?>
</nav>
<?php
while ( have_posts() ) : the_post(); 
	$image = get_field('background_image');
	$content = get_field('intro_content');
	$blockquote = get_field('blockquote');
	$size = 'full';
	$executiveAssessment = get_field('executive_assessment');
	$executiveCoaching = get_field('executive_coaching');
	$successionPlanning = get_field('succession_planning');
	$newLeader = get_field('new_leader_integration');
endwhile;
?>
<section class="">
	<div class="exp-content">
		<div class="content-wrapper">

			<div class="content-area">
			
				<header class="entry-header">
					<h1 class="entry-title js-last-word"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					

					<div class="entry-content">
						<?php

						//$content = get_field('content');
							//the_content();
						echo $content;

							
						?>
					</div><!-- .entry-content -->

					
				</article><!-- #post-## -->
		</div><!-- content area -->

			<aside id="secondary" class="widget-area" role="complementary">
				<?php //dynamic_sidebar( 'sidebar-1' ); ?>

				<?php 

				//$blockquotes = get_field('quote');

				if( $blockquote != '' ) { ?>
						<blockquote class="chair">
							<?php echo $blockquote; ?>
						</blockquote>
					<?php } ?>

			</aside><!-- #secondary -->


		</div><!-- small wrapper -->
	</div><!-- exp content -->
	
</section>

	<?php 




	 ?>
	

	<div class="tabs-cont">
		<div class="tab-wrapper">
			<ul class='tabs'>
				<li><a href='#tab1'>Executive Assessment</a></li>
				<li><a href='#tab2'>Executive Coaching</a></li>
				<li><a href='#tab3'>Succession Planning</a></li>
				<li><a href='#tab4'>New Leader Integration</a></li>
			</ul>
		</div>
		<div class="tabs-wrapper ">
			<div id='tab1' class="tabs-border entry-content">
				<?php echo $executiveAssessment; ?>
			</div>
			<div id='tab2' class="tabs-border entry-content">
				<?php echo $executiveCoaching; ?>
			</div>
			<div id='tab3' class="tabs-border entry-content">
				<?php echo $successionPlanning; ?>
			</div>
			<div id='tab4' class="tabs-border entry-content">
				<?php echo $newLeader; ?>
			</div>
		</div>
	</div>



<?php
get_footer();
