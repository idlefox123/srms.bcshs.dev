var enrollee = $('#enrollee').val();

$('#enroll-student-btn').on('click', function(){
  var action = 'create';
  $.ajax({
    url: "/srms.bcshs.dev/views/studentEnrollment/enrollmentController.php",
    method: "POST",
    data:{
      action:action, enrollee:enrollee, strand:$('#strand').val(), level:$('#level').val(), status:$('#status').val(),
    },
    success:function(data){
      location.href = "/srms.bcshs.dev/Scheduling-Enrollee/" + enrollee;
    }
  })
});



$('#edit-enrollee-btn').on('click', function(){
  $('#studEnrollModal').modal('show');
});

$('#update-enrollee-btn').on('click', function(){
  action = 'update';

  $.ajax({
    url: "/srms.bcshs.dev/views/studentEnrollment/enrollmentController.php",
    method: "POST",
    dataType: "json",
    data:{
      action:action, enrollee:enrollee, strand:$('#enrolleeStrand').val(), level:$('#enrolleeLevel').val(), status:$('#enrolleeStatus').val(),
    },
    success:function(data){
      $('#studEnrollModal').modal('hide');
      $('#level').val(data.grade_level);
      $('#strand').val(data.strand_id);
      $('#status').val(data.status);
    }
  })
});

$('#back-btn').on('click', function(){
  location.href = "/srms.bcshs.dev/Registration";
});

function getEnrollee(){
  action = 'getEnrollee';
    $('#studEnrollModal').modal('show');
  $.ajax({
    url: "/srms.bcshs.dev/views/studentEnrollment/enrollmentController.php",
    method: "POST",
    dataType: "json",
    data:{
      action:action, enrollee:enrollee
    },
    success:function(data){
      $('#level').val(data.grade_level);
      $('#strand').val(data.strand_id);
      $('#status').val(data.status);
    }
  })
}
