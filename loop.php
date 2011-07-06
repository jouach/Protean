<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article <?php post_class('protean_banner') ?> id="post-banner-<?php the_ID(); ?>">
	<h1 class="protean_banner_title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
	<p class="protean_banner_subtitle"><time datetime="<?php the_time('Y-m-d'); ?>">[<?php the_time('F j, Y'); ?>]</time> <?php echo get_the_excerpt(); ?></p>
	<a href="<?php the_permalink() ?>" title="<?php _e('Read more of','protean')?> <?php the_title(); ?>" class="protean_banner_fill">
	<span><?php _e('Read more','protean')?></span></a>
</article>
<?php endwhile; ?>
<?php get_template_part( 'inc/nav' ); ?>
<?php else : ?>
<div class="full_content">
	<h2><?php _e('Not Found','protean')?></h2>
</div>
<?php endif; ?>