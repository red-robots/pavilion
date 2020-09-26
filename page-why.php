<?php
/**
 * Template Name: Why Pavilion
 */

get_header(); ?>
<div id="primary" class="content-area-full default-template">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			
			<?php if ( $intro = get_field("intro") ) { ?>
				<div class="intro fw-left text-center">
					<div class="wrapper">
						<div class="wrapper-narrow font18"><?php echo $intro; ?></div>
					</div>
				</div>	
			<?php } ?>


			<?php
			/* BLUE SECTION - Content with Icons */
			$mid_section_title = get_field("mid_section_title");
			$content_with_icons = get_field("content_with_icons");
			if( $mid_section_title || $content_with_icons ) { ?>
			<div class="section-with-icons fw-left">
				<div class="wrapper">
					<div class="wrapper-narrow text-center">
						<?php if ($mid_section_title) { ?>
							<h2 class="col-title"><?php echo $mid_section_title ?></h2>
						<?php } ?>
					</div>

					<?php if ($content_with_icons) { ?>
						<div class="features-info single-row-icon">
							<div class="wrapper">
								<div class="flexwrap">
									<?php foreach ($content_with_icons as $s) { 
										$icon = $s['icon'];
										$title = $s['title'];
										$text = $s['description'];
										?>
										<div class="feature">
											<div class="pad">
												<?php if ($icon) { ?>
												<div class="icon"><span style="background-image:url('<?php echo $icon['url']?>')"></span></div>
												<?php } ?>

												<?php if ($title) { ?>
												<h3 class="h3"><?php echo $title ?></h3>
												<?php } ?>

												<?php if ($text) { ?>
												<div class="text font18"><?php echo $text ?></div>
												<?php } ?>
											</div>
										</div>
										<?php } ?>
									</div>
								</div>
						</div>
					<?php } ?>

					<?php if ($section_5_text) { ?>
					<div class="bottom-sub-head text-center">
						<h3 class="h3-sm"><?php echo $section_5_text ?></h3>
					</div>
					<?php } ?>

				</div>
			</div>
			<?php } ?>



			<?php 
				$bottomText = get_field("bottom_text");
				$bottomButton = get_field("bottom_button");
				if ( $bottomText ) { ?>
				<div class="centered-text text-center fw-left">
					<div class="wrapper">
						<div class="wrapper-narrow font18"><?php echo $bottomText; ?></div>
						<?php if ( $bottomButton ) { 
							$bottomTarget = ( isset($bottomButton['target']) && $bottomButton['target'] ) ? $bottomButton['target'] : '_self';
							?>
							<div class="intro-button">
								<a href="<?php echo $bottomButton['url'] ?>" target="<?php echo $bottomTarget ?>" class="btn-theme wide"><?php echo $bottomButton['title'] ?><span class="arrow"></span></a>
							</div>
						<?php } ?>
					</div>
				</div>	
			<?php } ?>

		
		<?php endwhile; ?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
