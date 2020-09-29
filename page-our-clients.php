<?php
/**
 * Template Name: Our Clients
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
			/* BLUE SECTION - Content with Icons */
			$galleries = get_field("gallery");
			if( $galleries ) { ?>
			<div class="gallery-sections fw-left">
				<div class="wrapper">

					<?php if ($galleries) { ?>
						<div class="galleries">
							<div class="wrapper-narrow">
								<div class="flexwrap">
									<?php foreach ($galleries as $img) { 
										$website = get_field("website",$img['ID']);
										if($img) { ?>
											<div class="imagebox">
												<figure>
													<?php if ($website) { ?>
														<a href="<?php echo $website ?>" target="_blank"><span class="img"><img src="<?php echo $img['url'] ?>" alt="<?php echo $img['title'] ?>"></span></a>
													<?php } else { ?>
														<span class="img"><img src="<?php echo $img['url'] ?>" alt="<?php echo $img['title'] ?>"></span>
													<?php } ?>
												</figure>
											</div>
										<?php } ?>
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
