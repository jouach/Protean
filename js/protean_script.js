jQuery(function(){
	jQuery('a[href=#comments] ').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var jQuerytarget = jQuery(this.hash);
			jQuerytarget = jQuerytarget.length && jQuerytarget || jQuery('[name=' + this.hash.slice(1) +']');
			if (jQuerytarget.length) {
				var targetOffset = jQuerytarget.offset().top;
				jQuery('html,body').animate({scrollTop: targetOffset}, 1000);
				return false;
			}
		}
	});
	if(jQuery("#commentform").length>0)
		jQuery("#commentform").validate({errorElement: "em"});
});