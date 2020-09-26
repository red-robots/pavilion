<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellaworks
 */

$banner = get_field("banner");
$content_class = ($banner) ? 'hasbanner':'nobanner';
get_header(); ?>

	<div id="primary" class="content-area-full default-template <?php echo $content_class ?>">
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
