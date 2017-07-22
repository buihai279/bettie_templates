<?php get_header();?>
<?php  $sidebar_layout=(get_option('sidebar_layout')!='')?get_option('sidebar_layout'):'right'; 
if ($sidebar_layout=='no')
        $size='col-lg-12';
    elseif($sidebar_layout=='double')
        $size='col-lg-4';
    else
        $size='col-lg-8';
?>
<div id="primary" class="site-content">
    <div class="container">
        <?php get_template_part('layout/breadcrumbs'); ?>
        <div class="row">
            <div class="content-wrap col-xs-12 col-sm-12 <?php echo $size; ?>">
                <section class="sect-404 bg-white text-center">
                    <div class="img-wr round"> 
                        <?php $img=wp_get_attachment_image_src(get_option('img404' ),'thumbnail-category'); ?>
                        <img src="<?php echo $img[0]; ?>" alt="" width='329'>
                    </div>
                    <p class="h1-style accent1-color text-primary"> Page 404</p>
                    <p class="h4-style">The page not found</p> <a href="<?php bloginfo('url' ); ?>" class="btn btn-primary btn-visit">Visit home page</a>
                    <hr>
                    <p>Unfortunately the page you were looking for could not be found. Maybe search can help.</p>
                    <form role="search" method="get" class="search-form"action="<?php echo bloginfo('url')?>/">
                        <label>
                            <input type="search" class="search-field" placeholder="Enter keyword"value="<?php the_search_query(); ?>" name="s" title="Enter keyword"> </label>
                        <input class="search-submit" value="Search" type="submit">
                    </form>
                </section>
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
<?php $footer_layout=(get_option('footer_layout')!='')?get_option('footer_layout'):'default'; ?>
<?php get_footer($footer_layout);?>