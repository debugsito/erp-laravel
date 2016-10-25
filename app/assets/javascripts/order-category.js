$(document).ready(function () {

	$('#btn-modal-orderCategory').on('click', function () {
		$.get("order_categories/create", function( data ) {
	  		$('#modal-orderCategory').modal('show');
			$('.modal-content-orderCategory').html(data);
			orderCategory_form();
		});
	});

	$('.table-orderCategory').delegate('.btn-modal-orderCategory-edit','click', function () {
		var id = $(this).find('input[type=hidden]').val();
		$.get("order_categories/" + id + '/edit', function( data ) {
	  		$('#modal-orderCategory').modal('show');
			$('.modal-content-orderCategory').html(data);
			orderCategory_form();
		});
	})

	function orderCategory_form () {
		$('#form-orderCategory').validate({
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

				        		var row =  '<tr class="row-' + response.data.id + ' btn-modal-orderCategory-edit"><input type="hidden" value="'+response.data.id +'" /><td><input type="checkbox" name="action"> </td>';
							    row 	+= '<td>' + response.data.name +'</td>';
							    row 	+= '<td>' + response.data.description + '</td>';
							    row 	+= '<td>' + response.data.created_at +'</td>';
							    row 	+= '</tr>';

							    $('.table-orderCategory tbody').prepend(row);

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