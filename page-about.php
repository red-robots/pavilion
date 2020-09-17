<?php
/**
 * Template Name: About Us
 */

get_header(); ?>
<div id="primary" class="content-area-full default-template">
	<main id="main" class="site-main" role="main">
		<div class="wrapper">
			<?php while ( have_posts() ) : the_post(); ?>

			<?php endwhile; ?>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
