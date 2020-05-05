var selectedClass, selectedSchedule, action;
var offeringsTable = $('#offeringsTable').DataTable({
  "bServerSide": true,
  "bProcessing": true,
  "sAjaxSource": '/srms.bcshs.dev/views/defClassOfferings/classOfferingsDataSource.php',
  "bFilter": true, "bInfo": true,"bSort" : false, "dom":'t<"row"<"col-sm-2"i><"col-sm-8"><"col-sm-2"p>>',
  "aoColumns": [
        { mData: 'section' },{ mData: 'gradeStrand' },
      ],
  "fnServerData": function ( sSource, aoData, fnCallback ) {
    aoData.push({ "name": "level", "value": $('#filterLevel').val() });
    aoData.push({ "name": "strand", "value": $('#filterStrand').val() });
    $.getJSON( sSource, aoData, function (json) {
    /* Do whatever additional processing you want on the callback, then tell DataTables */
    //alert(json.iTotalDisplayRecords);

      fnCallback(json)
    });
  },
  "columnDefs": [
    {
      "targets": '_all',
      "createdCell": function (td, cellData, rowData, row, col) {
        $(td).css('padding', '10px');
      },
    },

  ],

});

$('#offeringsTable tbody').on( 'click', 'tr', function () {
  var id = this.id;
    if ( $(this).hasClass('table-active') ) {
        $(this).removeClass('table-active');
        selectedClass = null;
        schedulesTable.clear().draw();

    }else {
        offeringsTable.$('tr.table-active').removeClass('table-active');
        $(this).addClass('table-active');
        selectedClass = id;
        action = 'update';
        getClassSchedules();
        validated();
    }
});

$.fn.DataTable.ext.pager.numbers_length = 5;

//*****************Costum Search Box for Offerings Table**************************
$('#search').keyup( function() {
  offeringsTable.search($(this).val()).draw();
});

$('#filterLevel, #filterStrand').on('change', function(){
  offeringsTable.draw();
});

$('.class-form').on('submit', function() {
  event.preventDefault();
  $.ajax({
    url: "/srms.bcshs.dev/views/defClassOfferings/classOfferingController.php",
    method:"POST",
    data:$('.class-form').serialize() + '&selectedClass=' + selectedClass + '&action=' + action,
    success:function(data)
    {
      $('#class-modal').modal('hide');
      offeringsTable.draw(false);
      $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
    }
  });
});

$('#remove-class-btn').on('click', function(){
  action = 'delete';
  if (selectedClass!=null) {
    if (confirm("Are you sure you want to delete")) {
      $.ajax({
        url: "/srms.bcshs.dev/views/defClassOfferings/classOfferingController.php",
        method:"POST",
        data:{
          action:action,
          selectedClass:selectedClass
        },
        success:function(data)
        {
          offeringsTable.draw(false);
          $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
        }
      });
    }
  }else {
    $('#message').fadeIn().delay(2000).fadeOut('slow').html(message1());
  }
});

$('#new-class-btn').on('click', function() {
  $('.class-form')[0].reset();
  $('.title-icon').addClass('fa fa-plus-circle');
  $('.modal-title').text("New Class Offering");
  $('.btn-action-icon').removeClass('fa fa-save');
  $('#action-btn').removeClass('btn-outline-success');
  $('#action-btn').addClass('btn-outline-primary');
  $('.btn-action-icon').addClass('fa fa-plus-circle');
  $('.btn-action-text').text(" Create");
  action = 'create';
  validate();
});

$('#edit-class-btn').on('click', function() {
  if (selectedClass != null) {
    getClass();
    $('#class-modal').modal('show');
    $('.class-form')[0].reset();
    $('.title-icon').removeClass('fa fa-plus-circle');
    $('.title-icon').addClass('fa fa-edit');
    $('#action-btn').removeClass('btn-outline-primary');
    $('#action-btn').addClass('btn-outline-success');
    $('.modal-title').text("Edit Class Offering");
    $('.btn-action-icon').removeClass('fa fa-plus-circle');
    $('#action-btn').removeClass('btn-outline-primary');
    $('#action-btn').addClass('btn-outline-success');
    $('.btn-action-icon').addClass('fa fa-save');
    $('.btn-action-text').text(" Update");
    action = 'update';
  }else {
    $('#message').fadeIn().delay(2000).fadeOut('slow').html(message1());
  }
})

$('#add-schedule-btn').on('click', function() {
  $('.schedule-form')[0].reset();
  $('.schedule-title-icon').addClass('fa fa-plus-circle');
  $('.schedule-modal-title').text("New Schedule");
  $('#schedule-action-btn').removeClass('btn-outline-success');
  $('#schedule-action-btn').addClass('btn-outline-primary');
  $('.schedule-btn-action-icon').removeClass('fa fa-save');
  $('.schedule-btn-action-icon').addClass('fa fa-plus-circle');
  $('.schedule-btn-action-text').text(" Create");
  action = 'create';
  validate();
});

function editSchedule() {
  if (selectedSchedule != null) {
    getClassSchedule();
    $('#schedule-modal').modal('show');
    $('.schedule-form')[0].reset();
    $('.schedule-title-icon').removeClass('fa fa-plus-circle');
    $('.schedule-title-icon').addClass('fa fa-edit');
    $('#schedule-action-btn').removeClass('btn-outline-primary');
    $('#schedule-action-btn').addClass('btn-outline-success');
    $('.schedule-modal-title').text("Edit Schedule");
    $('.schedule-btn-action-icon').removeClass('fa fa-plus-circle');
    $('#action-btn').removeClass('btn-outline-primary');
    $('#action-btn').addClass('btn-outline-success');
    $('.schedule-btn-action-icon').addClass('fa fa-save');
    $('.schedule-btn-action-text').text(" Update");
    action = 'update';
  }else {
    $('#message').fadeIn().delay(2000).fadeOut('slow').html(message2());
  }
}


//*****************Schedule Table**************************
var  schedulesTable = $('#schedulesTable').DataTable({
  "rowId": 'schedule',
  bFilter: false, bInfo: true,
  bLengthChange: false, bSort : false,
  "columns": [
        { mData: 'subject' },{ mData: 'days' },{ mData: 'time' },{ mData: 'room' },{ mData: 'teacher' },
      ],
  "columnDefs": [{
          "targets": '_all',
          "createdCell": function (td, cellData, rowData, row, col) {
              $(td).css('padding', '10px')
            }
          },
          {"targets": [1,2,3], className: 'text-center'}
        ],
});

$('#schedulesTable tbody').on( 'dblclick', 'tr', function () {
  var id = this.id;
    if ( $(this).hasClass('table-active') ) {
        $(this).removeClass('table-active');
        selectedSchedule = null;

    }else {
        schedulesTable.$('tr.table-active').removeClass('table-active');
        $(this).addClass('table-active');
        selectedSchedule = id;
        editSchedule();
        validated();
    }
});

$('.schedule-form').on('submit', function() {
  event.preventDefault();
  $.ajax({
    url: "/srms.bcshs.dev/views/defClassOfferings/classScheduleController.php",
    method:"POST",
    data:$('.schedule-form').serialize() + '&selectedClass=' + selectedClass + '&selectedSchedule=' + selectedSchedule + '&action=' + action,
    success:function(data)
    {
      $('#schedule-modal').modal('hide');
      getClassSchedules();
      schedulesTable.draw(false);
      $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
    }
  });
});

$('#remove-schedule-btn').on('click', function() {
  action = 'delete';
  if (selectedClass!=null) {
    if (confirm("Are you sure you want to delete")) {
      $.ajax({
        url: "/srms.bcshs.dev/views/defClassOfferings/classScheduleController.php",
        method:"POST",
        data:{
          action:action,
          selectedSchedule:selectedSchedule
        },
        success:function(data)
        {
          $('#schedule-modal').modal('hide');
          getClassSchedules();
          schedulesTable.draw(false);
          $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
        }
      });
    }
  }else {
    $('#message').fadeIn().delay(2000).fadeOut('slow').html(message2());
  }
});

function getClassSchedules() {
  $.ajax({
    url: "/srms.bcshs.dev/views/defClassOfferings/classScheduleDataSource.php",
    method: "POST",
    dataType: "json",
    data: {
      selectedClass:selectedClass,
    },
    success:function(data){
      schedulesTable.clear();
      schedulesTable.rows.add(data);
      schedulesTable.draw();
    }
  })
}

function getClass() {
  if (selectedClass!=null) {
    action = 'edit';
    $.ajax({
      url: "/srms.bcshs.dev/views/defClassOfferings/classOfferingController.php",
      method:"POST",
      dataType: "json",
      data:{
        action:action,
        selectedClass:selectedClass
      },
      success:function(data){
        $('#section').val(data.section_id);
        $('#level').val(data.grade_level);
        $('#strand').val(data.strand_id);
        action = 'update';
      }
    });
  }else {
    $('#message').fadeIn().delay(2000).fadeOut('slow').html(message1());
  }
}

function getClassSchedule() {
  if (selectedSchedule!=null) {
    action = 'edit';
    $.ajax({
      url: "/srms.bcshs.dev/views/defClassOfferings/classScheduleController.php",
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
        $('#teacher').val(data.teacher_id);
        action = 'update';
      }
    });
  }else {
    $('#message').fadeIn().delay(2000).fadeOut('slow').html(message2());
  }
}

$('#go-to-scheduling-btn').on('click', function(){
  location.href = "/srms.bcshs.dev/Class-Scheduling";
})

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
