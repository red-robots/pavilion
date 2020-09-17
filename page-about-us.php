<?php
/**
 * Template Name: About Us
 */

get_header(); ?>
<div id="primary" class="content-area-full default-template">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
				
			<?php if ( get_the_content() ) { ?>
				<div class="intro text-center">
					<div class="wrapper">
						<div class="wrapper-narrow"><?php the_content(); ?></div>
					</div>
				</div>	
			<?php } ?>
		
			<?php endwhile; ?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
