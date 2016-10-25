$(document).ready(function () {

	$('#btn-modal-customers').on('click', function () {
		$.get("customers/create", function( data ) {
	  		$('#modal-customers').modal('show');
			$('.modal-content-customers').html(data);
			customers_form();
		});
	});

	$('.table-customers').delegate('.btn-modal-customers-edit','click', function () {
		var id = $(this).find('input[type=hidden]').val();
		$.get("customers/" + id + '/edit', function( data ) {
	  		$('#modal-customers').modal('show');
			$('.modal-content-customers').html(data);
			customers_form();
		});
	})

	function customers_form () {
		$('#form-customer').validate({
			rules: {
			    client_first_name: {
			      	required: true
			    },
			    client_last_name: {
			      	required: true
			    },
			    address_stree_1: {
			      	required: true
			    },
			    phone_number: {
			      	required: true
			    },
			    company_name: {
			      	required: true
			    },
			    city: {
			      	required: true
			    },
			    zipcode: {
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

				        		var row =  '<tr class="row-' + response.data.id + ' btn-modal-customers-edit"><input type="hidden" value="'+response.data.id +'"><td><input type="checkbox" name="action"> </td>';
							    row 	+= '<td>' + response.data.company_name +'</td>';
							    row 	+= '<td>' + response.data.city + '</td>';
							    row 	+= '<td>' + response.data.client_first_name;
							    row 	+= ' ' + response.data.client_last_name + '</td>';
							    row 	+= '<td>' + response.data.phone_number + '</td>';
							    row 	+= '<td>' + response.data.created_at +'</td>';
							    row 	+= '</tr>';

							    $('.table-customers tbody').prepend(row);

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