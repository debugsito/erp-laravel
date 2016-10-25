$(document).ready(function () {

	$('#btn-modal-movementType').on('click', function () {
		$.get("movement_types/create", function( data ) {
	  		$('#modal-movementType').modal('show');
			$('.modal-content-movementType').html(data);
			movementType_form();
		});
	});

	$('.table-movementType').delegate('.btn-modal-movementType-edit','click', function () {
		var id = $(this).find('input[type=hidden]').val();
		$.get("movement_types/" + id + '/edit', function( data ) {
	  		$('#modal-movementType').modal('show');
			$('.modal-content-movementType').html(data);
			movementType_form();
		});
	})

	function movementType_form () {
		$('#form-movementType').validate({
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

				        		var row =  '<tr class="row-' + response.data.id + ' btn-modal-movementType-edit"><input type="hidden" value="'+response.data.id +'"><td><input type="checkbox" name="action"> </td>';
							    row 	+= '<td>' + response.data.name +'</td>';
							    row 	+= '<td>' + response.data.description + '</td>';
							    row 	+= '<td>' + response.data.created_at +'</td>';
							    row 	+= '</tr>';

							    $('.table-movementType tbody').prepend(row);

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