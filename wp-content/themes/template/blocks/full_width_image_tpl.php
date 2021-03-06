<?php 
  $full_image = get_sub_field('full_width_image'); 
  $title = get_sub_field('content_title');
  $description = get_sub_field('content_description');
?>
                  
  <?php  if( !empty($full_image) ):?>
      <div class="full_image" style="background-color:<?php the_sub_field('content_background'); ?>">
    	  <img src="<?php echo $full_image['url']; ?>" alt="<?php echo $full_image['alt']; ?>" />
    	  <div class="wrapper content_text">
      	 <?php  if( !empty($title) ):?>
            <h2 class="content_title"><?php echo $title; ?></h2>
      	  <?php endif; ?>
      	  <?php  if( !empty($description) ):?>
      	    <div class="content_description"><?php echo $description; ?></div>
      	  <?php endif; ?>
    	  </div>
      </div>
    <?php endif; ?>