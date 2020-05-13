var selectedSection,action;
function getUser(){
  action = 'edit';
  $.ajax({
    url: "/srms.bcshs.dev/views/facultyProfile/controller.php",
    method:"POST",
    dataType: "json",
    data:{
      action:action,
    },
    success:function(data)
    {
      $('#name').text(data.name);
      if (data.contact == '') {
          $('#contact').text('#');
      }else {
        $('#contact').text(data.contact);
      }
      $('#address').text(data.address);
      $('#position').text(data.position);
      $('#department').text(data.dept_name);
    }
  });
}

getUser();

$('#edit-faculty-btn').on('click', function(){
  action = 'edit';
  $('#facultyModal').modal('show');
  $.ajax({
    url: "/srms.bcshs.dev/views/facultyProfile/controller.php",
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
      $('#edit-address').val(data.address);
      $('#edit-position').val(data.position);
      $('#edit-department').val(data.dept_id);
    }
  });
})

$('.facultyForm').on('submit', function(){
  event.preventDefault();
  action = 'update';
  $.ajax({
    url: "/srms.bcshs.dev/views/facultyProfile/controller.php",
    method:"POST",
    data:$('.facultyForm').serialize() + '&action=' + action,
    success:function(data)
    {
      $('#facultyModal').modal('hide');
      getUser();
      $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
    }
  });
});
