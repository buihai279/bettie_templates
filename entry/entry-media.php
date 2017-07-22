<?php global $customizer; ?>
<?php global $content; ?>
<?php $content=get_the_content(); ?>
<?php $format='' ?>
<?php $format=get_post_format(); ?>
<?php switch ($format) {
    case 'video':?>
    <?php 
        $firstVideo = $customizer->get_first_video($content);
        $id_youtube= $customizer->get_id_video($firstVideo);
     ?>
    <figure class="entry-media">
        <?php if (has_shortcode($firstVideo,'video' )): ?>
            <?php do_shortcode($firstVideo); ?>
        <?php elseif (isset($id_youtube)&&$id_youtube!=''):  ?>
            <div class="media video responsive-embed-youtube">
                <iframe src="https://www.youtube.com/embed/<?php echo $id_youtube;?>?feature=oembed?wmode=transparent" frameborder="0" allowfullscreen=""></iframe>
            </div>
        <?php endif ?>
        <?php 
           get_template_part('entry/entry','category-list');
            get_template_part('entry/entry-sticky' );
         ?>
    </figure>
    <?php  break;
    case 'gallery':?>
        <figure class="entry-gallery">
            <div class="gallery">
                <?php 
                    $pattern = get_shortcode_regex();
                    $pattern = '/'.$pattern.'/s';
                    if(preg_match_all($pattern,$content,$matches)&&array_key_exists(2,$matches)&&in_array('gallery',$matches[2])){
                        do_shortcode($matches[0][0]);
                    }
                ?>
            </div>
            <?php 
               get_template_part('entry/entry','category-list');
                get_template_part('entry/entry-sticky' );
             ?>
        </figure> 
<?php  break;
    case 'link': ?>
      <figure class="entry-thumbnail entry-link">
            <div class="thumbnail">
                <?php $link= $customizer->get_first_link(get_the_content()); ?>
                <?php if ($link!=''): ?>
                    <a href="<?php echo $link ?>" target="_blank">
                        <div class="link-image-background" style="background-image: url(<?php the_post_thumbnail_url('attachment-post-image'); ?>)">
                        </div>
                        <div class="link"><?php echo $link ?></div> 
                    </a>
                <?php endif ?>
               <?php 
                   get_template_part('entry/entry','category-list');
                    get_template_part('entry/entry-sticky' );
                 ?>
             </div>
        </figure>
<?php   break;
    case 'quote': ?> 
      <figure class="entry-quote">
            <div class="quote">
                <?php $first_blockquote= $customizer->get_first_blockquote($content);?>
                <?php if ($first_blockquote!=''): ?>
                    <blockquote>
                        <?php echo $first_blockquote ; ?>
                    </blockquote>
                <?php endif ?>
            </div>
            <?php get_template_part('entry/entry','category-list');?>
            <?php get_template_part('entry/entry-sticky' ); ?>
        </figure>
<?php   break; ?> 
 <?php case 'audio': ?> 
        <?php get_template_part('entry/entry','category-list');?>
        <?php get_template_part('entry/entry-sticky'); ?>
        <figure class="entry-media">
            <div class="media audio">
                <!--[if lt IE 9]><script>document.createElement('audio');</script><![endif]--> 
                <?php 
                    $pattern = get_shortcode_regex();
                    $pattern = '/'.$pattern.'/s';
                    if(preg_match_all($pattern,$content,$matches)&&array_key_exists(2,$matches)&&in_array('audio',$matches[2])){
                        do_shortcode($matches[0][0]);
                    }
                ?>
            </div>
        </figure>
<?php  break; ?>

<?php case 'image': ?>
    <figure class="entry-thumbnail">
        <div class="thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('post-image-half');  ?>
            </a>
            <?php 
               get_template_part('entry/entry','category-list');
                get_template_part('entry/entry-sticky' );
             ?>
        </div>
    </figure>
<?php  break; ?>

 <?php case 'status': ?> 
<?php 
   get_template_part('entry/entry','category-list');
    get_template_part('entry/entry-sticky' );
?>
<?php  break; ?>
<?php  default: ?>
    <?php get_template_part('entry/entry','category-list');?>
    <?php get_template_part('entry/entry-sticky' ); ?>
<?php  break;
}//  end switch
?>
