(function($) {
	'use strict';
	
	var reservationDatePicker = {};
	eltdf.modules.reservationDatePicker = reservationDatePicker;

	reservationDatePicker.eltdfReservationDatePicker = eltdfReservationDatePicker;


	reservationDatePicker.eltdfOnDocumentReady = eltdfOnDocumentReady;
	
	$(document).ready(eltdfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfReservationDatePicker();
	}
	
	/**
	 * Init reservation date picker
	 */
	function eltdfReservationDatePicker() {
		var datepicker = $('.eltdf-ot-date');

		if(datepicker.length) {
			datepicker.each(function() {
				$(this).datepicker({
					prevText: '<span class="eltdf-icon-arrow ion-ios-arrow-left"></span>',
					nextText: '<span class="eltdf-icon-arrow ion-ios-arrow-right"></span>'
				});
			});
		}
	}
	
})(jQuery);