<?php get_header(); ?>
<div id="primary" class="content-area-full">
	<?php while ( have_posts() ) : the_post(); 
		$section_2_title = get_field("section_2_title");
		$section_2_description = get_field("section_2_description");
		$section_2_link_text = get_field("section_2_link_text");
		$section_2_link_url = get_field("section_2_link_url");
		$section_2_quote = get_field("section_2_quote");
		?>

		<?php /* ROW 2 */ ?>
		<?php if ($section_2_title || $section_2_description) { ?>
		<div class="home-row home-row-2-b">
			<div class="inner">
			<div class="wrapper row-2-content">
				<div class="flexwrap">
					<div class="left fadeIn wow">
						<?php if ($section_2_title) { ?>
							<h2 class="col-title"><?php echo $section_2_title ?></h2>
						<?php } ?>
						<?php if ($section_2_description) { ?>
							<div class="text font18"><?php echo anti_email_spam($section_2_description) ?></div>
						<?php } ?>
					</div>
					<!-- <div class="right">&nbsp;</div> -->

					<?php if ($section_2_link_text && $section_2_link_url) { ?>
					<div class="ctaButton fadeInDown wow">
						<a href="<?php echo $section_2_link_url ?>" class="btn btn-theme"><?php echo $section_2_link_text ?><span class="arrow"></span></a>
					</div>	
					<?php } ?>

				</div>
				
			</div>
			</div>
			<div class="inner-right">
				<?php echo $section_2_quote; ?>
			</div>
		</div>
		<?php } ?>


		<?php /* ROW 3 */ ?>
		<?php
		$square = THEMEURI . 'images/square.png';
		$rectangle = THEMEURI . 'images/rectangle.png';
		$section_3_title = get_field("section_3_title");
		$section_3_description = get_field("section_3_description");
		$section_3_link_text = get_field("section_3_link_text");
		$section_3_link_url = get_field("section_3_link_url");
		$section_3_gallery = get_field("section_3_gallery");
		$row_3_class = ( ($section_3_title || $section_3_description) && $section_3_gallery ) ? 'half':'full';
		if( ($section_3_title || $section_3_description) || $section_3_gallery ) { ?>
		<div class="home-row home-row-3 <?php echo $row_3_class ?>">
			<div class="flexwrap">

				<?php if ($section_3_gallery) { 
					$count = count($section_3_gallery); ?>
					<div class="col-gallery count-<?php echo $count;?> fadeIn wow">
						<div class="gallery-inner">
						<?php $i=1; foreach ($section_3_gallery as $g) { 
							$boxClass = ($i % 2 == 0 ) ? 'even':'odd'; ?>
							<div class="imagebox <?php echo $boxClass ?>">
								<div class="pad">
									<div class="bg" style="background-image:url('<?php echo $g['url']?>')"></div>
									<?php if ($boxClass=='even') { ?>
										<img src="<?php echo $square ?>" alt="" aria-hidden="true" class="placeholder rectangle">
									<?php } else { ?>
										<img src="<?php echo $square ?>" alt="" aria-hidden="true" class="placeholder square">
									<?php } ?>
								</div>
							</div>
						<?php $i++; } ?>
						</div>
					</div>
				<?php } ?>

				<?php if ( $section_3_title || $section_3_description ) { ?>
					<div class="col-description fadeIn wow">
						<div class="inner">
							<?php if ($section_3_title) { ?>
								<h2 class="col-title"><?php echo $section_3_title ?></h2>
							<?php } ?>
							<?php if ($section_3_description) { ?>
								<div class="col-text font18"><?php echo anti_email_spam($section_3_description) ?></div>
							<?php } ?>
							
							<?php if ($section_3_link_text && $section_3_link_url) { ?>
							<div class="ctaButton">
								<a href="<?php echo $section_3_link_url ?>" class="btn btn-theme"><?php echo $section_3_link_text ?><span class="arrow"></span></a>
							</div>	
							<?php } ?>

						</div>
					</div>
				<?php } ?>

			</div>
		</div>
		<?php } ?>


		<?php /* ROW 4 */ ?>
		<?php
		$section_4_title = get_field("section_4_title");
		$section_4_description = get_field("section_4_description");
		$section_4_icons = get_field("section_4_icons");
		$section_4_link_text = get_field("section_4_link_text");
		$section_4_link_url = get_field("section_4_link_url");
		if( ($section_4_title || $section_4_description) || $section_4_icons ) { ?>
		<div class="home-row home-row-4">
			<div class="wrapper">
				<div class="wrapper-narrow text-center fadeIn wow">
					<?php if ($section_4_title) { ?>
						<h2 class="col-title"><?php echo $section_4_title ?></h2>
					<?php } ?>
					<?php if ($section_4_description) { ?>
						<div class="col-text font18"><?php echo $section_4_description ?></div>
					<?php } ?>
				</div>

				<?php if ($section_4_icons) { ?>
					<div class="features-info fadeIn wow">
						<div class="wrapper">
							<div class="flexwrap">
								<?php foreach ($section_4_icons as $s) { 
									$icon = $s['section_4_icon'];
									$title = $s['section_4_icon_title'];
									$text = $s['section_4_icon_description'];
									?>
									<div class="feature">
										<div class="pad">
											<?php if ($icon) { ?>
											<div class="icon"><span style="background-image:url('<?php echo $icon['url']?>')"></span></div>
											<?php } ?>

											<?php if ($title) { ?>
											<h3 class="h3 js-blocks"><?php echo $title ?></h3>
											<?php } ?>

											<?php if ($text) { ?>
											<div class="text font18"><?php echo anti_email_spam($text) ?></div>
											<?php } ?>
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
					</div>
				<?php } ?>

				<?php if ($section_4_link_text && $section_4_link_url) { ?>
				<div class="ctaButton text-center fadeInDown wow">
					<a href="<?php echo $section_4_link_url ?>" class="btn-theme white"><?php echo $section_4_link_text ?><span class="arrow"></span></a>
				</div>	
				<?php } ?>

			</div>
		</div>
		<?php } ?>


		<?php /* ROW 5 */ ?>
		<?php
		$section_5_title = get_field("section_5_title");
		$section_5_description = get_field("section_5_description");
		$section_5_image = get_field("section_5_image");
		$section_5_link_text = get_field("section_5_link_text");
		$section_5_link_url = get_field("section_5_link_url");
		$row_5_class = ( ($section_5_title || $section_5_description) && $section_5_image ) ? 'half':'full';
		if( ($section_5_title || $section_5_description) || $section_5_image ) { ?>
		<div class="home-row home-row-5 <?php echo $row_5_class ?>">
			<div class="wrapper">
				<div class="inner">
					<?php if ($section_5_image) { ?>
					<div class="imagecol fadeIn wow">
						<img src="<?php echo $section_5_image['url'] ?>" alt="<?php echo $section_5_image['title'] ?>" />
					</div>	
					<?php } ?>

					<?php if ( $section_5_title || $section_5_description ) { ?>
					<div class="textcol fadeIn wow">
						<?php if ($section_5_title) { ?>
							<h2 class="col-title"><?php echo $section_5_title ?></h2>
						<?php } ?>
						<?php if ($section_5_description) { ?>
							<div class="col-text font18"><?php echo anti_email_spam($section_5_description) ?></div>
						<?php } ?>

						<?php if ($section_5_link_text && $section_5_link_url) { ?>
						<div class="ctaButton">
							<a href="<?php echo $section_5_link_url ?>" class="btn-theme white"><?php echo $section_5_link_text ?><span class="arrow"></span></a>
						</div>	
						<?php } ?>
					</div>	
					<?php } ?>

					

				</div>
			</div>
		</div>
		<?php } ?>


		<?php /* ROW 6 */ ?>
		<?php
		$section_6_title = get_field("section_6_title");
		$section_6_description = get_field("section_6_description");
		$section_6_icons = get_field("section_6_icons");
		if( ($section_6_title || $section_6_description) || $section_6_icons ) { ?>
		<div class="home-row home-row-6">
			<div class="wrapper">
				<div class="wrapper-narrow text-center fadeIn wow">
					<?php if ($section_6_title) { ?>
						<h2 class="col-title"><?php echo $section_6_title ?></h2>
					<?php } ?>
					<?php if ($section_6_description) { ?>
						<div class="col-text font18"><?php echo anti_email_spam($section_6_description) ?></div>
					<?php } ?>
				</div>

				<?php if ($section_6_icons) { ?>
					<div class="features-info fadeIn wow">
						<div class="wrapper">
							<div class="flexwrap">
								<?php foreach ($section_6_icons as $s) { 
									$icon = $s['section_6_icon'];
									$title = $s['section_6_icon_title'];
									$text = $s['section_6_icon_description'];
									?>
									<div class="feature">
										<div class="pad">
											<?php if ($icon) { ?>
											<div class="icon"><span style="background-image:url('<?php echo $icon['url']?>')"></span></div>
											<?php } ?>

											<?php if ($title) { ?>
											<h3 class="h3 js-blocks"><?php echo $title ?></h3>
											<?php } ?>

											<?php if ($text) { ?>
											<div class="text"><?php echo anti_email_spam($text) ?></div>
											<?php } ?>
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
					</div>
				<?php } ?>
				<div class="centered">
					<div class="ctaButton">
						<a href="<?php bloginfo('url'); ?>/why-pavilion" class="btn-theme white">Why Pavilion<span class="arrow"></span></a>
					</div>	
				</div>
			</div>
		</div>
		<?php } ?>


		<?php /* ROW 7 */ ?>
		<?php
		$section_7_title = get_field("section_7_title");
		$section_7_description = get_field("section_7_description");
		$section_7_link_text = get_field("section_7_link_text");
		$section_7_url = get_field("section_7_url");
		$locations = get_field('locations');
		// echo '<pre>';
		// print_r($locations);
		// echo '</pre>';
		if( $section_7_title || $section_7_description) { ?>
		<div class="home-row home-row-7">
			<div class="wrapper text-center">
				<div class="wrapper-narrow">
					<?php if ($section_7_title) { ?>
						<h2 class="col-title"><?php echo $section_7_title ?></h2>
					<?php } ?>

					<?php if ($section_7_description) { ?>
						<div class="col-text font18"><?php echo anti_email_spam($section_7_description) ?></div>
					<?php } ?>

					<?php if ($section_7_link_text && $section_7_url) { ?>
					<div class="ctaButton">
						<a href="<?php echo $section_7_url ?>" class="btn-theme white"><?php echo $section_7_link_text ?><span class="arrow"></span></a>
					</div>	
					<?php } ?>
				</div>
				<?php if( $locations ) { ?>
					<div class="locations">
						<?php foreach ( $locations as $img ) { ?>
							
								<div class="location">
									<img src="<?php echo $img['sizes']['evencrop']; ?>" alt="<?php echo $img['alt']; ?>">
									<div class="img-desc">
										<?php if($img['title']){ echo '<h3>'.$img['title'].'</h3>'; } ?>
										<?php if($img['description']){echo $img['description'];} ?>
									</div>
								</div>
							
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php } ?>


	<?php endwhile; ?>
</div><!-- #primary -->
<?php
get_footer();
