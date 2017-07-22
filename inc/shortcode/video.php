<?php
class Shortcode_video{
	public function __construct(){
		add_shortcode('video', array($this,'show'));
	}
	public function show($attr){
		extract($attr);
		$src=array();
		$src[] = (isset($mp4)) ? "<source src='".$mp4."' type="."video/mp4".">" : ' ';
		$src[]= (isset($m4v)) ? "<source src='".$m4v."' type="."video/m4v".">" : ' ';
		$src[]= (isset($webm)) ? "<source src='".$webm."' type="."video/webm".">" : ' ';
		$src[]= (isset($ogv)) ? "<source src='".$ogv."' type="."video/ogv".">" : ' ';
		$src[]= (isset($wmv)) ? "<source src='".$wmv."' type="."video/wmv".">" : ' ';
		$src[]= (isset($flv)) ? "<source src='".$flv."' type="."video/flv".">" : ' ';
		$src1=implode(' ', $src);
		$loop= (isset($loop)) ? 'loop' : '';
		$poster= (isset($poster)) ? "poster=\'$poster\'" : '';
		$width= (isset($width)) ? 'width="'.$width.'"' : '';
		$height= (isset($height)) ? 'height="'.$height.'"' : '';
		$preload= (isset($preload)) ? $preload : 'none';
		$autoplay= (isset($autoplay)) ? 'autoplay' : 'autoplay';
		
?>
		<video  <?php echo $poster; ?> <?php echo $width; ?> <?php echo $height; ?> preload="<?php echo $preload ?>" controls>
			 <?php echo $src1; ?>
			Your browser does not support the video tag.
		</video>
		<script src='http://localhost/wp/wp-includes/js/mediaelement/mediaelement-and-player.min.js'></script>
		<link rel="stylesheet" type="text/css" media="all" href="http://localhost/wp/wp-includes/js/mediaelement/mediaelementplayer.min.css">
		<link rel="stylesheet" type="text/css" media="all" href="http://localhost/wp/wp-includes/js/mediaelement/wp-mediaelement.css">
		<script>
			$(document).ready(function() {
			  $("video").mediaelementplayer();
			});
		</script>
<?php
	}
}
?>
