var selectedStudent = '';
var studentTable = $('#studentTable').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "bFilter": true, "bInfo": false, "dom":'lt<"row"<"col-sm-2"i><"col-sm-8"><"col-sm-2"p>>',
  "bLengthChange": false,
  "bSort": false,
  "ajax":{
    url:"/srms.bcshs.dev/views/studentRegistration/studentDataSource.php",//datatable.inc.php
    type:"POST",
  }
});

$('#studentTable tbody').on( 'click', 'tr', function () {
  var id = this.id;
    if ( $(this).hasClass('table-active') ) {
        $(this).removeClass('table-active');
        selectedStudent = '';
        $('#studentRecordForm')[0].reset();
        pgTable.clear().draw();

    }else {
        studentTable.$('tr.table-active').removeClass('table-active');
        $(this).addClass('table-active');
        selectedStudent = id;
        getRecord();
    }
});
$.fn.DataTable.ext.pager.numbers_length = 5;
$('#search').keyup( function() {
  studentTable.search($(this).val()).draw();
});

$('#add-new-student-btn').on('click', function(){
  $('#addModalForm')[0].reset();
  pgTableAdd.clear().draw();
  validate();
});

function getRecord() {
  if (selectedStudent!='') {
    action = 'edit';
    $.ajax({
      url: "/srms.bcshs.dev/views/studentRegistration/studentRecordController.php",
      method:"POST",
      dataType: "json",
      data:{
        action:action,
        selectedStudent:selectedStudent
      },
      success:function(data){
        pgTable.clear();
        pgTable.draw();
        $('#enroll').removeAttr('disabled');
        $('#info').modal("show");
        $('#fname').val(data.first_name);
        $('#lname').val(data.last_name);
        $('#mname').val(data.middle_name);
        $('#extension').val(data.extension_name);
        $('#gender').val(data.gender);
        $('#contact').val(data.contact);
        $('#bdate').val(data.bdate);
        $('#age').val(data.age);
        $('#address').val(data.home_address);
        $('#schlName').val(data.school_name);
        $('#schlAddress').val(data.school_address);
        $('#status').val(data.status);
        $('#strand').val(data.strand_id);
        $('#grade').val(data.grade_level);
        $('#selectedID').val(selectedStudent);
      }
    });
  }else {
    $('#message').fadeIn().delay(2000).fadeOut('slow').html(message());
  }
}

//adding new Student
$('.addModalForm').on('submit', function(){
  event.preventDefault();
  action = 'insert';
  var row = pgTableAdd.rows().data().toArray();
  var p_data = JSON.stringify(row);
      $.ajax({
        url: "/srms.bcshs.dev/views/studentRegistration/studentRecordController.php",
        method:"POST",
        data:$('.addModalForm').serialize() + "&p_data=" + p_data + "&action=" + action,
        success:function(data)
        {
          $('#addModal').modal('hide');
          studentTable.draw( false );
          $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
          validated();
        }
      });
});

//updating student profile
$('.studentRecordForm').on('submit', function(){
  event.preventDefault();
  $('#action').val('update');
  if (selectedStudent!='') {
    $.ajax({
      url: "/srms.bcshs.dev/views/studentRegistration/studentRecordController.php",
      method:"POST",
      data:$('.studentRecordForm').serialize() + '&selectedStudent=' + selectedStudent,
      success:function(data)
      {
        studentTable.draw( false );
        $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
      }
    });
  }else {
    $('#message').fadeIn().delay(2000).fadeOut('slow').html(message());
  }
});


$('#go-to-enrollment-btn').on('click', function () {
  if (selectedStudent != '') {
    location.href = "/srms.bcshs.dev/Enrollment" + '/' + selectedStudent;
  }else {
    alert('Select a Student');
  }

});

function message() {
  message = '<div class="alert alert-danger position-absolute text-center" style="width:100%;">'
    + "Select a Student to View Profile." +
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

$('#bdate').datetimepicker({
  timepicker: false,
  datepicker: true,
  format: 'm-d-Y',
  value: '',
  week: true
})
