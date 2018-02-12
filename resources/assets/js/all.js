jQuery(document).ready(function($) {
	$('textarea').trigger('autoresize').characterCounter();

	$('.datepicker').pickadate({
		selectMonths: true, // Creates a dropdown to control month
		selectYears: false, // Creates a dropdown of 15 years to control year,
		today: 'Today',
		clear: 'Clear',
		close: 'Ok',
		closeOnSelect: true, // Close upon selecting a date,
		format: 'yyyy-mm-dd',
		firstDay: 1,
		min: true,
		max: 60
	});

	$('.datepicker_birthday').pickadate({
		selectMonths: true, // Creates a dropdown to control month
		selectYears: 40, // Creates a dropdown of 15 years to control year,
		today: false,
		clear: 'Clear',
		close: 'Ok',
		closeOnSelect: true, // Close upon selecting a date,
		format: 'yyyy-mm-dd',
		firstDay: 1,
		max: -5480
	});
});
