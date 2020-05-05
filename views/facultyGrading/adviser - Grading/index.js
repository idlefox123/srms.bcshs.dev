var studentSelectedID,gradeSelectedID,final;

var studentTable = $('#studentTable').dataTable({
  "bServerSide": true,
  "bProcessing": true,
  "sAjaxSource": '/srms.bcshs.dev/views/facultyGrading/studentDataSource.php',
  "bFilter": true, "bInfo": true,"bSort" : false, "dom":'t<"row"<"col-sm-2"i><"col-sm-8"><"col-sm-2"p>>',
  "aoColumns": [
        { mData: 'id' },{ mData: 'student' }
      ],
  "fnServerData": function ( sSource, aoData, fnCallback ) {
    aoData.push({ "name": "AY",       "value": $('#AY').val() });
    aoData.push({ "name": "semester", "value": $('#semester').val() });
    aoData.push({ "name": "section",  "value": $('#sectionFilter').val() });
    aoData.push({ "name": "strand",   "value": $('#strandFilter').val() });
    aoData.push({ "name": "level",    "value": $('#levelFilter').val() });
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
      "targets": [0],
      className: 'text-center'
    }
  ],
  "initComplete": function () {



  }
});

$('#studentTable tbody').on( 'click', 'tr', function () {
  var id = this.id;
    if ( $(this).hasClass('table-active') ) {
        $(this).removeClass('table-active');
        studentSelectedID = null;
        getStudent();
        //gradingTable.fnClearTable();not working
    }else {
      studentTable.$('tr.table-active').removeClass('table-active');
      $(this).addClass('table-active');
      studentSelectedID = id;
      getStudent();
      gradingTable.fnDraw();
    }
});

$('#sectionFilter').on('change', function(){
  $('#strandFilter').attr('disabled','disabled');
  $('#levelFilter').attr('disabled','disabled');
  if ($('#sectionFilter').val()=='') {
    $('#strandFilter').removeAttr('disabled');
    $('#levelFilter').removeAttr('disabled');
  }
  studentTable.fnDraw();
});



$('#strandFilter, #levelFilter').on('change', function(){
  $('#sectionFilter').attr('disabled','disabled');
  if ($('#strandFilter').val()=='' && $('#levelFilter').val()=='') {
    $('#sectionFilter').removeAttr('disabled');
  }
  studentTable.fnClearTable();
});
var oSettings = studentTable.fnSettings();

$('#AY, #semester').on('change', function(){
  studentTable.fnDraw();
  gradingTable.fnDraw();
});

$('#search').keyup( function(){
  studentTable.fnFilter($(this).val());
});

$('#set-ay-btn').on('click', function(){
  $('#setAYModal').modal('show');
});

var gradingTable = $('#gradingTable').dataTable({
  "bServerSide": true,
  "bProcessing": true,
  "sAjaxSource": '/srms.bcshs.dev/views/grading/gradingDataSource.php',
  "bFilter": true, "bInfo": true, "bSort" : false, "dom":'t<"row"<"col-sm-2"i><"col-sm-8"><"col-sm-2"p>>',
  "aoColumns": [
        { mData: 'ion' },{ mData: 'subject' },{ mData: 'first_quarter' },{ mData: 'second_quarter' },{ mData: 'final' },{ mData: 'remark' },
      ],
  "fnServerData": function ( sSource, aoData, fnCallback ) {
    aoData.push({ "name": "selectedID", "value": studentSelectedID });
    aoData.push({ "name": "AY",         "value": $('#AY').val() });
    aoData.push({ "name": "semester",   "value": $('#semester').val() });
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
      "targets": [0,2,3,4,5],
      className: 'text-center'
    }
  ],
  "initComplete": function () {

    $('#gradingTable tbody').on( 'click', 'tr', function () {
      var id = this.id;
        if ( $(this).hasClass('table-active') ) {

        }else {
          gradingTable.$('tr.table-active').removeClass('table-active');
          $(this).addClass('table-active');
          gradeSelectedID = id;
        }
    });

  }
});

$('#gradingTable').on('dblclick', function(){
  action = 'edit';
  if (gradeSelectedID != null) {
    $('#gradingModal').modal('show');
    $.ajax({
      url: "/srms.bcshs.dev/views/grading/gradingController.php",
      method: "POST",
      dataType: "json",
      data: {action:action, gradeSelectedID:gradeSelectedID,semester:$('#semester').val(), ay:$('#AY').val()},
      success:function(data){
        $('#action').val('update');
        $('#gradeSelectedID').val(gradeSelectedID);
        $('#subject').text(data.subject_name);
        $('#1st_quarter').val(data.first_quarter);
        $('#2nd_quarter').val(data.second_quarter);
        $('#final').val(data.final);
        $('#remark').val(data.remark);
      }
    })
  }else {
    alert('Select a row.');
  }

})

$('.gradingForm').on('submit', function(event){
  event.preventDefault();
  $.ajax({
    url: "/srms.bcshs.dev/views/grading/gradingController.php",
    method:"POST",
    data:$('.gradingForm').serialize(),
    success:function(data)
    {
      $('#gradingModal').modal('hide');
      gradingTable.fnDraw(false);
    }
  })
})

$('#1st_quarter, #2nd_quarter').on('change', function(){
  var f = parseInt($('#1st_quarter').val()), s = parseInt($('#2nd_quarter').val());
  var final = finalGrade(f,s);
  $('#final').val(final.toString())
  if (final>=75) {
    $('#remark').val('PASSED');
  }else {
    $('#remark').val('FAILED');
  }
})


function finalGrade(f_quarter,s_quarter){
  var final = (f_quarter + s_quarter)/2;
  return final;
}

function getStudent(){
  $.ajax({
    url: "/srms.bcshs.dev/views/grading/student.php",
    method: "POST",
    dataType: "json",
    data: {
      studentSelectedID:studentSelectedID,
      ay:$('#AY').val(),semester:$('#semester').val()
    },
    success:function(data){
      $('#student').text(data.student);
      $('#lrn').text(data.lrn);
      $('#level').text(data.grade_level);
      $('#strand').text(data.strand);
      $('#adviser').text(data.adviser);
      $('#section').text(data.section);
    }
  })
}
