<?php

// Names and stuff
define('URL',get_bloginfo('url'));
define('NAME',get_bloginfo('name'));
define('DESCRIPTION',get_bloginfo('description'));
define('RSS',get_bloginfo('rss2_url'));
define('OPENGOV','http://www.opengov.gr/home');

// Define folder constants
define('ROOT', get_bloginfo('template_url'));
define('JS', ROOT . '/js');
define('IMG', ROOT . '/images');

add_filter( 'the_content', 'mask_email' ); 
add_filter('the_category','the_category_filter',10,2);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'parent_post_rel_link');
remove_action('wp_head', 'feed_links_extra');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'start_post_rel_link');
add_filter('the_generator', 'remove_generator');
remove_action('wp_head', 'wp_generator');

require_once(TEMPLATEPATH . '/app/func.php');
require_once(TEMPLATEPATH . '/app/paged-comments.php');
require_once(TEMPLATEPATH . '/app/menu.php');
require_once(TEMPLATEPATH . '/app/export_xls.php');

function remove_generator() {
	return '<generator>http://wordpress.org/</generator>';
}
?>
