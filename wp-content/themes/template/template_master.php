<?php

$cont_carrousel = 0;

if( have_rows('block_flexible_content') ):

   // loop through the rows of data
  while ( have_rows('block_flexible_content') ) : the_row();

    if (get_row_layout() == 'full_image_screen'){

      include('blocks/full_screen_image_tpl.php');

    }
    if (get_row_layout() == 'full_image'){

      include('blocks/full_width_image_tpl.php');

    }
    if (get_row_layout() == 'contenido'){

      include('blocks/content_title_tpl.php');

    }
    if (get_row_layout() == 'carrousel_image'){

      include('blocks/carrusel_tpl.php');
      $cont_carrousel++;

    }
     if (get_row_layout() == 'gallery'){

      include('blocks/gallery_tpl.php');

    }
   if (get_row_layout() == 'video'){

      include('blocks/oembed_tpl.php');

    }
    if (get_row_layout() == 'grid'){

      include('blocks/grid_tpl.php');

    }
    if (get_row_layout() == 'mapa'){

      include('blocks/contact_tpl.php');

    }

  endwhile;

else :

  // no layouts found

endif;
?>
