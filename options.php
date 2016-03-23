<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'options_check'),
		'two' => __('Two', 'options_check'),
		'three' => __('Three', 'options_check'),
		'four' => __('Four', 'options_check'),
		'five' => __('Five', 'options_check')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_check'),
		'two' => __('Pancake', 'options_check'),
		'three' => __('Omelette', 'options_check'),
		'four' => __('Crepe', 'options_check'),
		'five' => __('Waffle', 'options_check')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );
		
	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);

	/* Defaults */
	$options[] = array(
		'name' => __('Defaults', 'options_check'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Logo', 'options_check'),
		'desc' => __('Appear on the header of each page.'),
		'id' => 'main_logo',
		'type' => 'upload');
	
	$options[] = array(
		'name' => __('Address Line 1', 'options_check'),
		'desc' => __('First line of address here'),
		'id' => 'address1',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Address Line 2', 'options_check'),
		'desc' => __('Second line of address here'),
		'id' => 'address2',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('City', 'options_check'),
		'desc' => __('What city you\'re in'),
		'id' => 'city',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('State', 'options_check'),
		'desc' => __('What state you\'re in'),
		'id' => 'state',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Zip code', 'options_check'),
		'desc' => __('Address Zip Code'),
		'id' => 'zip',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Phone', 'options_check'),
		'desc' => __('Phone Number'),
		'id' => 'phone',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Fax Number', 'options_check'),
		'desc' => __('Fax Number'),
		'id' => 'fax',
		'type' => 'text');
	
	/* Social Media */
	
	$options[] = array(
		'name' => __('Social Media', 'options_check'),
		'type' => 'heading');
	
	$options[] = array(
		'name' => __('Facebook', 'options_check'),
		'desc' => __('Paste full link to Facebook here'),
		'id' => 'facebook',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Twitter', 'options_check'),
		'desc' => __('Paste full link to Twitter here'),
		'id' => 'twitter',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Linkedin', 'options_check'),
		'desc' => __('Paste full link to Linkedin here'),
		'id' => 'linkedin',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Youtube', 'options_check'),
		'desc' => __('Paste full link to Youtube here'),
		'id' => 'youtube',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Pinterest', 'options_check'),
		'desc' => __('Paste full link to Pinterest here'),
		'id' => 'pinterest',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('RSS Icon', 'options_check'),
		'desc' => __('Show RSS Icon?'),
		'id' => 'rss',
		'std' => '0',
		'type' => 'checkbox');
	
	

	return $options;
}