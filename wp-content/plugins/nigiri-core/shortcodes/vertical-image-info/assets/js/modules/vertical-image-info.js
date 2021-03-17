(function($) {
	'use strict';
	
	var verticalImageInfo = {};
	eltdf.modules.verticalImageInfo = verticalImageInfo;
	
	verticalImageInfo.eltdfInitVerticalImageInfo = eltdfInitVerticalImageInfo;
	
	verticalImageInfo.eltdfOnDocumentReady = eltdfOnDocumentReady;
	
	
	$(document).ready(eltdfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitVerticalImageInfo();
		
	}
	/**
	 * Init Vertical Image Info
	 */
	function eltdfInitVerticalImageInfo() {
		var holder = $('.eltdf-vertical-image-info-holder.eltdf-appear-animation');
		
		if (holder.length) {
			holder.each(function() {
				var thisHolder = $(this);
				
				thisHolder.appear(function() {
					thisHolder.addClass('eltdf-vii-appear');
				},{accX: 0, accY: eltdfGlobalVars.vars.eltdfElementAppearAmount});
			});
		}
	}
	
})(jQuery);