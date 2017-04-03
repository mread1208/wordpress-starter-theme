<?php
	include_once('inc/custom-posts.php');
	include_once('inc/wp_bootstrap_navwalker.php');
	include_once('inc/wp-bootstrap-comments.php');
	// Add RSS links to <head> section
	add_theme_support( 'automatic-feed-links');
	
	add_action( 'wp_enqueue_scripts', 'mread_load_scripts' );
	function mread_load_scripts() {
		if ( !is_admin() ) {
			
			wp_register_script('bsjs', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), '', true);
			wp_register_script('jsfunctions', get_stylesheet_directory_uri().'/js/functions.min.js', array('jquery'), '', true);
			wp_enqueue_script('bsjs');
			wp_enqueue_script('jsfunctions');
			
			wp_register_style('bscss', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',false,'','all');
			wp_register_style('stylecss', get_stylesheet_directory_uri().'/style.css',false,'','all');
			wp_enqueue_style('bscss');
			wp_enqueue_style('stylecss');
		}
	}
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
     if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Blog Widgets',
    		'id'   => 'blog-widgets',
    		'description'   => 'These are widgets for the blog page sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h4>',
    		'after_title'   => '</h4>'
    	));
    	
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for all pages with a sidebar except the blog.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h4>',
    		'after_title'   => '</h4>'
    	));
   
    }

    
    if ( function_exists( 'add_theme_support' ) ) { 
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)
		add_image_size( 'page-banner', 960, 300 );;
		
	}
    
    function register_my_menus() {
		$locations = array(
			'primary_menu' => 'Primary Menu',
			//add more here
		);
		register_nav_menus($locations);
	}
	add_action( 'init', 'register_my_menus' );

?>