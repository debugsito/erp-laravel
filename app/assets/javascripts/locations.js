$(document).ready(function () {

	$('#btn-modal-location').on('click', function () {
		$.get("locations/create", function( data ) {
	  		$('#modal-location').modal('show');
			$('.modal-content-location').html(data);
			location_form();
		});
	});

	$('.table-location').delegate('.btn-modal-location-edit','click', function () {
		var id = $(this).find('input[type=hidden]').val();
		$.get("locations/" + id + '/edit', function( data ) {
	  		$('#modal-location').modal('show');
			$('.modal-content-location').html(data);
			location_form();
		});
	})

	function location_form () {
		$('#form-location').validate({
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

				        		var row =  '<tr class="row-' + response.data.id + 'btn-modal-location-edit" /><input type="hidden" value="'+response.data.id +'" /><td><input type="checkbox" name="action"> </td>';
							    row 	+= '<td>'+ response.data.name +'</td>';
							    row 	+= '<td>' +response.data.description+ '</td>';
							    row 	+= '<td>' +response.data.created_at + '</td>';
							    row 	+= '</tr>';

							    $('.table-location tbody').prepend(row);

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