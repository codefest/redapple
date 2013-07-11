<?php
/**
 * redapple Theme functions and definitions
 *
 * Sets up the theme and provides some helper functions. 
 *
 * @package WordPress
 * @subpackage redapple
 * @since redapple 0.1
 */


/** 
 * Turn on basic theme support, and menus
 * @since redapple 0.5
 */
add_action( 'after_setup_theme', 'redapple_setup' );
function redapple_setup() {
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	
	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails', array( 'redapple-resources' ) );
	
	//image sizes
	add_image_size( 'redapple-small-tile', 300, 193, true );
	add_image_size( 'redapple-full', 550, 1000, false );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary-menu'=> 'Primary Menu',
		'utility-menu' => 'Utility Menu',
		'footer-menu' =>'Footer Menu',
		));	

	 if ( is_singular() ) wp_enqueue_script( "comment-reply" );
}

/**
 * Enqueues scripts and styles for front-end
 * redapple_js_activation function is used to activate and register all of the Java Script used as well as activating css styles. -JJ
 * 
 * @since redapple 0.1
 */
add_action( 'wp_enqueue_scripts', 'redapple_js_activation' ); 
function redapple_js_activation() {
    wp_enqueue_script( 'jquery' );
	$modernizr_path = get_template_directory_uri() . '/js/vendor/modernizr-2.6.2.min.js';
    wp_register_script( 'modernizrjs', $modernizr_path );
    wp_enqueue_script( 'modernizrjs' );

    wp_enqueue_script(
		'main-js',
		get_template_directory_uri() . '/js/main.js',
		array( 'jquery' ),
		false,
		true // loaded in the footer
	);
	
	
	wp_register_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );
	wp_enqueue_style( 'normalize' );
	// @todo: do we need fontawesome?
	//wp_register_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	//wp_enqueue_style( 'font-awesome' );
}

/** 
 * Makes <title> pretty, more logical and SEO friendlier
 * @since redapple 0.1
 *
 * Based on http://perishablepress.com/how-to-generate-perfect-wordpress-title-tags-without-a-plugin/
 * This gets called on header.php
 */
function redapple_header_titles() {
	if (function_exists('is_tag') && is_tag()) { 
		echo 'Tag Archive for &quot;'.$tag.'&quot; - '; 
	} elseif (is_archive()) { 
		wp_title(''); echo ' Archive - '; 
	} elseif (is_search()) { 
		echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; 
	} elseif (!(is_404()) && (is_single()) || (is_page())) { 
		wp_title(''); echo ' - '; 
	} elseif (is_404()) { 
		echo 'Not Found - '; 
	} if (is_home()) { 
		bloginfo('name'); 
		echo ' - '; 
		bloginfo('description'); 
	} else {
		bloginfo('name'); 
	}
}
/**
 * display the 25 days of class in a nifty bar
 * @todo: make this real
 */
function ra_days_bar(){
	?>
	<ul class="ra-days-bar">
		<li>this is fake</li>
		<li>1</li>
		<li>2</li>
		<li>3</li>
		<li>...</li>
	</ul>
	<?php
}