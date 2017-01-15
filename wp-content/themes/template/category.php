<?php get_header(); ?>
	
	<!-- section -->
	<section role="main">
	
		<h1 class="categoryTitle"><?php the_category(); ?></h1>
	
    <div class="gridlist" style="background-color:<?php the_sub_field("content_background"); ?>">
      <div class="wrapper_in">
        
        <?php if (have_posts()): while (have_posts()) : the_post(); ?>
          
          <?php
              $post_id=get_the_ID();
              ?> 
              <div class="summary grid" > 
              <div class="cats">
              <?php 
                $post_categories = wp_get_post_categories( $post_id ); 
                foreach($post_categories as $c){
                	$cat = get_category( $c );
                	echo $cat->name." ";
                }
              ?>
              </div>
              <?php
              $thumbnail = get_field('thumbnail', $post_id);?>
              <div class="thumbnail_summary" style="background:url('<?php echo $thumbnail['url']; ?>');">
                <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/16x9.png"></a>
              </div>
              <?php $text = get_field('text', $post_id);?>
              <div class="infoBox">
                <div class="text_summary">
                 <a href="<?php the_permalink(); ?>"><span class="text"><?php echo $text; ?></span></a>
                </div>
                <?php $description = get_field('description', $post_id);?>
                <div class="description_summary">
                  <?php echo $description; ?>
                </div>
              </div>
        		<?php
          		echo '</div>'; 
          ?>
          
        <?php endwhile; ?>
        <div class="clear"></div>
        <?php endif; ?>
            
      </div>
    </div>
    
		<?php get_template_part('pagination'); ?>
	
	</section>
	<!-- /section -->
	
<?php get_footer(); ?>