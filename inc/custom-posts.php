<?php 

add_action( 'admin_head', 'cpt_icons' );
function cpt_icons() { ?>
    <style type="text/css" media="screen">
        #menu-posts-home_image_slider .wp-menu-image {
            background: url(<?php bloginfo('template_url') ?>/inc/icons/images.png) no-repeat 6px -17px !important;
        }
		#menu-posts-home_image_slider:hover .wp-menu-image, #menu-posts-POSTTYPE.wp-has-current-submenu .wp-menu-image {
            background-position:6px 7px!important;
        }
    </style>
<?php }


add_action( 'init', 'register_cpt_home_image_slider' );

function register_cpt_home_image_slider() {

    $labels = array( 
        'name' => _x( 'Home Image Sliders', 'home_image_slider' ),
        'singular_name' => _x( 'Home Image Slider', 'home_image_slider' ),
        'add_new' => _x( 'Add New', 'home_image_slider' ),
        'add_new_item' => _x( 'Add New Home Image Slider', 'home_image_slider' ),
        'edit_item' => _x( 'Edit Home Image Slider', 'home_image_slider' ),
        'new_item' => _x( 'New Home Image Slider', 'home_image_slider' ),
        'view_item' => _x( 'View Home Image Slider', 'home_image_slider' ),
        'search_items' => _x( 'Search Home Image Sliders', 'home_image_slider' ),
        'not_found' => _x( 'No home image sliders found', 'home_image_slider' ),
        'not_found_in_trash' => _x( 'No home image sliders found in Trash', 'home_image_slider' ),
        'parent_item_colon' => _x( 'Parent Home Image Slider:', 'home_image_slider' ),
        'menu_name' => _x( 'Home Image Sliders', 'home_image_slider' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'thumbnail' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'home_image_slider', $args );
}
?>