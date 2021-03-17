(function($) {
	'use strict';
	
	var circle = {};
	eltdf.modules.circle = circle;

	circle.eltdfInitCircleCarousels = eltdfInitCircleCarousels;

	circle.eltdfOnDocumentReady = eltdfOnDocumentReady;
	
	$(document).ready(eltdfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitCircleCarousels();
	}

	function eltdfInitCircleCarousels() {

		var circleCarouselHolders = $('.eltdf-circle-carousel'),
			circleCarouselHeight,
			circleCarouselAutoPlay,
			circleCarouselSpeed,
			circleCarouselSeparation,
			circleCarouselFlankingItems,
			circleCarouselEdgeFadeEnabled,
			circleCarouselSizeMultiplier,
			circleCarouselNavigationClass;

		if (circleCarouselHolders.length) {
			circleCarouselHolders.each(function(){
				var thiscircleCarouselHolders = $(this);

				var circleCarousel = thiscircleCarouselHolders.children('.eltdf-circle-carousel-slider');
				var circleCarouselNavigation = thiscircleCarouselHolders.children('.eltdf-circle-carousel-navigation');

				thiscircleCarouselHolders.appear(function() {
					thiscircleCarouselHolders.css('visibility','visible');
				},{accX: 0, accY: eltdfGlobalVars.vars.eltdfElementAppearAmount});

				circleCarouselHeight = (thiscircleCarouselHolders.data('height') !== '' && thiscircleCarouselHolders.data('height') !== undefined) ? thiscircleCarouselHolders.data('height') : 500;
				
				circleCarouselAutoPlay = (thiscircleCarouselHolders.data('autoplay') !== '' && thiscircleCarouselHolders.data('autoplay') !== undefined) ? thiscircleCarouselHolders.data('autoplay') : 3000;
				circleCarouselSpeed = (thiscircleCarouselHolders.data('speed') !== '' && thiscircleCarouselHolders.data('speed') !== undefined) ? thiscircleCarouselHolders.data('speed') : 800;
				circleCarouselSeparation = (thiscircleCarouselHolders.data('separation') !== '' && thiscircleCarouselHolders.data('separation') !== undefined) ? parseInt(thiscircleCarouselHolders.data('separation'), 10) : 80;
				circleCarouselFlankingItems = (thiscircleCarouselHolders.data('flankingitems') !== '' && thiscircleCarouselHolders.data('flankingitems') !== undefined) ? thiscircleCarouselHolders.data('flankingitems') : 2;
				circleCarouselEdgeFadeEnabled = (thiscircleCarouselHolders.data('edgefadeenabled') !== '' && thiscircleCarouselHolders.data('edgefadeenabled') !== undefined) ? thiscircleCarouselHolders.data('edgefadeenabled') : false;
				circleCarouselSizeMultiplier = (thiscircleCarouselHolders.data('sizemultiplier') !== '' && thiscircleCarouselHolders.data('sizemultiplier') !== undefined) ? thiscircleCarouselHolders.data('sizemultiplier') : 1;
				circleCarouselNavigationClass = (thiscircleCarouselHolders.data('navigation') === 'no') ? 'eltdf-circle-carousel-navigation-disabled' : '';

				thiscircleCarouselHolders.addClass(circleCarouselNavigationClass);

                if (eltdf.windowWidth < 1457 && eltdf.windowWidth > 1300) {
                    if (circleCarouselHeight > 800) {
                        circleCarouselHeight = circleCarouselHeight * 0.8;
                    }
                    if(circleCarouselSizeMultiplier > 0.85) {
                        circleCarouselSizeMultiplier = 0.85
                    }
                } else if (eltdf.windowWidth < 1301 && eltdf.windowWidth > 1024) {
                    if (circleCarouselHeight > 800) {
                        circleCarouselHeight = circleCarouselHeight * 0.7;
                    }
                    if(circleCarouselSizeMultiplier > 0.85) {
                        circleCarouselSizeMultiplier = 0.85
                    }
                } else if (eltdf.windowWidth < 1025 && eltdf.windowWidth > 768) {
                    circleCarouselHeight = circleCarouselHeight * 0.6;
                    if(circleCarouselSizeMultiplier > 0.85) {
                        circleCarouselSizeMultiplier = 0.85
                    }
                } else if (eltdf.windowWidth < 769) {
                    circleCarouselHeight = circleCarouselHeight * 0.5;
                    
                    if(circleCarouselSizeMultiplier > 0.85) {
                        circleCarouselSizeMultiplier = 0.85
                    }
                }

                circleCarousel.css({'height': circleCarouselHeight});

                circleCarousel.waterwheelCarousel({
                    autoPlay: circleCarouselAutoPlay,
                    speed: circleCarouselSpeed,
                    flankingItems: circleCarouselFlankingItems,
                    separation: circleCarouselSeparation,
                    opacityMultiplier: 1,
                    edgeFadeEnabled: circleCarouselEdgeFadeEnabled,
                    sizeMultiplier: circleCarouselSizeMultiplier,
                    preloadImages: true,
                    activeClassName: 'eltdf-circle-carousel-active',
                    movingToCenter: function ($item) {
                        afterAction($item);
                    }
                });

                circleCarouselNavigation.find('.eltdf-prev-icon-holder').on('click', function (e) {
                    e.preventDefault();
                    circleCarousel.prev();
                });

                circleCarouselNavigation.find('.eltdf-next-icon-holder').on('click', function (e) {
                    e.preventDefault();
                    circleCarousel.next();
                });

                if (!thiscircleCarouselHolders.hasClass('eltdf-circle-carousel-init') && !thiscircleCarouselHolders.hasClass('eltdf-circle-carousel-navigation-disabled')) {
                    thiscircleCarouselHolders.addClass('eltdf-circle-carousel-init');
                    var numberOfSlidesFirstLoad = circleCarousel.children().length - 1;

                    updateResult(circleCarouselNavigation.find('.eltdf-prev-icon-holder .eltdf-navigation-counter'), 0);
                    updateResult(circleCarouselNavigation.find('.eltdf-next-icon-holder .eltdf-navigation-counter'), numberOfSlidesFirstLoad);
                }

                function afterAction($item) {
                    if (!thiscircleCarouselHolders.hasClass('eltdf-circle-carousel-navigation-disabled')) {
                        var numberOfNextSlide, numberOfPreviousSlide, numberOfSlides, currentItemPosition;

                        numberOfSlides = circleCarousel.children().length;
                        currentItemPosition = circleCarousel.children().index($item);

                        if (numberOfSlides > 1) {
                            numberOfPreviousSlide = (currentItemPosition !== 0) ? (currentItemPosition) : numberOfSlides;
                            numberOfNextSlide = (currentItemPosition !== numberOfSlides - 1) ? (numberOfSlides - currentItemPosition - 1) : numberOfSlides;
                        }
                        else {
                            numberOfPreviousSlide = numberOfNextSlide = 0;
                        }

                        updateResult(circleCarouselNavigation.find('.eltdf-prev-icon-holder .eltdf-navigation-counter'), numberOfPreviousSlide);
                        updateResult(circleCarouselNavigation.find('.eltdf-next-icon-holder .eltdf-navigation-counter'), numberOfNextSlide);
                    }
                }

                function updateResult(pos, value) {
                    circleCarouselNavigation.find(pos).text(value);
                }
			});
		}
	}
	
})(jQuery);