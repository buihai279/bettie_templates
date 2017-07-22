<?php
	if ( has_nav_menu( 'footer-menu' ) ) {
	     wp_nav_menu( array(
      		'theme_location' => 'footer-menu',
			'menu'            => '',
			'container'       => 'div',
			'container_class' => 'menu-footer_nav site-menu',
			'container_id'    => 'footer-navigation',
			'menu_class'      => 'menu',
			'menu_id'         => 'menu-footer-menu',
			'echo'            => true,
			'depth'           => 0,
	       ) );
	} 
?>

