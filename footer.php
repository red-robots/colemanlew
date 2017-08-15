<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?>


	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="center"><?php get_template_part('template-parts/social-footer'); ?></div>
		
			<div class="site-info  js-blocks">
				<?php 
				$sitemap = get_field('sitemap_link', 'option');
				$address = get_field('address', 'option');

				// Footer Right
				echo '<div class="footer-left">';
					echo $address;
					echo '<br>';
					echo '&copy;' . date('Y') . ' ';
					echo get_bloginfo('name');
					echo ' // ';
					echo '<a href="'. get_bloginfo('url') . '/privacy-statement">Privacy Statement</a>';
					echo ' // ';
					echo '<a href="'. get_bloginfo('url') . '/legal-statement">Legal Statement</a>';
					echo '<br>';
					echo '<a href="'. $sitemap . '">Sitemap</a> // Site by <a target="_blank" href="http://bellaworksweb.com/?ref=colemanlew">Bellaworks</a>';
				echo '</div><!-- footer left -->';

				// Footer Left
				// echo '<div class="footer-right">';
					
				// echo '</div><!-- footer right -->';
				 
				 ?>

				 


			</div><!-- .site-info -->
	
	<div class="partnership js-blocks">
	 	<a href="http://www.penrhyn.com/" target="_blank">
	 		<h3>Global Strategic Partners</h3>
	 		<div class="rollover-up">
	 			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/partnership-up.png">
	 		</div>
	 		<div class="rollover-over">
	 			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/partnership-over.png">
	 		</div>
	 	</a>
	 
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php the_field('google_analytics', 'option'); ?>
<?php wp_footer(); ?>

</body>
</html>
