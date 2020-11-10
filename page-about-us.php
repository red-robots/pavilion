<?php
/**
 * Template Name: About Us
 */

get_header(); ?>
<div id="primary" class="content-area-full default-template">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
				
			<?php if ( $intro = get_field("intro") ) { ?>
				<div class="intro fw-left text-center">
					<div class="wrapper">
						<div class="wrapper-narrow font18"><?php echo anti_email_spam($intro); ?></div>
					</div>
				</div>	
			<?php } ?>


			<?php  
			/* TIMELINE */
			$timeline = get_field("timeline");
			if($timeline) { ?>
				<div class="timeline fw-left">
					<div class="wrapper">
						<div class="inner-pad fw-left">
							<?php $b=0; $i=1; foreach ($timeline as $m) { 
								$year = $m['year'];
								$location = $m['location'];
								$icon = $m['icon'];
								$text = $m['description'];
								if($year || $text) { 
									$second = $i+2; 
									if($second>9) {
										if($b>0) {
											$sec = 1 + ($b/2);
										} else {
											$sec = 1 + $b;
										}
										$b++;
									} else {
										$sec = "0." . $second;
									}
									?>
								<div class="history">

									<?php if ($year) { ?>
										<div class="h-title">
											<div class="titlediv">
												<?php if ($year) { ?>
													<div class="year"><?php echo $year ?></div>
												<?php } ?>

												<?php if ($location) { ?>
													<div class="location"><?php echo $location ?></div>
												<?php } ?>
											</div>

											<?php if ($icon) { ?>
												<div class="icon">
													<span style="background-image:url('<?php echo $icon['url']?>');"></span>
												</div>
											<?php } ?>
										</div>
									<?php } ?>

									<?php if ($text) { ?>
										<div class="text font18"><?php echo $text ?></div>
									<?php } ?>

								</div>
								<?php $i++; } ?>
							<?php } ?>
							<div class="middle-line"><span class="arrow-down"></span></div>
						</div>
					</div>
				</div>
			<?php } ?>


			<?php 
				$bottomText = get_field("bottom_text");
				$bottomButton = get_field("bottom_button");
				if ( $bottomText ) { ?>
				<div class="centered-text text-center fw-left">
					<div class="wrapper">
						<div class="wrapper-narrow font18"><?php echo anti_email_spam($bottomText); ?></div>
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
