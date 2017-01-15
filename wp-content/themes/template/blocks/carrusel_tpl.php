<?php
$back = get_sub_field('content_background');
$items = get_sub_field('items');
$autoplay = get_sub_field('autoplay');
$autoplayHoverPause = get_sub_field('autoplayHoverPause');

// check if the repeater field has rows of data
$id_random = rand(1,10000);
$id_carrousel = "carrousel-" . $id_random;
if( have_rows('carrousel') ):

?>
<div id="<?php echo $id_carrousel ?>" class="carrousel <?php echo "carrousel" . $items ?>" style="background-color:<?php echo $back; ?>"> 
  <?php
 	// loop through the rows of data
    while ( have_rows('carrousel') ) : the_row();
      $image_carrusel = get_sub_field('image');
      $title_carrusel = get_sub_field('title');
      $description_carrusel = get_sub_field('content');
        // display a sub field value
        if( !empty($image_carrusel) ):?>
        
          <div class="item" style="background: url(<?php echo $image_carrusel['url'] ?>) no-repeat 50% 50%; background-size: cover;">
            <img src="<?php echo $image_carrusel['url']; ?>" alt="<?php echo $image_carrusel['alt']; ?>" />
            <div class="content_item">
                <div class="content_text">
                  <h2 class="content_title"><?php echo $title_carrusel; ?></h2>
                  <div class="content_description"><?php echo $description_carrusel; ?></div>
                </div>
            </div>
            </div>
          
        <?php endif;
       
    endwhile;

else :

    // no rows found
?>

<?php
 
  endif;
?>
  </div>
  
  <script> 
    
  	layoutCarrousel[<?php echo $cont_carrousel ?>] = new Array();
  	layoutCarrousel[<?php echo $cont_carrousel ?>].push("<?php echo $id_carrousel ?>");  
  	layoutCarrousel[<?php echo $cont_carrousel ?>].push("<?php echo $items ?>");  
  	layoutCarrousel[<?php echo $cont_carrousel ?>].push("<?php echo $autoplay ?>");   
  	layoutCarrousel[<?php echo $cont_carrousel ?>].push("<?php echo $autoplayHoverPause ?>");   
	</script>
<?php
  
?>