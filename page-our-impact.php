<?php
/**
 * Template Name: Our Impact
 */

get_header(); ?>

<div id="primary" class="content-area-full default-template our-impact">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			
			<?php if ( $main = get_field("section_1_intro") ) { ?>
				<div class="intro fw-left text-center">
					<div class="wrapper">
						<div class="wrapper-narrow font18">
							<?php echo anti_email_spam($main); ?>
						</div>
					</div>
				</div>	
			<?php } ?>

			<?php
			$section_2_description = get_field("section_2_description");
			$section_2_button = get_field("section_2_button");
			$section_2_image = get_field("section_2_image");
			$section_2_class = ( $section_2_description &&  $section_2_image ) ? 'half':'full';
			?>
			<?php if ( $section_2_description ||  $section_2_image ) { ?>
				<div class="section-3 title-in-editor fw-left font18 <?php echo $section_2_class ?>">
					<div class="flexwrap">
						<?php if ($section_2_image) { ?>
							<div class="imagecol">
								<img src="<?php echo $section_2_image['url'] ?>" alt="<?php echo $section_2_image['title'] ?>" />
							</div>	
						<?php } ?>


						<?php if ($section_2_title || $section_2_description) { ?>
							<div class="textcol">
								<div class="inner">
									<?php if ($section_2_description) { ?>
										<div class="sec-text"><?php echo anti_email_spam($section_2_description) ?></div>
									<?php } ?>

									<?php if ($section_2_button) { 
										$s2_target = ( isset($section_2_button['target']) && $section_2_button['target'] ) ? $section_2_button['target']:'_self';
										?>
										<div class="sec-button">
											<a href="<?php echo $section_2_button['url'] ?>" target="<?php echo $s2_target ?>" class="btn-theme wide"><?php echo $section_2_button['title'] ?><span class="arrow"></span></a>
										</div>
									<?php } ?>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>	
			<?php } ?>

			<?php if ( $section_3_text = get_field("section_3_text") ) { ?>
				<div class="blue-section fw-left text-center">
					<div class="wrapper">
						<div class="wrapper-narrow font18">
							<?php echo anti_email_spam($section_3_text); ?>
						</div>
					</div>
				</div>	
			<?php } ?>


			<?php
			$count = 0;
			$section_4_text1 = get_field("section_4_text");
			$section_4_text2 = get_field("section_4_text2");
			$section_4_gallery = get_field("section_4_gallery");
			$section_4_class = ( $section_4_text1 && $section_4_gallery ) ? 'half':'full';
			$section_4_fullwidth_image = get_field("section_4_fullwidth_image");
			// echo '<pre>';
			// print_r($section_4_fullwidth_image);
			// echo '</pre>';
			$slidesId = ($count>1) ? 'slideshow':'static-banner';
			?>
			<?php if ( $section_4_text1 || $section_4_gallery ) { ?>
				<div class="section-4-impact fw-left font18 <?php echo $section_4_class ?>">
					<div class="wrapper">
						<div class="flexwrap section-inner">

							<?php if ( $section_4_gallery ) { ?>
								<div class="gallery-wrap">
									<?php foreach ($section_4_gallery as $g) { ?>
										<div class="imgbox">
											<img src="<?php echo $g['sizes']['medium_large'] ?>" alt="<?php echo $g['title'] ?>">
										</div>
									<?php } ?>
								</div>
							<?php } ?>
							
							<?php if ( $section_4_text1 ) { ?>
								<div class="text-wrap">
									<?php echo anti_email_spam($section_4_text1); ?>
								</div>
							<?php } ?>

							<?php if ( $section_4_fullwidth_image ) { ?>
								<div id="slideshow" class="swiper-container banner-wrap fw subpage b-pulled-from-banner slideshow-impact">
									<div class="swiper-wrapper">
										<?php foreach(  $section_4_fullwidth_image as $pp ) { ?>
											<div class="swiper-slide slideItem">
										<!-- <div class="fullwidth-image"> -->
												<img src="<?php echo $pp['url'] ?>" alt="<?php echo $pp['title'] ?>" class="fw-image">
										<!-- </div> -->
											</div>
										<?php } ?>
									</div>
									<?php //if ($count>1) { ?>
									    <div class="swiper-pagination"></div>
									    <div class="swiper-button-next"></div>
									    <div class="swiper-button-prev"></div>
									<?php //} ?>
								</div>
							<?php } ?>

							<?php if ( $section_4_text2 ) { ?>
								<div class="gallery-wrap spacer">&nbsp;</div>
								<div class="text-wrap">
									<?php echo anti_email_spam($section_4_text2); ?>
								</div>
							<?php } ?>

						</div>
					</div>
				</div>	
			<?php } ?>


			<?php
			$section_5_text = get_field("section_5_text");
			$section_5_image = get_field("section_5_image");
			$section_5_class = ( $section_5_text && $section_5_image ) ? 'half':'full';
			?>
			<?php if ( $section_5_text || $section_5_image ) { ?>
				<div class="section-5-impact fw-left font18 <?php echo $section_4_class ?>">
					<div class="wrapper">
						<div class="flexwrap section-inner">

							<?php if ( $section_5_image ) { ?>
								<div class="gallery-wrap">
									<div class="imgbox">
										<img src="<?php echo $section_5_image['sizes']['medium_large'] ?>" alt="<?php echo $g['title'] ?>">
									</div>
								</div>
							<?php } ?>
							
							<?php if ( $section_5_text ) { ?>
								<div class="text-wrap">
									<?php echo anti_email_spam($section_5_text); ?>
								</div>
							<?php } ?>

						</div>
					</div>
				</div>	
			<?php } ?>


			<?php 
				$section_6_text = get_field("section_6_text");
				$section_6_button = get_field("section_6_button");
				if ( $section_6_text ) { ?>
				<div class="centered-text text-center fw-left">
					<div class="wrapper">
						<div class="wrapper-narrow font18"><?php echo anti_email_spam($section_6_text); ?></div>
						<?php if ( $section_6_button ) { 
							$bottomTarget = ( isset($section_6_button['target']) && $section_6_button['target'] ) ? $section_6_button['target'] : '_self';
							?>
							<div class="intro-button">
								<a href="<?php echo $section_6_button['url'] ?>" target="<?php echo $bottomTarget ?>" class="btn-theme wide"><?php echo $section_6_button['title'] ?><span class="arrow"></span></a>
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
