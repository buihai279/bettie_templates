<?php
class Setting_menu{
	public function __construct(){
		add_action('admin_menu', array($this,'settingMenu'));
	}
	//=======================================================
	//1. Them mot submenu vao Dashboard cua WP menus
	//=======================================================
	public function settingMenu(){
		$slug = 'my-setting-theme';
		add_menu_page('Option theme','Option theme','manage_options',$slug,array($this,'settingTheme'),'', 3);
		add_submenu_page ( $slug,'Setting social','Setting social','manage_options','my-setting-social',array($this,'settingSocial'));
		add_submenu_page ( $slug,'Setting Slider','Setting Slider','manage_options','my-setting-slider',array($this,'settingSlider'));
		add_submenu_page ( $slug,'Setting Layout','Setting Layout','manage_options','my-setting-layout',array($this,'settingLayout'));

		// remove_submenu_page( $slug,$slug);
	}
	public function settingTheme()
	{
		require_once 'setting-menu/option.php';
	}
	public function settingSocial()
	{
		require_once 'setting-menu/social.php';
	}
	public function settingSlider()
	{
		require_once 'setting-menu/slider.php';
	}
	public function settingLayout()
	{
		require_once 'setting-menu/layout.php';
	}

}
	