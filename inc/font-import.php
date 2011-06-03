<?php
// get theme option style
$fallbacks = get_option( 'protean_theme_options' );

// loop through all posts
if ( have_posts() ){
	while ( have_posts() ) : the_post();
		// get post style
		$options = get_post_meta($post->ID,'_protean_option',true);
		
		// keep fonts for banners
		if(isset($options['bannertitle_font']))
			$titlefont = $options['bannertitle_font'];
		
		if(isset($options['bannersubtitle_font']))	
			$subtitlefont = $options['bannersubtitle_font'];
			
		if(!isset($options['preset'])){
			
		}else if(($options['preset']!='custom' && $options['preset']!='')){
			// if use preset, get preset value
			$preset = get_option('protean_theme_presets');
			
			if(isset($options['preset']) && isset($preset[$options['preset']]) && is_array($preset[$options['preset']]))
				$options = $preset[$options['preset']];
		}
		if(isset($options['preset']) && $options['preset']=='default'){
			// if default = use theme option style
			$options = $fallbacks;
		}
		
		if(!isset($titlefont) || !$titlefont ||  !isset($subtitlefont) || !$subtitlefont || is_single()){
			// if no value for banner title, subtitle, or is a single post. include page style font		
			if(isset($options['font'])){
				wp_enqueue_style($options['font'],GOOGLE_FONT_URL.$options['font']);
			}else{
				wp_enqueue_style($fallbacks['font'],GOOGLE_FONT_URL.$fallbacks['font']);
			}
		}
		
		// if font or subtitle was set, enqueue them
		if(isset($titlefont))wp_enqueue_style($titlefont,GOOGLE_FONT_URL.$titlefont);
		if(isset($subtitlefont))wp_enqueue_style($subtitlefont,GOOGLE_FONT_URL.$subtitlefont);

	endwhile;// end posts loop
}
if(!is_single()){
	// if not single, include font form theme style 
	if($fallbacks['font'])wp_enqueue_style($fallbacks['font'],GOOGLE_FONT_URL.$fallbacks['font']);
}

?>