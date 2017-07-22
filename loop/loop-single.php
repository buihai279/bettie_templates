<?php global $customizer; ?>
<?php global $content; ?>
<?php 
    $content=get_the_content();
    $format=get_post_format(); 
    if (!isset($format)||$format=='') 
        $format='standard';
    ?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?> 
        <?php global $wp_query;
        $post = $wp_query->post; ?>   
       
        <article id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12'); ?>>
            <div class="entry-wrapper ">
            	<?php get_template_part('entry/entry','sticky'); ?>
            	<?php get_template_part('entry/entry','category-list'); ?>
            	<?php get_template_part('entry/entry','title'); ?>
            	<?php get_template_part('entry/entry','post-meta' ); ?>
                <div class="post-content">
                    <?php get_template_part('content/content', $format); ?>
                </div>
                <ul class="social-share">
                	<?php get_template_part('social-share' ); ?>
                </ul>
                <div class="author-description accent1-background invert">
		            <?php get_template_part('entry/entry-author'); ?>
		            <div class="clear"></div>
		        </div>
            </div><!-- .entry-wrapper -->
        </article>
		<?php comments_template('',true); ?>
	<?php endwhile;?>
<?php endif; 
?>