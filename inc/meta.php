<?php 
/*---
Display post information
---*/ 
?>
<aside class="content_aside" id="post_meta">
	<ul>
		<li class="box primary full"><?php _e('Published:')?> <?php the_time('F jS, Y') ?> </li>
		<li class="box primary full"><?php _e('Author:')?> <?php the_author_posts_link() ?></li>
		<li class="box primary full"><?php _e('Category:')?> <?php foreach((get_the_category()) as $category) { ?>
			<a href="<?php echo get_category_link($category->term_id); ?>"><?php esc_attr_e($category->cat_name); ?></a> 
		<?php } // end category loop ?></li>
		<li class="box primary full"><?php _e('Discussion:')?> <a href="#comments"><?php comments_number('0', '1', '%'); ?> <?php _e('Comments')?></a></li>
	</ul>
	<ul id="post_tags">
	<?php
	$posttags = get_the_tags();
	if ($posttags) {
		foreach($posttags as $tag) { ?>
			<li><a href="<?php esc_attr_e(get_tag_link($tag->term_id)); ?>" class="box accent fl_right clr"><?php esc_attr_e($tag->name); ?></a></li>
	<?php } // end tags loop
	} // end if tags ?>
	</ul>
	<div class="boxlink_wrap fl_right clr"><?php edit_post_link('Edit this entry','',''); ?></div>
</aside><!-- content_aside -->