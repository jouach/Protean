<?php
// init fonts option, only run once
add_option('protean_theme_options', $original_theme_style);
add_option('protean_theme_presets', $original_preset);

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

$content_width = 580;

// Load up the menu page
function theme_options_add_page() {
	add_theme_page( __( 'Protean Options' ), __( 'Protean Options' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}
// Init plugin options to white list our options
function theme_options_init(){
	register_setting( 'protean_options', 'protean_theme_options', 'theme_options_validate' );
	if(isset($_GET['page']) && $_GET['page']=='theme_options'){
		// for color picker
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-draggable');
		wp_enqueue_script('jquery-ui-resizable');
		wp_enqueue_script('jquery_colorpicker', get_template_directory_uri().'/js/colorpicker/js/colorpicker.js' );
		wp_enqueue_style('jquery_colorpicker', get_template_directory_uri().'/js/colorpicker/css/colorpicker.css' );
		
		// for background image selection
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_enqueue_script('my-upload');
		wp_enqueue_style('thickbox');
		
		// custom javascript and stylesheet
		wp_enqueue_style('protean_admin', get_template_directory_uri().'/css/admin.css' );
		
		wp_enqueue_script('file_manager', get_template_directory_uri().'/js/file_manager.js' );
		wp_enqueue_script('protean_theme_option', get_template_directory_uri().'/js/theme_option.js' );
		wp_enqueue_script('protean_page_style', get_template_directory_uri().'/js/page_style.js' );
		
		// to include font stylesheets
		$options = get_option('protean_theme_options');
		$fonts = $options['fonts'];
		foreach($fonts as $f){
			wp_enqueue_style($f,GOOGLE_FONT_URL.$f);
		}
	}
}
// show theme options form
function theme_options_do_page() { 
	if ( ! isset( $_REQUEST['settings-updated'] ) )$_REQUEST['settings-updated'] = false;
	wp_tiny_mce( false );
?>
<div class="wrap">
	<h2><?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options' ) . "</h2>"; ?></h2>
	
	<?php if ( false !== $_REQUEST['settings-updated'] ){ ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
	<?php } ?>
	
	<?php $options = get_option( 'protean_theme_options' ); ?>
	<form method="post" action="options.php"> 
	<?php settings_fields( 'protean_options' ); ?>
	<div class="metabox-holder">
		<div class="postbox">
			<h3 class="hndle"><span>Protean: default</span></h3>
			<div class="inside">
				<?php $paramname="protean_theme_options"; ?>
				<?php include(get_template_directory().'/inc/page-style.php') ?>
			</div>
		</div>
		<div class="postbox">
			<h3 class="hndle"><span>Protean: options</span></h3>
			<div class="inside">
				<table class="protean_form_table" cellspacing="2" cellpadding="5">
					<tbody>
						<tr>
							<th valign="top" scope="row"><label for="link_image"><strong>Header:</label></th>
							<td>
								<input type="radio" name="protean_theme_options[header]" value="tagline" id="header_tagline" <?php if(isset($options['header']) &&  $options['header']=='tagline')echo 'checked="checked"' ?> /> 
								<label for="header_tagline"><img src="<?php echo get_template_directory_uri() ?>/images/text.gif" alt="text" class="protean_option_image"  /> 
								Site title and tagline (see <a href="/wp-admin/options-general.php">General Settings</a>)</label>
								<p><input type="radio" name="protean_theme_options[header]" value="emblem" id="header_emblem" <?php if(isset($options['header']) &&  $options['header']=='emblem')echo 'checked="checked"' ?> /> 
								<label for="header_emblem"><img src="<?php echo get_template_directory_uri() ?>/images/emble.gif" alt="emble" class="protean_option_image"  /> 
								Emblematic</label></p>
							</td>
						</tr>
						<tr>
							<td colspan="2"><hr/></td>
						</tr>
						<tr>
							<th valign="top" scope="row"><label for="link_notes"><strong>Footer:</strong></label></th>
							<td>
								<div>
								<input type="hidden" name="protean_theme_options[showabout]" value="0" />
								<input type="checkbox" name="protean_theme_options[showabout]" id="protean_footer_showabout" 
								<?php if(isset($options['showabout']) && $options['showabout']=='1')echo 'checked="checked"' ?> value="1" />
								<label for="protean_footer_showabout"> Enable Protean footer with About message:</label>
								</div>
								<div id="protean_about_textbox">
									<textarea id="protean_footer_about" class="protean_footer_about" class="large-text" cols="30" rows="5" name="protean_theme_options[aboutblog]"><?php if(isset($options['aboutblog']))echo stripslashes($options['aboutblog']); ?></textarea>
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="2"><hr/></td>
						</tr>
						<tr>
							<th valign="top" scope="row"><label for="link_image"><strong>Top Menu:</label></th>
							<td>
								<input type="radio" id="enable_menu" name="protean_theme_options[menu]" value="1" <?php if(isset($options['menu']) &&  $options['menu']=='1')echo 'checked="checked"' ?> /> 
								<label for="enable_menu"> Show menu</label>
								<input type="radio" id="disable_menu" name="protean_theme_options[menu]" value="0" <?php if(!isset($options['menu']) ||   $options['menu']=='0')echo 'checked="checked"' ?> /> 
								<label for="disable_menu"> Hide menu</label>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="postbox">
			<h3 class="hndle"><span>Protean: font library - Powered by Google Web Fonts</span></h3>
			<div class="inside">
				<ul id="protean_font_table">
					<?= protean_font_manage() ?>
				</ul>
				<div id="protean_font_add">
					<table class="protean_form_table" cellspacing="2" cellpadding="5">
						<tbody>
							<tr class="form-field">
								<th valign="top" scope="row"><label for="link_image"><strong>Add font:</label></th>
								<td>
								<input type="text" placeholder="Cabin+Sketch:bold" id="protean_new_font" style="display:inline;width:300px;" />
								<button id="protean_add_font" class="button-secondary">Add</button>
								<p>Enter an API parameter name from <a href="http://www.google.com/webfonts" target="_blank">Google Web Font [&#x279A;]</a></p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<p><input type="submit" name="Submit" class="button-primary" value="Save Changes" /></p>
	</form>
</div>
<?php
}
// validate input. Accepts an array, return an array.
function theme_options_validate( $input ) {
	$input['aboutblog'] = wp_filter_post_kses( $input['aboutblog'] );
	/*
	if($_POST['protean_save_as_preset']==1)
		savePreset($_POST['protean_theme_options'],$_POST['protean_preset_name']);
	*/
	return $input;
}
?>