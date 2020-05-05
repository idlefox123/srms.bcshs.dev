var selectedUser, action;

var userTable = $('#userTable').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "bFilter": true, "bInfo": true, "dom":'lt<"row"<"col-sm-2"i><"col-sm-8"><"col-sm-2"p>>',
  "bLengthChange": true, "bSort": false,
  "ajax":{
    url:"/srms.bcshs.dev/views/manageUser/userDataSource.php",
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

    $('#userTable tbody').on( 'click', 'tr', function () {
      var id = this.id;
        if ( $(this).hasClass('table-active') ) {
            $(this).removeClass('table-active');
            selectedUser = null;
            $('.userForm')[0].reset();
        }else {
          userTable.$('tr.table-active').removeClass('table-active');
          $(this).addClass('table-active');
          selectedUser = id;
          $('.userForm')[0].reset();
          getUser();
          $('#selectedUser').val(selectedUser);
          $('#update-user-btn').removeAttr('disabled');
          $('#delete-user-btn').removeAttr('disabled');
          $('#add-user-btn').attr('disabled','disabled');
          action = 'update';
          validated();
        }
    });

  }
});

$.fn.DataTable.ext.pager.numbers_length = 5;

$('#search').keyup( function(){
  userTable.search($(this).val()).draw();
});

function getUser(){
  action = 'edit';
  $.ajax({
    url: "/srms.bcshs.dev/views/manageUser/controller.php",
    method:"POST",
    dataType: "json",
    data:{
      action:action,
      selectedUser:selectedUser
    },
    success:function(data)
    {
      $('#user').val(data.user);
      $('#uname').val(data.username);
      $('#role').val(data.role);
    }
  });
}

$('#new-user-btn').on('click', function(){
  $('.userForm')[0].reset();
  $('#update-user-btn').attr('disabled','disabled');
  $('#delete-user-btn').attr('disabled','disabled');
  $('#add-user-btn').removeAttr('disabled');
  action = 'create';
  validate();
});

$('.userForm').on('submit', function(){
  event.preventDefault();
  $.ajax({
    url: "/srms.bcshs.dev/views/manageUser/controller.php",
    method:"POST",
    data:$('.userForm').serialize() + '&action=' + action + '&selectedUser=' + selectedUser,
    success:function(data)
    {
      userTable.draw(false);
      $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
      validated();
    }
  });
});

$('#delete-user-btn').on('click', function() {
  action = 'delete';
  if (selectedUser!=null) {
    if (confirm("Are you sure you want to delete")) {
      $.ajax({
        url: "/srms.bcshs.dev/views/manageUser/controller.php",
        method:"POST",
        data:{
          action:action,
          selectedUser:selectedUser
        },
        success:function(data)
        {
          userTable.draw(false);
          selectedUser = null;
          $('.userForm')[0].reset();
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
    + "Select a User to Delete." +
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
