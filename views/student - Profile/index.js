var selectedSection,action;
function getUser(){
  action = 'edit';
  $.ajax({
    url: "/srms.bcshs.dev/views/student - Profile/controller.php",
    method:"POST",
    dataType: "json",
    data:{
      action:action,
    },
    success:function(data)
    {
      $('#name').text(data.name);
      $('#lrn').text(data.lrn);
      $('#strand').text(data.strand);
      $('#level').text(data.grade_level);
      if (data.contact == '') {
          $('#contact').text('#');
      }else {
        $('#contact').text(data.contact);
      }
      $('#address').text(data.home_address);

    }
  });
}

getUser();

$('#edit-profile-btn').on('click', function(){
  action = 'edit';
  $('#profile-modal').modal('show');
  $.ajax({
    url: "/srms.bcshs.dev/views/student - Profile/controller.php",
    method:"POST",
    dataType: "json",
    data:{
      action:action,
    },
    success:function(data)
    {
      $('#fname').val(data.first_name);
      $('#lname').val(data.last_name);
      $('#mname').val(data.middle_name);
      $('#extension').val(data.extension_name);
      $('#edit-contact').val(data.contact);
      $('#edit-address').val(data.home_address);
    }
  });
})

$('.profile-form').on('submit', function() {
  event.preventDefault();
  action = 'update';
  $.ajax({
    url: "/srms.bcshs.dev/views/student - Profile/controller.php",
    method:"POST",
    data:$('.profile-form').serialize() + '&action=' + action,
    success:function(data)
    {
      $('#profile-modal').modal('hide');
      getUser();
    }
  });
});
