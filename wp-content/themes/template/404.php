<?php get_header(); ?>

	<!-- section -->
	<section role="main">

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<h1><?php _e( 'Page not found', 'STRING_DOMAIN' ); ?></h1>
			<h2>
				<a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'STRING_DOMAIN' ); ?></a>
			</h2>

		</article>
		<!-- /article -->

	</section>
	<!-- /section -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
