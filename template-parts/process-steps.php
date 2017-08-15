
<?php if(is_front_page()) {
	$class = 'process-home';
} else {
	$class = 'process-page';
} ?>
<section class="process <?php echo $class; ?>">
	<?php if(is_front_page()) { ?>
	<h2 class="js-last-word"><a href="<?php bloginfo('url'); ?>/our-search-process">Our Search Process</a></h2>
	<?php } else { ?>
		<h3 class="our-four-step"><?php the_field('section_title'); ?></h3>
	<?php } ?>
	<?php 
	$i=0;
	

	// set the delay on animating the steps
	if(is_page( 'our-search-process' )) {
		$delay=0;
	} else {
		$delay=5;
	}
	

	if( have_rows('process')) : while( have_rows('process')) : the_row();
			$i++;
			$delay++;
			$stepTitle = get_sub_field('title');
			$stepDesc = get_sub_field('step_description');
			$stepBuzz = get_sub_field('step_buzz_words');

			if( $i == 4 ) {
				$class = 'last-step';
			} elseif( $i == 5 ) {
				$i=0;
			} else {
				$class = 'first-step';
			}
	?>

	<div class="step <?php echo $class; ?> wow zoomIn" data-wow-duration=".5s"  data-wow-delay=".<?php echo $delay; ?>s">
		<div class="step-pad">
			<div class="square " >
				<div class="step-num"><?php echo $i; ?></div>
			</div>
			
			<div class="step-title js-first-word"><?php echo $stepTitle; ?></div>
			<div class="step-desc js-paragraph"><?php echo $stepDesc; ?></div>
			<div class="step-buzz"><?php echo $stepBuzz; ?></div>
		</div><!-- step pad -->
	</div><!-- step -->

<?php endwhile; endif; ?>
</section>