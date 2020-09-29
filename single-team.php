<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bellaworks
 */

get_header(); ?>

	<div id="primary" class="content-area-full default-template">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php if ( get_the_content() ) { ?>
					<div class="intro fw-left text-center">
						<div class="wrapper">
							<div class="wrapper-narrow font18">
								<?php if (!$banner) { ?>
								<h1 class="page-title"><?php the_title(); ?></h1>	
								<?php } ?>
								<?php the_content(); ?>		
							</div>
						</div>
					</div>	
				<?php } ?>

			<?php endwhile;  ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
