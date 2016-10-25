
// bootbox: alert dialog
function alertBox(type, header, content, buttonText) {

    if( ! buttonText) {
        buttonText = 'Ok';
    }
    
    bootbox.dialog({
        className: 'my-custom-dialog ' + type + '-dialog',
        message: content,
        title: header,
        buttons: {
            main: {
                className: 'btn-' + type + ' btn-sm',
                label: buttonText
            }
        }
    });
}

// bootbox: confirm dialog
function confirmBox(header, content, callback) {
    
    bootbox.dialog({
        className: 'my-custom-dialog warning-dialog',
        message: content,
        title: header,
        buttons: {
            cancel: {
                className: 'btn-default btn-sm',
                label: 'No'
            },
            main: {
                className: 'btn-warning btn-sm',
                label: 'Yes',
                callback: callback
            }
        }
    });
}

/*Tooltip*/
$(function(){
    $('a[title]').tooltip();
});

$('[data-toggle="tooltip"]').tooltip();

$('.input_image').change(function () {

    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.image').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }

});
