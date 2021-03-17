(function($) {
	'use strict';
	
	$(document).ready(function(){
        eltdfParallaxElementsDualImageShowcase();
	});
	
	/**
	 * Parallax Pft text
	 * @type {Function}
	 */
	function eltdfParallaxElementsDualImageShowcase() {
	    var holder = $('.eltdf-dual-image-showcase-holder.eltdf-parallax-items');

	    if (holder.length && !eltdf.htmlEl.hasClass('touch')) {
		    holder.each(function(){
	            var thisHolder = $(this),
	                bgImageHolder = thisHolder.find('.eltdf-background-image-holder'),
		            bgImageYOffset = bgImageHolder.data('y-axis-translation'),
		            bgDelta = Math.floor(Math.random()*(bgImageYOffset-bgImageYOffset/2+1)+bgImageYOffset/2),
		            dataBGParallax = '{"y":'+bgDelta+', "smoothness":20}',
		            fbgImageHolder = thisHolder.find('.eltdf-foreground-image-holder'),
		            fbgImageYOffset = fbgImageHolder.data('y-axis-translation'),
		            fbgDelta = Math.floor(Math.random()*(fbgImageYOffset-fbgImageYOffset/2+1)+fbgImageYOffset/2),
		            dataFBGParallax = '{"y":'+fbgDelta+', "smoothness":20}';
	            
			    bgImageHolder.attr('data-parallax', dataBGParallax);
			    fbgImageHolder.attr('data-parallax', dataFBGParallax);
	        });

	        setTimeout(function(){
	            ParallaxScroll.init(); //initialzation removed from plugin js file to have it run only on non-touch devices
	        }, 100); //wait for calcs
	    }
	}
	
})(jQuery);