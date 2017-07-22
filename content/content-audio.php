<?php global $customizer; ?>
<?php global $content; ?>
 <!--[if lt IE 9]><script>document.createElement('audio');</script><![endif]--> 
<?php 
    $content=get_the_content();
    $firstAudio = $customizer->get_first_audio($content);
    if( has_shortcode( $firstAudio, 'audio')||has_shortcode( $firstAudio, 'playlist') ) {
        do_shortcode($firstAudio);
    }
    $content = $customizer->remove_first_audio($firstAudio, $content);
?>
<?php 
    
	
    $content = str_replace( ']]>', ']]&amp;gt;', $content );
  echo do_shortcode($content,false);
?> 