<?php

function test_shortcodes()
{
    return 'Shortcodes are working!';
}


function reset_page_attributes(){
	$GLOBALS['desktop_page_attributes'] = "";
	$GLOBALS['tablet_page_attributes'] = "";
}

function change_desktop_page_attributes($attr){
	$type = 'desktop_page_attributes';
	get_page_attributes($type,$attr);
}
function change_tablet_page_attributes($attr){
	$type = 'tablet_page_attributes';
	get_page_attributes($type,$attr);
}

function get_page_attributes($type, $attr){

	foreach($attr as $shortcode_array) {
		$css_attr = explode("=",$shortcode_array);
		$GLOBALS[$type] .= $css_attr[0] . ": " . $css_attr[1] . " !important;";
	}
}

function register_shortcodes(){
	add_shortcode('test-shortcodes', 'test_shortcodes');
	add_shortcode( 'desktop-page', 'change_desktop_page_attributes' );
	add_shortcode( 'tablet-page', 'change_tablet_page_attributes' );
}

add_action( 'init', 'register_shortcodes');

function register_menu() {
	register_nav_menu('primary-menu', __('Primary Menu'));
}
add_action('init', 'register_menu');

function get_bootstrap(){
	add_bootstrap_styles();
	add_bootstrap_styles_mods();
	add_bootstrap_scripts();
}

function add_bootstrap_styles() {
	wp_enqueue_style( 'bootstrap-styles', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css", array(), null);
}

function add_bootstrap_styles_mods() {
	wp_enqueue_style( 'bootstrap-styles-mods', get_template_directory_uri() . '/css/bootstrap-mods.css', array('bootstrap-styles'), null);
}

function add_bootstrap_scripts() {
	wp_enqueue_script( 'bootstrap-scripts-and-jquery', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js", array( 'jquery' ), null);
}


add_action( 'wp_enqueue_scripts', 'get_bootstrap' );


function get_basics(){
// Load our main stylesheet.
	wp_enqueue_style( 'notop-style', get_stylesheet_uri() );

// Load our main javasheet.
	wp_enqueue_script( 'custom-header-js', get_template_directory_uri() . '/js/custom-header.js', array( 'jquery' ));
}

add_action( 'wp_enqueue_scripts', 'get_basics' );

function get_web_standards(){

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'noyop-ie', get_template_directory_uri() . '/css/ie.css', array( 'notop-style' ));
	wp_style_add_data( 'twentyfifteen-ie', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'notop-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'notop-style' ));
	wp_style_add_data( 'notop-ie7', 'conditional', 'lt IE 8' );

	wp_enqueue_script( 'notop-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array());
}
	
//add_action( 'wp_enqueue_scripts', 'get_web_standards' );


require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/custom-header.php';