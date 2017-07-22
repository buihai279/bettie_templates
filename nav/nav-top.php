<?php
if ( has_nav_menu( 'first-menu' ) ) {
     wp_nav_menu( array(
  		'theme_location' => 'first-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-top_nav site-menu',
		'container_id'    => 'top-menu',
		'menu_class'      => 'menu',
		'menu_id'         => 'menu-top-menu',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '<span class="title-attributes"></span>',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="menu" id="menu-top-menu">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
       ) );
} 
?>