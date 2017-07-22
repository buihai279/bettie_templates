<div class="author-description_container">
    <div class="author-description_avatar alignleft"> 
    <?php echo get_avatar(get_the_author_meta('ID'))?>
    </div>
    <div class="author-description_content color-invert-accent">
        <h4> Written by <?php the_author_posts_link();?></h4>
        <p><?php the_author_meta('description')?></p>
    </div>
</div>