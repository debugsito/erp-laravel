$(document).ready(function () {

	$('.btn-save-po-entry').on('click', function () {

		var button = $(this);
		var text = button.html();
		var receipt_qty = button.parent().parent().find('.receipt_qty').val();
		var intransit_id = button.val();

		if (!intransit_id || intransit_id == '') {
			alertBox('danger', "Error", "PO Entry haven't value!", 'Ok'); return false;
		}

		if (!receipt_qty || receipt_qty == '') {
			alertBox('danger', 'Error', "Receipt quantity is empty!, reload this page", 'Ok'); return false;
		}
		
		$.ajax({
		   	url: '../po/entry/update',
		  	data: {
		  		'intransit_id' : intransit_id, //value PO
		  		'receipt_qty':receipt_qty 
		  	},
		  	beforeSend: function () {
		  		button.text('Saving...').prop('disabled', true);
		  	},
		   	error: function() {
		    	alertBox('danger', 'Server Response', 'Error', 'Ok');
		   	},
		   	dataType: 'json',
		   	success: function(response) {
		      	if (response.success) {
		  			
		  		}if (response.msg) {
		            	alertBox('success', 'Information', response.msg, 'Ok');
		            };

		   },
		   complete: function() {
			   	return button.text(text).prop('disabled', false);
			},
		   type: 'POST'
		});

	});

	$('.btn-confirm-po-entry').on('click', function () {

		var button = $(this);
		var text = button.html();
		var intransit_id = button.val();

		var receipt_qty = button.parent().parent().find('.receipt_qty').val();

		if (!intransit_id || intransit_id == '') {
			alertBox('danger', "Error", "PO Entry haven't value!", 'Ok'); return false;
		}
		if (!receipt_qty || receipt_qty == '') {
			alertBox('danger', 'Error', "Receipt quantity is empty!, reload this page", 'Ok'); return false;
		}
		
		$.ajax({
		   	url: '../po/entry/confirm',
		  	data: {
		  		'intransit_id' : intransit_id, //value PO
		  		'receipt_qty':receipt_qty 
		  	},
		  	beforeSend: function () {
		  		button.text('Saving...').prop('disabled', true);
		  	},
		   	error: function() {
		    	alertBox('danger', 'Server Response', 'Error', 'Ok');
		   	},
		   	dataType: 'json',
		   	success: function(response) {
		      	if (response.success) {
		  			$('.table-op-entry tbody .row-' + intransit_id).remove();	
		  		}
		  		if (response.msg) {
	            	alertBox('success', 'Information', response.msg, 'Ok');
	            };

		   },
		   complete: function() {
			   	return button.text(text).prop('disabled', false);
			},
		   type: 'POST'
		});

	});

	
});
