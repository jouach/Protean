<?php
add_action( 'dbx_post_advanced', 'protean_create_custom_fields' );
add_action( 'save_post', 'protean_saveCustomFields',1,2 );

function protean_create_custom_fields() {
	global $post;
	// only show when edit post
	if ( $post->post_type != 'post' )return;
	add_meta_box( 'protean-custom-fields-style', 'Protean: page',  'protean_display_custom_field_page' , 'post', 'normal', 'high' );
	add_meta_box( 'protean-custom-fields-banner', 'Protean: banner',  'protean_display_custom_field_banner' , 'post', 'normal', 'high' );
	
	// for color picker
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-draggable');
	wp_enqueue_script('jquery-ui-resizable');
	wp_enqueue_style('jqueryui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/base/jquery-ui.css' );
	
	wp_enqueue_script('jquery_colorpicker', get_template_directory_uri().'/js/colorpicker/js/colorpicker.js' );
	wp_enqueue_style('jquery_colorpicker', get_template_directory_uri().'/js/colorpicker/css/colorpicker.css' );
	
	// custom javascript and stylesheet
	wp_enqueue_style('protean_admin', get_template_directory_uri().'/css/admin.css' );
	wp_enqueue_script('protean_file_manager', get_template_directory_uri().'/js/file_manager.js' );
	wp_enqueue_script('protean_page_style', get_template_directory_uri().'/js/page_style.js' );
	wp_enqueue_script('protean_post_edit', get_template_directory_uri().'/js/post_edit.js' );
	
	// to include font stylesheets
	$options = get_option('protean_theme_options');
	$fonts = $options['fonts'];
	foreach($fonts as $f){
		wp_enqueue_style($f,GOOGLE_FONT_URL.$f);
	}
} //createCustomFields 

function protean_display_custom_field_page(){ 
	global $post;
	$options = get_post_meta($post->ID, '_protean_option',true);
	$paramname="protean";	
	$theme_option = get_option('protean_theme_options');
	$pagename = "editpost";
	include(get_template_directory().'/inc/page-style.php');
	
} //display_custom_field 

function protean_display_custom_field_banner(){ 
	global $post;
	$paramname="protean";
	$options = get_post_meta($post->ID, '_protean_option',true);
	include(get_template_directory().'/inc/banner-edit.php');
} //display_custom_field 

function protean_saveCustomFields( $post_id, $post ) {
	if ( $post->post_type != 'post' )return;
	
	if(isset($_POST['protean'])){
		foreach($_POST['protean'] as $k=>$opt){
			$options[$k] = esc_attr($opt);
		}
		update_post_meta( $post_id, '_protean_option', $options);
	}
} // save_custom_field