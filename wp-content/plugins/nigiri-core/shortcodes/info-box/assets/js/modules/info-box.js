(function($) {
	'use strict';
	
	var infoBox = {};
	eltdf.modules.infoBox = infoBox;
	
	infoBox.eltdfInitInfoBox = eltdfInitInfoBox;
	
	infoBox.eltdfOnWindowLoad = eltdfOnWindowLoad;
	
	
	$(window).load(eltdfOnWindowLoad);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnWindowLoad() {
		eltdfInitInfoBox();
	}
	
	/**
	 * Init Interactive Image With Text
	 */
	function eltdfInitInfoBox() {
		var holder = $('.eltdf-info-box-holder.eltdf-appear-animation');
		
		if (holder.length) {
			holder.each(function() {
				var thisHolder = $(this);
				
				thisHolder.addClass('eltdf-ib-appear');
			});
		}
	}
	
})(jQuery);