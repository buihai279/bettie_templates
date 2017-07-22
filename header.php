<?php 
    $home_layout=(get_option('home_layout')!='')?get_option('home_layout'):'default';
    $sidebar=(get_option('sidebar_layout')!='')?get_option('sidebar_layout'):'right';
    $header_layout=(get_option('header_layout')!='')?get_option('header_layout'):'minimal';
    $footer=(get_option('footer_layout')!='')?get_option('footer_layout'):'default';
	if (isset($_GET['general_site_settings'])) {
        switch ($_GET['general_site_settings']['page_layout_settings']['layout']) {
            case 'boxed':
                $home_layout='boxed';
                break;
            case 'full':
                $home_layout='full';
                break;
            default:
                $home_layout='default';
                break;
        }
    }
    if (isset($_GET['header_settings']['header_styles']['header_layout'])) {
        switch ($_GET['header_settings']['header_styles']['header_layout']) {
            case 'style2':
                $header_layout='central';
                break;
            case 'style1':
                $header_layout='minimal';
                break;
            default:
                $header_layout='default';
                break;
        }
    }
	switch ($home_layout):
	 	case 'boxed':
	 		$bodyClass='home blog page-layout-boxed page-layout-sidebar-width-1__3';
	 		break;
	 	case 'full':
	 		$bodyClass='home blog page-layout-full page-layout-sidebar-width-1__3 menu_fixed';
	 		break;
	 	default:
	 		$bodyClass='home blog page-layout-default page-layout-sidebar-width-1__3';
	 		break;
	endswitch; ?>
	<?php get_template_part('layout/head' ); ?> 
	<!-- get tags <head> -->
	<body <?php body_class($bodyClass); ?>>
		<div class="pseudoStickyBlock" style="position: relative; display: block; height: 0px;"></div>
		<div id="site-wrapper" class="site">
			<?php get_template_part('layout/top-panel'); ?>
			<?php get_template_part('layout/site-header',$header_layout); ?>
            <?php get_template_part('layout/loading' ); ?>
