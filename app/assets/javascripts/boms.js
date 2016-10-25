$(document).ready(function () {

	$('#btn-modal-bom').on('click', function () {
		$.get("boms/create", function( data ) {
	  		$('#modal-bom').modal('show');
			$('.modal-content-bom').html(data);
			form_bom();
			search_item_form();
			add_item_to_content_bom();
		});
	});

	$('.table-bom').delegate('.btn-modal-bom-edit','click', function () {
		var id = $(this).find('input[type=hidden]').val();
		$.get("boms/" + id + '/edit', function( data ) {
	  		$('#modal-bom').modal('show');
			$('.modal-content-bom').html(data);
			form_bom();
			search_item_form();
			add_item_to_content_bom();
		});
	});

	function form_bom () {
		$('#form-bom').validate({
			rules: {
			    item_id_parent: {
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

				        		var row =  '<tr class="row-' + response.data.id + ' btn-modal-bom-edit"><input type="hidden" value="'+response.data.id +'"><td><input type="checkbox" name="action"> </td>';
                				
							    row 	+= '<td>' +response.data.parent.name+ '</td>';
							    row 	+= '<td>' +response.data.parent.description+ '</td>';
							    row 	+= '<td>' +response.data.status+ '</td>';
							    row 	+= '<td>' +response.data.user.name+'</td>';
							    row 	+= '</tr>';

							    $('.table-bom tbody').prepend(row);

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

	function add_item_to_content_bom () {

		$('#content-search-item-create-bom tbody').delegate('.btn-add-item-to-content-bom', 'click', function () {
			var item_name = $(this).find(".name_item").val();
			console.log(item_name)
			var item_id = $(this).val();
			var div = '';
			div += '<div class="alert alert-info alert-dismissible fade in" role="alert">';
			div += item_name;
			div += '<input type="hidden" name="item_id[]" value="'+item_id+'" />';
			div += '<a type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></a>';
			div += '</div>';

			$('#content-items-add-bom').prepend(div);
		});


	}

	function search_item_form () {
		$('#form-bom-item-search').validate({
			rules: {
			    name: {
			      	required: true
			    },
			    description: {
			      	required: true
			    },
			    type: {
			      	required: true
			    },
				unit: {
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
			        	alertBox('danger', 'Server Response', 'Error Server', 'Ok');
			      	},
			      	success: function(response) {

			      		console.log(response)
				        if (response.success) {

				        	var tr = '';

				        	if (response.data.length == 0) tr = 'Not found information';

				        	$.each(response.data, function (i, v) {
				        		tr += "<tr>";
				        		tr += "<td>";
				        		tr += v.name;
				        		tr += "</td>";
				        		tr += "<td>";
				        		tr += "<button class='btn btn-success btn-add-item-to-content-bom' value='"+ v.id +"'>Add";
				        		tr += "<input type='hidden' name='name_item' class='name_item' value='"+v.name+"'>";
				        		tr += "</button>";
				        		tr += "</td>";
				        		tr += "</tr>";
				        	});

				        	$('#content-search-item-create-bom tbody').html(tr);

				            if (response.msg) {
				            	alertBox('success', 'Information', response.msg, 'Ok');
				            };
				            if (response.redirect) {
				            	window.location.href = response.redirect;
				            }
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