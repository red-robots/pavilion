<?php
/**
 * Template Name: Development Process
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
			/* PROCESS */
			$process = get_field("process");
			if($process) { ?>
				<div class="process fw-left">
					<div class="wrapper">
						<div class="inner-pad fw-left">
							<?php $b=0; $i=1; foreach ($process as $m) { 
								$title = $m['title'];
								$icon = $m['icon'];
								$text = $m['description'];
								if($title || $text) { 
									$second = $i+2; 
									if($second>9) {
										if($b>0) {
											$sec = 1 + ($b/2);
										} else {
											$sec = 1 + $b;
										}
										$b++;
									} else {
										$sec = "0." . $second;
									}
								$altclass = ($i % 2) ? 'odd':'even';
									?> 
								<div class="process-info <?php echo ($icon) ? 'has-icon':'no-icon'?> <?php echo $altclass ?>">
									<?php if ($title) { ?>
										<h3 class="title">
											<?php if ($icon) { ?>
											<span class="t1"><?php echo $title ?></span>
											<span class="icon" style="background-image:url('<?php echo $icon['url']?>');"><i></i></span>
											<?php } else { ?>
											<span class="t1"><?php echo $title ?></span>
											<?php } ?>
										</h3>
									<?php } ?>

									<?php if ($text) { ?>
										<div class="text font18">
											<span class="counter"><i><?php echo $i; ?></i></span>
											<div class="txtInner"><?php echo $text ?></div>
										</div>
									<?php } ?>
								</div>
								<?php $i++; } ?>
							<?php } ?>
							<div class="middle-line"></div>
						</div>
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
