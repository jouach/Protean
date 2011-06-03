jQuery(document).ready(function(){
	showAbout(jQuery('#protean_footer_showabout'));

	jQuery('.font_remove').live('click',function(e){
		e.preventDefault();
		jQuery('#font_options option[value="'+jQuery(this).parent('li').children('input').val()+'"]').remove();
		jQuery(this).parent('li').remove();
		return false;
	});
	
	jQuery('#protean_add_font').click(function(e){
		e.preventDefault();
		if(jQuery('#protean_new_font').val().length>0){
			var font = jQuery('#protean_new_font').val();
			font = font.replace(/\s/g,'+');
			addFont(font);
		}else{
			alert('Please enter font name');
			jQuery('#protean_new_font').focus();
		}
		return false;
	});
	
	jQuery('#protean_footer_showabout').change(function(){
		showAbout(jQuery(this));
	});
	
});


jQuery(window).load(function(){
	try{
		tinyMCE.init({
			mode : "textareas", 
			theme : "advanced", 
			skin:"wp_theme",
			theme_advanced_buttons1 : "bold,italic,strikethrough,bullist,numlist,outdent,indent,link,unlink,justifyleft,justifycenter,justifyright,code", 
			theme_advanced_buttons2 : "", 
			theme_advanced_buttons3 : "", 
			language : "en",
			width: "400px",
			theme_advanced_toolbar_location : "top", 
			theme_advanced_toolbar_align : "left"
		});
	}catch(e){}
});

function addFont(font){
	$wrapper = jQuery('<li style="font-family:\''+font.replace(/\+/g,' ').replace(/\:(.)*/,'') +'\'">'+font.replace(/\+/g,' ').replace(/\:(.)*/,'')+'</li>');
	$wrapper.append('<input type="hidden" name="protean_theme_options[fonts][]" value="'+font+'" />');
	$wrapper.append('<button type="button" class="button-secondary font_remove">Remove</button>');
	jQuery('#protean_font_table').append($wrapper);
	jQuery('head').append('<link rel="stylesheet" href="http://fonts.googleapis.com/css?family='+font+'" type="text/css" media="all" />');
	jQuery('#font_options').append('<option value="'+font+'">'+font.replace(/\+/g,' ')+'</option>');
	jQuery('#protean_new_font').val('');
}

function showAbout($e){
	if($e.attr('checked')){
		jQuery('#protean_about_textbox').slideDown();
	}else{
		jQuery('#protean_about_textbox').slideUp();
	}
}