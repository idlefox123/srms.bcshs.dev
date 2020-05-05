var selectedOffering, action;
//*****************Offerings Table**************************
var  offeringsTable = $('#offeringsTable').DataTable({
  "bServerSide": true,
  "bProcessing": true,
  "sAjaxSource": '/srms.bcshs.dev/views/classOfferings/offeringsDataSource.php',
  "bFilter": true, "bInfo": true, "dom":'lt<"row"<"col-sm-2"i><"col-sm-8"><"col-sm-2"p>>',
  "bSort" : false,
  "bLengthChange": true,
  "aoColumns": [{ mData: 'section'}],
      "fnServerData": function ( sSource, aoData, fnCallback ) {
        aoData.push({ "name": "level", "value": $('#filterLevel').val() });
        aoData.push({ "name": "strand", "value": $('#filterStrand').val() });
        $.getJSON( sSource, aoData, function (json) {
        /* Do whatever additional processing you want on the callback, then tell DataTables */
          //alert(json.iTotalDisplayRecords);
          //offeringsTable.rows().recalcHeight().draw();

          fnCallback(json)
        });
      }
});

$('#offeringsTable tbody').on( 'click', 'tr', function () {
  var id = this.id;
    if ( $(this).hasClass('table-active') ) {
        $(this).removeClass('table-active');
        selectedOffering = null;
        $('.offeringsForm')[0].reset();

    }else {
        offeringsTable.$('tr.table-active').removeClass('table-active');
        $(this).addClass('table-active');
        selectedOffering = id;
        offering();
        offeringsSchedule();
        scheduleTable.clear();
        $('#update-offering-btn').removeAttr('disabled');
        $('#delete-offering-btn').removeAttr('disabled');
        $('#add-offering-btn').attr('disabled','disabled');
        action = 'update';
        validated();
    }
});

$('#show-schedule-btn').on('click', function(){
  $('#scheduleModal').modal('show');
});

//*****************Costum Search Box for Offerings Table**************************
$('#search').keyup( function(){
  offeringsTable.search($(this).val()).draw();
});

$('#filterLevel, #filterStrand').on('change', function(){
  offeringsTable.draw();
});

$('#new-offering-btn').on('click', function(){
  $('.offeringsForm')[0].reset();
  $('#update-offering-btn').attr('disabled','disabled');
  $('#delete-offering-btn').attr('disabled','disabled');
  $('#add-offering-btn').removeAttr('disabled');
  action = 'create';
  validate();
});



$('.offeringsForm').on('submit', function(){
  event.preventDefault();
  if (true) {
    $.ajax({
      url: "/srms.bcshs.dev/views/classOfferings/controller.php",
      method:"POST",
      data:$('.offeringsForm').serialize() + '&selectedOffering=' + selectedOffering + '&action=' + action,
      success:function(data)
      {
        offeringsTable.draw(false);
        $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
        validated();
      }
    });
  }else {
    alert('Select a Offering.')
  }
});

$('#delete-offering-btn').on('click', function(){
  action = 'delete';
  if (selectedOffering!=null) {
    if (confirm("Are you sure you want to delete")) {
      $.ajax({
        url: "/srms.bcshs.dev/views/classOfferings/controller.php",
        method:"POST",
        data:{
          action:action,
          selectedOffering:selectedOffering
        },
        success:function(data)
        {
          offeringsTable.draw(false);
          selectedOffering = null;
          $('.offeringsForm')[0].reset();
          action = 'update';
          $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
        }
      });
    }
  }else {
    $('#message').fadeIn().delay(2000).fadeOut('slow').html(message());
  }
});




//*****************Schedule Table**************************
var  scheduleTable = $('#scheduleTable').DataTable({
  bFilter: false, bInfo: false,
  bLengthChange: false, bSort : false,
  "columns": [
        { mData: 'subject' },{ mData: 'days' },{ mData: 'time' },{ mData: 'room' },
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

function offeringsSchedule(){
  $.ajax({
    url: "/srms.bcshs.dev/views/classOfferings/offeringsSchedule.php",
    method: "POST",
    dataType: "json",
    data: {
      selectedOffering:selectedOffering,
    },
    success:function(data){
      scheduleTable.clear();
      scheduleTable.rows.add(data);
      scheduleTable.draw();
    }
  })
}
function offering(){
  if (selectedOffering!=null) {
    action = 'edit';
    $.ajax({
      url: "/srms.bcshs.dev/views/classOfferings/controller.php",
      method:"POST",
      dataType: "json",
      data:{
        action:action,
        selectedOffering:selectedOffering
      },
      success:function(data){
        $('#section').val(data.section_id);
        $('#level').val(data.grade_level);
        $('#strand').val(data.strand_id);
        $('#adviser').val(data.adviser);
        $('#enrolled').val(data.enrolled);
        $('#maxEnrollee').val(data.max_enrollee);
      }
    });
  }else {
    alert('Select a row');
  }
}

$('#go-to-scheduling-btn').on('click', function(){
  location.href = "/srms.bcshs.dev/Class-Scheduling";
})

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
