<?php get_header(); ?>
<div id="primary" class="content-area-full">
	<?php while ( have_posts() ) : the_post(); 
		$section_2_title = get_field("section_2_title");
		$section_2_description = get_field("section_2_description");
		$section_2_link_text = get_field("section_2_link_text");
		$section_2_link_url = get_field("section_2_link_url");
		?>

		<?php if ($section_2_title || $section_2_description) { ?>
		<div class="home-row home-row-2">
			<div class="wrapper row-2-content">
				<div class="flexwrap">
					<div class="left">
						<?php if ($section_2_title) { ?>
							<h2 class="title"><?php echo $section_2_title ?></h2>
						<?php } ?>
						<?php if ($section_2_description) { ?>
							<div class="text"><?php echo $section_2_description ?></div>
						<?php } ?>
					</div>
					<!-- <div class="right">&nbsp;</div> -->

					<?php if ($section_2_link_text && $section_2_link_url) { ?>
					<div class="ctaButton">
						<a href="<?php echo $section_2_link_url ?>" class="btn"><?php echo $section_2_link_text ?><span class="arrow"></span></a>
					</div>	
					<?php } ?>
				
				</div>
				
			</div>
		</div>
		<?php } ?>


	<?php endwhile; ?>
</div><!-- #primary -->
<?php
get_footer();
