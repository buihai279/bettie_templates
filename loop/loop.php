<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>    
        <article id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12'); ?>>
            <div class="entry-wrapper">
                <?php get_template_part('entry/entry','media-full' ); ?>
                <?php get_template_part('entry/entry','title' ); ?>
                <?php get_template_part('entry/entry','post-meta'); ?>
                <?php get_template_part('entry/entry','content' ); ?>
                <?php get_template_part('entry/entry','footer' ); ?>
            </div>
        </article>
    <?php endwhile; else : ?>
        <?php get_template_part('layout/no-result'); ?>
<?php endif; 
?>
<?php get_template_part('layout/pagination' );?>
