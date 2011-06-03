<?php
	require_once(TEMPLATEPATH . '/inc/admin-functions.php');
	require_once(TEMPLATEPATH . '/inc/preset.php');
	require_once(TEMPLATEPATH . '/inc/theme-options.php');
	require_once(TEMPLATEPATH . '/inc/post-options.php');
	
	if(!get_option('protean_preceed_old_style')){
		require_once('inc/convert_old_style.php');
	}
	
	define('GOOGLE_FONT_URL','http://fonts.googleapis.com/css?family=');
	
	// Add RSS links to <head> section
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('menus');
	
	if ( function_exists( 'register_nav_menu' ) ) {
		register_nav_menu( 'navigation', 'Top Navigation' );
	}
	
	// Load jQuery
	if ( !is_admin() ) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"), false);
		wp_enqueue_script('jquery');
	}
	
	// Clean up the <head>
	function removeHeadLinks() {
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link');
    }
	add_action('init', 'removeHeadLinks');
	remove_action('wp_head', 'wp_generator');
    
	if (function_exists('register_sidebar')) {
		register_sidebar( array(
			'name' => __( 'Header Widget Area', 'protean' ),
			'id' => 'widget-area-1',
			'description' => __( 'Header widget area, full width', 'protean' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<span class="widget_title">',
			'after_title' => '</span>',
		) );
		register_sidebar(array(
			'name' => __( 'Bottom Widget Area 1', 'protean' ),
			'id' => 'widget-area-2',
			'description' => __( 'Bottom widget area 1, one third, float left', 'protean' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<span class="widget_title">',
			'after_title' => '</span>',
		) );
		register_sidebar(array(
			'name' => __( 'Bottom Widget Area 2', 'protean' ),
			'id' => 'widget-area-3',
			'description' => __( 'Bottom widget area 2, one third, float left', 'protean' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<span class="widget_title">',
			'after_title' => '</span>',
		) );
		register_sidebar(array(
			'name' => __( 'Bottom Widget Area 3', 'protean' ),
			'id' => 'widget-area-4',
			'description' => __( 'Bottom widget area 3, one third, float left', 'protean' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<span class="widget_title">',
			'after_title' => '</span>',
		) );
    }
?>