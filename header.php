<!doctype html> 
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<title>
	<?php
		if (function_exists('is_tag') && is_tag()) {
		 single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		elseif (is_archive()) {
		 wp_title(''); echo ' Archive - '; }
		elseif (is_search()) {
		 echo 'Search for &quot;'.esc_html($s).'&quot; - '; }
		elseif (!(is_404()) && (is_single()) || (is_page())) {
		 wp_title(''); echo ' - '; }
		elseif (is_404()) {
		 echo 'Not Found - '; }
		if (is_home()) {
		 bloginfo('name'); echo ' - '; bloginfo('description'); }
		else {
		  bloginfo('name'); }
		if ($paged>1) {
		 echo ' - page '. $paged; }
	?>
	</title> 
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
	
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	
	<?php 
	$idstr ='';
	if(is_single()){
		$idstr = '?id='.get_the_ID();
	}else if ( have_posts() ) {
		while ( have_posts() ) : the_post();
			$postid[] = get_the_ID();
		endwhile;// end posts loop
		$idstr = '?ids='.implode(',',$postid);
	} ?>
	
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/pagestyle.php<?php echo $idstr ?>" type="text/css" />
	
	<?php get_template_part( 'inc/font-import') ?>
	
	<?php wp_head(); ?>
	
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/ie.css" type="text/css" />
	<![endif]-->
	
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/print.css" type="text/css" media="print" />
</head>
<?php 
$options = get_option('protean_theme_options');
$header = $options['header'];
if($header=="")$header='tagline';
?>
<body <?php body_class(); ?>>
	<a href="#page_main" id="skipnav"><?php _e('Skip navigation')?></a>
	<header id="page_header">
		<?php get_template_part( 'inc/headlines/'.$header ); ?>
		<?php get_search_form(); ?>
	</header>
	
	<?php if ( is_active_sidebar( 'widget-area-1' ) ) { ?>
	<div class="widget-area-full">
		<?php dynamic_sidebar( 'widget-area-1' ); ?>
	</div>
	<?php } ?>
	
	<?php if(isset($options['menu']) && $options['menu']==1){ ?>
		<nav id="topnav">
			<?php wp_nav_menu(); ?>
			<div class="clr"></div>
		</nav>
	<?php } ?>