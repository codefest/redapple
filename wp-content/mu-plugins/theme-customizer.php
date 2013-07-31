<?php

/*
Plugin Name: RedApple Theme Customizer
Description: Methods that add custom settings and controls under new "theme settings" section
Author: Joe Pena
Version: 0.1
 */


/**
 * Defining function
 * @since ver. 0.1
 */
function redapple_customize ( $wp_customize ) {

	//Define Colors Section

	$wp_customize->colors( 'colors' , array(
    'title'      => __( 'Colors', 'redapple' ),
    'priority'   => 10,
    'description'=> 'Define Colors for your Theme Here'
	) );

	//Add Settings

	$wp_customize->add_setting( 'body_color' , array(
    'default'     => '#000000',
    'transport'   => 'refresh',
	) );

	//Add Controls

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
	'label'        => __( 'Header Color', 'redapple' ),
	'section'    => 'colors',
	'settings'   => 'header_textcolor',
	) ) );

}

/**
 * Registers defined function
 * @since ver. 0.1
 */
add_action( 'customize_register', 'redapple_customize' );


/**
 * Output CSS
 * @since ver. 0.1
 */
function redapple_customize_css() {
    ?>
         <style type="text/css">
             h1 { color:<?php echo get_theme_mod('header_color'); ?>; }
         </style>
    <?php
}
add_action( 'wp_head', 'redapple_customize_css');


//Do Not Close PHP