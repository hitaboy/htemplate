<?php 
  $title = get_sub_field('content_title');
  $description = get_sub_field('content_description');
?>
<div class="content_text content_text_block" style="background-color:<?php the_sub_field('content_background'); ?>; color: <?php the_sub_field('content_color'); ?>">
  <div class="wrapper_in">
    <h2 class="content_title" style="color: <?php the_sub_field('title_color'); ?>"><?php echo $title; ?></h2>
    <div class="content_description"><?php echo $description; ?></div>
  </div>
</div>