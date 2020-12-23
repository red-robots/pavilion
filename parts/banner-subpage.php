<?php 
$placeholder = THEMEURI . 'images/rectangle.png';
$banner = get_field("section_1_image");
$banner_title_large = get_field("section_1_tagline");
$banner_description = get_field("section_1_description");
$section_1_excerpt = get_field("section_1_excerpt");
if($banner) { ?>
<div class="subpage-banner">
	<div class="slideImage" style="background-image:url('<?php echo $banner['url']?>');">
		<img src="<?php echo $placeholder ?>" alt="" aria-hidden="true" class="placeholder"/>
	</div>

	<?php if ( $banner_title_large || $banner_description ) { ?>
		<div class="slideCaption">
			
			<div class="text">
				<div class="inner animated fadeIn">
					<h1 class="pagetitle-off"><?php echo get_the_title(); ?></h1>
					<?php if ($banner_title_large) { ?>
					<h2 class="slideTitle">
							
						<?php if ($banner_title_large) { ?>
						<span class="large"><?php echo $banner_title_large ?></span>	
						<?php } ?>
					</h2>	
					<?php } ?>

					<?php if ($section_1_excerpt && $banner_description) { ?>
					<div class="slideText">
							<div class="excerpt">
								<?php echo $section_1_excerpt ?>
							</div>
							
							<div class="moreBtnDiv"><a href="#" class="slideMoreBtn">Read More</a></div>

							<div class="full-info hide">
								<?php echo $banner_description ?>
							</div>
					</div>			
					<?php } else { ?>

						<?php if ($section_1_excerpt) { ?>
							<div class="slideText"><?php echo $section_1_excerpt ?></div>
						<?php } ?>

						<?php if ($banner_description) { ?>
							<div class="slideText"><?php echo $banner_description ?></div>
						<?php } ?>

					<?php } ?>

				</div>
			</div>

		</div>
	<?php } ?>

</div>
<?php } ?>