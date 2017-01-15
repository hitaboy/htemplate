<?php 

$gallery = get_sub_field('images');

if( $gallery ): ?>
<div class="galleryContainer" style="background-color:<?php the_sub_field('content_background'); ?>">
  <div class="wrapper_in">
    <div class="gallery lightGallery">      
      <?php foreach( $gallery as $gallery ): ?>
      
          <a href="<?php echo $gallery['url']; ?>">
            <img src="<?php echo $gallery['sizes']['thumbnail']; ?>" alt="<?php echo $gallery['alt']; ?>" />
          </a>

      <?php endforeach; ?>      
    </div>
  </div>
</div>
<?php endif; ?>