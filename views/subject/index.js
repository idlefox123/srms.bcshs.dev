var selectedSubject,action;
var subjectTable = $('#subjectTable').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "bFilter": true, "bInfo": true, "dom":'lt<"row"<"col-sm-2"i><"col-sm-8"><"col-sm-2"p>>',
  "bLengthChange": true, "bSort": false,
  "ajax":{
    url:"/srms.bcshs.dev/views/subject/subjectDataSource.php",
    type:"POST",
  },
  /*"oLanguage":
         {
          "sZeroRecords": "No matching Subject found for this filter",
          "sSearch": "Filter:"
        },*/
  "columnDefs": [{
              "targets": '_all',
              "createdCell": function (td, cellData, rowData, row, col) {

              }
          },
        ],

  "initComplete": function () {

    $('#subjectTable tbody').on( 'click', 'tr', function () {
      var id = this.id;
        if ( $(this).hasClass('table-active') ) {
            $(this).removeClass('table-active');
            selectedSubject = null;
            $('.subjectForm')[0].reset();
        }else {
          subjectTable.$('tr.table-active').removeClass('table-active');
          $(this).addClass('table-active');
          selectedSubject = id;
          getSubject();
          $('#selectedSubject').val(selectedSubject);
          $('#update-subject-btn').removeAttr('disabled');
          $('#delete-subject-btn').removeAttr('disabled');
          $('#add-subject-btn').attr('disabled','disabled');
          action = 'update';
          validated();
        }
    });

  }
});

$.fn.DataTable.ext.pager.numbers_length = 5;

$('#search').keyup( function(){
  subjectTable.search($(this).val()).draw();
});

function getSubject(){
  action = 'edit';
  $.ajax({
    url: "/srms.bcshs.dev/views/subject/controller.php",
    method:"POST",
    dataType: "json",
    data:{
      action:action,
      selectedSubject:selectedSubject
    },
    success:function(data)
    {
      $('#subject').val(data.subject_name);
      $('#ion').val(data.ion_id);
      action = 'update';
    }
  });
}

$('#new-subject-btn').on('click', function(){
  $('.subjectForm')[0].reset();
  $('#update-subject-btn').attr('disabled','disabled');
  $('#delete-subject-btn').attr('disabled','disabled');
  $('#add-subject-btn').removeAttr('disabled');
  action = 'create';
  validate();
});



$('.subjectForm').on('submit', function(){
  event.preventDefault();
  if (true) {
    $.ajax({
      url: "/srms.bcshs.dev/views/subject/controller.php",
      method:"POST",
      data:$('.subjectForm').serialize() + '&action=' + action + '&selectedSubject=' + selectedSubject,
      success:function(data)
      {
        subjectTable.draw(false);
        $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
        validated();
      }
    });
  }else {
    alert('Select a Subject.')
  }
});

$('#delete-subject-btn').on('click', function(){
  action = 'delete';
  if (selectedSubject!=null) {
    if (confirm("Are you sure you want to delete")) {
      $.ajax({
        url: "/srms.bcshs.dev/views/subject/controller.php",
        method:"POST",
        data:{
          action:action,
          selectedSubject:selectedSubject
        },
        success:function(data)
        {
          subjectTable.draw(false);
          selectedSubject = null;
          $('.subjectForm')[0].reset();
          action = 'update';
          $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
        }
      });
    }
  }else {
    $('#message').fadeIn().delay(2000).fadeOut('slow').html(message());
  }
});

function message() {
  message = '<div class="alert alert-danger position-absolute text-center" style="width:100%;">'
    + "Select a Subject to Delete." +
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
