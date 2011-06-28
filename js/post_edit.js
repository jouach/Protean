var bannerMaxWidth;
jQuery(document).ready(function(){
	protean_initBanner();
	protean_buildBanner();

	jQuery('#title').keyup(function(){
		jQuery('#protean_banner_title h1').text(jQuery(this).val());
	});
	
	jQuery('#excerpt').keyup(function(){
		jQuery('#protean_banner_subtitle p').html('<time>[#POST DATE#]</time> '+jQuery(this).val());
	});

	jQuery("#protean_banner_title").draggable({ 
		containment: '#protean_banner',
	    stop: function() {
	        jQuery('#protean_bannertitle_posx').val(jQuery(this).position().left);
	        jQuery('#protean_bannertitle_posy').val(jQuery(this).position().top);
	    } 
	}).resizable({ 
		containment: '#protean_banner',
	    stop: function(){
			jQuery('#protean_bannertitle_width').val(jQuery(this).width());
	        jQuery('#protean_bannertitle_height').val(jQuery(this).height());
	    }
	});
	
	jQuery("#protean_banner_subtitle").draggable({ 
		containment: '#protean_banner',
	    stop: function() {
	        jQuery('#protean_bannersubtitle_posx').val(jQuery(this).position().left);
	        jQuery('#protean_bannersubtitle_posy').val(jQuery(this).position().top);
	    } 
	}).resizable({ 
		containment: '#protean_banner',
	    stop: function(){
	        jQuery('#protean_bannersubtitle_width').val(jQuery(this).width());
	        jQuery('#protean_bannersubtitle_height').val(jQuery(this).height());
	    }
	});
	
	jQuery("#protean_banner_button").draggable({ 
		containment: '#protean_banner',
		start: function(){
			jQuery('#protean_banner_button').css('bottom','auto');
			jQuery('#protean_banner_button').css('right','auto');
		},
	    stop: function() {
	        jQuery('#protean_bannerbutton_posx').val(jQuery(this).position().left);
	        jQuery('#protean_bannerbutton_posy').val(jQuery(this).position().top);
	    } 
	});
	
	jQuery('#protean_banner_options select').change(function(){
		protean_buildBanner();
	});
	
	jQuery('#protean_clear_bannerbgimage').click(function(e){
		e.preventDefault();
		jQuery('#protean_banner_bgimage').val('');
		protean_buildBanner();
	});
});

function protean_buildBanner(){
	bannerMaxWidth = 870-(jQuery('#protean_banner_border').val()*2);
	jQuery('#protean_banner_background').css('background-image','url('+jQuery('#protean_banner_bgimage').val()+')');
	jQuery('#protean_banner_background').css('background-color','#'+jQuery('#protean_banner_bgcolor input').val());
	jQuery('#protean_banner_background').css('width',870-(jQuery('#protean_banner_border').val()*2)+"px");
	jQuery('#protean_banner_background').css('border-width',jQuery('#protean_banner_border').val()+"px");
	jQuery('#protean_banner_background').css('border-color','#'+jQuery('#protean_banner_bordercolor input').val());
	
	jQuery('#protean_banner_title h1').css('font-family',jQuery('#protean_bannertitle_font').val().replace(/\+/g,' ').replace(/\:(.)*/,''));
	jQuery('#protean_banner_title h1').css('font-size',jQuery('#protean_bannertitle_fontsize').val()+'px');
	jQuery('#protean_banner_title h1').css('color','#'+jQuery('#protean_bannertitle_color input').val());
	jQuery('#protean_banner_title h1').css('line-height',jQuery('#protean_bannertitle_lineheight').val()+'em');
	jQuery('#protean_banner_title h1').css('text-shadow',jQuery('#protean_bannertitle_shadow').val());
	jQuery('#protean_banner_title h1').css('text-align',jQuery('#protean_bannertitle_align').val());
	
	jQuery('#protean_banner_subtitle p').css('font-family',jQuery('#protean_bannersubtitle_font').val().replace(/\+/g,' ').replace(/\:(.)*/,''));
	jQuery('#protean_banner_subtitle p').css('font-size',jQuery('#protean_bannersubtitle_fontsize').val()+'px');
	jQuery('#protean_banner_subtitle p').css('color','#'+jQuery('#protean_bannersubtitle_color input').val());
	jQuery('#protean_banner_subtitle p').css('line-height',jQuery('#protean_bannersubtitle_lineheight').val()+'em');
	jQuery('#protean_banner_subtitle p').css('text-shadow',jQuery('#protean_bannersubtitle_shadow').val());
	jQuery('#protean_banner_subtitle p').css('text-align',jQuery('#protean_bannersubtitle_align').val());
	
	jQuery("#protean_banner_background").resizable({
	    minWidth: bannerMaxWidth,
	    maxWidth: bannerMaxWidth,
	    stop: function(){
	        jQuery('#protean_bannerheight').val(jQuery(this).height());
	    }
	});
}

function protean_initBanner(){
	jQuery('#protean_banner_title').css('left', jQuery('#protean_bannertitle_posx').val()+'px');
	jQuery('#protean_banner_title').css('top', jQuery('#protean_bannertitle_posy').val()+'px');
	jQuery('#protean_banner_title').css('width', jQuery('#protean_bannertitle_width').val()+'px');
	jQuery('#protean_banner_title').css('height', jQuery('#protean_bannertitle_height').val()+'px');
	jQuery('#protean_banner_subtitle').css('left', jQuery('#protean_bannersubtitle_posx').val()+'px');
	jQuery('#protean_banner_subtitle').css('top', jQuery('#protean_bannersubtitle_posy').val()+'px');
	jQuery('#protean_banner_subtitle').css('width', jQuery('#protean_bannersubtitle_width').val()+'px');
	jQuery('#protean_banner_subtitle').css('height', jQuery('#protean_bannersubtitle_height').val()+'px');
	jQuery('#protean_banner_background').css('height', jQuery('#protean_bannerheight').val()+'px');
	
	if(jQuery('#protean_bannerbutton_posx').val() != '' ){
		jQuery('#protean_banner_button').css('left', jQuery('#protean_bannerbutton_posx').val()+'px');
		jQuery('#protean_banner_button').css('right','auto');
	}
	
	if(jQuery('#protean_bannerbutton_posy').val() != '' ){
		jQuery('#protean_banner_button').css('top', jQuery('#protean_bannerbutton_posy').val()+'px');
		jQuery('#protean_banner_button').css('bottom','auto');
	}
}