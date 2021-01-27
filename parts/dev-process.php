<?php  
/* PROCESS */
$post = get_post(778); 
setup_postdata( $post );


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
								<span class="icon"><i style="background-image:url('<?php echo $icon['url']?>');"></i></span>
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
wp_reset_postdata();
?>
