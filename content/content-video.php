<?php global $customizer; ?>
<?php global $content; ?>
<figure class="entry-media">
<?php
    $content=get_the_content();
    $firstVideo = $customizer->get_first_video($content);
    $content = $customizer->remove_first_video($firstVideo, $content);
    if( has_shortcode( $firstVideo, 'video')||has_shortcode( $firstVideo, 'playlist') ):
        do_shortcode($firstVideo);
    elseif($firstVideo!=''):
        $id_youtube=$customizer->get_id_video($firstVideo);
        if (isset($id_youtube)&&$id_youtube!=''):  
?>
            <div class="media video responsive-embed-youtube">
                <iframe src="https://www.youtube.com/embed/<?php echo $id_youtube;?>?feature=oembed?wmode=transparent" frameborder="0" allowfullscreen=""></iframe>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</figure>
<?php 
    $content = str_replace( ']]>', ']]&amp;gt;', $content );
    echo do_shortcode($content,false);
?> 