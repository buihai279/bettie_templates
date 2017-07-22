<?php 
global $customizer; 
global $content;
?>
<div class="quote">
    <?php 
        $content=get_the_content(); 
        $blockquote= $customizer->get_first_blockquote($content);
        $content = $customizer->remove_first_blockquote($blockquote, $content); 
        if ($blockquote!=''): 
?>
        <blockquote>
            <?php echo $blockquote ; ?>
        </blockquote>
    <?php endif ?>
</div>
<?php 
    get_template_part('entry/entry-sticky' );
    $content = str_replace( ']]>', ']]&amp;gt;', $content );
    echo do_shortcode($content,false);
 ?> 