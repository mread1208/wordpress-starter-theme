<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	<?php // Responsive Thing ?>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php // End Responsive thing ?>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	 <title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jquery.bxslider.css" type="text/css" />
	<!-- Bootstrap -->
    <link href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<!--[if IE]>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie.css" type="text/css" />
	<![endif]-->
	<!--[if IE 7]>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie7.css" type="text/css" />
	<![endif]-->
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
	<?php // Add Scripts to /js/functions.js file ?>
	<?php if(is_front_page()) { ?>
		<script type="text/javascript">
			$(function() {
				$('.bxslider').bxSlider({
				  auto: true,
				  pause: 4000,
				  speed: 1500,
				  controls: false,
				  captions: true,
				  adaptiveHeight: false,
				  pager: false,
				  mode: 'fade'
				});
			});
		</script>
	<?php } ?>
</head>

<body <?php body_class(); ?>>
	<header id="header">
		<div class="container">
			<div class="row">
				<div id="logo" class="col-md-5">
					<a href="<?php echo home_url(); ?>">
						<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?> Logo" />
						<?php /* if(of_get_option('main_logo')) {
							echo '<img src="'.of_get_option('main_logo').'" alt="'.get_bloginfo('name').' Logo" />';
						} else {
							echo '<img src="'.get_bloginfo('template_url').'/images/logo.png" alt="'.get_bloginfo('name').' Logo" />';
						} */ ?>
					</a>
				</div><?php // #logo ?>
				<?php //display_social_icons(32);  ?>
				<?php wp_nav_menu(array(	
						'theme_location' => 	'primary_menu', 
						'container_id' => 		'primary_menu', 
						'container_class' => 	'navigation col-md-7',  
						'walker' => 			new SH_Last_Walker(), 
						'fallback_cb' => 		'mr_default_menu'
				)); ?>
			</div><?php //.row ?>
		</div><?php //.container ?>
	</header>

