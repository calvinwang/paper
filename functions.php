<?php
if ( function_exists('register_sidebar') )
    register_sidebar();

/**
 * Get First Post Date Function
 *
 * @param  $format Type of date format to return, using PHP date standard, default Y-m-d
 * @return Date of first post
 */
function first_post_year($format = "Y") {
 $args = array(
	 'numberposts' => -1,
	 'post_status' => 'publish',
	 'order' => 'ASC'
 );
 $get_all = get_posts($args);
 $first_post = $get_all[0];
 $first_post_year = $first_post->post_date;
 $year = date($format, strtotime($first_post_year));

 return $year;
}

?>