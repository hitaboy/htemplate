<?php get_header(); ?>

	<!-- section -->
	<section role="main">
	<?php
  $post_id = get_the_ID();
  ?>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php echo $post_ID; ?>" <?php post_class(); ?>>



			<!-- post thumbnail -->
			<?php if ( has_post_thumbnail()) :
			  $thumbnail_id = get_post_thumbnail_id( $post_id );
        $thumbnail = wp_get_attachment_image_src($thumbnail_id,'original', true);
      endif; ?>
			<!-- /post thumbnail -->

			<div class="wrapper_in">

  			<!-- post title -->
  			<h1 class="bigTitle"><?php the_title(); ?></h1>
  			<!-- /post title -->

  			<?php
    			the_content(); // Dynamic Content
    		?>
    		<div class="tags"><?php the_tags( '', ' ', '<br />' ); ?></div>
    		</div>
    		<?php
          include('template_master.php');
    		?>
    		<div class="share">
      		<span>Compárte:</span>&nbsp;

      		<?php
        		$thepermalink = get_the_permalink();
          ?>
      		<a href="<?php echo $thepermalink; ?>" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('<?php echo $thepermalink; ?>'), 'facebook-share-dialog', 'width=626,height=436'); return false;" target="_blank"><i class="fa fa-facebook-square fa-lg"></i></a>
      		<a href="https://plus.google.com/share?url=<?php echo urlencode($thepermalink); ?>" target="_blank"><i class="fa fa-google-plus-square fa-lg"></i></a>
      		<a href="https://twitter.com/share?url=<?php echo urlencode($thepermalink); ?>" target="_blank"><i class="fa fa-twitter-square fa-lg"></i></a>
      		<a href="whatsapp://send?text=<?php echo urlencode($thepermalink); ?>"  data-action="share/whatsapp/share"><i class="fa fa-whatsapp fa-lg"></i></a>
    		</div>

		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'STRING_DOMAIN' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->



<?php get_footer(); ?>
