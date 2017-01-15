<?php 

$location = get_sub_field('google_maps');
$contact_information = get_sub_field('contact_information');

if( !empty($location) ):
?>
<div class="mapBlock" style="background-color:<?php the_sub_field('content_background'); ?>">
  <div class="wrapper_in">
  <div class="acf-map">
  	<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
  </div>
<?php endif; ?>
  <?php
    if( !empty($contact_information) ):
?>
  <div class="content_text">
    <div class="content_description"><?php echo $contact_information; ?></div>
  </div>
  </div>
</div>
<?php endif; ?>
