$(document).ready(function () {

	$('#btn-modal-itemStatus').on('click', function () {
		$.get("item_status/create", function( data ) {
	  		$('#modal-itemStatus').modal('show');
			$('.modal-content-itemStatus').html(data);
			item_status_form();
		});
	});

	$('.table-itemStatus').delegate('.btn-modal-itemStatus-edit','click', function () {
		var id = $(this).find('input[type=hidden]').val();
		$.get("item_status/" + id + '/edit', function( data ) {
	  		$('#modal-itemStatus').modal('show');
			$('.modal-content-itemStatus').html(data);
			item_status_form();
		});
	})

	function item_status_form () {
		$('#form-item-status').validate({
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
				        		var row =  '<tr class="row-' + response.data.id + ' btn-modal-itemStatus-edit"><td><input type="checkbox" name="action"> </td>';
							    row 	+= '<input type="hidden" value="'+response.data.id +'" />';
							    row 	+= '<td>' + response.data.name +'</td>';
							    row 	+= '<td>' + response.data.description + '</td>';
							    row 	+= '<td>' + response.data.created_at +'</td>';
							    row 	+= '</tr>';
							    $('.table-itemStatus tbody').prepend(row);
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