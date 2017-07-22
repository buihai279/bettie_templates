<?php
function zendvn_comment($comment, $args,$depth){
    global $post;
    $author_id = $post->post_author;
    switch ($comment->comment_type){
        //pingback - trackback
        case 'pingback':
        case 'trackback': 
?>          
        <li id="comment-<?php comment_ID()?>"  <?php comment_class('clr');?>>
            <div class="pingback-entry">
                <span class="pingback-heading"><?php _e('Pingback:')?></span>
                <?php comment_author_link();?>
            </div>
<?php 
        break;
        case '':
?>
<li id="li-comment-<?php comment_ID()?>"  <?php comment_class(); ?> >
    <article id="comment-<?php comment_ID()?>" class="comment-body">
        <div class="comment-author vcard alignleft">
            <?php echo get_avatar($comment,75)?>
        </div>
        <div class="comment-details clr ">
            <div class="comment-content">
                <div class="comment-meta h6-style"> <span><em> Posted by <strong class="accent1-color"><?php echo get_comment_author_link();?></strong> </em></span> <span class="accent1-color"><em> <time datetime="<?php comment_date(c);?>"><?php comment_date();?></time> </em></span></div>
            </div>
            <div class="comment-text">
                    <?php comment_text();?>
            </div>
        </div>
        <div class="clear"></div>
        <div class="reply">
            <?php 
                $replyArr = array(
                            'add_below' => 'comment',
                            'depth'=>$depth,
                            'reply_text'=>_('<i class="material-icons">reply</i>'),
                            'max_depth' => $args['max_depth']
                            );
                comment_reply_link($replyArr);
            ?>
        </div>
    </article> 
<?php 
    break;
    }
}