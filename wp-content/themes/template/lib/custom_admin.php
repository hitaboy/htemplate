<?php

/*------------------------------------*\
  Custom Login Logo
\*------------------------------------*/
/*
function my_login_logo_one() {
  $dir = get_template_directory_uri() . '/img/icons/xxxxxx.png';
?>
  <style type="text/css">
  body.login div#login h1 a {
    <?php
    echo 'background-image: url(' . $dir . ' );'
     ?>
      width: 100%;
      background-size: cover;
      padding-bottom: 30px;
  }
  </style>
 <?php
}
add_action( 'login_enqueue_scripts', 'my_login_logo_one' );
*/

/*------------------------------------*\
  Custom Admin Logo
\*------------------------------------*/
/*
function wpb_custom_logo() {
  $dir = get_template_directory_uri() . '/img/icons/rocalife_miniatura.png';
  echo '
  <style type="text/css">
  #wpadminbar #wp-admin-bar-wp-logo > .ab-item {
    width: 35px;
  }
  #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon {
    width: 100%;
  }
  #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
  background-image: url(' . $dir . ') !important;
  background-position: 0 0;
  background-size: 100%;
  background-repeat: no-repeat;
      display: block;
  color:rgba(0, 0, 0, 0);
  }
  #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
  background-position: 0 0;
  }
  </style>
  ';
}
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');
*/

/*------------------------------------*\
  Remove WPML language switcher from admin bar
\*------------------------------------*/
/*
global $all_meta_for_user;
function wpml_remove_admin_bar_menu() {
  global $current_user;
  $user_id = $current_user->ID;

  $all_meta_for_user = get_user_meta( $user_id );
  if( !empty($all_meta_for_user['wp_languages_allowed']) ){
    $user_langs = json_decode($all_meta_for_user['wp_languages_allowed'][0]);

    if( !empty($user_langs) ){
      global $wp_admin_bar;
      $langs = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');

      foreach( $langs as $label => $lang ){
        if (in_array($lang['code'], $user_langs) || $lang['code'] == 'en' ) {

        }else{
          $wp_admin_bar->remove_menu('WPML_ALS_'.$lang['code']);
        }
      }
    }
  }

}
add_action( 'wp_before_admin_bar_render', 'wpml_remove_admin_bar_menu' );
*/

/*------------------------------------*\
  Custom Admin Dashboard Text
\*------------------------------------*/
/*
function textfor_dashboard_widget( $post, $callback_args ) {
echo "

<img src='http://".SITE_URL."/wp-content/themes/roca/img/icons/rocalife_logo.png' style='max-width: 100%'/>
<h1>Welcome to Roca Life’s CMS</h1>
<br />
<strong>The tab placed on the left part of the CMS will be the navigation bar of the webpage.</strong>
<br />
<br />
Do you want to start, create or edit content? If so, click on Posts. Otherwise, if you want to import content from another markets, click on Markets.
<br />
<br />
<strong>Let’s start! </strong>
<br />
<br />

";
}

function add_dashboard_widgets() {
  wp_add_dashboard_widget('dashboard_widget', 'Welcome', 'textfor_dashboard_widget');
}
add_action('wp_dashboard_setup', 'add_dashboard_widgets' );
*/

/*------------------------------------*\
  Remove Widgets from Admin Dashboard
\*------------------------------------*/
/*
function remove_dashboard_widgets() {
	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
  unset($wp_meta_boxes['dashboard']['side']['core']['icl_dashboard_widget']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_activity']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
  remove_action('welcome_panel', 'wp_welcome_panel');

}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

function wpml_remove_dashboard_widget() {
    remove_meta_box( 'icl_dashboard_widget', 'dashboard', 'side' );
}
add_action('wp_dashboard_setup', 'wpml_remove_dashboard_widget' );
*/

if (is_admin()) {

  /*------------------------------------*\
    Add Custom Metaboxes
  \*------------------------------------*/
  /*
  add_action( 'add_meta_boxes', 'save_post_meta_box' );
  function save_post_meta_box(){
    add_meta_box( 'save-postastext-content', 'Save for translation', 'save_postastext_meta_box_html', 'post', 'normal', 'low' );
    add_meta_box( 'save-post-content', 'Save and Publish', 'save_post_meta_box_html', 'post', 'normal', 'low' );
    add_meta_box( 'translation-content', 'Translations', 'translations_meta_box_html', 'post', 'side', 'high' );
  }

  function save_post_meta_box_html( $post ){
  ?>
    <a href="#" class="acf-button button button-primary" onClick="jQuery('#publish').trigger('click'); return false;">Save / Update post</a>
  <?php
  }
  function save_postastext_meta_box_html( $post ){
  ?>
    <a href="<?= SITE_URL; ?>/?p=<?= $post->ID; ?>&only_text=true" class="acf-button button button-large " target="_blank">Save as text for translation</a>
  <?php
  }
  function translations_meta_box_html( $post ){
  ?>
    <span>You only are allowed to translate to the valid languages of your country</span>
  <?php
  }
  */

  /*------------------------------------*\
    Add User Role Class to Body
  \*------------------------------------*/
  /*
  function add_role_to_body($classes) {
    global $current_user;
  	$user_role = array_shift($current_user->roles);
    if( $user_role != 'administrator' ){
      $classes .= 'role-editor';
    }else{
      $classes .= 'role-administrator';
    }
  	return $classes;
  }
  add_filter('body_class','add_role_to_body');
  add_filter('admin_body_class', 'add_role_to_body');
  */

  /*------------------------------------*\
    Add Admin Editor Styles
  \*------------------------------------*/
  /*
  add_action('admin_head', 'editor_styles');
  function editor_styles() {
    echo '<style>';
    echo '.role-editor .media .submitdelete, .role-editor .media-modal .delete-attachment, .role-editor #postimagediv, .role-editor #menu-pages, .role-editor #menu-comments, .role-editor #menu-settings, .role-editor #menu-tools, .role-editor .term-slug-wrap, .role-editor .term-parent-wrap, .role-editor .term-description-wrap { display: none; }
    label.setting[data-setting="caption"] { display: none; }
    label.setting[data-setting="alt"] { display: none; }
    label.setting[data-setting="description"] { display: none; }
    .wp_attachment_details.edit-form-section { display:none; }
    .role-editor .subsubsub a .count, .role-editor .subsubsub a.current .count { display: none; }
    #poststuff .contenido { clear:both; margin-bottom: 15px; margin-top: 20px; }
    #poststuff .contenido::after {
      content: "";
      position: relative;
      display: block;
      clear: both;
    }
    #tagsdiv-post_tag { display: none; }
    #poststuff .contenido h2 {
      clear: both;
      margin-top: 5px;
      padding: 5px;
      font-size: 16px;
      text-transform: uppercase;
      background: #0096d0;
      color: #fff;
      font-weight: bold;
    }
    .the_manual img {
        max-width: 100%;
    }
    </style>';
  }
  */

  /*------------------------------------*\
    Hide WPML Metabox
  \*------------------------------------*/
  /*
  add_action('admin_head', 'disable_icl_metabox',99);
  function disable_icl_metabox() {
    global $post;
    if( !empty($post) ){
      remove_meta_box('icl_div_config',$post->posttype,'normal');
    }
  }
  */

}

/*------------------------------------*\
  Add Node to Admin Toolbar
\*------------------------------------*/
/*
add_action( 'admin_bar_menu', 'toolbar_link_to_mypage', 999 );
function toolbar_link_to_mypage( $wp_admin_bar ) {
  global $current_user;
  if( !empty( $current_user->caps['administrator'] ) ){
    $title = "ALL MARKETS";
  }else{
    foreach ( $current_user->caps as $cap => $value ){
      $the_cap = $cap;
    }
    global $ldap_groups;
    foreach( $ldap_groups as $group ){
      if( $the_cap == $group[0] ){
        $title = strtoupper( $group[1] );
      }
    }

  }

	$args = array(
		'id'    => 'my_market',
		'title' => $title,
		'href'  => '#'
	);
	$wp_admin_bar->add_node( $args );
}
*/

/*------------------------------------*\
  Remove Admin Submenus
\*------------------------------------*/
/*
add_action('admin_menu', 'my_remove_sub_menus', 999);
function my_remove_sub_menus() {
  global $current_user;
  if( !empty( $current_user->caps['administrator'] ) ){

  }else{
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=markets');
  }
}
*/

/*------------------------------------*\
  Remove Admin Submenus from Custom Post Types
\*------------------------------------*/
/*
function remove_menu_from_cpt() {
  global $submenu;
  $post_type = 'slideshow';
  if ( isset($submenu['edit.php?post_type='.$post_type]) ) {
    foreach ($submenu['edit.php?post_type='.$post_type] as $k => $sub) {
      if ( false !== strpos($sub[2],'markets') || false !== strpos($sub[2],'category') ) {
        unset($submenu['edit.php?post_type='.$post_type][$k]);
      }
    }
  }
}
add_action('admin_menu','remove_menu_from_cpt');
*/

/*------------------------------------*\
  Admin Pages for Markets
\*------------------------------------*/
/*
function theme_options_panel(){
  add_menu_page('Market settings', 'Market settings', 'edit_posts', 'market-settings', 'wps_theme_func');
}
add_action('admin_menu', 'theme_options_panel');
function wps_theme_func(){
  global $current_user;
  $cap_index = 0;
  $market_group = "";
  foreach($current_user->caps as $cap_label => $cap){
    if($cap_index==0){
      $market_group = $cap_label;
    }
    $cap_index++;
  };
  global $ldap_groups;
  if( $market_group == 'administrator' ){
    $market_group = 'ECMWCM_1499_GLOBAL.zgroups.eu.RCEIT';
  }
  foreach( $ldap_groups as $ldap_group => $ldap_group_data ){
    if( $market_group == $ldap_group_data[0] ){
      $user_market = $ldap_group_data[1];
    }
  }
  $term = get_term_by('slug', $user_market, 'markets');
  $name = $term->name;

  echo "<script>";
  echo "window.location.replace('http://".SITE_URL."/wp-admin/edit-tags.php?action=edit&taxonomy=markets&tag_ID=".$term->term_id."&post_type=post')";
  echo "</script>";
}
*/
/*
add_action('admin_menu', 'market_page_create');
function market_page_create() {
    $page_title = 'Market de Imagina+';
    $menu_title = 'Market';
    $capability = 'edit_posts';
    $menu_slug = 'market_page';
    $function = 'market_page_display';
    $icon_url = 'dashicons-cart';
    $position = 100;

    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
}
function market_page_display() {
  include get_template_directory()."/templates/market.php";
}
*/
?>
