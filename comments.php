<div id="comments" class="comments-area">
	<?php 
		if(post_password_required()== true) return;
		if(!comments_open() && get_comment_pages_count() == 0) return;
	?>
	<?php  $comment_number = get_comments_number(); ?>
	<h4 class="comments-title"> 
		<?php 
			if($comment_number == 1)
				echo '1 Response';
			else if($comment_number > 1)
				echo sprintf(' %s Responses',$comment_number);
			else
				echo ' No Responses';
		?>
	</h4>
	<ol class="comment-list">
		<?php 
			$commentListArr = array('callback'=> 'zendvn_comment');
			wp_list_comments($commentListArr);
		?>
	</ol>
	<?php 
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
		$formArr = array(
			'cancel_reply_link'=> '<i class="fa fa-times"></i> Cancel comment reply',
			'label_submit'=>'Submit Comment'
			);
		comment_form($formArr);
	?>
</div>