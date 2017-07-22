<div class="site-branding">
<?php 
if (has_custom_logo()):
	the_custom_logo();
else:
?>
    <h1 class="site-title h2-style"> 
    	<a href="<?php bloginfo('url'); ?>" rel="home">
    		<em><?php bloginfo('name'); ?></em>
    	</a>
    </h1>
    <div class="site-description h6-style color-invert-accent">
    	<em><?php bloginfo('description'); ?></em>
    </div>
<?php 
endif;
 ?>
</div>