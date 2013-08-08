<?php

/*
Plugin Name: RedApple Theme Customizer
Description: Methods that add custom settings and controls under new "theme settings" section
Author: Joe Pena
Version: 0.1
Requires at least: 3.4
 */

/**
 * Putting Theme Customizer on the Appearance Menu Rather than Hidden
 * @since ver. 0.1
 */

add_action ('admin_menu', 'themedemo_admin');
function themedemo_admin() {
    // add the Customize link to the admin menu
    add_theme_page( 'Customize', 'Customize', 'edit_theme_options', 'customize.php' );
}

/**
 * Defining function
 * @since ver. 0.1
 */
function redapple_customize ( $wp_customize ) {

	//Define New Color Schemes Section
	
	$wp_customize->add_section( 'color_schemes' , array(
    'title'      => __( 'Color Schemes', 'redapple' ),
    'priority'   => 10,
    'description'=> 'Define Colors for your Theme Here'
	) );

	//Add Default Values 

	$wp_customize->add_setting( 'scheme_options' , array(
    'default'     => '<style type="text/css">
             			body { background-color: #eae7db; color: #464646; }
             			header a { color: #eae7db; }
             			header .main-nav,
						input[type=submit], 
						input[type=button],
						button,
						.primary-action { background-color: #5daa92; }
						header ul a:hover { background-color: #464646; }
						aside .widget-title,
						.ra-days-bar { background-color: #464646; color: #eae7db; }
						a { color: #5daa92; }
         				</style>', 
    'transport'   => 'refresh',
     ) );

	//Add Controls
		//Make Radio Buttons
	$wp_customize->add_control( 'redapple_color_scheme', array(
	'label'        => __( 'Pick a Scheme', 'redapple' ),
	'section'    => 'color_schemes',
	'settings'   => 'scheme_options',
	'type'       => 'radio',
    'choices'    => array(
        'choice1' => 'Light',
        'choice2' => 'Dark',
        'choice3' => 'Another Scheme',
        'choice4' => '4th Scheme',
        'choice5' => 'Cool Guy Scheme',
        'choice6' => 'Lastly Not Leastly',
        ),
	) );
		//Define Styles for Radio Buttons
	
	$chosen_scheme = get_theme_mod( 'redapple_color_scheme' );
    if( $chosen_scheme != '' ) {
        switch ( $chosen_scheme ) {
            case 'choice1':
                // Do nothing. The default is choice1
                break;
            case 'choice2':
                echo '<style type="text/css">';
                echo 'body { background-color: #eae7db; color: #464646; }
             			header a { color: #eae7db; }
             			header .main-nav,
						input[type=submit], 
						input[type=button],
						button,
						.primary-action { background-color: #5daa92; }
						header ul a:hover { background-color: #464646; }
						aside .widget-title,
						.ra-days-bar { background-color: #464646; color: #eae7db; }
						a { color: #5daa92; }';
                echo '</style>';
                break;
            case 'choice3':
                echo '<style type="text/css">';
                echo 'body { background-color: #fff; color: #fff; }
             			header a { color: #fff; }
             			header .main-nav,
						input[type=submit], 
						input[type=button],
						button,
						.primary-action { background-color: #fff; }
						header ul a:hover { background-color: #fff; }
						aside .widget-title,
						.ra-days-bar { background-color: #fff; color: #fff; }
						a { color: #fff; }';
                echo '</style>';
                break;
            case 'choice4':
                echo '<style type="text/css">';
                echo 'body { background-color: #eae7db; color: #464646; }
             			header a { color: #eae7db; }
             			header .main-nav,
						input[type=submit], 
						input[type=button],
						button,
						.primary-action { background-color: #5daa92; }
						header ul a:hover { background-color: #464646; }
						aside .widget-title,
						.ra-days-bar { background-color: #464646; color: #eae7db; }
						a { color: #5daa92; }';
                echo '</style>';
                break;
            case 'choice5':
                echo '<style type="text/css">';
                echo 'body { background-color: #eae7db; color: #464646; }
             			header a { color: #eae7db; }
             			header .main-nav,
						input[type=submit], 
						input[type=button],
						button,
						.primary-action { background-color: #5daa92; }
						header ul a:hover { background-color: #464646; }
						aside .widget-title,
						.ra-days-bar { background-color: #464646; color: #eae7db; }
						a { color: #5daa92; }';
                echo '</style>';
                break;
            case 'choice6':
                echo '<style type="text/css">';
                echo 'body { background-color: #eae7db; color: #464646; }
             			header a { color: #eae7db; }
             			header .main-nav,
						input[type=submit], 
						input[type=button],
						button,
						.primary-action { background-color: #5daa92; }
						header ul a:hover { background-color: #464646; }
						aside .widget-title,
						.ra-days-bar { background-color: #464646; color: #eae7db; }
						a { color: #5daa92; }';
                echo '</style>';
                break;
        }
    }

	//Lastly, Remove Default Colors Section

	$wp_customize->remove_section( 'colors' );

}

/**
 * Registers defined function
 * @since ver. 0.1
 */
add_action( 'customize_register', 'redapple_customize' );


/**
 * Outputs CSS
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