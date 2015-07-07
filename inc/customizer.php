<?php


function notop_customize_register( $wp_customize ) {
   
	$wp_customize->add_section( 'mytheme_new_section_name' , array(
	    'title'      => __( 'Visible Section Name', 'notop' ),
	    'priority'   => 30,
	) );

	$wp_customize->add_setting( 'header_textcolor' , array(
	    'default'     => '#000000',
	    'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
	'label'        => __( 'Header Color', 'notop' ),
	'section'    => 'mytheme_new_section_name',
	'settings'   => 'header_textcolor',
	) ) );

	// Add header images

   	for ($x = 1; $x<= 5; $x++) {

   		$wp_customize->add_section( "header_$x", array(
		'title' => "Header Image $x",
		'priority' => $x,
		//'description' => "Add images with links to be redirected to when the images are clicked",
		) );


		$wp_customize->add_setting( "header_image_{$x}", array(
			'default'           => null,
			'capability'        => 'edit_theme_options',
	        'type'           => 'option',
		) );


		$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize,"header_image_{$x}_control", array(
			'label'    => __( 'Import Image', 'notop' ),
	        'section'  => "header_$x",
	        'settings' => "header_image_$x",
	        'description' => "Choose slide image",

		) ) );

		$wp_customize->add_setting("header_redirect_$x", array(
        'default'        => null,
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    	));
 
	    $wp_customize->add_control("header_redirect_{$x}_control", array(
	        'label'      => __('Redirect Url', 'notop'),
	       	'section'  => "header_$x",
	        'settings' => "header_redirect_$x",
	        'description' => "Choose page to be redirected to after clicking slide",
	    ));

	    $wp_customize->add_setting("header_caption_title_$x", array(
        'default'        => null,
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    	));
 
	    $wp_customize->add_control("header_caption_title_{$x}_control", array(
	        'label'      => __('Title', 'notop'),
	       	'section'  => "header_$x",
	        'settings' => "header_caption_title_$x",
	        'description' => "Write caption for slide",
	    ));

	   	$wp_customize->add_setting("header_caption_subtitle_$x", array(
        'default'        => null,
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    	));
 
	    $wp_customize->add_control("header_caption_subtitle_{$x}_control", array(
	        'label'      => __('Subtitle', 'notop'),
	       	'section'  => "header_$x",
	        'settings' => "header_caption_subtitle_$x",
	        'description' => "Write subtitle for slide",
	    ));

   	}


	
}
add_action( 'customize_register', 'notop_customize_register' );

