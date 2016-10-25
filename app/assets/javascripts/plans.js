$(document).ready(function () {

	$('#btn-modal-plan').on('click', function () {
		$.get("plans/create", function( data ) {
	  		$('#modal-plan').modal('show');
			$('.modal-content-plan').html(data);
			plan_form();
			datetimepicker();
			datetimepickertime();
		});
	});

	$('.table-plan').delegate('.btn-modal-plan-edit','click', function () {
		var id = $(this).find('input[type=hidden]').val();
		$.get("plans/" + id + '/edit', function( data ) {
	  		$('#modal-plan').modal('show');
			$('.modal-content-plan').html(data);
			plan_form();
			datetimepicker();
			datetimepickertime();
		});
	})

	function plan_form () {
		$('#form-plan').validate({
			rules: {
			    line_id: {
			      	required: true
			    },
			    item_master_id: {
			      	required: true
			    },
			    production_start_date: {
			      	required: true
			    },
			    production_end_date: {
			      	required: true
			    },
			    quantity: {
			      	required: true
			    },
			    status_plan_id: {
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

				        		var row =  '<tr class="row-' + response.data.id + ' btn-modal-plan-edit"><input type="hidden" value="'+response.data.id +'"><td><input type="checkbox" name="action"> </td>';
							    row 	+= '<td>' + response.data.item.name +'</td>';
							    row 	+= '<td>' + response.data.line.name + '</td>';
							    row 	+= '<td>' + response.data.production_start_date + ' <br /> ' + response.data.production_start_time + '</td>';
							    row 	+= '<td>' + response.data.production_end_date + ' <br /> ' + response.data.production_end_time + '</td>';
							    row 	+= '<td>' + response.data.quantity +'</td>';
							    if (response.data.status_plan_id == 1) {
							    	row 	+= '<td><span class="label label-success">Active</span> </td>';
							    } else {
							    	row 	+= '<td><span class="label label-danger">Inactive</span> </td>';
							    }
							    row 	+= '</tr>';

							    $('.table-plan tbody').prepend(row);

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