<?php
	include_once('inc/custom-posts.php');
	// Add RSS links to <head> section
	add_theme_support( 'automatic-feed-links');
	
	add_action( 'wp_enqueue_scripts', 'mread_load_scripts' );
	function mread_load_scripts() {
		if ( !is_admin() ) {
			wp_register_script('jsfunctions', get_stylesheet_directory_uri().'/js/functions.min.js', '', '', true);
			wp_enqueue_script('jsfunctions');
			
			wp_register_style('stylecss', get_stylesheet_directory_uri().'/style.min.css',false,'','all');
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
	
	
	function format_comment($comment, $args, $depth) {
    	$GLOBALS['comment'] = $comment; ?>
        <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
            <div class="comment-wrapper">
	            <div class="comment-avatar">
		            <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
				</div>
	    
				<div class="comment-body">
		            <?php printf( __( '<cite class="fn">%s</cite>' ), $comment->comment_author ); ?>
		            <div class="comment-meta commentmetadata">
					    <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
				        <?php /* translators: 1: date, 2: time */
				        printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
				    </div>
		            <?php if ( $comment->comment_approved == '0' ) : ?>
						<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
				    <?php endif; ?>
				    <?php comment_text(); ?>
				    <div class="reply">
		                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		            </div>
				</div>
            </div>
        <?php // OMIT </li>, WP closes that automatically ?>
	<?php }
	
?>