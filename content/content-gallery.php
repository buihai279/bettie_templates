<?php global $customizer; ?>
<?php global $content; ?>
<figure class="entry-gallery">
    <div class="gallery">
        <?php 
            $content=get_the_content(); 
            $firstGallery = $customizer->get_first_gallery($content);
            if( has_shortcode( $firstGallery, 'gallery') ) {
                do_shortcode($firstGallery);
            }
            $content = $customizer->remove_first_gallery($firstGallery, $content);
         ?>
    </div>
    <?php get_template_part('entry/entry-sticky' ); ?>
</figure> 


 
 <?php 
	
    $content = str_replace( ']]>', ']]&amp;gt;', $content );
  echo do_shortcode($content,false);
	 ?> 