jQuery(document).ready(function(){
	if(window.send_to_editor){
		window.original_send_to_editor = window.send_to_editor;
	}
	
	var filemanager_target = false;
	
	jQuery('.pretean_open_filemanager').click(function() {
		filemanager_target = jQuery(this).attr('rel');
		formfield = jQuery('#protean_body_image').attr('name');
		tb_show('', 'media-upload.php?type=image&amp;post_id=0&amp;TB_iframe=true');
		window.send_to_editor = function(html) {
			if (filemanager_target) {
				imgurl = jQuery('img',html).attr('src');
				jQuery('#'+filemanager_target).val(imgurl);
				if(typeof window.buildPreview == 'function' && filemanager_target == 'protean_body_image')buildPreview();
				if(typeof window.buildBanner == 'function')buildBanner();
				filemanager_target = false;
				window.send_to_editor = window.original_send_to_editor;
				tb_remove();
			} else {
				window.original_send_to_editor(html);
			}
		}
		return false;
	});
	
	
});