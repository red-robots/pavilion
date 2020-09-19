<?php
/**
 * Template Name: About
 */

get_header(); ?>

<?php get_template_part("parts/banner-about"); ?>

<div id="primary" class="content-area-full default-template">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			
			<?php
			$section_2_title = get_field("section_2_title");
			$section_2_description = get_field("section_2_description");
			$section_2_link_text = get_field("section_2_link_text");
			$section_2_link_url = get_field("section_2_link_url");
			?>
			<?php if ( $section_2_title || $section_2_description ) { ?>
				<div class="intro text-center font18">
					<div class="wrapper">
						<div class="wrapper-narrow">
							<?php if ($section_2_title) { ?>
								<h2 class="intro-title"><?php echo $section_2_title ?></h2>
							<?php } ?>
							<?php if ($section_2_description) { ?>
								<div class="intro-text"><?php echo $section_2_description ?></div>
							<?php } ?>

							<?php if ($section_2_link_text && $section_2_link_url) { ?>
								<div class="intro-button">
									<a href="<?php echo $section_2_link_url ?>" class="btn-theme wide"><?php echo $section_2_link_text ?><span class="arrow"></span></a>
								</div>
							<?php } ?>

						</div>
					</div>
				</div>	
			<?php } ?>


			<?php
			$section_3_title = get_field("section_3_title");
			$section_3_description = get_field("section_3_description");
			$section_3_link_text = get_field("section_3_link_text");
			$section_3_link_url = get_field("section_3_link_url");
			$section_3_image = get_field("section_3_image");
			$section_3_class = ( ($section_3_title || $section_3_description) &&  $section_3_image ) ? 'half':'full';
			?>
			<?php if ( ($section_3_title || $section_3_description) ||  $section_3_image ) { ?>
				<div class="section-3 font18 <?php echo $section_3_class ?>">
					<div class="flexwrap">
						<?php if ($section_3_image) { ?>
							<div class="imagecol">
								<img src="<?php echo $section_3_image['url'] ?>" alt="<?php echo $section_3_image['title'] ?>" />
							</div>	
						<?php } ?>


						<?php if ($section_3_title || $section_3_description) { ?>
							<div class="textcol">
								<div class="inner">
									<?php if ($section_3_title) { ?>
										<h2 class="col-title"><?php echo $section_3_title ?></h2>
									<?php } ?>
									<?php if ($section_3_description) { ?>
										<div class="sec-text"><?php echo $section_3_description ?></div>
									<?php } ?>

									<?php if ($section_3_link_text && $section_3_link_url) { ?>
										<div class="sec-button">
											<a href="<?php echo $section_3_link_url ?>" class="btn-theme wide"><?php echo $section_3_link_text ?><span class="arrow"></span></a>
										</div>
									<?php } ?>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>	
			<?php } ?>


			<?php
			$section_4_title = get_field("section_4_title");
			$section_4_secondary_title = get_field("section_4_secondary_title");
			$section_4_description = get_field("section_4_description");
			$section_4_link_text = get_field("section_4_link_text");
			$section_4_link_url = get_field("section_4_link_url");
			if ($section_4_title || $section_4_secondary_title || $section_4_description) { ?>
				<div class="section-4 fw-left">
					<div class="wrapper">

						<div class="inner">

							<div class="col-left">
								<?php if ( $section_4_title || $section_4_secondary_title ) { ?>
									<div class="section-header">
										<?php if ($section_4_title) { ?>
											<h2 class="col-title"><?php echo $section_4_title ?></h2>
										<?php } ?>
										<?php if ($section_4_secondary_title) { ?>
											<h3 class="small-title"><?php echo $section_4_secondary_title ?></h3>
										<?php } ?>
									</div>
								<?php } ?>

								<?php if ($section_4_description) { ?>
									<div class="sec-text font18"><?php echo $section_4_description ?></div>
								<?php } ?>
							</div>

							<?php if ( $section_4_link_text && $section_4_link_url ) { ?>
							<div class="col-right">
								<div class="button">
									<a href="<?php echo $section_4_link_url ?>" class="btn-theme wide"><?php echo $section_4_link_text ?><span class="arrow"></span></a>
								</div>
							</div>
							<?php } ?>

						</div>
						
					</div>
				</div>
			<?php } ?>


			<?php
			$section_5_title = get_field("section_5_title");
			$section_5_icons = get_field("section_5_icons");
			$section_5_text = get_field("section_5_text");
			if( ($section_5_title || $section_5_text) || $section_5_icons ) { ?>
			<div class="section-with-icons fw-left">
				<div class="wrapper">
					<div class="wrapper-narrow text-center">
						<?php if ($section_5_title) { ?>
							<h2 class="col-title"><?php echo $section_5_title ?></h2>
						<?php } ?>
					</div>

					<?php if ($section_5_icons) { ?>
						<div class="features-info">
							<div class="wrapper">
								<div class="flexwrap">
									<?php foreach ($section_5_icons as $s) { 
										$icon = $s['section_5_icon'];
										$title = $s['section_5_icon_title'];
										$text = $s['section_5_icon_description'];
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
			$section_6_title = get_field("section_6_title");
			$section_6_description = get_field("section_6_description");
			$section_6_link_text = get_field("section_6_link_text");
			$section_6_url = get_field("section_6_url");
			?>
			<?php if ( $section_6_title || $section_6_description ) { ?>
				<div class="centered-text text-center fw-left font18">
					<div class="wrapper">
						<div class="wrapper-narrow">
							<?php if ($section_6_title) { ?>
								<h2 class="intro-title"><?php echo $section_6_title ?></h2>
							<?php } ?>
							<?php if ($section_6_description) { ?>
								<div class="intro-text"><?php echo $section_6_description ?></div>
							<?php } ?>

							<?php if ($section_6_link_text && $section_6_url) { ?>
								<div class="intro-button">
									<a href="<?php echo $section_6_url ?>" class="btn-theme wide"><?php echo $section_6_link_text ?><span class="arrow"></span></a>
								</div>
							<?php } ?>

						</div>
					</div>
				</div>	
			<?php } ?>


		
			<?php endwhile; ?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
