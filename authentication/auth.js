
$('.login-form').on('submit', function(){
  event.preventDefault();
  action = 'sign-in';
  $.ajax({
    url: "/srms.bcshs.dev/authentication/controller.php",
    method:"POST",
    data:$('.login-form').serialize() + '&action=' + action,
    success:function(data)
    {
      if (data == '') {
        location.href = "/srms.bcshs.dev/";
      }else {
        $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
      }
    }
  });
});

function message() {
  message = '<div class="alert alert-danger position-absolute text-center" style="width:100%;">'
    + "Select a Section to Delete." +
    '</div>'
    return message;
}

function validated() {
  if (action == 'update') {
    var forms = document.getElementsByClassName('needs-validation');

    var validation = Array.prototype.filter.call(forms, function(form) {
      form.classList.remove('was-validated');
    });
  }
}

function validate() {
  var forms = document.getElementsByClassName('needs-validation');

  var validation = Array.prototype.filter.call(forms, function(form) {
    form.classList.add('was-validated');
  });
}
