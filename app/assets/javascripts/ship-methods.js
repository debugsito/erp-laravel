$(document).ready(function () {

	$('#btn-modal-ship-methods').on('click', function () {
		$.get("ship_methods/create", function( data ) {
	  		$('#modal-ship-methods').modal('show');
			$('.modal-content-ship-methods').html(data);
			ship_methods_form();
		});
	});

	$('.table-ship-methods').delegate('.btn-modal-ship-methods-edit','click', function () {
		var id = $(this).find('input[type=hidden]').val();
		$.get("ship_methods/" + id + '/edit', function( data ) {
	  		$('#modal-ship-methods').modal('show');
			$('.modal-content-ship-methods').html(data);
			ship_methods_form();
		});
	})

	function ship_methods_form () {
		$('#form-ship-methods').validate({
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
				        		var row =  '<tr class="row-' + response.data.id + ' btn-modal-ship-methods-edit"><td><input type="checkbox" name="action"> </td>';
							    row 	+= '<input type="hidden" value="'+response.data.id +'" />';
							    row 	+= '<td>' + response.data.name +'</td>';
							    row 	+= '<td>' + response.data.description + '</td>';
							    row 	+= '<td>' + response.data.created_at +'</td>';
							    row 	+= '</tr>';
							    $('.table-ship-methods tbody').prepend(row);
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