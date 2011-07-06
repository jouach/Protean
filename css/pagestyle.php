<?php
header("Content-type: text/css");

if(isset($_GET['id']))
	$postid = $_GET['id'];

if(isset($_GET['ids']))
	$postids = $_GET['ids'];
	
/*------------------Page Option --------------------*/
// get theme option style
$fallbacks = get_option( 'protean_theme_options' );
if(isset($postid) && $postid){ 
	// is single post, use post style
	$options = get_post_meta($postid,'_protean_option',true);
}else{
	// not single post, use theme option style
	$options = $fallbacks; 
}
if(!isset($options['preset'])){
	$options = $fallbacks;
}else if(($options['preset']!='custom' && $options['preset']!='')){
	// if use preset, get preset value
	$preset = get_option('protean_theme_presets');
	if(isset($preset[$options['preset']]) && is_array($preset[$options['preset']]))
		$options = $preset[$options['preset']];		
}
if(isset($options['preset']) && ($options['preset']=='default' || $options['preset']=='')){
	// if use default theme style, page option = themestyle
	$options = $fallbacks; 
} ?>
body{
<?php
	if(isset($options['color']))printStyle('background-color: #',';',$options['color']);
	if(isset($options['bgimage']))printStyle('background-image: url(',');',$options['bgimage']);
	if(isset($options['fontsize']))printStyle('font-size: ','px;',$options['fontsize']);
	if(isset($options['text']))printStyle('color: #',';',$options['text']);
?>
}
body, input, textarea{
<?php
	if(isset($options['font']))printStyle('font-family: ',';',$options['font'],false,true);
?>
}
a{
<?php
	if(isset($options['link']))printStyle('color: #',';',$options['link']);
?>
}
a:hover{
<?php
	if(isset($options['hover']))printStyle('color: #',';',$options['hover']);
?>
}
blockquote {
<?php
	if(isset($options['primary_color']))printStyle('border-left: 2px solid #',';',$options['primary_color']);
?>
}
td,th { 
<?php
	if(isset($options['accent_color']))printStyle('border: 1px solid #',';',$options['accent_color']);
?>
}
input[type=text],input[type=password],input[type=submit],input[type=button], button
{
<?php
	if(isset($options['accent_color']))printStyle('background: #',';',$options['accent_color']);
	if(isset($options['accent_text']))printStyle('color: #',';',$options['accent_text']);
?>
}
input::-webkit-input-placeholder {
<?php
	if(isset($options['accent_text']))printStyle('color: #',';',$options['accent_text']);
?>
}
input:-moz-placeholder{
<?php
	if(isset($options['accent_text']))printStyle('color: #',';',$options['accent_text']);
?>
}
input:placeholder{
<?php
	if(isset($options['accent_text']))printStyle('color: #',';',$options['accent_text']);
?>
}
input[type=submit]:hover,input[type=button]:hover, button:hover{
<?php
	if(isset($options['primary_color']))printStyle('background: #',';',$options['primary_color']);
	if(isset($options['primary_text']))printStyle('color: #',';',$options['primary_text']);
?>
}
/***** PRIMARY COLOR *****/
.primary{
<?php
	if(isset($options['primary_color']))printStyle('background: #',';',$options['primary_color']);
	if(isset($options['primary_text']))printStyle('color: #',';',$options['primary_text']);
?>
}
.primary a{
<?php
	if(isset($options['primary_link']))printStyle('color: #',';',$options['primary_link']);
?>
}
.primary a:hover{
<?php
	if(isset($options['primary_hover']))printStyle('color: #',';',$options['primary_hover']);
?>
}
a.primary, .boxlink_wrap a{
<?php
	if(isset($options['primary_text']))printStyle('color: #',';',$options['primary_text']);
?>
}
a.primary:hover,button.primary:hover,input[type="submit"].primary:hover,input[type="reset"].primary:hover,input[type="button"].primary:hover{
	/* FROM ACCENT */
<?php
	if(isset($options['accent_color']))printStyle('background: #',';',$options['accent_color']);
	if(isset($options['accent_text']))printStyle('color: #',';',$options['accent_text']);
?>
}
hr{
<?php
	if(isset($options['primary_color']))printStyle('background: #',';',$options['primary_color']);
?>
}
#topnav li a:hover,#topnav li.current_page_item a{
<?php
	if(isset($options['primary_color']))printStyle('background: #',';',$options['primary_color']);
	if(isset($options['primary_text']))printStyle('color: #',';',$options['primary_text']);
?>
}
/***** ACCENT COLOR *****/
.accent, .boxlink_wrap a{
<?php
	if(isset($options['accent_color']))printStyle('background: #',';',$options['accent_color']);
	if(isset($options['accent_text']))printStyle('color: #',';',$options['accent_text']);
?>
}
.accent a{
<?php
	if(isset($options['accent_link']))printStyle('color: #',';',$options['accent_link']);
?>
}
.accent a:hover{
<?php
	if(isset($options['accent_hover']))printStyle('color: #',';',$options['accent_hover']);
?>
}
a.accent{
<?php
	if(isset($options['accent_text']))printStyle('color: #',';',$options['accent_text']);
?>
}
a.accent:hover,button.accent:hover, input[type="submit"].accent:hover, input[type="reset"].accent:hover, input[type="button"].accent:hover, .boxlink_wrap a:hover{
	/* FROM PRIMARY */
<?php
	if(isset($options['primary_color']))printStyle('background: #',';',$options['primary_color']);
	if(isset($options['primary_text']))printStyle('color: #',';',$options['primary_text']);
?>
}
#topnav li a{
<?php
	if(isset($options['accent_color']))printStyle('background: #',';',$options['accent_color']);
	if(isset($options['accent_text']))printStyle('color: #',';',$options['accent_text']);
?>
}
/***** Emblematic *****/
#emblematic div{
<?php
	if(isset($options['accent_color']))printStyle('background: #',';',$options['accent_color']);
?>
}
#emblematic div:nth-child(-n+4){
<?php
	if(isset($options['primary_color']))printStyle('background: #',';',$options['primary_color']);
?>
}
#emblematic:hover div{
<?php
	if(isset($options['accent_color']))printStyle('background: #',';',$options['accent_color']);
?>
}
/****** WIDGET ******/
.widget ul li, div#calendar_wrap, .textwidget, .widget_nav_menu ul.menu{
<?php
	if(isset($options['primary_color']))printStyle('background: #',';',$options['primary_color']);
	if(isset($options['primary_text']))printStyle('color: #',';',$options['primary_text']);
?>
}
.widget ul li a, div#calendar_wrap a, .widget_nav_menu ul.menu a{
<?php
	if(isset($options['primary_link']))printStyle('color: #',';',$options['primary_link']);
?>
}
.widget ul li a:hover, div#calendar_wrap a:hover, .widget_nav_menu ul.menu a:hover{
<?php
	if(isset($options['primary_hover']))printStyle('color: #',';',$options['primary_hover']);
?>
}
.widget_title{
<?php
	if(isset($options['accent_color']))printStyle('background: #',';',$options['accent_color']);
	if(isset($options['accent_text']))printStyle('color: #',';',$options['accent_text']);
?>
}
<?php 
/*--------------End Page Option --------------------*/

/*----------------- Banners ------------------------*/
if(isset($postid)) $ids[] = $postid;
else if($postids)  $ids = explode(',',$postids);
foreach($ids as $id){
	$style = get_post_meta($id,'_protean_option',true);
?>
#post-banner-<?php echo $id ?>{
<?php
	if(isset($style['banner_height']))printStyle('height: ','px;',$style['banner_height']);
	if(isset($style['banner_bgimage']))printStyle('background-image: url(',');',$style['banner_bgimage']);
	if(isset($style['banner_bgcolor']))printStyle('background-color: #',';',$style['banner_bgcolor']);
	if(isset($style['banner_border']))printStyle('border-width: ','px;',$style['banner_border']);
	if(isset($style['banner_bordercolor']))printStyle('border-color: #',';',$style['banner_bordercolor']);
	if(isset($style['banner_border']))printStyle('width: ','px;',870-($style['banner_border']*2));
?>
}
#post-banner-<?php echo $id ?> .protean_banner_title{
<?php
	if(isset($style['bannertitle_y']))printStyle('top: ','px;',$style['bannertitle_y']);
	if(isset($style['bannertitle_x']))printStyle('left: ','px;',$style['bannertitle_x']);
	if(isset($style['bannertitle_height']))printStyle('height: ','px;',$style['bannertitle_height']);
	if(isset($style['bannertitle_width']))printStyle('width: ','px;',$style['bannertitle_width']);
	
	if(isset($style['bannertitle_font']))printStyle('font-family: ',';',$style['bannertitle_font'],getPostFont($id),true);
	if(isset($style['bannertitle_color']))printStyle('color: #',';',$style['bannertitle_color'], '444');
	
	if(isset($style['bannertitle_fontsize']))printStyle('font-size: ','px;',$style['bannertitle_fontsize']);
	if(isset($style['bannertitle_lineheight']))printStyle('line-height: ','em;',$style['bannertitle_lineheight']);
	if(isset($style['bannertitle_shadow']))printStyle('text-shadow: ',';',$style['bannertitle_shadow']);
	if(isset($style['bannertitle_align']))printStyle('text-align: ',';',$style['bannertitle_align']);
?>
}
#post-banner-<?php echo $id ?> .protean_banner_title a,#post-banner-<?php echo $id ?> .protean_banner_title a:hover{
<?php 
	if(isset($style['bannertitle_color']))printStyle('color: #',';',$style['bannertitle_color'], '444'); 
?>
}
#post-banner-<?php echo $id ?> .protean_banner_subtitle{
<?php
	if(isset($style['bannersubtitle_y']))printStyle('top: ','px;',$style['bannersubtitle_y']);
	if(isset($style['bannersubtitle_x']))printStyle('left: ','px;',$style['bannersubtitle_x']);
	if(isset($style['bannersubtitle_height']))printStyle('height: ','px;',$style['bannersubtitle_height']);
	if(isset($style['bannersubtitle_width']))printStyle('width: ','px;',$style['bannersubtitle_width']);
	
	if(isset($style['bannersubtitle_font']))printStyle('font-family: ',';',$style['bannersubtitle_font'],getPostFont($id),true);
	if(isset($style['bannersubtitle_color']))printStyle('color: #',';',$style['bannersubtitle_color'], '444');
	if(isset($style['bannersubtitle_fontsize']))printStyle('font-size: ','px;',$style['bannersubtitle_fontsize']);
	if(isset($style['bannersubtitle_lineheight']))printStyle('line-height: ','em;',$style['bannersubtitle_lineheight']);
	if(isset($style['bannersubtitle_shadow']))printStyle('text-shadow: ',';',$style['bannersubtitle_shadow']);
	if(isset($style['bannersubtitle_align']))printStyle('text-align: ',';',$style['bannersubtitle_align']);
?>
}
#post-banner-<?php echo $id ?> .protean_banner_fill span{
<?php
	if(isset($style['bannerbutton_y']))printStyle('top: ','px;',$style['bannerbutton_y']);
	if(isset($style['bannerbutton_x']))printStyle('left: ','px;',$style['bannerbutton_x']);
	if((isset($style['bannerbutton_y']) && $style['bannerbutton_y'] !='') && (isset($style['bannerbutton_x']) && $style['bannerbutton_x']!='')){ ?>
	right: auto;
	bottom: auto;
<?php } ?>
}
<?php 
} 
function printStyle($before, $after, $style, $fallback = null, $isFont = false){
	if( $style){
		if($isFont)$style = '"'.fontForCss($style).'"';
		echo $before.$style.$after;
	}else if($fallback){
		if($isFont)$fallback = '"'.fontForCss($fallback).'"';
		echo $before.$fallback.$after;
	}
}

function fontForCss($font){
	if($font)
		return preg_replace('/\:(.*)/','',str_replace('+',' ',$font));
}

function getPostFont($id){
	$options = get_post_meta($id,'_protean_option',true);
	
	if(isset($options['preset']) &&  ( $options['preset']!='custom' && $options['preset']!='default' && $options['preset']!='')){
		// if use preset, get preset value
		$preset = get_option('protean_theme_presets');
		if(is_array($preset[$options['preset']]))
			$options = $preset[$options['preset']];		
	}
	if(isset($options['preset']) && ($options['preset']=='default' || $options['preset']=='')){
		// if use default theme style, page option = themestyle
		$options = $fallbacks; 
	}
	return $options['font'];
}
?>