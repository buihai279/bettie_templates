<?php global $customizer; ?>
<?php global $content; ?>
<div class="post-content">
    <div class="entry-content">
    <?php if (get_post_format()=='status') {
            $first_status=$customizer->get_first_status($content) ;
            if ($first_status!='')
                echo $embed=$customizer->embed_social($first_status);
    } ?>
    <?php 
        $content=fill__content($content); 
        echo $content=wp_trim_words($content,40,' ...'); 
    ?>
    </div>
</div>