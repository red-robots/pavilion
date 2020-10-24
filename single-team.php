<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bellaworks
 */

get_header(); ?>

	<div id="primary" class="content-area-full default-template staff-details-page">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); 
				$staff_image = get_field("photo"); 
				$jobtitle = get_field("jobtitle",$staff_id);
				$staff_details = get_the_content();
				$wrapClass = ($staff_details && $staff_image) ? 'half':'full';
				?>

				<?php if ( $staff_details  ||  $staff_image ) { ?>
				<div id="staffData">
					<div class="details-wrapper <?php echo $wrapClass ?>">

						<div class="inner-wrap wrapper">
							<div class="pageheader">
								<h1 class="page-title"><?php the_title(); ?></h1>	
								<?php if ($jobtitle) { ?>
								<p class="jobtitle"><?php echo $jobtitle ?></p>	
								<?php } ?>
							</div>
							<?php if ($staff_details) { ?>
								<div class="intro staffInfo fw-left text-center">
									<div class="inner">
										<div class="wrapper-narrow font18">
											<?php the_content(); ?>		
										</div>
									</div>
								</div>	
							<?php } ?>

							<?php if ($staff_image) { ?>
							<div class="staff-image">
								<div class="photo"><img src="<?php echo $staff_image['url'] ?>" alt="<?php echo $staff_image['title'] ?>" class="pic"></div>
							</div>
							<?php } ?>
						</div>
						
					</div>
				</div>
				<?php } ?>

			<?php endwhile;  ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
