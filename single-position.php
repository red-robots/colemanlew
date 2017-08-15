<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="content-wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post(); 

		$contactInfo = get_field('additional_contact_info');
		$forWho = get_field('for_who');
		$pageContent = get_field('description');
		$email = get_field('email');
		$phone = get_field('phone_numbers');

		?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title js-last-word"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php echo $pageContent; ?>
					<h2>For additional information contact</h2>
					<?php echo $contactInfo; ?>
					<a href="mailto:<?php echo antispambot($email); ?>">
					  <?php echo antispambot($email); ?>
					</a>
					<?php echo $phone; ?>
				</div><!-- .entry-content -->

			</article><!-- #post-## -->

		<?php endwhile; // End of the loop.
		?>
	<nav class="other-positions">
		<h4>View Other Positions</h4>
		<div class="next-post">
			<?php next_post_link( '%link', '%title &raquo;', true, array(19),'status' ); ?>
		</div>

		<div class="prev-post">
			<?php previous_post_link( '%link', '&laquo; %title', true, array(19),'status' ); ?>
		</div>
	</nav>

		</main><!-- #main -->
	</div><!-- #primary -->

	<div class="widget-area">
		
		<div class="current-btn">
			<a href="<?php bloginfo('url'); ?>/current-assignments">
				CURRENT SEARCH ASSIGNMENTS
			</a>
		</div><!-- current btn -->

	   <div id="sticky" class="sticky">
			<blockquote class="chair " >
				
				<?php if( $contactInfo != '' ) { 
					echo $contactInfo; 
				} 
				if( $email != '' ) { ?>
				<div class="email">
					<a href="mailto:<?php echo antispambot($email); ?>">
					  <?php echo antispambot($email); ?>
					</a>
				</div><!-- email -->
				<?php } if( $contactInfo != '' ) { ?>
					<div class="phone-numbers"><?php echo $phone; ?></div>
				<?php } ?>
			</blockquote>
		</div>
		
	</div><!-- side area -->

</div><!-- wrapper -->
<?php
get_footer();
