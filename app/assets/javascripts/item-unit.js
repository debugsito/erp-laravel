$(document).ready(function () {

	$('#btn-modal-itemUnit').on('click', function () {
		$.get("item_units/create", function( data ) {
	  		$('#modal-itemUnit').modal('show');
			$('.modal-content-itemUnit').html(data);
			item_unit_form();
		});
	});

	$('.table-itemUnit').delegate('.btn-modal-itemUnit-edit','click', function () {
		var id = $(this).find('input[type=hidden]').val();
		$.get("item_units/" + id + '/edit', function( data ) {
	  		$('#modal-itemUnit').modal('show');
			$('.modal-content-itemUnit').html(data);
			item_unit_form();
		});
	})

	function item_unit_form () {
		$('#form-item-unit').validate({
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
				        		var row =  '<tr class="row-' + response.data.id + ' btn-modal-itemUnit-edit"><td><input type="checkbox" name="action"> </td>';
							    row 	+= '<input type="hidden" value="'+response.data.id +'" />';
							    row 	+= '<td>' + response.data.name +'</td>';
							    row 	+= '<td>' + response.data.description + '</td>';
							    row 	+= '<td>' + response.data.created_at +'</td>';
							    row 	+= '</tr>';
							    $('.table-itemUnit tbody').prepend(row);
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