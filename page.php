<?php get_header(); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div id="page_main" role="main" class="full_content">
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</div>
	<hr/>
	<?php comments_template(); ?>

	<?php endwhile; endif; ?>
	</div><!-- page_main -->
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>