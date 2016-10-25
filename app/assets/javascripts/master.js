/*DATETIMEPICKER*/
function datetimepicker () {
	$('.datetimepicker').datetimepicker({
	    pickDate: true,
	    format: 'YYYY-MM-DD',
	    pickTime: false
	    //format: 'HH:mm',
	});
}

function datetimepickertime () {
	$('.datetimepickertime').datetimepicker({
		icons: {
			up: "ion-chevron-up",
			down: "ion-chevron-down"
		},
	    pickDate: false,
	    pickSeconds: false,
	    pick12HourFormat: false,
	    format: 'HH:mm',
	});
}

$(document).ready(function () {

	$('input[type=checkbox]').on('click', function (e) {
		e.stopPropagation();
	})

});