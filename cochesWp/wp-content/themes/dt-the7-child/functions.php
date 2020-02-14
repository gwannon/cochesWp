<?php

//Limpieza de Scripts y metas 
//Quitamos las urls canónicas.
remove_action('wp_head', 'rel_canonical');
//Quitamos el enlace corto
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
//Quitamos los enlaces extras a feeds como el feed de categoría.
remove_action( 'wp_head', 'feed_links_extra', 3 );
// Quitamos los enlaces a los feeds generales del blog y de comentarios.
remove_action( 'wp_head', 'feed_links', 2 );
//Quitamos el enlace al archivo Windows Live Writer manifest.
remove_action( 'wp_head', 'wlwmanifest_link' );
//Quitamos la meta-etiqueta "index_link".
remove_action( 'wp_head', 'index_rel_link' );
//Quitamos la meta-etiqueta "prev_link".
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
//Quitamos la meta-etiqueta start link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
//Quitamos las metaetiquetas de los posts adjacentes al actual.
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
//Quitamos el meta-dato con la versión de WordPress que estamos usando.
remove_action( 'wp_head', 'wp_generator' );
//Quitamos el enlace Really Simple Discovery.
remove_action( 'wp_head', 'rsd_link');
// Remove REST API info from head and headers
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
//Quitamos auto <br/>
//remove_filter( 'the_content', 'wpautop' );
add_filter('xmlrpc_enabled', '__return_false'); //desactivamos el xmlrpc

function _remove_script_version( $src ) { //Quitamos la versión de las urls de CSS y JS
	$parts = explode( '?ver', $src );
	return $parts[0];
}
add_filter('script_loader_src', '_remove_script_version', 15, 1 );
add_filter('style_loader_src', '_remove_script_version', 15, 1 );

/**
 * Disable the emoji's
 */
function disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
  add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
  if ( 'dns-prefetch' == $relation_type ) {
    $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
    $urls = array_diff( $urls, array( $emoji_svg_url ) );
  }
  return $urls;
}

/**
 * Remove jquery-migrate.
 */
/* function remove_jquery_migrate( $scripts ) { 
  if (isset( $scripts->registered['jquery'] ) ) { 
    if ( $scripts->registered['jquery']->deps ) $scripts->registered['jquery']->deps = array_diff( $scripts->registered['jquery']->deps, array( 'jquery-migrate' ) ); 
  } 
} 
if(!is_admin()) add_action( 'wp_default_scripts', 'remove_jquery_migrate' ); */

/**
 * Remove wp-embed.min.js
 */
function disable_embeds_code_init() {
  // Remove the REST API endpoint.
  remove_action( 'rest_api_init', 'wp_oembed_register_route' );

  // Turn off oEmbed auto discovery.
  add_filter( 'embed_oembed_discover', '__return_false' );

  // Don't filter oEmbed results.
  remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

  // Remove oEmbed discovery links.
  remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

  // Remove oEmbed-specific JavaScript from the front-end and back-end.
  remove_action( 'wp_head', 'wp_oembed_add_host_js' );
  add_filter( 'tiny_mce_plugins', 'disable_embeds_tiny_mce_plugin' );

  // Remove all embeds rewrite rules.
  add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );

  // Remove filter of the oEmbed result before any HTTP requests are made.
  remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result', 10 );
}

add_action( 'init', 'disable_embeds_code_init', 9999 );

function disable_embeds_tiny_mce_plugin($plugins) {
  return array_diff($plugins, array('wpembed'));
}

function disable_embeds_rewrites($rules) {
  foreach($rules as $rule => $rewrite) {
    if(false !== strpos($rewrite, 'embed=true')) {
      unset($rules[$rule]);
    }
  }
  return $rules;
}

//Custom posts types
require ( get_stylesheet_directory() . '/custom-post-types/coches.php' ); 

