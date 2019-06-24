<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>
	<?php // Add Scripts to /js/functions.js file ?>
</head>

<body <?php body_class(); ?>>

<p>Facebook: <?php echo get_theme_mod( 'social_facebook'); ?></p>
<p>Twitter: <?php echo get_theme_mod( 'social_twitter'); ?></p>


	<header class="header">
		<div class="container">
			<div class="header--header-wrapper">
				<?php /* <div class="header--header-wrapper--mobile-nav-trigger">
					<a class="js-toggle-menu" href="#"><i class="fa fa-bars"></i></a>
				</div> */ ?>
				<div class="header--header-wrapper--logo">
					<a href="<?php echo home_url(); ?>">
						<img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="<?php bloginfo('name'); ?> Logo" />
					</a>
				</div>
				<div class="header--header-wrapper--utility">
				<?php if(showSocialNav()) { ?>
					<div class="header--header-wrapper--utility--social-nav">
					asdf
					</div>
				<?php } ?>
					<div class="header--header-wrapper--utility--searchform">
						<?= get_search_form(); ?>
					</div>
				</div>
			</div>
			<div class="header--header--menu">
				<?php wp_nav_menu( array(
					'menu'              => 'primary_menu',
					'theme_location'    => 'primary_menu',
					'depth'             => 2,
					'container'         => 'nav',
					'container_id'      => 'primary-menu',
					'container_class'      => 'primary-menu'
					)
				); ?>
			</div>
		</div><?php //.container ?>
	</header>

