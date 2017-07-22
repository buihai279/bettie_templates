<?php 
    $home_layout=(get_option('home_layout')!='')?get_option('home_layout'):'default';
    $sidebar_layout=(get_option('sidebar_layout')!='')?get_option('sidebar_layout'):'right';
    $header_layout=(get_option('header_layout')!='')?get_option('header_layout'):'minimal';
    $footer_layout=(get_option('footer_layout')!='')?get_option('footer_layout'):'default';
    if (isset($_GET['blog_settings'])) {
        switch ($_GET['blog_settings']['layout']) {
            case 'masonry':
                $home_layout='masonry';
                break;
            case 'grid':
                $home_layout='grid';
                break;
            default:
                $home_layout='default';
                break;
        }
    }
    if (isset($_GET['footer_settings']['layout'])) {
        switch ($_GET['footer_settings']['layout']) {
            case 'style2':
                $footer_layout='minimal';
                break;
            default:
                $footer_layout='default';
                break;
        }
    }
    get_header();
    if(is_home())
        get_sidebar('container');
?>
    <div id="content" class="site-content">
        <div class="container" style="max-width: 100%">
            <?php
                get_template_part('layout/layout');
                get_sidebar('bottom'); 
                get_footer($footer_layout);
?>