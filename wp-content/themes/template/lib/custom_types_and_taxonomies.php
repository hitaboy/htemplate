<?php

/*------------------------------------*\
  Slideshow Post Type
\*------------------------------------*/
/*
function create_slideshows() {
  register_post_type( 'slideshow',
    array(
      'labels' => array(
        'name' => __( 'Slideshow', 'Template' ),
        'singular_name' => __( 'Slideshow', 'Template' )
      ),
      'public' => true,
      'has_archive' => false,
      'rewrite' => false,
      'menu_icon' => 'dashicons-format-gallery',
      'taxonomies' => array('category','markets')
    )
  );
}
add_action( 'init', 'create_slideshows' );
*/

/*------------------------------------*\
  Markets Taxonomy
\*------------------------------------*/

/*
add_action( 'init', 'create_market_taxonomy', 0 );
function create_market_taxonomy() {

  $labels = array(
    'name'              => __( 'Markets', 'Template' ),
    'singular_name'     => __( 'Market', 'Template' ),
    'search_items'      => __( 'Search Market', 'Template' ),
    'all_items'         => __( 'All Markets', 'Template' ),
    'parent_item'       => __( 'Parent Market', 'Template' ),
    'parent_item_colon' => __( 'Parent Marlet:', 'Template' ),
    'edit_item'         => __( 'Edit Market', 'Template' ),
    'update_item'       => __( 'Update Market', 'Template' ),
    'add_new_item'      => __( 'Add New Market', 'Template' ),
    'new_item_name'     => __( 'New Genre Market', 'Template' ),
    'menu_name'         => __( 'Markets', 'Template' ),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'markets' ),
  );

  register_taxonomy( 'markets', array( 'post' ), $args );
}
*/

?>
