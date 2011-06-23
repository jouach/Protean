<?php 
/*---
Use when edit page style for posts and theme options
---*/ 
?>
<table class="protean_form_table" cellspacing="2" cellpadding="5" id="protean_page_style">
	<tbody>
		<tr class="form-field">
			<th valign="middle" scope="row"><label for="link_image"><strong><?php _e('Font:')?></label></th>
			<td>
				<select name="<?php echo $paramname; ?>[font]" id="font_options" class="fl_left">
					<?php echo  (isset($options['font']))?protean_font_option($options['font']):protean_font_option() ?>
				</select>
				<select name="<?php echo $paramname; ?>[fontsize]" id="fontsize_options"  class="fl_left">
					<?php echo  (isset($options['fontsize']))?protean_fontsize_option($options['fontsize']):protean_fontsize_option() ?>
				</select>
				<span class="protean_text_in_form" id="protean_example_text"> <?php _e('Example Text')?></span>
			</td>
			<td rowspan="6" width="220">
				<div class="protean_preview" id="preview_crib">
					<div class="protean_preview_left protean_preview_box protean_preview_primary"></div>
					<div class="protean_preview_right protean_preview_box protean_preview_accent"></div>
					
					<div class="protean_preview_banner">BANNER</div>
					<div class="protean_preview_right">
						<br/>TEXT + COMMENT<br/>
						<a href="#">LINK</a> / <a href="#" class="hover">HOVER</a><br/>
					</div>
					<div class="protean_preview_left protean_preview_box protean_preview_primary">INFO<br/><a href="#">LINKS</a><br/><a href="#" class="hover">HOVER</a></div>
					<div class="protean_preview_left protean_preview_box protean_preview_accent">TAGS<br/>(ACCENT)</div>
					
					<div class="protean_preview_left protean_preview_box protean_preview_primary">ABOUT</div>
					<div class="protean_preview_right protean_preview_box protean_preview_accent">TAGS CLOUD</div>
				</div>
				<p class="fl_right clear"><small><?php _e('Example only. Not to scale.')?></small></p>
			</td>
		</tr>
		<tr class="form-field">
			<th valign="middle" scope="row"><label for="rss_uri"><strong><?php _e('Body:')?></strong></label></th>
			<td>
				<div class="protean_color_holder" id="protean_body_color"><div style="background-color:#<?php echo (isset($options['color']))?$options['color']:'' ?>"></div>
				<input type="hidden" name="<?php echo $paramname; ?>[color]" value="<?php echo (isset($options['color']))?$options['color']:'' ?>" />
				</div>
				<span class="protean_text_in_form"><?php _e('with')?></span>
				<div class="protean_color_holder" id="protean_body_text"><div style="background-color:#<?php echo (isset($options['text']))?$options['text']:'' ?>"></div>
				<input type="hidden" name="<?php echo $paramname; ?>[text]" value="<?php echo (isset($options['text']))?$options['text']:'' ?>" />
				</div>
				<div class="protean_color_holder" id="protean_body_link"><div style="background-color:#<?php echo (isset($options['link']))?$options['link']:'' ?>"></div>
				<input type="hidden" name="<?php echo $paramname; ?>[link]" value="<?php echo (isset($options['link']))?$options['link']:'' ?>" />
				</div>
				<div class="protean_color_holder" id="protean_body_hover"><div style="background-color:#<?php echo (isset($options['hover']))?$options['hover']:'' ?>"></div>
				<input type="hidden" name="<?php echo $paramname; ?>[hover]" value="<?php echo (isset($options['hover']))?$options['hover']:'' ?>" />
				</div>
				<span class="protean_text_in_form">text/link/hover color</span>
			</td>
		</tr>
		<tr class="form-field">
			<th valign="middle" scope="row"><label for="link_notes"><strong>Primary:</strong></label></th>
			<td>
				<div class="protean_color_holder" id="protean_primary_color"><div style="background-color:#<?php echo (isset($options['primary_color']))?$options['primary_color']:'' ?>"></div>
				<input type="hidden" name="<?php echo $paramname; ?>[primary_color]" value="<?php echo (isset($options['primary_color']))?$options['primary_color']:'' ?>" />
				</div>
				<span class="protean_text_in_form">with</span>
				<div class="protean_color_holder" id="protean_primary_text"><div style="background-color:#<?php echo (isset($options['primary_text']))?$options['primary_text']:'' ?>"></div>
				<input type="hidden" name="<?php echo $paramname; ?>[primary_text]" value="<?php echo (isset($options['primary_text']))?$options['primary_text']:'' ?>" />
				</div>
				<div class="protean_color_holder" id="protean_primary_link"><div style="background-color:#<?php echo (isset($options['primary_link']))?$options['primary_link']:'' ?>"></div>
				<input type="hidden" name="<?php echo $paramname; ?>[primary_link]" value="<?php echo (isset($options['primary_link']))?$options['primary_link']:'' ?>" />
				</div>
				<div class="protean_color_holder" id="protean_primary_hover"><div style="background-color:#<?php echo (isset($options['primary_hover']))?$options['primary_hover']:'' ?>"></div>
				<input type="hidden" name="<?php echo $paramname; ?>[primary_hover]" value="<?php echo (isset($options['primary_hover']))?$options['primary_hover']:'' ?>" />
				</div>
				<span class="protean_text_in_form">text/link/hover color</span>
			</td>
		</tr>
		<tr class="form-field">
			<th valign="middle" scope="row"><label for="link_notes"><strong>Accent:</strong></label></th>
			<td>
				<div class="protean_color_holder" id="protean_accent_color"><div style="background-color:#<?php echo (isset($options['accent_color']))?$options['accent_color']:'' ?>"></div>
				<input type="hidden" name="<?php echo $paramname; ?>[accent_color]" value="<?php echo (isset($options['accent_color']))?$options['accent_color']:'' ?>" />
				</div>
				<span class="protean_text_in_form">with</span>
				<div class="protean_color_holder" id="protean_accent_text"><div style="background-color:#<?php echo (isset($options['accent_text']))?$options['accent_text']:'' ?>"></div>
				<input type="hidden" name="<?php echo $paramname; ?>[accent_text]" value="<?php echo (isset($options['accent_text']))?$options['accent_text']:'' ?>" />
				</div>
				<div class="protean_color_holder" id="protean_accent_link"><div style="background-color:#<?php echo (isset($options['accent_link']))?$options['accent_link']:'' ?>"></div>
				<input type="hidden" name="<?php echo $paramname; ?>[accent_link]" value="<?php echo (isset($options['accent_link']))?$options['accent_link']:'' ?>" />
				</div>
				<div class="protean_color_holder" id="protean_accent_hover"><div style="background-color:#<?php echo (isset($options['accent_hover']))?$options['accent_hover']:'' ?>"></div>
				<input type="hidden" name="<?php echo $paramname; ?>[accent_hover]" value="<?php echo (isset($options['accent_hover']))?$options['accent_hover']:'' ?>" />
				</div>
				<span class="protean_text_in_form">text/link/hover color</span>
			</td>
		</tr>
		<tr class="form-field">
			<th valign="middle" scope="row"><label for="link_notes"><strong>Bkgd:</strong></label></th>
			<td>
				<input id="protean_body_image" type="hidden" name="<?php echo $paramname; ?>[bgimage]" value="<?php echo (isset($options['bgimage']))?$options['bgimage']:'' ?>" />
				<button rel="protean_body_image" type="button" class="pretean_open_filemanager button-secondary fl_left">Choose image</button> 
				<span class="protean_text_in_form">(overrides body color) - <a href="#" id="protean_clear_background">Clear Background Image</a></span>
			</td>
		</tr>
		<!--tr>
			<th valign="middle" scope="row"><label for="link_notes"><strong></strong></label></th>
			<td>
				<span class="protean_text_in_form"><input type="checkbox" name="protean_save_as_preset" value="1" id="protean_save_as_preset" /> <label for="protean_save_as_preset">Save as Preset</label></span>
				<div id="protean_preset_name"><input type="text" name="protean_preset_name" placeholder="Preset name" /></div>
			</td>
		</tr-->
		<tr>
			<td colspan="2" style="padding: 0 5px;"><hr/></td>
		</tr>
		<tr class="form-field">
			<th valign="middle" scope="row"><label for="link_notes"><strong>Presets:</strong></label></th>
			<td>
				<select class="fl_left" name="<?php echo $paramname; ?>[preset]" id="protean_theme_presets">
					<option value="custom">Choose preset</option>
					<?php if(isset($pagename) && $pagename=="editpost"){ ?>
						<option value="default" <?php if(!isset($options['preset']) || $options['preset']=='default')echo 'selected="selected"' ?>>Same as Theme Style</option>
					<?php } ?>
				</select>
				<span class="protean_text_in_form">(overrides everything)</span>
			</td>
		</tr>
	</tbody>
</table>
<script type="text/javascript">
var presets = new Array();
jQuery(document).ready(function(){
	<?php
	if(isset($pagename) && $pagename=="editpost"){ ?>
		presets['default'] = <?php echo json_encode(get_option( 'protean_theme_options' )) ?>;
	<?php 
	}
	$presets = get_option('protean_theme_presets');
	$i=2;
	foreach($presets as $k=>$v){ ?>
		jQuery('#protean_theme_presets').append('<option value="<?php echo $k ?>" <?php if(isset($options['preset']) && $options['preset']==$k)echo 'selected="selected"' ?> ><?php echo $v['name'] ?></option>');
		presets['<?php echo $k ?>'] = <?php echo json_encode($v) ?>;
	<?php $i++;
	} //end for ?>
	jQuery('#protean_theme_presets').trigger('change');
});
</script>