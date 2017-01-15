<?php get_header(); ?>

	<!-- section -->
	<section role="main">

			<h1><?php _e( 'Latest Posts', 'STRING_DOMAIN' ); ?></h1>
			<?php get_template_part('loop'); ?>
			<?php get_template_part('pagination'); ?>
			<?php get_sidebar(); ?>


  	</section>
	<!-- /section -->

<?php get_footer(); ?>
