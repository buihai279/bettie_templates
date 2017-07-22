<?php global $customizer; ?>
<?php global $content; ?>
<?php $content=get_the_content(); ?>
<?php $i=1; ?>
<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>  
        <?php if ($i%2!=0): ?>
            <div class="row grid-layout">
        <?php endif ?>
        <div class="col-md-6 col-lg-6">
            <article id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12'); ?>>
                <div class="entry-wrapper">
                    <?php get_template_part('entry/entry','media' ); ?>
                    <?php get_template_part('entry/entry-title'); ?>
                    <?php get_template_part('entry/entry-post-meta' ); ?>
                    <?php get_template_part('entry/entry','content' ); ?>
                    <?php get_template_part('entry/entry','footer' ); ?>
                </div>
            </article>
        </div>
        <?php if ($i%2==0): ?>
            </div>
        <?php endif ?>
        <?php $i++; ?>
    <?php endwhile; 
    else : ?>
        <?php get_template_part('layout/no-result'); ?>
<?php endif; ?>
<?php 

    if ($i%2==0):
        echo '</div>';
    endif;
     ?>
<?php get_template_part('layout/pagination' );?>
