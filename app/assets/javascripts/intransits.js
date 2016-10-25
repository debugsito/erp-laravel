$(document).ready(function () {

	$('#btn-modal-intransit').on('click', function () {
		$.get("intransits/create", function( data ) {
	  		$('#modal-intransit').modal('show');
			$('.modal-content-intransit').html(data);
			
			intransit_form();
			datetimepicker();
		});
	});

	$('.table-intransit').delegate('.btn-modal-intransit-edit','click', function () {
		var id = $(this).find('input[type=hidden]').val();
		$.get("intransits/" + id + '/edit', function( data ) {
	  		$('#modal-intransit').modal('show');
			$('.modal-content-intransit').html(data);
			intransit_form();
			datetimepicker();
			
		});
	});

	function intransit_form () {
		$('#form-intransit').validate({
			rules: {
			    no_purchase: {
			      	required: true,
			      	number: true
			    },
			    order_date: {
			      	required: true,
			      	date: true
			    },
				item_id: {
			    	required: true
			    },
				order_qty: {
			    	required: true,
			    	number: true
			    },
			    vendor_id: {
			    	required: true
			    }
			},
			submitHandler: function(form) {
			    var button, text;
			    button = $('#btn-save');
			    text = button.val();
			    $(form).ajaxSubmit({
			      	beforeSend: function() {
			        	return button.val('Saving...').prop('disabled', true);
			      	},
			      	error: function() {
			        	alertBox('danger', 'Server Response', 'Error', 'Ok');
			      	},
			      	success: function(response) {
				        if (response.success) {

				        	if (typeof response.data != 'undefined') {

				        		$('.row-' + response.data.id).remove();
				        		var row =  '<tr class="row-' + response.data.id + ' btn-modal-intransit-edit"><input type="hidden" value="'+response.data.id +'"><td><input type="checkbox" name="action"> </td>';
							    row 	+= '<td>'+ response.data.no_purchase +'</td>';
							    row 	+= '<td>'+ response.data.vendor.name+ '</td>';
							    row 	+= '<td>'+ response.data.order_date+'</td>';
							    row 	+= '<td>'+ response.data.material.name+'</td>';
							    row 	+= '<td>'+ response.data.order_qty+'</td>';
							    row 	+= '<td>'+ response.data.receipt_qty+'</td>';
							    row 	+= '<td>'+ response.data.delivery_date+'</td>';
							    row 	+= '</tr>';

							    $('.table-intransit tbody').prepend(row);

				        	};

				            if (response.msg) {
				            	alertBox('success', 'Information', response.msg, 'Ok');
				            };
				            if (response.redirect) {
				            	window.location.href = response.redirect;
				            }
				            $('.alert-data-not-found').remove();
				        } else {
				        	alertBox('success', 'Information', response.msg, 'Ok');
				        }
			      	},
			      	complete: function() {
			        	return button.val(text).prop('disabled', false);
			      	},
			      	dataType: 'JSON'
			    });
			}
		});
	}
});