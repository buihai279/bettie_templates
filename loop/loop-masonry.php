<div class="masonry masonry-layout" style="position: relative;">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>  
            <div class="brick brick-2" style="position: absolute;">
                <article id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12'); ?>>
                    <div class="entry-wrapper">
                        <?php get_template_part('entry/entry','media' ); ?>
                        <?php get_template_part('entry/entry','title'); ?>
                        <?php get_template_part('entry/entry','post-meta' ); ?>
                        <?php get_template_part('entry/entry','content' ); ?>
                        <?php get_template_part('entry/entry','footer' ); ?>
                    </div>
                </article>
            </div>
        <?php endwhile; 
        else : ?>
            <?php get_template_part('layout/no-result'); ?>
    <?php endif; ?>
</div> <!-- end .masonry -->
<?php get_template_part('layout/pagination' );?>
<?php  wp_enqueue_script('layout_masony'); ?>