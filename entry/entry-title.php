<h3 class="entry-title">
	<?php if (!is_single()): ?>
		<a href="<?php the_permalink(); ?>" rel="bookmark">
			<?php the_title('<em>','</em>'); ?>
		</a>
	<?php else: ?>
		<?php the_title('<em>','</em>'); ?>
	<?php endif ?>
</h3>