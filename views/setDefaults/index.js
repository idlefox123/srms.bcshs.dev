var action;
function getDefaults() {
  action = 'getDefaults';
  $.ajax({
    url: "/srms.bcshs.dev/views/setDefaults/controller.php",
    method:"POST",
    dataType: "json",
    data:{
      action:action,
    },
    success:function(data)
    {
      $('#academicyear').text(data.schl_year);
      $('#toYear').text(parseInt(data.schl_year)+1);
      $('#semesterID').text(data.semester);
      action = 'update';
    }
  });
}

$('#new-section-btn').on('click', function() {
  $('.sectionForm')[0].reset();
  $('#update-section-btn').attr('disabled','disabled');
  $('#delete-section-btn').attr('disabled','disabled');
  $('#add-section-btn').removeAttr('disabled');
  action = 'create';
});

$('#set-AY').on('change', function() {
  if ($('#set-AY').val() == 'add-new-AY') {
    $('#set-AY-modal').modal('show');
    validate();
  }
});

$('.defaults-form').on('submit', function() {
  event.preventDefault();
  $('#set-AY-modal').modal('hide');
  action = 'create';
  $.ajax({
    url: "/srms.bcshs.dev/views/setDefaults/controller.php",
    method:"POST",
    data:$('.defaults-form').serialize() + '&action=' + action,
    success:function(data)
    {
      action = 'update';

      $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
    }
  });
});

$('.set-default-form').on('submit', function() {
  event.preventDefault();
  action = 'update';
  if (true) {
    $.ajax({
      url: "/srms.bcshs.dev/views/setDefaults/controller.php",
      method:"POST",
      data:$('.set-default-form').serialize() + '&action=' + action,
      success:function(data)
      {
        getDefaults();
        $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
      }
    });
  }else {
    alert('Select a Section.')
  }
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
