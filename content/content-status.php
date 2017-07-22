<?php global $customizer; ?>

<?php 
$content=get_the_content();
  $link= $customizer->get_first_status($content);
  if(isset($link)&&$link!=''){
    $content= $customizer->remove_first_status($link,$content);
    echo $customizer->embed_social($link);//first social
  }
  $arr=array();
  $arr= $customizer->get_statuses($content);
  if(is_array($arr))
    foreach ($arr as $link_status){
      $embed_social= $customizer->embed_social($link_status);
      $content=str_replace($link_status, $embed_social, $content);
    }
	$content = str_replace( ']]>', ']]&amp;gt;', $content );
	echo do_shortcode($content,false); 
?> 