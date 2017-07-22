<?php global $customizer; ?>
<?php global $content;
// echo get_the_content(); ?>
	
<figure class="entry-thumbnail">
    <div class="thumbnail">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('post-image-half');  ?>
        </a>
    </div>
</figure>

<?php $content=get_the_content();
	
	$content = str_replace( ']]>', ']]&amp;gt;', $content );
  echo do_shortcode($content,false);
?> 