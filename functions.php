<?php
	include_once('inc/custom-posts.php');
	include_once('inc/wp_bootstrap_navwalker.php');
	// Add RSS links to <head> section
	add_theme_support( 'automatic-feed-links');
	
	// Load jQuery
	add_action( 'wp_enqueue_scripts', 'mread_load_scripts' );
	function mread_load_scripts() {
		if ( !is_admin() ) {
		   wp_deregister_script('jquery');
		   wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"), false);
		   wp_register_script('jsfunctions', get_template_directory_uri().'/js/functions.js', true);
		   wp_register_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', '', '', true);
		   
		   wp_enqueue_script('jquery');
		   wp_enqueue_script('bxslider');
		   wp_enqueue_script('jsfunctions');
		   wp_enqueue_script('bootstrap');
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
	
	
	//Excerpt Filter
	function string_limit_words($string, $word_limit)
	{
	  $words = explode(' ', $string, ($word_limit + 1));
	  if(count($words) > $word_limit)
	  array_pop($words);
	  return implode(' ', $words);
	}
		
	/*
	 * Helper function to return the theme option value. If no value has been saved, it returns $default.
	 * Needed because options are saved as serialized strings.
	 *
	 * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
	 */
	if ( !function_exists( 'of_get_option' ) ) {
		function of_get_option($name, $default = false) {
			$optionsframework_settings = get_option('optionsframework');
			// Gets the unique option id
			$option_name = $optionsframework_settings['id'];
			if ( get_option($option_name) ) {
				$options = get_option($option_name);
			}
			if ( isset($options[$name]) ) {
				return $options[$name];
			} else {
				return $default;
			}
		}
	}	
	
	// The code below finds the menu item with the class "[CPT]-menu-item" and adds another “current_page_parent” class to it.
	// Furthermore, it removes the “current_page_parent” from the blog menu item, if this is present. 
	// Via http://vayu.dk/highlighting-wp_nav_menu-ancestor-children-custom-post-types/
	 
	add_filter('nav_menu_css_class', 'current_type_nav_class', 10, 2);
	function current_type_nav_class($classes, $item) {
	    // Get post_type for this post
	    $post_type = get_query_var('post_type');
	 
	    // Removes current_page_parent class from blog menu item
	    if ( get_post_type() == $post_type )
	        $classes = array_filter($classes, "get_current_value" );
	 
	    // Go to Menus and add a menu class named: {custom-post-type}-menu-item
	    // This adds a current_page_parent class to the parent menu item
	    if( in_array( $post_type.'-menu-item', $classes ) )
	        array_push($classes, 'current_page_parent');
	 
	    return $classes;
	}
	function get_current_value( $element ) {
	    return ( $element != "current_page_parent" );
	}
	
	//  Removes parent classes.  Using this for the custom taxonomies
	
	function remove_parent_classes($class) {
		// check for current page classes, return false if they exist.
		return ($class == 'current_page_item' || $class == 'current_page_parent' || $class == 'current_page_ancestor'  || $class == 'current-menu-item') ? FALSE : TRUE;
	}
	
	function add_class_to_wp_nav_menu($classes) {
	    switch (get_post_type()) {
	     	case 'our_work':
	     		// we're viewing a custom post type, so remove the 'current_page_xxx and current-menu-item' from all menu items.
	     		$classes = array_filter($classes, "remove_parent_classes");
	
	     		// add the current page class to a specific menu item (replace ###).
	     		if (in_array('menu-item-13', $classes)) {
	     		   $classes[] = 'current_page_parent';
		 		}
	     		break;
	      // add more cases if necessary and/or a default
	     }
		return $classes;
	}
	add_filter('nav_menu_css_class', 'add_class_to_wp_nav_menu');

?>