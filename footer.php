	</div><!-- #content -->


	<?php
	$footer_logo = get_field("footer_logo","option");
	$address = get_field("address","option");
	$phone = get_field("phone","option");
	$fax = get_field("fax","option");
	?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper">
			<div class="footer-inner">
				<?php if ($footer_logo) { ?>
				<div class="footer-logo foot-col"><img src="<?php echo $footer_logo['url'] ?>" alt="<?php echo $footer_logo['title'] ?>"></div>	
				<?php } ?>

				<div class="footer-contact">
					<?php if ($address) { ?>
					<div class="footer-address foot-col"><?php echo $address ?></div>	
					<?php } ?>

					<?php if ($phone || $fax) { ?>
					<div class="footer-phone foot-col">
						<?php if ($phone) { ?>
							<span class="phone">Phone: <a href="tel:<?php echo format_phone_number($phone) ?>"><?php echo $phone; ?></a></span>
						<?php } ?>
						<?php if ($phone && $fax) { ?>
						<span class="divider"></span>	
						<?php } ?>
						<?php if ($fax) { ?>
							<span class="fax">Fax: <a href="tel:<?php echo format_phone_number($fax) ?>"><?php echo $fax; ?></a></span>
						<?php } ?>
					</div>	
					<?php } ?>
				</div>

			</div>
		</div><!-- wrapper -->
	</footer><!-- #colophon -->
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
