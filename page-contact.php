<?php
/**
 * Template Name: Contact
 */

get_header(); ?>
<div id="primary" class="content-area-full default-template">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php  
			$contact_info_text = get_field("contact_info_text");
			$gal = get_field('gallery');
			$img = '';
			// echo '<pre>';
			// print_r($gal);
			// echo '</pre>';
			?>
			<?php if ( $contact_info_text ) { ?>
				<div class="contactdiv intro fw-left text-center">
					<div class="wrapper">
						<div class="flex-contact">
							<div class="flexwrap font18">
								<?php echo anti_email_spam($contact_info_text); ?>
							</div>
							<div class="gallery">
								<?php foreach ($gal as $img) { ?>
									<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" >
								<?php } ?>
							</div>
						</div>
					</div>
				</div>	
			<?php } ?>


			<?php  
			$contact_form = get_field("contact_form");
			if($contact_form) { ?>
			<div class="contact-form-section fw-left">
				<div class="wrapper">

					<div class="wrapper-narrow font18">
						<?php echo anti_email_spam($contact_form); ?>
						<div class="custom-form-button"></div>
					</div>
					
				</div>
			</div>
			<?php } ?>
		
		<?php endwhile; ?>
	</main><!-- #main -->
</div><!-- #primary -->
<script>
jQuery(document).ready(function($){
	var contact_count =  $(".contactdiv .contact-info-shortcode").length;
	if(contact_count==1) {
		$(".contactdiv .contact-info-shortcode").addClass('full-width');
	}
});
</script>
<?php
get_footer();
