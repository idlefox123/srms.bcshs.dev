var selectedClass,selectedClassSection,setRemovable,selectedSchedule,action,schedules;
var  defScheduleTable = $('#defScheduleTable').DataTable({
  "bServerSide": true,
  "bProcessing": false,
  "sAjaxSource": '/srms.bcshs.dev/views/classScheduling/defScheduleDataSource.php',
  "bFilter": true,
  "sSearch":true,
  "bInfo": true,
  "bPaginate": true,
  "bSort" : false,
  "aoColumns": [
        { mData: 'subject' },{ mData: 'days' },{ mData: 'time' },{ mData: 'room' },{ mData: 'teacher' },
      ],
      "fnServerData": function ( sSource, aoData, fnCallback ) {
        aoData.push({ "name": "section", "value": $('#filterSection').val() });
        aoData.push({ "name": "level",   "value": $('#filterLevel').val() });
        aoData.push({ "name": "strand",  "value": $('#filterStrand').val() });
        $.getJSON( sSource, aoData, function (json) {
        /* Do whatever additional processing you want on the callback, then tell DataTables */
        //alert(json.iTotalDisplayRecords);

          fnCallback(json)
        });
      },
      "columnDefs": [{
        "targets": '_all',
        "createdCell": function (td, cellData, rowData, row, col) {
          $(td).css('padding', '10px');
        },

      },
      {
        "targets": [1,2,3],
        className: 'text-center'
      }
      ],
      "initComplete": function () {

        $('#defScheduleTable tbody').on( 'click', 'tr', function () {
          var id = this.id;

            if ( $(this).hasClass('table-active') ) {
                $(this).removeClass('table-active');
            }else {
              //defScheduleTable.$('tr.table-active').removeClass('table-active');
              $(this).addClass('table-active');
            }
        });

      }

});

$.fn.DataTable.ext.pager.numbers_length = 5;

$('#classOffering').on('change', function() {
  selectedClass = $('#classOffering').val();//selected Class
  $('#selectedClass').val(selectedClass);
  getClass();
  getClassSchedule();
  classScheduleTable.clear().draw();
  //$('.classScheduleForm')[0].reset();
})

$('#filterSection').on('change', function(){
  $('#filterStrand').attr('disabled','disabled');
  $('#filterLevel').attr('disabled','disabled');
  if ($('#filterSection').val()=='') {
    $('#filterStrand').removeAttr('disabled');
    $('#filterLevel').removeAttr('disabled');
  }
  defScheduleTable.draw();
});

$('#filterLevel, #filterStrand').on('change', function(){
  defScheduleTable.draw();
  //alert('as');
});

//*****************Class Schedule Table**************************
var  classScheduleTable = $('#classScheduleTable').DataTable({
  "processing": false,
  bFilter: false, bInfo: true,
  bLengthChange: false,
  "bSort" : false,
  "rowId": 'rowID',
  "aoColumns": [
        { mData: 'subject' },{ mData: 'days' },{ mData: 'time' },{ mData: 'room' },{ mData: 'teacher' },
      ],
  "columnDefs": [{
          "targets": '_all',
          /*"createdCell": function (td, cellData, rowData, row, col) {
              $(td).css('padding', '10px')
            }*/
          },
          {"targets": [1,2,3], className: 'text-center'}
  ],
  createdRow: function( row, data, dataIndex ) {
    /*if ($(row).hasClass('new-schedule')) {
      $(row).removeClass('saved');
    }else {
      $(row).addClass('saved');
    }*/
    $(row).addClass('saved');
  },
    "initComplete": function () {


    }
});

$('#classScheduleTable tbody').on( 'dblclick', 'tr', function () {
  var id = this.id;
    if ( $(this).hasClass('saved') ) {
      selectedSchedule = id;
      getSchedule();
      setRemovable = false;
      $('#scheduleModal').modal('show');
    }else {
      setRemovable = true;
    }
    if ( $(this).hasClass('table-active') ) {
        $(this).removeClass('table-active');
    }else {
      classScheduleTable.$('tr.table-active').removeClass('table-active');
      $(this).addClass('table-active');
    }
});

$('#classScheduleTable tbody').on( 'click', 'tr', function () {
  var id = this.id;
    if ($(this).hasClass('new-schedule')) {//single click setRemovable to true
      setRemovable = true;
    }else {
      setRemovable = false;
    }
    if ( $(this).hasClass('table-active') ) {
        $(this).removeClass('table-active');
    }else {
      classScheduleTable.$('tr.table-active').removeClass('table-active');
      $(this).addClass('table-active');
      selectedSchedule = id;
    }
});

//*****************Remove Row On Class Schedule**************************
$('#remove-schedule-btn').on('click', function(){
  if (setRemovable){
    classScheduleTable.row( '.table-active' ).remove().draw(false);
  }
});

$('#save-class-btn').on('click', function(){
  var row = classScheduleTable.rows('.new-schedule').data().toArray();
  schedules = JSON.stringify(row);

});


//*****************Add to Class Schedule Table**************************
$('#add-subject-btn').on('click', function(){
  var newSchedule = defScheduleTable.rows('.table-active').data();
  for ( var i=0 ; i<newSchedule.length ; i++ )
  {
    var sched = classScheduleTable.row.add(newSchedule[i]).draw(false).node();
    $(sched).addClass('new-schedule');
    $(sched).removeClass('saved');
    defScheduleTable.row('.table-active').remove().draw( false );
  }
});

//*****************Insert Schedule in Class**************************
$('.classScheduleForm').on('submit', function(){
  event.preventDefault();
  action = 'create';
  if (true) {
    $.ajax({
      url: "/srms.bcshs.dev/views/classScheduling/classSchedulingController.php",
      method:"POST",
      data:{
        action:action,
        selectedClass:selectedClass,
        schedules:schedules
      },
      success:function(data)
      {
        getClassSchedule();
      }
    });
  }else {
    alert('Select a Offering.')
  }
});

//*****************Update Schedule using Modal**************************
$('.scheduleFormModal').on('submit', function(){
  event.preventDefault();
  action = 'update';
  $.ajax({
    url: "/srms.bcshs.dev/views/classScheduling/classSchedulingController.php",
    method:"POST",
    data:$('.scheduleFormModal').serialize() + '&selectedSchedule=' + selectedSchedule + '&action=' + action,
    success:function(data)
    {
      getClassSchedule();
      classScheduleTable.clear().draw(false);
      $('#scheduleModal').modal('hide');
      $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
    }
  });
});

//*****************Remove Class Schedule using Modal**************************
$('#remove-saved-schedule-btn').on('click', function() {
  action = 'delete';
  if (selectedSchedule!=null) {
    if (confirm("Are you sure you want to delete")) {
      $.ajax({
        url: "/srms.bcshs.dev/views/classScheduling/classSchedulingController.php",
        method:"POST",
        data:{
          action:action,
          selectedSchedule:selectedSchedule
        },
        success:function(data)
        {
          getClassSchedule();
          classScheduleTable.clear().draw(false);
          $('#scheduleModal').modal('hide');
          $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
        }
      });
    }
  }else {
    alert('Select Schedule');
  }
});

//*****************Fill Schedule Modal**************************

function getSchedule() {
  action = 'edit';
  $.ajax({
    url: "/srms.bcshs.dev/views/classScheduling/classSchedulingController.php",
    method:"POST",
    dataType: "json",
    data:{
      action:action,
      selectedSchedule:selectedSchedule
    },
    success:function(data){
      $('#subject').val(data.subject_id);
      $('#day').val(data.days);
      $('#time').val(data.time);
      $('#room').val(data.room_id);
      $('#editAdviser').val(data.teacher_id);
    }
  });
}

function getClassSchedule(){
  $.ajax({
    url: "/srms.bcshs.dev/views/classScheduling/classScheduleDataSource.php",
    method: "POST",
    dataType: "json",
    data: {
      selectedClass:selectedClass,
    },
    success:function(data){
      classScheduleTable.clear();
      classScheduleTable.rows.add(data);
      classScheduleTable.draw();
    }
  })
}

function getClass() {
  action = 'getClass';
  $.ajax({
    url: "/srms.bcshs.dev/views/classScheduling/classSchedulingController.php",
    method:"POST",
    dataType: "json",
    data:{
      action:action,
      selectedClass:selectedClass
    },
    success:function(data){
      $('#level').val(data.grade_level);
      $('#strand').val(data.strand_id);
      $('#adviser').val(data.adviser);
      $('#enrolled').val(data.enrolled);
      $('#maxEnrollee').val(data.max_enrollee);
    }
  });
}


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

function message1() {
  message = '<div class="alert alert-danger position-absolute text-center" style="width:100%;">'
    + "Select a Class to View." +
    '</div>'
    return message;
}

function message2() {
  message = '<div class="alert alert-danger position-absolute text-center" style="width:100%;">'
    + "Select a Schedule to View." +
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

$('#go-to-def-scheduling-btn').on('click', function(){
  location.href = "/srms.bcshs.dev/Default-Class-Offerings";
})

$('#go-to-class-Offerings-btn').on('click', function(){
  location.href = "/srms.bcshs.dev/Class-Offerings";
})

$('#sidebar').toggleClass('active');
$('#main-container').toggleClass('active');
$(".btn").css("box-shadow","0 0 0 0");
