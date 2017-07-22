<?php
	if ( has_nav_menu('main-menu')) {
	     wp_nav_menu( array(
      		'theme_location' => 'main-menu',
			'menu'            => '',
			'container'       => 'div',
			'container_class' => 'menu-main_nav site-menu',
			'container_id'    => 'main-menu',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '<span class="title-attributes"></span>',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="menu-main-menu" class="main-navigation sf-menu sf-js-enabled sf-arrows" style="touch-action: pan-y;">%3$s</ul>',
			'depth'           => 0,
			'walker'          => new Walker_Main_menu_social
	       ) );
	} 
?>