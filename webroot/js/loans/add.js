$(window).load(function () {
	$('.datepicker').datepicker({
		format: 'yyyy-mm-dd',
		calendarWeeks: true,
		clearBtn: true,
		daysOfWeekDisabled: [0],
		todayHighlight: true
	});
});