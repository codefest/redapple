<?php

/*
Plugin Name: RedApple Theme Customizer - Melissa's Version
Description: Methods that add custom settings and controls under new "theme settings" section
Author: Joe Pena & Melissa Cabral
Version: 0.1
Requires at least: 3.4

awesome tutorial here:  http://themefoundation.com/wordpress-theme-customizer/

@TODO: figure out why the data refreshes too late. 
*/

/**
 * Front end display. set up color scheme hex codes here
 */
function display_css(){
	$custom_options = get_theme_mods();
	$color_scheme = $custom_options['ra_color_scheme'];

    /* 
    =================== KEY ===================

        SCHEMES

        'scheme1' => 'Turquoise (Default)',
        'scheme2' => 'Monochrome Gray',
        'scheme3' => 'Autumn Leaves',
        'scheme4' => 'Steel Blue',
        'scheme5' => 'Dark Turquoise',
        'scheme6' => 'Bold Red',
        'scheme7' => 'Spring Green' 

        COLORS

        color[0] = Nav bar, Links
        color[1] = Accent Elements
        color[2] = Body Background
        color[3] = Category Links
        color[4] = HTML Background
        color[5] = Body Text
        color[6] = Bars
        color[7] = Bar Text
   */

	switch($color_scheme){
		case 'scheme2':
            //monochrome gray
			$color = array('727b7b','879191','f5fafa','389494','727b7b','212121','4b5555','ffffff');
		break;
		case 'scheme3':
            //Autumn Leaves
			$color = array('452b1b','e38600','e7f0e7','269149','452b1b','26170e','c54e07','ffffff');
		break;
		case 'scheme4':
            //Steel Blue
			$color = array('8998af','3c4450','19202b','ef8803','222b39','ffffff','222b39','ffffff'); 
		break;
        //TODO... add the other schemes
		default: 
            //Turquoise
			$color = array('5daa92','46816f','ffffff','f27e59','eae7db','363636','000000','ffffff');
     		     				
		
	}
	//todo: finish this css!
	return     'html { background-color: #'.$color[4].' ; color: #'.$color[5].'; }
                body{background-color:  #'.$color[2].'}
     			header a { color: #'.$color[7].'; }
     			header .main-nav, input[type=submit], input[type=button], button, .primary-action { background-color: #'.$color[0].' ; color: #'.$color[7].';}
               
                .current_page_item a, .current_page_ancestor a, .current_page_parent a{ border-bottom:solid .375em #'.$color[1].'; }
				header ul a:hover { background-color: #'.$color[1].';border-bottom:solid .375em #'.$color[1].';  }
				aside .widget-title, .ra-days-bar, .utilities { background-color: #'.$color[6].'; color:#'.$color[7].'; }
				a { color:  #'.$color[0].'; }
                .widget-title:after{ background-color:#'.$color[1].'; color:#'.$color[1].'; }';    

}
function redapple_customize_css() {
    ?>
         <!-- generated by theme-customizer.php-->
         <style type="text/css"> 
            <?php echo display_css(); ?> 
          </style>
    <?php
}
add_action( 'wp_head', 'redapple_customize_css');


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
 * Define the settings and controls
 * @since ver. 0.1
 */
add_action( 'customize_register', 'redapple_customize' );
function redapple_customize ( $wp_customize ) {

	//create a section on the customize screen
	$wp_customize->add_section( 'color_scheme_section' , array(
    'title'      => 'Color Scheme',
    'priority'   => 10,
    'description'=> 'Define Colors for your Theme Here'
	) );

	//Add settings to this section 
	//TODO: sanitize this!
	$wp_customize->add_setting( 'ra_color_scheme' , array(
    	'default'     => 'scheme1',
    	 'sanitize_callback' => 'redapple_option_sanitize',
    	 'transport' => 'refresh'
     ) );

	//Add Controls to each setting
	//Make Radio Buttons
	$wp_customize->add_control( 'ra_color_scheme', array(
	'label'      => 'Pick a color scheme',
	'section'    => 'color_scheme_section',
	'settings'   => 'ra_color_scheme',
	'type'       => 'radio',
    'choices'    => array(
        'scheme1' => 'Turquoise (Default)',
        'scheme2' => 'Monochrome Gray',
        'scheme3' => 'Autumn Leaves',
        'scheme4' => 'Steel Blue',
        'scheme5' => 'Dark Turquoise',
        'scheme6' => 'Bold Red',
        'scheme7' => 'Spring Green',
        ),
	) );
		//Define Styles for Radio Buttons
	

	//Lastly, Remove Default Colors Section
	//TODO: why isnt this working
	$wp_customize->remove_section( 'colors' );

}


/**
 * sanitizer for the color option
 */
function redapple_option_sanitize($input){
    $valid = array(
        'scheme1' => 'Turquoise (Default)',
        'scheme2' => 'Monochrome Gray',
        'scheme3' => 'Autumn Leaves',
        'scheme4' => 'Steel Blue',
        'scheme5' => 'Dark Turquoise',
        'scheme6' => 'Bold Red',
        'scheme7' => 'Spring Green',
        );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }

}


//Do Not Close PHP