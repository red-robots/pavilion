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
			?>
			<?php if ( $contact_info_text ) { ?>
				<div class="contactdiv intro fw-left text-center">
					<div class="wrapper">
						<div class="wrapper-narrow font18"><?php echo anti_email_spam($contact_info_text); ?></div>
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
<?php
get_footer();