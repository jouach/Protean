jQuery(document).ready(function(){
	buildPreview(true);

	jQuery('#font_options').change(function(){
		buildPreview();
	});
	
	jQuery('#fontsize_options').change(function(){
		buildPreview();
	});
	
	var thiscol;
	jQuery('.protean_color_holder').click(function(){
		thiscol=jQuery(this);
	});

	jQuery('.protean_color_holder').each(function(){
		var $current = jQuery(this);
		jQuery(this).ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn(100);
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut(100);
				return false;
			},
			onBeforeShow: function () {
				jQuery(this).ColorPickerSetColor(thiscol.children('input[type=hidden]').val());
			},
			onChange: function (hsb, hex, rgb) {
				thiscol.children('div').css('backgroundColor', '#' + hex);
				thiscol.children('input[type=hidden]').val(hex);
				if(typeof window.buildPreview == 'function')buildPreview();
				if(typeof window.buildBanner == 'function')buildBanner();
			}
		});
	});

	jQuery('#protean_clear_background').click(function(e){
		e.preventDefault();
		jQuery('#protean_body_image').val('');
		buildPreview();
	});
	
	jQuery('#protean_save_as_preset').change(function(){
		if(jQuery(this).attr('checked')){
			jQuery('#protean_preset_name').show();
		}else{
			jQuery('#protean_preset_name').hide();
		}
	});
	
	jQuery('#protean_theme_presets').change(function(){
		if(jQuery(this).val() != "" && jQuery(this).val() != "custom" && jQuery(this).val() != 0){
			var p = presets[jQuery(this).val()];
			
			jQuery('#protean_body_color input[type=hidden]').val(p['color']);
			jQuery('#fontsize_options').val(p['fontsize']);
			jQuery('#font_options').val(p['font']);
			
			jQuery('#protean_body_text input[type=hidden]').val(p['text']);
			jQuery('#protean_body_link input[type=hidden]').val(p['link']);
			jQuery('#protean_body_hover input[type=hidden]').val(p['hover']);
			jQuery('#protean_body_image').val(p['bgimage']);
			
			jQuery('#protean_primary_color input[type=hidden]').val(p['primary_color']);
			jQuery('#protean_primary_text input[type=hidden]').val(p['primary_text']);
			jQuery('#protean_primary_link input[type=hidden]').val(p['primary_link']);
			jQuery('#protean_primary_hover input[type=hidden]').val(p['primary_hover']);
			
			jQuery('#protean_accent_color input[type=hidden]').val(p['accent_color']);
			jQuery('#protean_accent_text input[type=hidden]').val(p['accent_text']);
			jQuery('#protean_accent_link input[type=hidden]').val(p['accent_link']);
			jQuery('#protean_accent_hover input[type=hidden]').val(p['accent_hover']);
			
			jQuery('#protean_page_style .protean_color_holder').each(function(){
				jQuery(this).children('div').css('background-color','#'+jQuery(this).children('input[type=hidden]').val());
			});
			
			buildPreview(true);
		}
	});
});

function buildPreview(changepreset){
	if(!changepreset){
		jQuery('#protean_theme_presets option:first-child').attr('selected','selected');
	}
	jQuery('#preview_crib').css('background-color','#'+ jQuery('#protean_body_color input[type=hidden]').val());
	
	if(jQuery('#font_options').val())
		jQuery('#preview_crib').css('font-family', jQuery('#font_options').val().replace(/\+/g,' ').replace(/\:(.)*/,'') );
	
	jQuery('#preview_crib').css('color','#'+ jQuery('#protean_body_text input[type=hidden]').val());
	jQuery('#preview_crib a').css('color','#'+ jQuery('#protean_body_link input[type=hidden]').val());
	jQuery('#preview_crib a.hover').css('color','#'+ jQuery('#protean_body_hover input[type=hidden]').val());
	jQuery('#preview_crib').css('background-image','url('+ jQuery('#protean_body_image').val()+')');
	
	jQuery('#preview_crib .protean_preview_primary').css('background-color','#'+ jQuery('#protean_primary_color input[type=hidden]').val());
	jQuery('#preview_crib .protean_preview_primary').css('color','#'+ jQuery('#protean_primary_text input[type=hidden]').val());
	jQuery('#preview_crib .protean_preview_primary a').css('color','#'+ jQuery('#protean_primary_link input[type=hidden]').val());
	jQuery('#preview_crib .protean_preview_primary a.hover').css('color','#'+ jQuery('#protean_primary_hover input[type=hidden]').val());
	
	jQuery('#preview_crib .protean_preview_accent').css('background-color','#'+ jQuery('#protean_accent_color input[type=hidden]').val());
	jQuery('#preview_crib .protean_preview_accent').css('color','#'+ jQuery('#protean_accent_text input[type=hidden]').val());
	jQuery('#preview_crib .protean_preview_accent a').css('color','#'+ jQuery('#protean_accent_link input[type=hidden]').val());
	jQuery('#preview_crib .protean_preview_accent a.hover').css('color','#'+ jQuery('#protean_accent_hover input[type=hidden]').val());
	
	if(jQuery('#font_options').val())
		jQuery('#protean_example_text').css('font-family',jQuery('#font_options').val().replace(/\+/g,' ').replace(/\:(.)*/,''));
		
	jQuery('#protean_example_text').css('font-size', jQuery('#fontsize_options').val()+'px');
	
	if(jQuery('#font_options').val())
		jQuery('#protean_bannerwrapper').css('font-family',jQuery('#font_options').val().replace(/\+/g,' ').replace(/\:(.)*/,''));
		
}
