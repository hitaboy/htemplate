<?php

  @ini_set( 'upload_max_size' , '64M' );
  @ini_set( 'post_max_size', '64M');
  @ini_set( 'max_execution_time', '300' );

  global $current_user;
  $current_user = wp_get_current_user();

   /*
   Content over diferents domains in proxy

   if(!empty($_SERVER['HTTP_X_FORWARDED_HOST'])){
     $site_url = $_SERVER['HTTP_X_FORWARDED_HOST'];
     $site_raw_url = $_SERVER['HTTP_X_FORWARDED_HOST'];
   }else{
     if( ENVIRONMENT == 'pre' ){
      $site_url = $site_url = $_SERVER['HTTP_HOST'];
      $site_raw_url = $site_raw_url = $_SERVER['HTTP_HOST'];
     }else{
       $site_url = $_SERVER['HTTP_HOST'];
       $site_raw_url = $_SERVER['HTTP_HOST'];
     }
   }
   */
   $site_url = $_SERVER['HTTP_HOST'];
   $site_raw_url = $_SERVER['HTTP_HOST'];

   define('SITE_URL',"$site_url");
   define('SITE_RAW_URL',"$site_raw_url");

   define('PAGE_ENCODING','UTF-8');
   define('SITE_NAME','Template');
   $wp_template_directory = get_template_directory();
   define( 'WP_TEMPLATE_DIR', $wp_template_directory );
   define('TEMPLATE_DIRECTORY_URI','http://'.SITE_URL.'/wp-content/themes/template');
   define('ANALYTICS_CODE','UA-XXXXXXXX-XX');

?>
