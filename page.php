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
$section_1_image = '';
$content_class = 'nobanner';
$banner = get_field("banner");
if($banner) {
	$content_class = 'hasbanner';
} else {
	$section_1_image = get_field("section_1_image");
	$content_class = ($section_1_image) ? 'hasbanner':'nobanner';
}

get_header(); ?>

<?php get_template_part("parts/banner-subpage"); ?>

<div id="primary" class="content-area-full default-template <?php echo $content_class ?>">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>


			<?php if ( empty($section_1_image) ) { ?>

				<?php if ( $intro = get_the_content() ) { ?>
					<div class="intro fw-left text-center">
						<div class="wrapper">
							<div class="wrapper-narrow font18"><?php echo anti_email_spam($intro); ?></div>
						</div>
					</div>	
				<?php } ?>

			<?php } else { ?>
			
			
				<?php
				$section_2_text = get_field("section_2_text");
				$section_2_button = get_field("section_2_button");
				?>
				<?php if ( $section_2_text  ) { ?>
					<div class="intro text-center font18">
						<div class="wrapper">
							<div class="wrapper-narrow">
								<?php if ($section_2_text) { ?>
									<div class="intro-text font18"><?php echo anti_email_spam($section_2_text) ?></div>
								<?php } ?>

								<?php if ($section_2_button) { 
									$s2_target = ( isset($section_2_button['target']) && $section_2_button['target'] ) ? $section_2_button['target']:'_self'; 
									?>

									<div class="intro-button">
										<a href="<?php echo $section_2_button['url'] ?>" target="<?php echo $s2_target ?>" class="btn-theme wide"><?php echo $section_2_button['title'] ?><span class="arrow"></span></a>
									</div>
								<?php } ?>

							</div>
						</div>
					</div>	
				<?php } ?>


				<?php
				$section_3_text = get_field("section_3_text");
				$section_3_image = get_field("section_3_image");
				$section_3_button = get_field("section_3_button");
				$section_3_class = ( $section_3_text &&  $section_3_image ) ? 'half':'full';
				?>
				<?php if ( $section_3_text ||  $section_3_image ) { ?>
					<div class="section-3 title-in-editor font18 <?php echo $section_3_class ?>">
						<div class="flexwrap">
							<?php if ($section_3_image) { ?>
								<div class="imagecol">
									<img src="<?php echo $section_3_image['url'] ?>" alt="<?php echo $section_3_image['title'] ?>" />
								</div>	
							<?php } ?>


							<?php if ($section_3_text) { ?>
								<div class="textcol">
									<div class="inner">
										<?php if ($section_3_text) { ?>
											<div class="sec-text"><?php echo anti_email_spam($section_3_text) ?></div>
										<?php } ?>

										<?php if ($section_3_button) { 
											$s3_target = ( isset($section_3_button['target']) && $section_3_button['target'] ) ? $section_3_button['target']:'_self';  ?>
											<div class="sec-button">
												<a href="<?php echo $section_3_button['url'] ?>" target="<?php echo $s3_target ?>" class="btn-theme wide"><?php echo $section_3_button['title'] ?><span class="arrow"></span></a>
											</div>
										<?php } ?>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>	
				<?php } ?>


				<?php
				$section_4_text = get_field("section_4_text");
				$section_4_button = get_field("section_4_button");
				?>
				<?php if ( $section_4_text ) { ?>
					<div class="centered-text text-center fw-left font18">
						<div class="wrapper">
							<div class="wrapper-narrow">
								<?php if ($section_4_text) { ?>
									<div class="intro-text"><?php echo anti_email_spam($section_4_text) ?></div>
								<?php } ?>

								<?php if ($section_4_button) { 
									$s4_target = ( isset($section_4_button['target']) && $section_4_button['target'] ) ? $section_4_button['target']:'_self';  ?>
									<div class="sec-button">
										<a href="<?php echo $section_4_button['url'] ?>" target="<?php echo $s4_target ?>" class="btn-theme wide"><?php echo $section_4_button['title'] ?><span class="arrow"></span></a>
									</div>
								<?php } ?>

							</div>
						</div>
					</div>	
				<?php } ?>

			<?php } ?>
		
			<?php endwhile; ?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
