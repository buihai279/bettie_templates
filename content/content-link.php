<?php global $customizer; ?>
<?php global $content; ?>

<figure class="entry-thumbnail entry-link">
    <div class="thumbnail">
        <?php 
        $content=get_the_content();
        $firstLink= $customizer->get_first_link($content);
        $content = $customizer->remove_first_link($firstLink, $content);
         ?>
        <?php if ($firstLink!=''): ?>
            <a href="<?php echo $firstLink ?>" target="_blank">
                <div class="link-image-background" style="background-image: url(<?php the_post_thumbnail_url('link-image-background'); ?>)">
                </div>
                <div class="link"><?php echo $firstLink ?></div> 
            </a>
        <?php endif ?>
    </div>
</figure>
 <?php 
	
    $content = str_replace( ']]>', ']]&amp;gt;', $content );
  echo do_shortcode($content,false);
?> 