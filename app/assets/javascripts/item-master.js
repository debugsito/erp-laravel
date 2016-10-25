$(document).ready(function () {

	$('#btn-modal-itemMaster').on('click', function () {
		$.get("item_masters/create", function( data ) {
	  		$('#modal-itemMaster').modal('show');
			$('.modal-content-itemMaster').html(data);
			item_form();
		});
	});

	$('.table-itemMaster').delegate('.btn-modal-itemMaster-edit','click', function () {
		var id = $(this).find('input[type=hidden]').val();
		$.get("item_masters/" + id + '/edit', function( data ) {
	  		$('#modal-itemMaster').modal('show');
			$('.modal-content-itemMaster').html(data);
			item_form();
		});
	})

	function item_form () {
		$('#form-item').validate({
			rules: {
			    name: {
			      	required: true
			    },
			    description: {
			      	required: true
			    },
			    type_id: {
			      	required: true
			    },
				unit_item_id: {
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

				        		var row =  '<tr class="row-' + response.data.id + ' btn-modal-itemMaster-edit"><input type="hidden" value="'+response.data.id +'"><td><input type="checkbox" name="action"> </td>';
							    row 	+= '<td>' + response.data.name +'</td>';
							    row 	+= '<td>' + response.data.description + '</td>';
							    row 	+= '<td>' + response.data.type.name +'</td>';
							    row 	+= '<td>' + response.data.unit.name +'</td>';
							    row 	+= '<td>' + response.data.user_id +'</td>';
							    row 	+= '<td>' + response.data.created_at +'</td>';
							    row 	+= '</tr>';

							    $('.table-itemMaster tbody').prepend(row);

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