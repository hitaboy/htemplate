<?php
/*
 *  Author: Pere esteve | @hitaboy
 *  URL: hodiern.com | @hodiern
 *  Custom functions, support, custom post types and more.
 */

include "lib/globals.php";

include "lib/geolocate.php";

/*

include "lib/media.php";

include "lib/custom_admin.php";

include "lib/custom_types_and_taxonomies.php";

include "lib/permalinks.php";

*/

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('wp_enqueue_scripts', 'header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_enqueue_scripts', 'header_styles'); // Add Theme Stylesheet
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'print_emoji_detection_script', 7 );

// Add Filters
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

/*------------------------------------*\
	ACF - Advanced Custom Fields
\*------------------------------------*/

// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
function my_acf_settings_path( $path ) {

    // update path
    $path = get_stylesheet_directory() . '/acf/';

    // return
    return $path;

}

// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
function my_acf_settings_dir( $dir ) {

    // update path
    $dir = get_stylesheet_directory_uri() . '/acf/';

    // return
    return $dir;

}

// 3. Hide ACF field group menu item
//add_filter('acf/settings/show_admin', '__return_false');

// 4. Include ACF
include_once( get_stylesheet_directory() . '/acf/acf.php' );

/*------------------------------------*\
	Functions & Utils
\*------------------------------------*/

function pr2($content){
  echo "<pre>";
  print_r($content);
  echo "</pre>";
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style(){
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html ){
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

function header_scripts(){
    if (!is_admin()) {
        // HEADER
        wp_deregister_script('jquery');
        // FOOTER
        wp_enqueue_script('rocascripts', get_template_directory_uri() . '/scripts-min.js', array(), '1.0.0');
    }
}

function header_styles(){
    wp_register_style('roca_front', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('roca_front'); // Enqueue it!
}

add_action( 'admin_enqueue_scripts', 'admin_style_enqueue' );

function admin_style_enqueue() {
    wp_enqueue_style(
        'admin_style',
        get_template_directory_uri() . '/admin.css' // you probably want to use plugins_url() for this
    );
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist){
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes){
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Get a JSON Cached menu
function get_menu($market_slug){
  $terms = get_terms( 'theme' );
  foreach ($terms as $menu_item){
    echo "<div><a href='http://".SITE_URL."/".ICL_LANGUAGE_CODE."/".$market_slug."/rocalife/cats/".$menu_item->slug."/'>".$menu_item->name."</a></div>";
  }

}

// Get a JSON Cached grid
function get_grid($market_id){
  $str = file_get_contents(WP_CONTENT_URL."/cache/market_grids-json/grid_".$market_id."_".ICL_LANGUAGE_CODE.".json");
  $grid = json_decode($str, true); // decode the JSON into an associative array
  return $grid;
}

// Get a JSON Cached markets
function get_markets(){
  $markets = get_terms( 'markets' );
  foreach ($markets as $market) {
    echo "<div><a href='".SITE_URL."/".ICL_LANGUAGE_CODE."/".$market->slug."/rocalife/'>".$market->name."</a></div>";

  }

}

/*------------------------------------*\
	WPML
\*------------------------------------*/

/**
 * Temporary fix for https://wpml.org/forums/topic/auto-adjust-id-options-disables-by-itself/
 * This snippet will force the setting "auto_adjust_ids" to be enabled (in WPML)
 * Pierre @ WPML - 12/01/2016
 */
function wpmlsupp_2548_force_auto_enable_adjust_id() {
    $auto_adjust_id_enabled = apply_filters( 'wpml_get_setting', null, 'auto_adjust_ids' );

    if ( !is_null( $auto_adjust_id_enabled ) && (bool) $auto_adjust_id_enabled !== true ) {
        do_action( 'wpml_set_setting', 'auto_adjust_ids', true, true );
    }
}
// add_action( 'shutdown', 'wpmlsupp_2548_force_auto_enable_adjust_id' );

define('ICL_DONT_LOAD_LANGUAGES_JS', true);
define('ICL_DONT_LOAD_NAVIGATION_CSS', true);


/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }

    return $join;
}
add_filter('posts_join', 'cf_search_join' );

/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where( $where ) {
    global $pagenow, $wpdb;

    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {
    global $wpdb;
    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );

function trim_texts($s, $length){

  if( strlen($s) > $length ){
    $pos=strpos($s, ' ', $length);
    $def = substr($s,0,$pos );
    $def .= '...';
  }else{
    $def = $s;
  }
  return $def;

}

function custom_youtube_settings($code){
	if(strpos($code, 'youtu.be') !== false || strpos($code, 'youtube.com') !== false){
		$return = preg_replace("@src=(['\"])?([^'\">\s]*)@", "src=$1$2&showinfo=0&rel=0&autohide=1", $code);
		return $return;
	}
	return $code;
}
add_filter('embed_handler_html', 'custom_youtube_settings');
add_filter('embed_oembed_html', 'custom_youtube_settings');

add_filter('acf/fields/taxonomy/wp_list_categories', 'my_taxonomy_args', 10, 2);
function my_taxonomy_args( $args, $field ) {
    $args['suppress_filters'] = 1;
    return $args;
}

function m_explode(array $array,$key = ''){
  if( !is_array($array) or $key == '')
    return;
    $output = array();
    foreach( $array as $v ){
      if( !is_object($v) ){
        return;
      }
      $output[] = $v->$key;
    }
  return $output;
}
/*
function populateUserGroups( $field )
{

	$field['choices'] = array();
	global $ldap_groups;
  global $current_user;

  foreach ( $current_user->caps as $cap => $value ){

    $the_cap = $cap;

  }

	foreach ($ldap_groups as $domain => $group ) {
		$field['choices'][ $group[2] ] = $group[2];
    if( $group[0] == $the_cap ){
      $default_value = $group[2];
    }
	}
  if( !empty( $current_user->caps['administrator'] ) ){
  }else{
    $field['disabled'] = 1;
    $field['default_value'] = $default_value;
  }
	return $field;
}
add_filter('acf/load_field/name=user_market', 'populateUserGroups');
*/
/*
add_action( 'user_register', 'default_user_langs' );
function default_user_langs($user_id){

  $new_user_data = get_userdata( $user_id );
  global $ldap_groups;
  $def_lang = ["en"];

  foreach( $ldap_groups as $ldap_group => $ldap_group_data ){
    if( $ldap_group_data[0] == $new_user_data->roles[0] ){
      $def_lang = $ldap_group_data[3];
    }
  }

  update_user_option( $user_id,'languages_allowed', sanitize_text_field( json_encode( $def_lang ) ) );
}
*/
?>
