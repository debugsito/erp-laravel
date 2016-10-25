$(document).ready(function () {

	$('#btn-modal-sales-order').on('click', function () {
		$.get("sales_order/create", function( data ) {
	  		$('#modal-sales-order').modal('show');
			$('.modal-content-sales-order').html(data);
			sales_order_form();
			datetimepicker();
		});
	});

	$('.table-sales-order').delegate('.btn-modal-sales-order-edit','click', function () {
		var id = $(this).find('input[type=hidden]').val();
		$.get("sales_order/" + id + '/edit', function( data ) {
	  		$('#modal-sales-order').modal('show');
			$('.modal-content-sales-order').html(data);
			sales_order_form();
			datetimepicker();
		});
	})

	function sales_order_form () {
		$('#form-sales-order').validate({
			rules: {
			    name: {
			      	required: true
			    },
			    description: {
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
				        	console.log(response)
				        	if (typeof response.data != 'undefined') {
				        		$('.row-' + response.data.id).remove();
				        		var row =  '<tr class="row-' + response.data.id + ' btn-modal-sales-order-edit"><td><input type="checkbox" name="action"> </td>';
							    row 	+= '<input type="hidden" value="'+response.data.id +'" />';
							    row 	+= '<td>' + response.data.customer.company_name +'</td>';
							    row 	+= '<td>' + response.data.material.name + '</td>';
							    row 	+= '<td>' + response.data.quantity + '</td>';
							    row 	+= '<td>' + response.data.ship_date + '</td>';
							    row 	+= '<td>' + response.data.delivery_date + '</td>';
							    row 	+= '<td>' + response.data.po.no_purchase + '</td>';
							    row 	+= '</tr>';
							    $('.table-sales-order tbody').prepend(row);
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