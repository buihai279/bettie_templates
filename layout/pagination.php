<nav class="navigation pagination" role="navigation">
    <h2 class="screen-reader-text">Posts navigation</h2>
    <div class="nav-links">
		<?php
		global $wp_query;
		$big = 999999999;
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'end_size'           => 2,
			'mid_size'           => 2,
			'prev_next'          => true,
			'prev_text'          => '<i class="material-icons">keyboard_arrow_left</i>',
			'next_text'          => '<i class="material-icons">keyboard_arrow_right</i>',
			'type'               => 'plain',
			'add_args'           => false,
		) );
		?>
    </div>
</nav>