var selectedSubject,action;

var  currTable = $('#currTable').DataTable({
  "bServerSide": true,
  "bProcessing": true,
  "sAjaxSource": '/srms.bcshs.dev/views/curriculum/currDataSource.php',
  "bSort" : false,"bLengthChange":true,
  "bFilter": true, "bInfo": true,"dom":'lt<"row"<"col-sm-2"i><"col-sm-8"><"col-sm-2"p>>',
  "aoColumns": [
        { mData: 'type'},{ mData: 'subjects'},{ mData: 'hours'},{ mData: 'strand'}
      ],
      "fnServerData": function ( sSource, aoData, fnCallback ) {
        aoData.push({ "name": "strand",   "value": $('#filterStrand').val() });
        aoData.push({ "name": "level",    "value": $('#filterLevel').val() });
        aoData.push({ "name": "semester", "value": $('#filterSemester').val() });
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
        {
          "targets": [0,2,3],
          className: 'text-center'
        }
      ],
});

$('#currTable tbody').on( 'click', 'tr', function () {
  var id = this.id;

    if ( $(this).hasClass('table-active') ) {
        $(this).removeClass('table-active');
        selectedSubject = null;
        $('.curr-form')[0].reset();
    }else {
      currTable.$('tr.table-active').removeClass('table-active');
      $(this).addClass('table-active');
      selectedSubject = id;
      getCurrSubject();
      $('#add-subject-btn').attr('disabled','disabled');
      $('#update-subject-btn').removeAttr('disabled');
      $('#delete-subject-btn').removeAttr('disabled');
      action = 'update';
      validated()
    }
});

$.fn.DataTable.ext.pager.numbers_length = 5;

$('#search').keyup( function() {
  currTable.search($(this).val()).draw();
});

$('#filterLevel, #filterStrand, #filterSemester').on('change', function() {
  currTable.draw();
});

function getCurrSubject() {
  action = 'edit';
  $.ajax({
    url: "/srms.bcshs.dev/views/curriculum/controller.php",
    method:"POST",
    dataType: "json",
    data:{
      action:action,
      selectedSubject:selectedSubject
    },
    success:function(data)
    {
      $('#subject').val(data.subject_id);
      $('#hours').val(data.hours);
      $('#strand').val(data.strand_id);
      $('#level').val(data.grade_level);
      $('#semester').val(data.semester);
      action = 'update';
    }
  });
}

$('#new-subject-btn').on('click', function() {
  $('.curr-form')[0].reset();
  $('#update-subject-btn').attr('disabled','disabled');
  $('#delete-subject-btn').attr('disabled','disabled');
  $('#add-subject-btn').removeAttr('disabled');
  action = 'create';
  validate();
});

$('.curr-form').on('submit', function() {
  event.preventDefault();
  $.ajax({
    url: "/srms.bcshs.dev/views/curriculum/controller.php",
    method:"POST",
    data:$('.curr-form').serialize() + '&action=' + action + '&selectedSubject=' + selectedSubject,
    success:function(data)
    {
      currTable.draw(false);
      $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
      validated();
    }
  });
});

$('#delete-subject-btn').on('click', function() {
  action = 'delete';
  if (selectedSubject!=null) {
    if (confirm("Are you sure you want to delete")) {
      $.ajax({
        url: "/srms.bcshs.dev/views/curriculum/controller.php",
        method:"POST",
        data:{
          action:action,
          selectedSubject:selectedSubject
        },
        success:function(data)
        {
          currTable.draw(false);
          selectedSubject = null;
          $('.curr-form')[0].reset();
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
