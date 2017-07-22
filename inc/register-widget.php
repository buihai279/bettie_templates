<?php
// define('THEME_WIDGET_DIR', get_template_directory() . '/inc/widgets');
require_once THEME_WIDGET_DIR.'/advertisement.php';
require_once THEME_WIDGET_DIR.'/author.php';
require_once THEME_WIDGET_DIR.'/categories.php';
require_once THEME_WIDGET_DIR.'/custom_post.php';
require_once THEME_WIDGET_DIR.'/instagram.php'; 
require_once THEME_WIDGET_DIR.'/tags.php'; 
require_once THEME_WIDGET_DIR.'/post_in_cat.php';
// require_once THEME_WIDGET_DIR.'/subscribe.php';
// require_once THEME_WIDGET_DIR.'/youtube.php';
require_once THEME_WIDGET_DIR.'/youtube-2.php';
require_once THEME_WIDGET_DIR.'/slider.php';
require_once THEME_WIDGET_DIR.'/slider-owl.php';
require_once THEME_WIDGET_DIR.'/slider2.php';
require_once THEME_WIDGET_DIR.'/twitter.php';
require_once THEME_WIDGET_DIR.'/facebook.php';
function register_widgets() {
    // register_widget( 'monster_subscribe_and_social_widget' );
    register_widget( 'monster_about_author_widget' );
    register_widget( 'monster_custom_posts_widget' );
    register_widget( 'monster_advertisement_widget' );
    // register_widget( 'monster_youtube_subscribe_widget' );
    register_widget( 'monster_youtube_subscribe_widget_2' );
    register_widget( 'monster_posts_carousel_widget' );
    register_widget( 'monster_instagram_widget' );
    // register_widget( 'monster_posts_slider_widget2' );
    register_widget( 'tag_cloud' );
    register_widget( 'twitter' );
    register_widget( 'facebook' );
    register_widget( 'owl_slider' );
    register_widget( 'monster_categories_tiles_widget' );
}
add_action( 'widgets_init', 'register_widgets' );
add_action( 'widgets_init', 'bettie_register_sidebar_init' );
function bettie_register_sidebar_init() {
    register_sidebar( 
        array(
        'name' =>'Right Sidebar',
        'id' => 'sidebar-right',
        'description' =>'Widgets in this area will be shown on all posts and pages.',
        'before_widget' => '<div id="%1$s" class="widget %2$s ">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
        ));
    register_sidebar( 
        array(
        'name' =>'Sidebar Slider',
        'id' => 'sidebar-container',
        'description' =>'Widgets in this area will be shown on home.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s ">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
        ));
    register_sidebar( 
        array(
        'name' =>'Sidebar Categories',
        'id' => 'sidebar-category',
        'description' =>'Widgets in this area will be shown on home.',
        'before_widget' => '<div id="%1$s" class="widget %2$s ">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
        ));
    register_sidebar( 
        array(
        'name' =>'Left Sidebar',
        'id' => 'sidebar-left',
        'description' =>'Widgets in this area will be shown on all posts and pages.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s ">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
        ));
    register_sidebar( 
        array(
        'name' =>'Sidebar Content',
        'id' => 'sidebar-content',
        'description' =>'Widgets in this area will be shown footer .',
        'before_widget' => '<div id="%1$s" class="widget %2$s ">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
        ));
    register_sidebar( 
        array(
        'name' =>'Footer Sidebar (Instagram)',
        'id' => 'sidebar-footer',
        'description' =>'Widgets in this area will be shown in footer.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s ">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
        ));
    register_sidebar( 
        array(
        'name' =>'Footer Minimal Sidebar',
        'id' => 'sidebar-minimal-footer',
        'description' =>'Widgets in this area will be shown in footer (footer minimal is active).',
        'before_widget' => '<div class="col-xs-12 col-md-6"><aside id="%1$s" class="widget %2$s ">',
        'after_widget'  => '</aside></div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
        ));
}