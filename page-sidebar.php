<?php 
/*
Template Name: Template have Sibar
*/
 ?>
<?php get_header();?>
<?php 
    $home_layout=(get_option('home_layout')!='')?get_option('home_layout'):'default';
    $sidebar_layout=(get_option('sidebar_layout')!='')?get_option('sidebar_layout'):'right';
    $header_layout=(get_option('header_layout')!='')?get_option('header_layout'):'minimal';
    $footer_layout=(get_option('footer_layout')!='')?get_option('footer_layout'):'default';
if ($sidebar_layout=='no')
        $size='col-lg-12';
    elseif($sidebar_layout=='double')
        $size='col-lg-4';
    else
        $size='col-lg-8';
 ?>
<div id="primary" class="site-content">
    <div class="container">
        <div class="row">
            <div class="content-wrap col-xs-12 col-sm-12 <?php echo $size; ?>">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content page">
                        <?php get_template_part('loop/loop','page' ); ?>
                        <ul class="social-share">
                            <?php get_template_part('social-share'); ?>
                        </ul>
                    </div> <!-- .entry-content page -->
                </article>
            </div>
            <?php 
                if($sidebar_layout=='left'||$sidebar_layout=='right')
                    get_sidebar($sidebar_layout);
                elseif($sidebar_layout=='double'){
                    get_sidebar('left');
                    get_sidebar('right');
                }
             ?>
        </div>
<?php get_footer($footer_layout);?>
