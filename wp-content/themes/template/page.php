<?php get_header(); ?>

	<!-- section -->
	<section role="main">

	  <?php if(!is_front_page()){ ?>
  	  <div class="page_title">
  		<h1><?php the_title(); ?></h1>
  	  </div>
		<?php } ?>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php the_content(); ?>

			<?php
  			//edit_post_link();
  			include('template_master.php');
  		?>


		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h2><?php _e( 'Sorry, nothing to display.', 'STRING_DOMAIN' ); ?></h2>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->

<?php get_footer(); ?>
