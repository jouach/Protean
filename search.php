<?php get_header(); ?>
	<div id="page_main" role="main">
		<div  class="full_content">
		<h2><?php printf( __( 'Search Results for: %s', 'PROTEAN' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
		</div>
	<?php get_template_part( 'loop' ); ?>
	</div><!-- page_main -->
<hr/>

<?php get_sidebar(); ?>

<?php get_footer(); ?>