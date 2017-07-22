<div class="search-panel header-panel">
	 <form action="<?php echo bloginfo('url')?>/" role="search" method="get" class="search-form-header">
	    <input type="search" class="search-field" placeholder="Search..." value="<?php the_search_query(); ?>" name="s" title="Search...">
	    <div>
	        <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
	    </div>
	</form>
</div>