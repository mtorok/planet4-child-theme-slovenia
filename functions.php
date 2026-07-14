<?php

/**
 * Additional code for the child theme goes in here.
 */

add_action( 'wp_enqueue_scripts', 'enqueue_child_styles', 99);

function enqueue_child_styles() {
	$css_creation = filectime(get_stylesheet_directory() . '/style.css');

	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', [], $css_creation );
}

/*
* This function appends new allowed domains to the existing list
* of allowed frame ancestors.
*/
function update_planet4_csp_allowed_frame_ancestors($allowlist) {
  $ancestors = [
    'podpiram.greenpeace.si',
    'act.greenpeace.si',
  ];
  return array_merge($allowlist, $ancestors);
}

add_filter('planet4_csp_allowed_frame_ancestors', 'update_planet4_csp_allowed_frame_ancestors', 10, 1);
