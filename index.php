<?php

/*
Redirect To First Post
*/

$args = array( 'numberposts' => '1');
$recent_posts = wp_get_recent_posts( $args );
foreach( $recent_posts as $recent ){
wp_redirect(get_permalink($recent["ID"]));
}

?>