<div class="post-meta h6-style"> 
    <span class="meta-author">
        <em>Posted by 
            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>">
                <?php the_author(); ?>
            </a>
        </em>
    </span> 
    <span class="meta-date accent1-color">
        <em>
        	<time datatime="<?php the_date('Y-m-d','',''); ?>"><?php echo get_the_date(); ?></time>
        </em>
    </span>
     <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
         <span class="meta-comments">
         	<a href="<?php the_permalink();?>#comments">
         		<em><?php comments_number( 'No comments', 'One comment', '% comments' ); ?>
         		</em>
         	</a>
         </span> 
    <?php endif; ?>
 	<?php if( has_tag() ): ?>
		<span class="meta-tags">
             <em>
				<?php the_tags('', ', ', ''); ?>
             </em> 
         </span>
	<?php endif; ?>
</div>