<?php get_header();?>
<div id="primary" class="site-content">
	<div class="container">
		<?php
		    if(!is_archive()&&!is_home()&&!is_tag()&&!is_category())
		        get_template_part('layout/breadcrumbs');
		?>
		<div class="row">
		    <div class="col-xs-12">
		        <?php get_template_part('loop/loop','search'); ?>
		    </div>
		</div>
	</div>
</div>
<?php $footer_layout=(get_option('footer_layout')!='')?get_option('footer_layout'):'default'; ?>
<?php get_footer($footer_layout);?>