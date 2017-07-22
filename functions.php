<?php
    define('THEME_DIR', get_template_directory());
    define('THEME_INC_DIR', THEME_DIR . '/inc');
    define('THEME_WIDGET_DIR',THEME_INC_DIR.'/widgets');
    define('THEME_WALKER_DIR',THEME_INC_DIR.'/Walker');
    define('THEME_SHORTCODE_DIR',THEME_INC_DIR.'/shortcode');
    require_once THEME_INC_DIR . '/customizer.php';
    require_once THEME_INC_DIR . '/setting-menu.php';
    require_once THEME_INC_DIR . '/register-assets.php';
    require_once THEME_INC_DIR . '/register-widget.php';
    new Setting_menu();
    //  overwrite shortcode
    require_once THEME_SHORTCODE_DIR . '/gallery.php';
    require_once THEME_SHORTCODE_DIR . '/audio.php';
    require_once THEME_SHORTCODE_DIR . '/video.php';
    new Shortcode_gallery();
    new Shortcode_audio();
    new Shortcode_video();
    global $customizer;
    $customizer = new Customizer();
    function setuptheme()
    {
        $suportHtml5=array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption');
        add_theme_support( 'html5',$suportHtml5  );
        add_theme_support( 'title-tag' );
        add_theme_support( 'custom-background' );
        add_theme_support('category-thumbnails');
        add_theme_support( 'post-thumbnails' ); 
        if (function_exists('add_image_size')) 
        { 
            $arrCenter=array( 'center', 'center') ;
            add_image_size( 'post-image-half', 700, 395,$arrCenter );
            add_image_size( 'thumbnail-latest', 105, 70,$arrCenter);
            add_image_size( 'thumbnail-category', 400, 400,$arrCenter);
            add_image_size( 'ads', 300, 250,$arrCenter);
            add_image_size( 'large', 1024, 682,$arrCenter);
            add_image_size( 'attachment-post-image', 1100, 620,$arrCenter);
        }
        set_post_thumbnail_size( 300, 300, $arrCenter);
        add_filter( 'image_size_names_choose', 'my_custom_sizes' );

        function my_custom_sizes( $sizes ) {
            return array_merge( $sizes, array(
                 'post-image-half' => __( 'Post Half Size ' ),
                 'thumbnail-latest'    => __( 'Thumbnail Latest Size ' ),
                 'ads'     => __( 'Ads Size' ),
                 'thumbnail-category'      => __( 'Thumbnail Category Size' ),
                 'attachment-post-image'      => __( 'Attachment Post Size' )
         ) );
        }
        //array( 'aside', 'gallery','link','image','quote','video','audio','chat' )
        add_theme_support( 'post-formats', array('quote','status','link','image','gallery','video','audio') );
    }
    add_action('after_setup_theme','setuptheme');
    function register_menus() {
          register_nav_menu( 'first-menu', __( 'Menu on Top Header'));
          register_nav_menu( 'main-menu', __( 'Main Header'));
          register_nav_menu( 'footer-menu', __( 'Menu on Footer'));
    }
    add_action( 'init', 'register_menus' );
    require_once THEME_WALKER_DIR.'/walker-menu.php';
    require_once THEME_INC_DIR . '/comments-config.php';
    require_once THEME_INC_DIR . '/overwrite_fillter.php';
    function fill__content( $content ) {
        $content=preg_replace('#<script(.*?)>(.*?)</script>#is','', $content);
        $content =strip_shortcodes($content);
        $content =wp_strip_all_tags($content);
        $content=preg_replace('#((https|http)?\:\/\/(.www)?.+)\s+#imsU','', $content);
        return $content;
    }
    /*
     * Enable support for custom logo.
     *
     * @since Twenty Fifteen 1.5
     */
    
    function theme_prefix_setup() {
    
        add_theme_support( 'custom-logo', array(
        'height'      => 70,
        'width'       => 125,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );

    }
    add_action( 'after_setup_theme', 'theme_prefix_setup' );
 ?>