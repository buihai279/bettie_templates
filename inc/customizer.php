<?php 
/**
 * 
 */
 class Customizer{
 	function __construct()
 	{
 		# code...
 	}
 	// video
	/*=========================================================================
	 * IDVIDEO - PLAYLIST SHORTCODE
	* LAY IDVIDEO YOUTUBE DAU TIEN CO TRONG BAI VIET
	*=========================================================================*/
	public function get_id_video($postContent = null){
		// $pattern='%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i';
		$pattern="#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#";
		if (preg_match($pattern, $postContent, $match)){
		   return $video_id = $match[0];
		}
		else return '';
	}
	/*=========================================================================
	 * VIDEO - PLAYLIST SHORTCODE
	* LAY VIDEO HOAC YOUTUBE DAU TIEN CO TRONG BAI VIET
	*=========================================================================*/
	// 
	public function get_first_video($postContent = null){
		$firstVideo = '';
		if($postContent != null){
			$pattern = '#(\[video.*\]|https.*www\.youtube\.com\S+|https\:\/\/youtu\.be\S+|\[playlist.*\])#im';
			preg_match_all($pattern, $postContent, $matches);
			$videoArr = $matches[0];
			if(count($videoArr) > 0 ){
				$firstVideo = $videoArr[0];
			} 
		}
		return $firstVideo;
	}
	/*=========================================================================
	 * VIDEO SHORTCODE
	* XOA VIDEO HOAC YOUTUBE DAU TIEN CO TRONG BAI VIET
	*=========================================================================*/
	public function remove_first_video($video,$content){
		$video 	=  str_replace('[', '\[', $video);
		$video 	=  str_replace(']', '\]', $video);
		$video 	=  str_replace('?', '\?', $video);
		$pattern = '#'. $video . '#';
		$content = preg_replace($pattern, '', $content,1);
		return $content;
	}
	/*=========================================================================
	 * Link SHORTCODE
	* LAY Link  DAU TIEN CO TRONG BAI VIET
	*=========================================================================*/
	public function get_first_link($postContent = null){
		$pattern = '`.*?((http|https)://[\w#$&+,\/:;=?@.-]+)[^\w#$&+,\/:;=?@.-]*?`i';
	    if (preg_match($pattern,$postContent,$matches)) {
	        return $matches[1];
	    }
	}
	public function remove_first_link($link,$content){
		$pattern = '#'. $link . '#';
		$content = preg_replace($pattern, ' ', $content,1);
		return $content;
	}
	/*=========================================================================
	 * Link SHORTCODE
	* LAY Link  DAU TIEN CO TRONG BAI VIET
	*=========================================================================*/
	public function get_first_status($content = null){
		if($content != null):
			$pattern	= '#(((https://)?(www.)?twitter.com/.+/status/.+\s+)|((https://)?(www.)?facebook.com/.+/posts/.+\s+)|(<blockquote\s+class="twitter-tweet".*>.*<a href="https://twitter.com/.*/status/.*">.*</a>.*</blockquote>\s+<script async src="//platform.twitter.com/widgets.js".*></script>)|(<iframe.*https://www.facebook.com/.*></iframe>))#imsU';
			$matches=array();
			preg_match_all($pattern, $content, $matches);
			if (isset($matches[0][0])&&$matches[0][0]!='')
				return $matches[0][0];
			else
				return '';
		else:
			return '';
		endif;
	}
	public function get_statuses($content = null){
		if($content != null):
			$pattern	= '#((<blockquote\s+class="twitter-tweet".*>.*<a href="https://twitter.com/.*/status/.*">.*</a>.*</blockquote>\s+<script async src="//platform.twitter.com/widgets.js".*></script>)|((https://)?(www.)?facebook.com/.*/posts/[0-9].*)\s*|((https://)?(www.)?twitter.com/.*/status/[0-9]+)\s+|(<iframe.*https://www.facebook.com/.*></iframe>))#im';
			$matches=array();
			$matches[0]=null;
			preg_match_all($pattern, $content, $matches);
			if (isset($matches[0][0])&&$matches[0][0]!='')
				return $matches[0];
			else
				return '';
		else:
			return '';
		endif;
	}
	public function embed_social($link = null){
		if ($link==null)
			return '';
		$link=trim($link);
		$flag='';
		$embed='';
		$matches=array();
		if(preg_match('#facebook.com/#', $link, $match)==true)
			$flag='fb';
		elseif(preg_match('#twitter.com/#', $link, $match)==true)
			$flag='tw';
		if(preg_match('#<blockquote\s+class="twitter-tweet".*>.*<a href="https://twitter.com/.*/status/.*">.*</a>.*</blockquote>\s+<script async src="//platform.twitter.com/widgets.js".*></script>#', $link, $match)==true){
			return $embed="<div class='social-post-code twitter-code'>$link</div>";
		}
		if(preg_match('#<iframe.*https://www.facebook.com/.*></iframe>#', $link, $match)==true){
			return $embed="<div class='social-post-code facebook-code'>$link</div>";
		}
		if($flag=='fb'):
			$embed.="<div class='social-post-code facebook-code'>";
	        $embed.="<script>window.fbAsyncInit = function() { FB.init({ xfbml : true, version : 'v2.4' }); }; (function(d, s, id){ var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) {return;} js = d.createElement(s); js.id = id; js.src = '//connect.facebook.net/en_US/sdk.js'; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));	</script>";
        	$embed.="<div class='fb-post' data-href=".$link." data-width='500'></div></div>";
        	return $embed;
    	elseif($flag=='tw'):
			$embed.='<script>$( document ).ready(function() {var url="https://api.twitter.com/1/statuses/oembed.json?url="+"'.$link.'"; $.ajax({ url: url, dataType: "jsonp", success: function(data) { $(".twitter-code").html(data.html);} }); });</script><div class="social-post-code twitter-code"></div>';
		return $embed;
		endif;
	}

	public function remove_first_status($link,$content){
		$content=str_replace($link,' ', $content);
		return $content;
	}



	public function video_embed($url, $site ='youtube'){
		$html = '';
		if($site == 'youtube'){
			$tmp = explode('v=', $url);
			$videoID = $tmp[1];
			$src = 'https://www.youtube.com/embed/' . $videoID . '?feature=oembed';
			$html = '<iframe src="' . $src . '" allowfullscreen="" frameborder="0" width="650" height="366"></iframe>';
		}
		return $html;
	}

	/*=========================================================================
	 * BLOCKQUOTE SHORTCODE
	* LAY BLOCKQUOTE DAU TIEN CO TRONG BAI VIET
	*=========================================================================*/
	public function get_first_blockquote($postContent = null){
		if($postContent != null){
			$pattern	= '#(?<=<blockquote>).*(?=</blockquote>)#imsU';
			preg_match_all($pattern, $postContent, $matches);
			return $matches[0][0];
		}
	}
	public function remove_first_blockquote($blockquote,$content){
		$blockquote='<blockquote>'.$blockquote.'</blockquote>';
		$content=str_replace('> <', '><', $content);
		return str_replace($blockquote, ' ', $content);
	}

// gallary

	/*=========================================================================
	 * GALLERY SHORTCODE
	* LAY GALLERY DAU TIEN CO TRONG BAI VIET
	*=========================================================================*/
	public function gallary($postContent = null){
		if($postContent != null){
			$subject = html_entity_decode($postContent);
		    $array = array();
		    preg_match_all( '/src="([^"]*)"/i', $subject, $array ) ;
		    return $array;
		}
	}

	/*=========================================================================
	 * GALLERY SHORTCODE
	* XOA GALLERY DAU TIEN CO TRONG BAI VIET
	*=========================================================================*/
	public function remove_first_gallery($gallery,$content){
		$gallery 	=  str_replace('[', '\[', $gallery);
		$gallery 	=  str_replace(']', '\]', $gallery);
		$pattern = '#'. $gallery . '#';
		$content = preg_replace($pattern, '', $content,1);
		return $content;
	}

	public function get_first_gallery($postContent = null){
		$firstGallery = '';
		if($postContent != null){
			$pattern = '#\[gallery.*\]#im';
			preg_match_all($pattern, $postContent, $matches);
			$galleryArr = $matches[0];
			if(count($galleryArr) > 0 ){
				$firstGallery = $galleryArr[0];
			} 
		}
		return $firstGallery;
	}

	/*=========================================================================
	 * GALLERY SHORTCODE
	* XOA GALLERY DAU TIEN CO TRONG BAI VIET
	*=========================================================================*/
	public function remove_first_playlist($playlist,$content){
		$playlist 	=  str_replace('[', '\[', $playlist);
		$playlist 	=  str_replace(']', '\]', $playlist);
		$pattern = '#'. $playlist . '#';
		$content = preg_replace($pattern, '', $content,1);
		return $content;
	}

	public function get_first_playlist($postContent = null){
		$firstPlaylist = '';
		if($postContent != null){
			$pattern = '#\[playlist.*\]#im';
			preg_match_all($pattern, $postContent, $matches);
			$playlistArr = $matches[0];
			if(count($playlistArr) > 0 ){
				$firstPlaylist = $playlistArr[0];
			} 
		}
		return $firstPlaylist;
	}

	/*=========================================================================
	 * GALLERY SHORTCODE
	* XOA GALLERY DAU TIEN CO TRONG BAI VIET
	*=========================================================================*/
	public function remove_first_embed($embed,$content){
		$embed 	=  str_replace('[', '\[', $embed);
		$embed 	=  str_replace(']', '\]', $embed);
		$pattern = '#'. $embed . '#';
		$content = preg_replace($pattern, '', $content,1);
		return $content;
	}

	public function get_first_embed($postContent = null){
		$firstEmbed = '';
		if($postContent != null){
			$pattern = '#\[embed.*\]#im';
			preg_match_all($pattern, $postContent, $matches);
			$embedArr = $matches[0];
			if(count($embedArr) > 0 ){
				$firstEmbed = $embedArr[0];
			} 
		}
		return $firstEmbed;
	}

	/*=========================================================================
	 * AUDIO - PLAYLIST SHORTCODE
	* XOA AUDIO HOAC PLAYLIST DAU TIEN CO TRONG BAI VIET
	*=========================================================================*/
	public function remove_first_audio($audio,$content){
		$audio 	=  str_replace('[', '\[', $audio);
		$audio 	=  str_replace(']', '\]', $audio);
		$pattern = '#'. $audio . '#';
		$content = preg_replace($pattern, '', $content,1);
		return $content;
	}
	/*=========================================================================
	 * AUDIO - PLAYLIST SHORTCODE
	* LAY AUDIO HOAC PLAYLIST DAU TIEN CO TRONG BAI VIET
	*=========================================================================*/
	public function get_first_audio($postContent = null){
		$firstAudio = '';
		if($postContent != null){
			$pattern = '#(\[audio.*\/audio\]|\[playlist.*\])#imU';
			preg_match_all($pattern, $postContent, $matches);
			$audioArr = $matches[0];
			if(count($audioArr) > 0 ){
				$firstAudio = $audioArr[0];
			}
		}
		return $firstAudio;
	}

 } 

 ?>