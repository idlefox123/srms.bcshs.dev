var selectedDepartment,action;
var deptTable = $('#deptTable').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "bFilter": true, "bInfo": true, "dom":'lt<"row"<"col-sm-2"i><"col-sm-8"><"col-sm-2"p>>',
  "bLengthChange": true, "bSort": false,
  "ajax":{
    url:"/srms.bcshs.dev/views/department/departmentDataSource.php",
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

    $('#deptTable tbody').on( 'click', 'tr', function () {
      var id = this.id;
        if ( $(this).hasClass('table-active') ) {
            $(this).removeClass('table-active');
            selectedDepartment = null;
            $('.department-form')[0].reset();
        }else {
          deptTable.$('tr.table-active').removeClass('table-active');
          $(this).addClass('table-active');
          selectedDepartment = id;
          getDepartment();
          $('#update-department-btn').removeAttr('disabled');
          $('#delete-department-btn').removeAttr('disabled');
          $('#add-department-btn').attr('disabled','disabled');
          action = 'update';
          validated();
        }
    });

  }
});

$.fn.DataTable.ext.pager.numbers_length = 5;

$('#search').keyup( function(){
  deptTable.search($(this).val()).draw();
});

function getDepartment(){
  action = 'edit';
  $.ajax({
    url: "/srms.bcshs.dev/views/department/controller.php",
    method:"POST",
    dataType: "json",
    data:{
      action:action,
      selectedDepartment:selectedDepartment
    },
    success:function(data)
    {
      $('#department').val(data.dept_name);
      $('#acronym').val(data.acronym);
      $('#dept-head').val(data.dept_head);
      action = 'update';
    }
  });
}

$('#new-department-btn').on('click', function(){
  $('.department-form')[0].reset();
  $('#update-department-btn').attr('disabled','disabled');
  $('#delete-department-btn').attr('disabled','disabled');
  $('#add-department-btn').removeAttr('disabled');
  action = 'create';
  validate();
});



$('.department-form').on('submit', function(){
  event.preventDefault();
  $.ajax({
    url: "/srms.bcshs.dev/views/department/controller.php",
    method:"POST",
    data:$('.department-form').serialize() + '&action=' + action + '&selectedDepartment=' + selectedDepartment,
    success:function(data)
    {
      deptTable.draw(false);
      $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
      validated();
    }
  });
});

$('#delete-department-btn').on('click', function(){
  action = 'delete';
  if (selectedDepartment!=null) {
    if (confirm("Are you sure you want to delete")) {
      $.ajax({
        url: "/srms.bcshs.dev/views/department/controller.php",
        method:"POST",
        data:{
          action:action,
          selectedDepartment:selectedDepartment
        },
        success:function(data)
        {
          deptTable.draw(false);
          selectedDepartment = null;
          $('.department-form')[0].reset();
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
    + "Select a Subject." +
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
