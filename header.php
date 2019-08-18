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
	<header class="header">
		<div class="container">
			<div class="header--header-wrapper">
				<div class="header--header-wrapper--mobile-nav-trigger">
					<a class="js-toggle-mobile-menu" href="#"><i class="fa fa-bars"></i></a>
				</div>
				<div class="header--header-wrapper--logo">
					<?php $themeLogoID = get_theme_mod( 'custom_logo' );
					if($themeLogoID == "") { ?>
						<p>Upload a logo using the theme customizer</p>
					<?php } else { ?>
						<a href="<?php echo home_url(); ?>">
							<?php $themeLogo = wp_get_attachment_image_src( $themeLogoID , 'full' ); ?>
							<img src="<?= $themeLogo[0]; ?>" alt="<?php bloginfo('name'); ?> Logo" />
						</a>
					<?php } ?>
				</div>
				<div class="header--header-wrapper--utility">
					<?php if(showSocialNav()) : ?>
						<div class="header--header-wrapper--utility--social-nav">
							<ul class="social-nav">
								<?php if( get_theme_mod( 'mrtheme_social_facebook') != "" ): ?>
									<li>
										<a target="_blank" href="<?php echo get_theme_mod( 'mrtheme_social_facebook'); ?>">
											<i class="fab fa-facebook"></i>
										</a>
									</li>
								<?php endif; ?>
								<?php if( get_theme_mod( 'mrtheme_social_twitter') != "" ): ?>
									<li>
										<a target="_blank" href="<?php echo get_theme_mod( 'mrtheme_social_twitter'); ?>">
											<i class="fab fa-twitter"></i>
										</a>
									</li>
								<?php endif; ?>
							</ul>
						</div>
					<?php endif; ?>
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
	<div class="mobile-menu js-mobile-menu" aria-hidden="true">
		<div class="mobile-menu--close">
			<a href="#" class="mobile-menu--close-btn js-toggle-mobile-menu"><i class="fa fa-times-circle"></i></a>
			Menu
		</div>
		<?php wp_nav_menu( array(
			'menu'              => 'primary_menu',
			'theme_location'    => 'primary_menu',
			'depth'             => 2,
			'container'         => 'nav',
			'container_id'      => 'primary-menu-mobile',
			'container_class'      => 'primary-menu-mobile',
			'menu_id'			=> "menu-primary-menu-mobile",
			'menu_class'			=> "menu-primary-menu-mobile"
			)
		); ?>
	</div>

