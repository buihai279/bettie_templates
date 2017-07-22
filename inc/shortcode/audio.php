<?php
class Shortcode_audio{
	public function __construct(){
		add_shortcode('audio', array($this,'show'));
	}
	public function show($attr){
		extract($attr);
		$src=array();
		$src[] = (isset($mp3)) ? $mp3 : '';
		$src[] = (isset($m4a)) ? $m4a : '';
		$src[] = (isset($ogg)) ? $ogg : '';
		$src[] = (isset($wav)) ? $wav : '';
		$src[] = (isset($wma)) ? $wma : '';
		$preload = (isset($preload)) ? $preload : '';
		$autoplay = (isset($autoplay)&&$autoplay==true) ?  'autoplay' : '';
		$loop = (isset($loop)&&$loop==true) ?  'loop' : '';
		
?>
		<audio controls width='100%' preload="<?php echo $preload ?>" <?php echo $autoplay; ?> <?php echo $loop; ?>>
			<?php foreach ($src as $s): ?>
				<?php if ($s=='')break;?>
				<source src="<?php echo $s ?>">
			<?php endforeach ?>
		</audio>
		<script src='http://localhost/wp/wp-includes/js/mediaelement/mediaelement-and-player.min.js'></script>
		<link rel="stylesheet" type="text/css" media="all" href="http://localhost/wp/wp-includes/js/mediaelement/mediaelementplayer.min.css">
		<link rel="stylesheet" type="text/css" media="all" href="http://localhost/wp/wp-includes/js/mediaelement/wp-mediaelement.css">
		<script>
			$(document).ready(function() {
			  $("audio").mediaelementplayer();
			});
		</script>
<?php
	}
}
?>