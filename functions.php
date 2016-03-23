<?php
	include_once('inc/custom-posts.php');
	// Add RSS links to <head> section
	add_theme_support( 'automatic-feed-links');
	
	// Load jQuery
	add_action( 'wp_enqueue_scripts', 'mread_load_scripts' );
	function mread_load_scripts() {
		if ( !is_admin() ) {
		   wp_deregister_script('jquery');
		   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"), false);
		   wp_register_script('bxslider', get_template_directory_uri().'/js/jquery.bxslider.min.js', true);
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
	
	function mr_default_menu() {
		echo '<div id="primary_menu" class="navigation">';
		echo '<ul><li><a href="'.site_url().'/wp-admin/nav-menus.php">Set Up Your Menu</a></li></ul>';
		echo '</div>';
	}
	
	function format_comment($comment, $args, $depth) {
    
       $GLOBALS['comment'] = $comment; ?>
       
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
            
            <div class="comment-thumb ext2">
            	<?php echo get_avatar( get_the_author_meta('ID'), 91, '', '' ); ?>
            </div>
            <div class="comment-body ext10">
	            <div class="comment-header"> 
	                <h4><?php printf(__('%s'), get_comment_author_link()) ?></h4>
	                <a class="comment-permalink" href="<?php echo htmlspecialchars ( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s'), get_comment_date(), get_comment_time()) ?></a>
	                <div class="clear"></div>
	            </div>
	            <div class="comment-content">
		            <?php if ($comment->comment_approved == '0') : ?>
		                <em><php _e('Your comment is awaiting moderation.') ?></em><br />
		            <?php endif; ?>
		            <?php comment_text(); ?>            
		            <div class="reply">
		                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		            </div><?php // .reply ?>
		            <div class="clear"></div>
				</div><?php // comment-content ?>
				<div class="clear"></div>
	        </div><?php // comment-body ?>
	        <div class="clear"></div>
<?php }
	
	//Excerpt Filter
	function string_limit_words($string, $word_limit)
	{
	  $words = explode(' ', $string, ($word_limit + 1));
	  if(count($words) > $word_limit)
	  array_pop($words);
	  return implode(' ', $words);
	}
	
	// function to display number of posts.
	function getPostViews($postID){
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return "0 View";
	    }
	    return $count.' Views';
	}
	
	// function to count views.
	function setPostViews($postID) {
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        $count = 0;
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	    }else{
	        $count++;
	        update_post_meta($postID, $count_key, $count);
	    }
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
	
	
	//Adds class to dropdown menus
	class SH_Last_Walker extends Walker_Nav_Menu{
	
	   function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
	
	        $id_field = $this->db_fields['id'];
	
	       //If the current element has children, add class 'sub-menu'
	       if( isset($children_elements[$element->$id_field]) ) { 
	            $classes = empty( $element->classes ) ? array() : (array) $element->classes;
	            $classes[] = 'has-sub-menu';
	            $element->classes =$classes;
	       }
	        // We don't want to do anything at the 'top level'.
	        if( 0 == $depth )
	            return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	
	        //Get the siblings of the current element
	        $parent_id_field = $this->db_fields['parent'];      
	        $parent_id = $element->$parent_id_field;
	        $siblings = $children_elements[ $parent_id ] ;
	
	        //No Siblings?? 
	        if( ! is_array($siblings) )
	            return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	
	        //Get the 'last' of the siblings.
	        $last_child = array_pop($siblings);
	        $id_field = $this->db_fields['id'];
	
	            //If current element is the last of the siblings, add class 'last'
	        if( $element->$id_field == $last_child->$id_field ){
	            $classes = empty( $element->classes ) ? array() : (array) $element->classes;
	            $classes[] = 'last';
	            $element->classes =$classes;
	        }
	
	        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	    }
	}
	
	function display_social_icons($icon_size) {
		$icons = array();
		if(of_get_option('facebook')) {
			$facebook = '<li><a href="'.of_get_option('facebook').'" target="_blank"><img src="'.get_bloginfo('template_url').'/images/social-icons/facebook'.$icon_size.'.png" alt="'.get_bloginfo('name').' Facebook Page" /></a></li>';
			$icons[] = $facebook;
		}
		if(of_get_option('twitter')) {
			$twitter = '<li><a href="'.of_get_option('twitter').'" target="_blank"><img src="'.get_bloginfo('template_url').'/images/social-icons/twitter'.$icon_size.'.png" alt="'.get_bloginfo('name').' Twitter Page" /></a></li>';
			$icons[] = $twitter;
		}
		if(of_get_option('linkedin')) {
			$linkedin = '<li><a href="'.of_get_option('linkedin').'" target="_blank"><img src="'.get_bloginfo('template_url').'/images/social-icons/linkedin'.$icon_size.'.png" alt="'.get_bloginfo('name').' Linkedin Page" /></a></li>';
			$icons[] = $linkedin;
		}
		if(of_get_option('youtube')) {
			$youtube = '<li><a href="'.of_get_option('youtube').'" target="_blank"><img src="'.get_bloginfo('template_url').'/images/social-icons/youtube'.$icon_size.'.png" alt="'.get_bloginfo('name').' Youtube Page" /></a></li>';
			$icons[] = $youtube;
		}
		if(of_get_option('pinterest')) {
			$pintrest = '<li><a href="'.of_get_option('pinterest').'" target="_blank"><img src="'.get_bloginfo('template_url').'/images/social-icons/pinterest'.$icon_size.'.png" alt="'.get_bloginfo('name').' Pinterest Page" /></a></li>';
			$icons[] = $pintrest;
		} 
		if(1 == of_get_option('rss')) {
			$rss = '<li><a href="'.get_bloginfo('rss_url').'" target="_blank"><img src="'.get_bloginfo('template_url').'/images/social-icons/rss'.$icon_size.'.png" alt="Subscribe to '.get_bloginfo('name').'\'s Blog Feed" /></a></li>';
			$icons[] = $rss;
		}
		if(empty($icons)) {
			// Do nothing
		} else {
			echo '<div id="social" class="navigation"><ul>';
			foreach($icons as $icon) {
				echo $icon;
			}
			echo '</ul></div>';
		}
	}
	
	function pagination($pages = '', $range = 4) {  
	     $showitems = ($range * 2)+1;  

	     global $paged;
	     if(empty($paged)) $paged = 1;
	 
	     if($pages == '') {
	         global $wp_query;
	         $pages = $wp_query->max_num_pages;
	         if(!$pages)
	         {
	             $pages = 1;
	         }
	     }   
	 
	     if(1 != $pages)
	     {
	         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
	         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
	         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
	 
	         for ($i=1; $i <= $pages; $i++)
	         {
	             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
	             {
	                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
	             }
	         }
	 
	         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";  
	         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
	         echo "</div>\n";
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