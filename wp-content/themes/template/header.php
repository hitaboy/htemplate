<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<!-- dns prefetch -->
		<link href="//www.google-analytics.com" rel="dns-prefetch">

		<!-- meta -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<!-- icons -->
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<!-- css + javascript -->
		<?php wp_head(); ?>
		<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script> -->
		<script>
		var galeries = new Array();
		</script>
	</head>
	<script>
  	var layoutCarrousel = new Array();
	</script>
	<body <?php body_class(); ?>>

		<div class="wrapper">

      <div class="mobileMenu"><i class="fa fa-bars fa-2x"></i></div>

			<header class="header clear" role="banner">

    			<div class="mobileClose"><i class="fa fa-times fa-2x"></i></div>

					<!-- <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" class="logo" /> --->
					<h1><?php bloginfo('name'); ?></h1>

					<nav class="nav" role="navigation">
            <?php wp_nav_menu( array('menu' => 'Main menu', 'depth' => 0 )); ?>
					</nav>

          <div class="social">
            <a href="http://facebook.com/"></a>
            <a href="https://twitter.com/"></a>
            <a href="https://www.youtube.com/"></a>
            <a href="http://instagram.com/"></a>
          </div>
			</header>

			<div class="container">
