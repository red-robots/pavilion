<?php 
	$banner = get_field("section_1_image");
	$banner_title_large = get_field("section_1_tagline");
	$banner_description = get_field("section_1_description");
	if($banner) { ?>
	<div class="subpage-banner">
		<div class="slideImage" style="background-image:url('<?php echo $banner['url']?>');"></div>

		<?php if ( $banner_title_large || $banner_description ) { ?>
			<div class="slideCaption">
				
				<div class="text">
					<div class="inner animated fadeIn">
						<?php if ($banner_title_large) { ?>
						<h2 class="slideTitle">
							<span class="small"><?php echo get_the_title(); ?></span>	
							<?php if ($banner_title_large) { ?>
							<span class="large"><?php echo $banner_title_large ?></span>	
							<?php } ?>
						</h2>	
						<?php } ?>
						<?php if ($banner_description) { ?>
						<div class="slideText"><?php echo $banner_description ?></div>	
						<?php } ?>
					</div>
				</div>

			</div>
		<?php } ?>

	</div>
	<?php } ?>