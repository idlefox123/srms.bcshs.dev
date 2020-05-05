var selectedRoom,action;
var roomTable = $('#roomTable').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "bFilter": true, "bInfo": true, "dom":'lt<"row"<"col-sm-2"i><"col-sm-8"><"col-sm-2"p>>',
  "bLengthChange": true, "bSOrt": false,
  "ajax":{
    url:"/srms.bcshs.dev/views/room/roomDataSource.php",
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

    $('#roomTable tbody').on( 'click', 'tr', function () {
      var id = this.id;
        if ( $(this).hasClass('table-active') ) {
            $(this).removeClass('table-active');
            selectedRoom = null;
            $('.roomForm')[0].reset();
        }else {
          roomTable.$('tr.table-active').removeClass('table-active');
          $(this).addClass('table-active');
          selectedRoom = id;
          edit();
          $('#selectedRoom').val(selectedRoom);
          $('#update-room-btn').removeAttr('disabled');
          $('#delete-room-btn').removeAttr('disabled');
          $('#add-room-btn').attr('disabled','disabled');
          action = 'update';
          validated()
        }
    });

  }
});

$.fn.DataTable.ext.pager.numbers_length = 5;

$('#search').keyup( function() {
  roomTable.search($(this).val()).draw();
});

function edit() {
  action = 'edit';
  $.ajax({
    url: "/srms.bcshs.dev/views/room/controller.php",
    method:"POST",
    dataType: "json",
    data:{
      action:action,
      selectedRoom:selectedRoom
    },
    success:function(data)
    {
      $('#room').val(data.room);
      action = 'update';
    }
  });
}

$('#new-room-btn').on('click', function() {
  $('.roomForm')[0].reset();
  $('#update-room-btn').attr('disabled','disabled');
  $('#delete-room-btn').attr('disabled','disabled');
  $('#add-room-btn').removeAttr('disabled');
  action = 'create';
  validate();
});



$('.roomForm').on('submit', function(){
  event.preventDefault();
  if (true) {
    $.ajax({
      url: "/srms.bcshs.dev/views/room/controller.php",
      method:"POST",
      data:$('.roomForm').serialize() + '&action=' + action + '&selectedRoom=' + selectedRoom,
      success:function(data)
      {
        roomTable.draw(false);
        $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
        validated();
      }
    });
  }else {
    alert('Select a Room.')
  }
});

$('#delete-room-btn').on('click', function(){
  action = 'delete';
  if (selectedRoom!=null) {
    if (confirm("Are you sure you want to delete")) {
      $.ajax({
        url: "/srms.bcshs.dev/views/room/controller.php",
        method:"POST",
        data:{
          action:action,
          selectedRoom:selectedRoom
        },
        success:function(data)
        {
          roomTable.draw(false);
          selectedRoom = null;
          $('.roomForm')[0].reset();
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
    + "Select a Room to Delete." +
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
