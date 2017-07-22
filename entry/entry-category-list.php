<?php
if (!is_singular())
	echo get_the_category_list_rewrite();
else
	echo get_the_category_list();

