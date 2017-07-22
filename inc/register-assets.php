<?php
/*============================================================================
 * 2. NẠP NHỮNG TẬP TIN JS VÀO THEME
============================================================================*/
add_action('wp_enqueue_scripts', 'register_js');
function register_js(){
    $jsUrl = get_template_directory_uri() . '/assets/js';
    wp_register_script('jquery_min',$jsUrl.'/jquery-1.12.1.min.js',array('jquery'),'1.0',false);
    wp_enqueue_script('jquery_min');
    wp_register_script('admin_js',$jsUrl.'/admin.js',array('jquery'),'1.0',false);
    wp_register_script('bootstrap_js',$jsUrl.'/bootstrap.min.js',array('jquery'),'1.0',false);
    wp_enqueue_script('bootstrap_js');
    wp_register_script('owl_carousel_js',$jsUrl.'/owl.carousel.min.js',array('jquery'),'1.0',false);
    wp_enqueue_script('owl_carousel_js');
    wp_register_script('my_js',$jsUrl.'/my_jquery.js',array('jquery'),'1.0',false);
    wp_enqueue_script('my_js');
    wp_register_script('layout_masony',$jsUrl.'/layout-masony.js',array('jquery'),'1.0',false);
    wp_register_script('custom-slider',$jsUrl.'/custom-slider.js',array('jquery'),'1.0',false);
    wp_register_script('jquery.simpleslider',$jsUrl.'/jquery.simpleslider.js',array('jquery'),'1.0',false);
    wp_register_script('twitter',$jsUrl.'/twitter.js',array(),'1.0',false);
    wp_register_script('facebook',$jsUrl.'/facebook.js',array(),'1.0',false);
    if(is_singular() && comments_open()&& get_option( 'thread_comments' ) ){
        wp_enqueue_script('comment-reply');
    }
}
/*============================================================================
 * 1. NẠP NHỮNG TẬP TIN CSS VÀO THEME
============================================================================*/
add_action('wp_enqueue_scripts', 'register_styles');
function register_styles(){
    global $wp_styles;
    $cssUrl = get_template_directory_uri() . '/assets/css';
    wp_register_style('bootstrap_css', $cssUrl . '/bootstrap.min.css',array(),'1.0');
    wp_enqueue_style('bootstrap_css');
    wp_register_style('owl', $cssUrl . '/owl.css',array(),'1.0');
    wp_enqueue_style('owl');
    wp_register_style('theme_min', $cssUrl . '/theme.min.css',array(),'1.0');
    wp_enqueue_style('theme_min');
    wp_register_style('custom_css', $cssUrl . '/custom.css',array(),'1.0');
    wp_enqueue_style('custom_css');
// font
    wp_register_style('font_awesome','https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',array());
    wp_enqueue_style('font_awesome');
    wp_register_style('font_Roboto','https://fonts.googleapis.com/css?family=Roboto',array());
    wp_enqueue_style('font_Roboto');
    wp_register_style('font_Open_Sans','https://fonts.googleapis.com/css?family=Open+Sans:400,300italic,300',array());
    wp_enqueue_style('font_Open_Sans');
    wp_register_style('font_Noto','https://fonts.googleapis.com/css?family=Noto+Serif',array());
    wp_enqueue_style('font_Noto');
    // fix IE9
    wp_register_style('html5shiv_ie9','https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js',array(),'1.0');
    wp_register_style('respond_ie9','https://oss.maxcdn.com/respond/1.4.2/respond.min.js',array(),'1.0');
    $wp_styles->add_data('html5shiv_ie9', 'conditional', 'IE 9');
    wp_enqueue_style('html5shiv_ie9');
    $wp_styles->add_data('respond_ie9', 'conditional', 'IE 9');
    wp_enqueue_style('respond_ie9');
}