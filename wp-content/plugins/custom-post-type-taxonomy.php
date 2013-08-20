<?php 
/*
Plugin Name: Red Apple CPT and Taxonomy setup
Description: Adds the "days" taxonomy, as well as handles the display of the "days" bar
Author: Melissa Cabral
Version: 0.1
@TODO:  Incorporate this into the redapple theme
*/

/**
 * Set up the post type in the admin panel
 * @since 0.1
 */
add_action( 'init', 'ra_register_types_taxos' );
function ra_register_types_taxos(){
	

	//add "brand" sorting to our products
	register_taxonomy( 'class-day', 'post', array(
		'hierarchical' => true, //act like categories
		'rewrite' => array( 'slug' => 'class-day' ),
		'labels' => array( 
			'name' => 'Class Days',
			'singular-name' => 'Class Day',
			'add_new_item' => 'Add New Day of Class',
			),
		) );


}
/**
 * Add 25 days as terms of the taxo
 * @since 0.1
 */
function ra_create_days(){	
	$days = array(
		array('1', 'day-01'),
		array('2', 'day-02'),
		array('3', 'day-03'),
		array('4', 'day-04'),
		array('5', 'day-05'),
		array('6', 'day-06'),
		array('7', 'day-07'),
		array('8', 'day-08'),
		array('9', 'day-09'),
		array('10', 'day-10'),
		array('11', 'day-11'),
		array('12', 'day-12'),
		array('13', 'day-13'),
		array('14', 'day-14'),
		array('15', 'day-15'),
		array('16', 'day-16'),
		array('17', 'day-17'),
		array('18', 'day-18'),
		array('19', 'day-19'),
		array('20', 'day-20'),
		array('21', 'day-21'),
		array('22', 'day-22'),
		array('23', 'day-23'),
		array('24', 'day-24'),
		array('25', 'day-25'),
		);
	foreach($days as $day){
		wp_insert_term( $day[0], 'class-day', array(			
			'slug' => $day[1],			
			)
		);
	}
}



/**
 * Flush Rewrite Rules - Fix 404 errors when the plugin activates, also set up the 25 days on activation
 * @since 0.1
 */
function ra_flush(){
	ra_register_types_taxos();
	ra_create_days();
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'ra_flush' );



/**
 * display the 25 days of class in a nifty bar
 * @since 0.1
 */
function ra_days_bar(){

	$args = array(
		'taxonomy'     	=> 'class-day',
		'orderby'     	=> 'slug',
		'show_count'   	=> 0,
		'pad_counts'  	=> 0,
		'hierarchical' 	=> 0,
		'title_li'     	=> '',
		'hide_empty'	=> 0,
	);
	?>

	<ul class="ra-days-bar">
		<li>Day: </li>
	<?php 
	//get all the terms in the taxonomy
	$terms = get_terms('class-day', $args);
	//TODO:  add a counter here so the CSS width is based on the number of terms.

		//loop through each term (day)		
		foreach ($terms as $term) {
			echo '<li';
			if(is_tax('class_day', $term->slug)){
				echo ' class="current"';
			}
			echo '>';
			//if the term has posts assigned, link to the archive otherwise, no link necessary
			if($term->count){
				echo '<a href="'.get_term_link( $term->slug, 'class-day' ).'" title="View all posts from Day '. $term->name. '">';
			}
			//show the name
			echo  $term->name ;

			//close the link if needed
			if($term->count){
				echo '</a>';
			}
			echo '</li>';
		}
		
	?>
	</ul>
	<?php
}
