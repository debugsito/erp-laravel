$(document).ready(function () {

	$('#btn-modal-stock').on('click', function () {
		$.get("stocks/create", function( data ) {
	  		$('#modal-stock').modal('show');
			$('.modal-content-stock').html(data);
			stock_form();
		});
	});

	$('.table-stock').delegate('.btn-modal-stock-edit','click', function () {
		var id = $(this).find('input[type=hidden]').val();
		$.get("stocks/" + id + '/edit', function( data ) {
	  		$('#modal-stock').modal('show');
			$('.modal-content-stock').html(data);
			stock_form();
		});
	})

	function stock_form () {
		$('#form-stock').validate({
			rules: {
			    item_id: {
			      	required: true
			    },
			    location_id: {
			      	required: true
			    },
			    stock_type_id: {
			      	required: true
			    },
			    movement_type_id: {
			      	required: true
			    },
			    quantity: {
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

				        		var row =  '<tr class="row-' + response.data.id + ' btn-modal-stock-edit"><input type="hidden" value="'+response.data.id +'"><td><input type="checkbox" name="action"> </td>';
                				
							    row 	+= '<td>'+ response.data.material.name +'</td>';
							    row 	+= '<td>'+ response.data.entry_date +'</td>';
							    row 	+= '<td>';
						    	if(response.data.location != null) {
						    		row 	+= response.data.location.description;
						    	} else {
						    		row 	+= '---';
						    	}
							    row 	+= '</td>';
							    row 	+= '<td>'+ response.data.type.name +'</td>';
							    row 	+= '<td>'+ response.data.movement.name +'</td>';
							    row 	+= '<td>'+ response.data.quantity +'</td>';
							    row 	+= '</tr>';

							    $('.table-stock tbody').prepend(row);

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