<?php 
/*---
Use when edit banner for posts
---*/ 
?>
<div id="protean_bannerwrapper">
	<div id="protean_banner">
		<div id="protean_banner_background"></div>
		<div id="protean_banner_title">
			<h1><?php the_title(); ?></h1>
		</div>
		<div id="protean_banner_subtitle">
		<p><time  datetime="<?php the_time('Y-m-d'); ?>">[<?php the_time('F j, Y'); ?>]</time> <?php echo get_the_excerpt(); ?></p>
		</div>
		<div id="protean_banner_button">Read more</div>
	</div><!-- protean_banner -->
</div><!-- protean_bannerwrapper -->

<input type="hidden" name="<?php echo $paramname; ?>[bannertitle_x]" id="protean_bannertitle_posx" value="<?php echo (isset($options['bannertitle_x']))?$options['bannertitle_x']:'' ?>" />
<input type="hidden" name="<?php echo $paramname; ?>[bannertitle_y]" id="protean_bannertitle_posy" value="<?php echo (isset($options['bannertitle_y']))?$options['bannertitle_y']:'' ?>" />
<input type="hidden" name="<?php echo $paramname; ?>[bannertitle_width]" id="protean_bannertitle_width" value="<?php echo (isset($options['bannertitle_width']))?$options['bannertitle_width']:'' ?>" />
<input type="hidden" name="<?php echo $paramname; ?>[bannertitle_height]" id="protean_bannertitle_height" value="<?php echo (isset($options['bannertitle_height']))?$options['bannertitle_height']:'' ?>" />
<input type="hidden" name="<?php echo $paramname; ?>[bannersubtitle_x]" id="protean_bannersubtitle_posx" value="<?php echo (isset($options['bannersubtitle_x']))?$options['bannersubtitle_x']:'' ?>" />
<input type="hidden" name="<?php echo $paramname; ?>[bannersubtitle_y]" id="protean_bannersubtitle_posy" value="<?php echo (isset($options['bannersubtitle_y']))?$options['bannersubtitle_y']:'' ?>" />
<input type="hidden" name="<?php echo $paramname; ?>[bannersubtitle_width]" id="protean_bannersubtitle_width" value="<?php echo (isset($options['bannersubtitle_width']))?$options['bannersubtitle_width']:'' ?>" />
<input type="hidden" name="<?php echo $paramname; ?>[bannersubtitle_height]" id="protean_bannersubtitle_height" value="<?php echo (isset($options['bannersubtitle_height']))?$options['bannersubtitle_height']:'' ?>" />
<input type="hidden" name="<?php echo $paramname; ?>[banner_height]" id="protean_bannerheight" value="<?php echo (isset($options['banner_height']))?$options['banner_height']:'' ?>" />
<input type="hidden" name="<?php echo $paramname; ?>[bannerbutton_x]" id="protean_bannerbutton_posx" value="<?php echo (isset($options['bannerbutton_x']))?$options['bannerbutton_x']:'' ?>" />
<input type="hidden" name="<?php echo $paramname; ?>[bannerbutton_y]" id="protean_bannerbutton_posy" value="<?php echo (isset($options['bannerbutton_y']))?$options['bannerbutton_y']:'' ?>" />

<p class="fl_right"><?php _e('Banner dimensions: 870px with variable height')?></p>

<table class="protean_form_table" cellspacing="2" cellpadding="5" id="protean_banner_options">
	<tbody>
		<tr class="form-field">
			<th valign="middle" scope="row"><label for="link_notes"><strong><?php _e('Banner:')?></strong></label></th>
			<td>
				<input id="protean_banner_bgimage" type="hidden" name="<?php echo $paramname; ?>[banner_bgimage]" value="<?php echo (isset($options['banner_bgimage']))?$options['banner_bgimage']:'' ?>" />
				<button type="button" class="pretean_open_filemanager button-secondary fl_left" style="width: 90px;" rel="protean_banner_bgimage"><?php _e('Choose image')?></button> 
				<span class="protean_text_in_form">or</span>
				<div class="protean_color_holder" id="protean_banner_bgcolor">
					<div style="background-color:#<?php echo (isset($options['banner_bgcolor']))?$options['banner_bgcolor']:'' ?>"></div>
					<input type="hidden" name="<?php echo $paramname; ?>[banner_bgcolor]" value="<?php echo (isset($options['banner_bgcolor']))?$options['banner_bgcolor']:'' ?>" />
				</div>
				<span class="protean_text_in_form"><a href="#" id="protean_clear_bannerbgimage"><?php _e('Clear Background Image')?></a></span>
			</td>
		</tr>
		<tr class="form-field">
			<th valign="middle" scope="row"><label for="link_notes"><strong><?php _e('Border:')?></strong></label></th>
			<td>
				<select name="<?php echo $paramname; ?>[banner_border]" id="protean_banner_border" class="fl_left" style="width:105px;margin: 0 5px 0 0;">
					<?php echo  (isset($options['banner_border']))?bannerBorder($options['banner_border']):bannerBorder() ?>
				</select>
				<span class="protean_text_in_form"> in </span>
				<div class="protean_color_holder" id="protean_banner_bordercolor">
					<div style="background-color:#<?php echo (isset($options['banner_bordercolor']))?$options['banner_bordercolor']:'' ?>"></div>
					<input type="hidden" name="<?php echo $paramname; ?>[banner_bordercolor]" value="<?php echo (isset($options['banner_bordercolor']))?$options['banner_bordercolor']:'' ?>" />
				</div>
			</td>
		</tr>
		<tr class="form-field">
			<th valign="middle" scope="row"><label for="link_image"><strong><?php _e('Title:')?></label></th>
			<td>
				<select name="<?php echo $paramname; ?>[bannertitle_font]" id="protean_bannertitle_font" class="fl_left" style="width:150px;">
					<option value=""><?php _e('Same as page style')?></option>
					<?php echo  (isset($options['bannertitle_font']))?protean_font_option($options['bannertitle_font']):protean_font_option() ?>
				</select>
				<select name="<?php echo $paramname; ?>[bannertitle_fontsize]" id="protean_bannertitle_fontsize"  class="fl_left">
					<option value="16"><?php _e('Default')?></option>
					<?php echo  (isset($options['bannertitle_fontsize']))?protean_fontsize_option($options['bannertitle_fontsize']):protean_fontsize_option() ?>
				</select>
				<div class="protean_color_holder" id="protean_bannertitle_color">
					<div style="background-color:#<?php echo (isset($options['bannertitle_color']))?$options['bannertitle_color']:'' ?>"></div>
					<input type="hidden" name="<?php echo $paramname; ?>[bannertitle_color]" value="<?php echo (isset($options['bannertitle_color']))?$options['bannertitle_color']:'' ?>" />
				</div>
				<select name="<?php echo $paramname; ?>[bannertitle_lineheight]" id="protean_bannertitle_lineheight" class="fl_left">
					<option value="1.5"><?php _e('Default')?></option>
					<?php echo  (isset($options['bannertitle_lineheight']))?lineHeightOptions($options['bannertitle_lineheight']):lineHeightOptions() ?>
				</select>
				<select name="<?php echo $paramname; ?>[bannertitle_shadow]" id="protean_bannertitle_shadow" class="fl_left">
					<option value=""><?php _e('None')?></option>
					<?php echo  (isset($options['bannertitle_shadow']))?textShadowOptions($options['bannertitle_shadow']):textShadowOptions() ?>
				</select>
				<select name="<?php echo $paramname; ?>[bannertitle_align]" id="protean_bannertitle_align" class="fl_left">
					<?php echo  (isset($options['bannertitle_align']))?textAlign($options['bannertitle_align']):textAlign() ?>
				</select>
			</td>
		</tr>
		<tr class="form-field">
			<th valign="middle" scope="row"><label for="link_image"><strong><?php _e('Subtitle:')?></label></th>
			<td>
				<select name="<?php echo $paramname; ?>[bannersubtitle_font]" id="protean_bannersubtitle_font" class="fl_left" style="width:150px;">
					<option value=""><?php _e('Same as page style')?></option>
					<?php echo  (isset($options['bannersubtitle_font']))?protean_font_option($options['bannersubtitle_font']):protean_font_option() ?>
				</select>
				<select name="<?php echo $paramname; ?>[bannersubtitle_fontsize]" id="protean_bannersubtitle_fontsize"  class="fl_left">
					<option value="14"><?php _e('Default')?></option>
					<?php echo  (isset($options['bannersubtitle_fontsize']))?protean_fontsize_option($options['bannersubtitle_fontsize']):protean_fontsize_option() ?>
				</select>
				<div class="protean_color_holder" id="protean_bannersubtitle_color">
					<div style="background-color:#<?php echo (isset($options['bannersubtitle_color']))?$options['bannersubtitle_color']:'' ?>"></div>
					<input type="hidden" name="<?php echo $paramname; ?>[bannersubtitle_color]" value="<?php echo (isset($options['bannersubtitle_color']))?$options['bannersubtitle_color']:'' ?>" />
				</div>
				<select name="<?php echo $paramname; ?>[bannersubtitle_lineheight]" id="protean_bannersubtitle_lineheight" class="fl_left">
					<option value="1.5"><?php _e('Default')?></option>
					<?php echo  (isset($options['bannersubtitle_lineheight']))?lineHeightOptions($options['bannersubtitle_lineheight']):lineHeightOptions() ?>
				</select>
				<select name="<?php echo $paramname; ?>[bannersubtitle_shadow]" id="protean_bannersubtitle_shadow" class="fl_left">
					<option value=""><?php _e('None')?></option>
					<?php echo  (isset($options['bannersubtitle_shadow']))?textShadowOptions($options['bannersubtitle_shadow']):textShadowOptions() ?>
				</select>
				<select name="<?php echo $paramname; ?>[bannersubtitle_align]" id="protean_bannersubtitle_align" class="fl_left">
					<?php echo  (isset($options['bannersubtitle_align']))?textAlign($options['bannersubtitle_align']):textAlign() ?>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><small><?php _e('To edit subtitle, please see post Excerpt.')?></small></td>
		</tr>
	</tbody>
</table>