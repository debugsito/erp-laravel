$(document).ready(function () {

	$('#btn-modal-itemType').on('click', function () {
		$.get("item_types/create", function( data ) {
	  		$('#modal-itemType').modal('show');
			$('.modal-content-itemType').html(data);
			item_type_form();
		});
	});

	$('.table-itemType').delegate('.btn-modal-itemType-edit','click', function () {
		var id = $(this).find('input[type=hidden]').val();
		$.get("item_types/" + id + '/edit', function( data ) {
	  		$('#modal-itemType').modal('show');
			$('.modal-content-itemType').html(data);
			item_type_form();
		});
	})

	function item_type_form () {
		$('#form-item-type').validate({
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

				        		var row =  '<tr class="row-' + response.data.id + ' btn-modal-itemType-edit"><input type="hidden" value="'+response.data.id +'"><td><input type="checkbox" name="action"> </td>';
							    row 	+= '<td>' + response.data.name +'</td>';
							    row 	+= '<td>' + response.data.description + '</td>';
							    row 	+= '<td>' + response.data.created_at +'</td>';
							    row 	+= '</tr>';

							    $('.table-itemType tbody').prepend(row);

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