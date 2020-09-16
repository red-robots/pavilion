<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;669;700;800;900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<script defer src="<?php bloginfo( 'template_url' ); ?>/assets/svg-with-js/js/fontawesome-all.js"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="mobile-menu-backdrop"></div>
<div id="mobile-navigation">
	<a href="#" id="closeMobileMenu"><span class="sr">Close</span></a>
	<div class="mobile-inner"><?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-mobile-menu', 'menu_class'=>'mobile-menu','container'=>false ) ); ?></div>
</div>

<div id="page" class="site cf">
	<a class="skip-link sr" href="#content"><?php esc_html_e( 'Skip to content', 'bellaworks' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="wrapper">
			<div class="flexwrap">
				<?php if( get_custom_logo() ) { ?>
	          <div class="logo">
	          	<?php the_custom_logo(); ?>
	          </div>
	      <?php } else { ?>
	          <h1 class="logo">
	            <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
	          </h1>
	      <?php } ?>
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu','link_before'=>'<span>','link_after'=>'</span>','container'=>false) ); ?>
				</nav><!-- #site-navigation -->
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<span class="sr"><?php esc_html_e( 'MENU', 'bellaworks' ); ?></span>
					<span class="bar"></span>
				</button>
			</div>
	</div><!-- wrapper -->
	</header><!-- #masthead -->

	<?php get_template_part("parts/banner"); ?>

	<div id="content" class="site-content">
