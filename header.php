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
	<header id="header">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<a href="<?php echo home_url(); ?>">
						<img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="<?php bloginfo('name'); ?> Logo" />
					</a>
				</div>
				<div class="col-md-7">
					<?php wp_nav_menu( array(
		                'menu'              => 'primary_menu',
		                'theme_location'    => 'primary_menu',
		                'depth'             => 2,
		                'container'         => 'div',
						'container_id'      => 'primary_menu'
						)
		            ); ?>
				</div>
			</div><?php //.row ?>
		</div><?php //.container ?>
	</header>

