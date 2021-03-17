(function($) {
    'use strict';

    var captionOnHover = {};
    eltdf.modules.captionOnHover = captionOnHover;

    captionOnHover.eltdfOnWindowLoad = eltdfOnWindowLoad;

    $(window).load(eltdfOnWindowLoad);

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function eltdfOnWindowLoad() {
	    eltdfInitCaptionFollow();
    }

	/**
	 * Initializes caption on hover follow info hover
	 */
	function eltdfInitCaptionFollow() {
		var itemList = $('.eltdf-caption-follow-info');

		if (itemList.length) {
			eltdf.body.append('<div class="eltdf-caption-follow-info-holder">\
								<div class="eltdf-caption-follow-info-inner">\
								<span class="eltdf-caption-follow-info-title">Title</span>\
								</div>\
								</div>');

			var followInfoHolder = $('.eltdf-caption-follow-info-holder'),
				followInfoTitle = followInfoHolder.find('.eltdf-caption-follow-info-title');

			itemList.each(function () {
				var thisItem = $(this);

				//info element position
				thisItem.on('mousemove', function (e) {
					followInfoHolder.css({
						top: e.clientY,
						left: e.clientX
					});
				});

				//show/hide info element
				thisItem.find('a.eltdf-caption-on-hover-link').on('mouseenter', function () {
					var thisItemTitle = thisItem.find('.eltdf-caption-follow-info-title-source');

					if(thisItemTitle.length) {
						followInfoTitle.text(thisItemTitle.text());
					}

					if (!followInfoHolder.hasClass('eltdf-is-active')) {
						followInfoHolder.addClass('eltdf-is-active');
					}
				}).on('mouseleave', function () {
					if (followInfoHolder.hasClass('eltdf-is-active')) {
						followInfoHolder.removeClass('eltdf-is-active');
					}
				});

				//check if info element is below or above the targeted item
				$(window).scroll(function(){
					if (followInfoHolder.hasClass('eltdf-is-active')) {
						if (followInfoHolder.offset().top < thisItem.offset().top || followInfoHolder.offset().top > thisItem.offset().top + thisItem.outerHeight()) {
							followInfoHolder.removeClass('eltdf-is-active');
						}
					}
				});
			});
		}
	}

})(jQuery);