var action;
$('#edit-account-btn').on('click', function(){
  action = 'edit';
  $.ajax({
    url: "/srms.bcshs.dev/views/facultyAccount/controller.php",
    method:"POST",
    dataType: "json",
    data:{
      action:action,
    },
    success:function(data)
    {
      $('#user-on-modal').val(data.user);
      $('#username-on-modal').val(data.username);
      action = 'update';
    }
  });
});

$('.account-form').on('submit', function(){
  event.preventDefault();
  $.ajax({
    url: "/srms.bcshs.dev/views/facultyAccount/controller.php",
    method:"POST",
    data:$('.account-form').serialize() + '&action=' + action,
    success:function(data)
    {
      $('#account-modal').modal('hide');
      getUser();
      $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
    }
  });
});

function getUser(){
  action = 'edit';
  $.ajax({
    url: "/srms.bcshs.dev/views/facultyAccount/controller.php",
    method:"POST",
    dataType: "json",
    data:{
      action:action,
    },
    success:function(data)
    {
      $('#user').text(data.user);
      $('#username').text(data.username);
      action = 'update';
    }
  });
}
