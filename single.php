<?php get_header(); ?>
	<div id="page_main" role="main" class="post_content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header <?php post_class('protean_banner') ?> id="post-banner-<?php the_ID(); ?>">
				<h1 class="protean_banner_title"><?php the_title(); ?></h1>
				<p class="protean_banner_subtitle"><time datetime="<?php the_time('Y-m-d'); ?>">[<?php the_time('F j, Y'); ?>]</time> <?php echo get_the_excerpt(); ?></p>
			</header>

			<?php get_template_part ('inc/meta'); ?>

			<div class="content_main content_post">
				<?php the_content(); ?>
				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
			</div>
			
			
		</article>
		<nav id="post_nav">
			<ul>
				<li class="boxlink_wrap"><?php previous_post_link( '%link', '' . _x( '&larr; ', 'Previous post link' ) . '%title ' ); ?></li>
				<li class="boxlink_wrap fl_right"><?php next_post_link( '%link', '%title ' . _x( ' &rarr;', 'Next post link' ) . '' ); ?></li>
			</ul>
		</nav>
	<hr/>
	<?php comments_template(); ?>
	<?php endwhile; endif; ?>
	</div><!-- page_main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>