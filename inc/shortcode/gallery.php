<?php
class Shortcode_gallery{
	public function __construct(){
		add_shortcode('gallery', array($this,'show'));
	}
	public function show($attr){
		$ids=explode(',', $attr['ids']);
		if (isset($attr['orderby'])&&$attr['orderby']=='rand') {
			shuffle($ids);
		}
		?>
		<div class="photolab-gallery owl-carousel owl-theme">
			<?php
			foreach ($ids as $value):
				if(wp_attachment_is_image($value)):
					if (isset($attr['size'])) {
						$src=wp_get_attachment_image_src($value,$attr['size'] );
					} else {
						$src=wp_get_attachment_image_src($value);
					}
					if (isset($attr['link'])&&$attr['link']=='file')
						$link=wp_get_attachment_url($value);
					else 
						$link='#';
					?>
					<div class="owl-item">
						<a href="<?php echo $link; ?>">
							<img src="<?php echo $src[0]; ?>">
						</a>
					</div>
				<?php endif; ?>
				<?php
			endforeach;
			?>
		</div>
		<script>
			$(document).ready(function() {
				  $(".photolab-gallery").owlCarousel({
				      navigation : true, // Show next and prev buttons
				      slideSpeed : 300,
				      paginationSpeed : 0,
				      singleItem:true
				  });
				});
		</script>
		<?php
	}
}
?>