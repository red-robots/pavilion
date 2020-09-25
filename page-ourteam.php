<?php
/**
 * Template Name: Our Team
 */

get_header(); ?>

<?php get_template_part("parts/banner-subpage"); ?>

<div id="primary" class="content-area-full default-template">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			
				<h1 class="page-title" style="display:none;"><?php the_title(); ?></h1>

				<?php
				$featteam = get_field("featured_team");
				if($featteam) { 
					$staff_id = $featteam->ID;
					$staff_details = $featteam->post_content;
					$staff_details = apply_filters('the_content', $staff_details);
					$staff_image = get_field("photo",$staff_id);
					$jobtitle = get_field("jobtitle",$staff_id);
					$feat_class = ($staff_details && $staff_image) ? 'half':'full';
					?>

					<div class="page-content ceo-section-team fw-left <?php echo $feat_class ?>">
						<div class="wrapper">
							<?php if ($staff_image) { ?>
								<div class="staff-image"><img src="<?php echo $staff_image['url'] ?>" alt="<?php echo $staff_image['title'] ?>"></div>
							<?php } ?>
							<?php if ($staff_details) { ?>
								<div class="staff-details">
									<div class="staff-title">
										<h2 class="staff-name"><?php echo $featteam->post_title; ?></h2>
										<?php if ($jobtitle) { ?>
										<p class="jobtitle"><?php echo $jobtitle ?></p>
										<?php } ?>
									</div>
									
									<?php echo $staff_details ?>
								</div>
							<?php } ?>
						</div>
					</div>

				<?php } ?>
		
			<?php endwhile; ?>


			<?php  
			/* TEAM POSTS */
			get_template_part("parts/content-teams");
			?>

			<?php
			$bottom_title = get_field("bottom_title");
			$bottom_text = get_field("bottom_text");
			$bottom_button = get_field("bottom_button");
			if($bottom_title || $bottom_text) { ?>
				<div class="centered-text text-center fw-left font18">
					<div class="wrapper">
						<div class="wrapper-narrow">
							<?php if ($bottom_title) { ?>
								<h2 class="intro-title"><?php echo $bottom_title ?></h2>
							<?php } ?>
							<?php if ($bottom_text) { ?>
								<div class="intro-text"><?php echo $bottom_text ?></div>
							<?php } ?>

							<?php if ($bottom_button) { 
								$target = ( isset($bottom_button['target']) && $bottom_button['target'] ) ? $bottom_button['target']:'_self';
								?>
								<div class="intro-button">
									<a href="<?php echo $bottom_button['url'] ?>" target="<?php echo $target; ?>" class="btn-theme wide"><?php echo $bottom_button['title'] ?><span class="arrow"></span></a>
								</div>
							<?php } ?>

						</div>
					</div>
				</div>	
			<?php } ?>

	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
