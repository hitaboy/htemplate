<?php

/*------------------------------------*\
  Fix for Markets Taxonomy in permalinks
\*------------------------------------*/
/*
function wpa_show_permalinks( $post_link, $post ){
    if ( is_object( $post ) && $post->post_type == 'post' ){
        $terms = wp_get_object_terms( $post->ID, 'markets' );
        if( $terms ){
            return str_replace( '%markets%' , $terms[0]->slug , $post_link );
        }
    }
    return $post_link;
}
add_filter( 'post_link', 'wpa_show_permalinks', 1, 2 );
add_filter( 'post_type_link', 'wpa_show_permalinks', 1, 2 );
*/

/*------------------------------------*\
  Add Rewrite Rules
\*------------------------------------*/
/*
function tags_rewrite_rule() {
  add_rewrite_rule('^([^/]+)/tags/([^/]+)?$','index.php?markets=$matches[1]&tag=$matches[2]','top');
}
add_action('init', 'tags_rewrite_rule', 10, 0);

function alltags_rewrite_rule() {
  add_rewrite_rule('([^&]+)/tags?$','index.php?pagename=page_tags&markets=$matches[1]','top');
}
add_action('init', 'alltags_rewrite_rule', 10, 0);

function theme_rewrite_tag() {
  add_rewrite_tag('%markets%', '([^&]+)');
}
add_action('init', 'theme_rewrite_tag', 10, 0);
*/

?>
