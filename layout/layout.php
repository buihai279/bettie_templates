<?php  
$sidebar_layout=get_option('sidebar_layout');
$home_layout=get_option('home_layout');
 ?>
<div class="row">
<?php 
    function getdata($size){
        $layout_tmp=get_option('home_layout');
        if (isset($_GET['blog_settings']))
            switch ($_GET['blog_settings']['layout']) {
                case 'masonry':
                    $layout_tmp='masonry';
                    break;
                case 'grid':
                    $layout_tmp='grid';
                    break;
                default:
                    $layout_tmp='default';
                    break;
            }
            if (isset($_GET['general_site_settings']['page_layout_settings']['layout'])&&$_GET['general_site_settings']['page_layout_settings']['layout']=='full') {
                $layout_tmp='full';
            }
        echo '<div class="content-wrap col-xs-12 col-sm-12 '.$size.'">';
                    get_sidebar('top');
                    if ($layout_tmp=='masonry')
                        get_template_part('loop/loop','masonry');
                    elseif ($layout_tmp=='grid')
                        get_template_part('loop/loop','grid');
                    else get_template_part('loop/loop');
        echo    '</div>';
    } 
    if (isset($_GET['sidebar_settings']['show_left'])||isset($_GET['sidebar_settings']['show_right'])) {
        extract($_GET['sidebar_settings']);
        if ($show_left==1&&$show_right==0)
            $sidebar_layout='left';
        elseif($show_left==0&&$show_right==1)
            $sidebar_layout='right';
        elseif($show_left==1&&$show_right==1)
            $sidebar_layout='double';
        else
            $sidebar_layout='no';
    }
    switch ($sidebar_layout) {
        case 'double':
            get_sidebar('left');
            get_sidebar('right');
            getdata('col-lg-4');
            break;
        case 'right':
            get_sidebar('right');
            getdata('col-lg-8');
            break;
        case 'left':
            get_sidebar('left');
            getdata('col-lg-8');
            break;
        case 'no':
            getdata('col-lg-12');
            break;
        default:
            getdata('col-lg-12');
            break;
    } ?>
</div>