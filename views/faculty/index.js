var selectedFaculty,action = $('#action').val();
var facultyTable = $('#facultyTable').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "bFilter": true, "bInfo": true, "dom":'lt<"row"<"col-sm-2"i><"col-sm-8"><"col-sm-2"p>>',
  "bLengthChange": true, "bSort": false,
  "ajax":{
    url:"/srms.bcshs.dev/views/faculty/facultyDataSource.php",
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

    $('#facultyTable tbody').on( 'click', 'tr', function () {
      var id = this.id;
        if ( $(this).hasClass('table-active') ) {
            $(this).removeClass('table-active');
            selectedFaculty = null;
            $('.facultyForm')[0].reset();
        }else {
          facultyTable.$('tr.table-active').removeClass('table-active');
          $(this).addClass('table-active');
          selectedFaculty = id;
          getFaculty();
          $('#selectedFaculty').val(selectedFaculty);
          $('#update-faculty-btn').removeAttr('disabled');
          $('#delete-faculty-btn').removeAttr('disabled');
          $('#add-faculty-btn').attr('disabled','disabled');
          action = 'update';
          validated();
        }
    });

  }
});

$.fn.DataTable.ext.pager.numbers_length = 5;

$('#search').keyup( function() {
  facultyTable.search($(this).val()).draw();
});

function getFaculty() {
  action = 'edit';
  $.ajax({
    url: "/srms.bcshs.dev/views/faculty/controller.php",
    method:"POST",
    dataType: "json",
    data:{
      action:action,
      selectedFaculty:selectedFaculty
    },
    success:function(data)
    {
      $('#fname').val(data.first_name);
      $('#lname').val(data.last_name);
      $('#mname').val(data.middle_name);
      $('#extension').val(data.extension_name);
      $('#contact').val(data.contact);
      $('#address').val(data.address);
      $('#position').val(data.position);
      $('#department').val(data.dept_id);
      action = 'update';
    }
  });
}

$('#new-faculty-btn').on('click', function(){
  $('.facultyForm')[0].reset();
  $('#update-faculty-btn').attr('disabled','disabled');
  $('#delete-faculty-btn').attr('disabled','disabled');
  $('#add-faculty-btn').removeAttr('disabled');
  action = 'create';
  validate();
});



$('.facultyForm').on('submit', function(){
  event.preventDefault();
  $.ajax({
    url: "/srms.bcshs.dev/views/faculty/controller.php",
    method:"POST",
    data:$('.facultyForm').serialize() + '&action=' + action + '&selectedFaculty=' + selectedFaculty,
    success:function(data)
    {
      facultyTable.draw(false);
      $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
      validated();
    }
  });
});

$('#delete-faculty-btn').on('click', function(){
  action = 'delete';
  if (selectedFaculty!=null) {
    if (confirm("Are you sure you want to delete")) {
      $.ajax({
        url: "/srms.bcshs.dev/views/faculty/controller.php",
        method:"POST",
        data:{
          action:action,
          selectedFaculty:selectedFaculty
        },
        success:function(data)
        {
          facultyTable.draw(false);
          selectedFaculty = null;
          $('.facultyForm')[0].reset();
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
    + "Select a Teacher to Delete." +
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
