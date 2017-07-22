<?php 
/*
Template Name: Full width Template
*/
 ?>
<?php get_header();?>
<div id="primary" class="site-content">
    <div class="container">
        <div class="row">
            <div class="content-wrap col-xs-12 col-sm-12 col-lg-12">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content page">
                        <?php get_template_part('loop/loop','page' ); ?>
                        <ul class="social-share">
                            <?php get_template_part('social-share'); ?>
                        </ul>
                    </div> <!-- .entry-content page -->
                </article>
            </div>
        </div>
<?php 
    $footer_layout=(get_option('footer_layout')!='')?get_option('footer_layout'):'default';
    get_footer($footer_layout);?>
