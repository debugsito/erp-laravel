$('#login').validate({
  rules: {
    email: {
      required: true,
      email: true
    },
    password: {
      required: true
    }
  },
  submitHandler: function(form) {
    var button, text;
    button = $('#btn-login');
    text = button.val();
    return $(form).ajaxSubmit({
      beforeSend: function() {
        return button.val('Signing in').prop('disabled', true);
      },
      error: function() {
        alert('Server');
      },
      success: function(response) {
        if (response.success === false) {

          return alert('Error con el usuario');
        }
        return location.href = response.redirect;
      },
      complete: function() {
        return button.val(text).prop('disabled', false);
      },
      dataType: 'JSON'
    });
  }
});
