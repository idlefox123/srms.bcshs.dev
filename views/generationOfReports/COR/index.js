var selectedStudent;

var studentTable = $('#studentTable').DataTable({
  "bServerSide": true,
  "bProcessing": true,
  "sAjaxSource": '/srms.bcshs.dev/views/generationOfReports/COR/studentDataSource.php',
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

});

$('#studentTable tbody').on( 'click', 'tr', function () {
  var id = this.id;
    if ( $(this).hasClass('table-active') ) {
        $(this).removeClass('table-active');
        selectedStudent = null;
        getStudent();

    }else {
      studentTable.$('tr.table-active').removeClass('table-active');
      $(this).addClass('table-active');
      selectedStudent = id;
      getStudent();
      getStudentSchedules();
    }
});

$('#sectionFilter').on('change', function(){
  $('#strandFilter').attr('disabled','disabled');
  $('#levelFilter').attr('disabled','disabled');
  if ($('#sectionFilter').val()=='') {
    $('#strandFilter').removeAttr('disabled');
    $('#levelFilter').removeAttr('disabled');
  }
  studentTable.draw();
});

$('#strandFilter, #levelFilter').on('change', function(){
  $('#sectionFilter').attr('disabled','disabled');
  if ($('#strandFilter').val()=='' && $('#levelFilter').val()=='') {
    $('#sectionFilter').removeAttr('disabled');
  }
  studentTable.clear();
});

$('#AY, #semester').on('change', function(){
  studentTable.draw();
  //alert($('#schlYear').val()  );
  //studentTable.fnDraw();
});


$('#search').keyup( function(){
  studentTable.search($(this).val()).draw();
});

$('#set-ay-btn').on('click', function(){
  $('#setAYModal').modal('show');
});

//*****************Students Schedules Table**************************
var  subjectsTable = $('#subjectsTable').DataTable({
  bFilter: false, bInfo: false, paging: false,
  bLengthChange: false, "bSort" : false,
  "aoColumns": [
        { mData: 'type' },{ mData: 'subject' },{ mData: 'hours' },{ mData: 'days' },{ mData: 'time' },{ mData: 'room' }
      ],
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

});

function getStudent() {
  $.ajax({
    url: "/srms.bcshs.dev/views/generationOfReports/COR/student.php",
    method: "POST",
    dataType: "json",
    data: {
      selectedStudent:selectedStudent,
      ay:$('#AY').val(),semester:$('#semester').val()
    },
    success:function(data){
      $('#name').text(data.student);
      $('#lrn').text(data.lrn);
      $('#level').text(data.grade_level);
      $('#trackStrand').text(data.trackStrand);
      $('#section').text(data.section);
      if (data.gender == 1) {
        $('#gender').text('Male');
      }else {
        $('#gender').text('Female');
      }

    }
  })
}


function getStudentSchedules() {
  $.ajax({
    url: "/srms.bcshs.dev/views/generationOfReports/COR/schedulesDataSource.php",
    method: "POST",
    dataType: "json",
    data: {
      selectedStudent:selectedStudent,
      ay:$('#AY').val(),semester:$('#semester').val()
    },
    success:function(data){
      subjectsTable.clear();
      subjectsTable.rows.add(data);
      subjectsTable.draw();
      $('#subjectsTable').append(
        '<tr>'
        + '<td>  </td>' +
          '<td style="text-align:center;font-weight:bold;">' + 'Total Subjects:' + '<span style="">&nbsp&nbsp'+ totalSubjects(data) +'</span>' +'</td>' +
          '<td style="text-align:center;font-weight:bold">' + totalHrs(data) +  '</td>' +
          '<td>  </td>' +
          '<td>  </td>' +
          '<td>  </td>' +
        '</tr>'
      );
    }
  })
}


function totalHrs(data) {
  var totalHrs = 0;
  data.forEach((item, i) => {
    if (parseInt(item.hours)>0) {
      totalHrs = totalHrs + parseInt(item.hours);
    }
  });
  return totalHrs;
}

function totalSubjects(data) {
  var ctr = 0;
  data.forEach((item, i) => {
    ctr++;
  });
  return ctr;
}
