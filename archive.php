<?php get_header(); ?>
	<div id="page_main" role="main">
		<div  class="full_content">
		<?php if(have_posts())the_post(); ?>
	
		<?php /* If this is a category archive */ if (is_category()) { ?>
			<h2><?php _e('Archive for the','protean')?> &#8216;<?php single_cat_title(); ?>&#8217; <?php _e('Category','protean')?></h2>
	
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
			<h2><?php _e('Posts Tagged','protean')?> &#8216;<?php single_tag_title(); ?>&#8217;</h2>
	
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<h2><?php _e('Archive for','protean')?> <?php the_time('F jS, Y'); ?></h2>
	
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h2><?php _e('Archive for','protean')?> <?php the_time('F, Y'); ?></h2>
	
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h2 class="pagetitle"><?php _e('Archive for','protean')?> <?php the_time('Y'); ?></h2>
	
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<h2 class="pagetitle"><?php _e('Author Archive for','protean')?> &#8216;<?php the_author() ?>&#8217;</h2>
	
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h2 class="pagetitle"><?php _e('Blog Archives','protean')?></h2>
		<?php } ?>
		</div><!-- full_content -->

	<?php 
		rewind_posts();
		get_template_part( 'loop' ); 
	?>
	</div><!-- page_main -->
<hr/>

<?php get_sidebar(); ?>

<?php get_footer(); ?>