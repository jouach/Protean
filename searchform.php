<div id="site_search" class="box accent fl_right">
	<form  action="<?php bloginfo('url'); ?>" id="searchform" method="get">
		<input type="text" name="s" placeholder="Search" id="search_text" value="<?php echo get_search_query() ?>" />
		<input type="submit" name="submit" value="Submit" id="search_button" />
	</form>
</div>