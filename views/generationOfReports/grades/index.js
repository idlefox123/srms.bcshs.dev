var selectedStudent,gradeSelectedID,final;

var studentTable = $('#studentTable').DataTable({
  "bServerSide": true,
  "bProcessing": true,
  "sAjaxSource": '/srms.bcshs.dev/views/generationOfReports/grades/studentDataSource.php',
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
      getStudentGrades();
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
  year = $('#AY').val();
  toYear = parseInt(year) + 1;
  semester = $('#semester').val();
  $('#currYear').text(year);
  $('#toYear').text(toYear);
  if (semester == 1) {
    $('#currSemester').text('First Semester');
  }else {
    $('#currSemester').text('Second Semester');
  }
  setQuarter(semester);
});


$('#search').keyup( function(){
  studentTable.search($(this).val()).draw();
});

$('#set-ay-btn').on('click', function(){
  $('#setAYModal').modal('show');
});

//*****************Grades Table**************************
var  gradesTable = $('#gradesTable').DataTable({
  bFilter: false, bInfo: false, paging: false,
  bLengthChange: false, "bSort" : false,
  "aoColumns": [
        { mData: 'type' },{ mData: 'subject' },{ mData: 'first_quarter' },{ mData: 'second_quarter' },{ mData: 'final' }
      ],
      "columnDefs": [
        {
          "targets": '_all',
          "createdCell": function (td, cellData, rowData, row, col) {
            $(td).css('padding', '10px');
          },
        },
        {
          "targets": [0,2,3,4],
          className: 'text-center'
        }
      ],

});

function getStudent() {
  $.ajax({
    url: "/srms.bcshs.dev/views/generationOfReports/grades/student.php",
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
      $('#age').text(data.age);
      if (data.gender == 1) {
        $('#gender').text('Male');
      }else {
        $('#gender').text('Female');
      }

    }
  })
}


function getStudentGrades() {
  $.ajax({
    url: "/srms.bcshs.dev/views/generationOfReports/grades/gradesDataSource.php",
    method: "POST",
    dataType: "json",
    data: {
      selectedStudent:selectedStudent,
      ay:$('#AY').val(),semester:$('#semester').val()
    },
    success:function(data){
      gradesTable.clear();
      gradesTable.rows.add(data);
      gradesTable.draw();

      $('#gradesTable').append(
        '<tr>'+
          '<td style="font-weight:bold" colspan="4"> <span class="float-right mr-3">General Average for the Semester</span> </td>'
          +'<td style="text-aligh:center">'+
            '<span class = "ave" style="font-weight:bold;margin-left:calc(50% - 10%)">' +
              average(data)
              +'</span>'
          +'</td>'+
        '</tr>'
      );
    }
  })
}

semester = $('#semester').val();
function setQuarter(semester) {
  if (semester == 1) {
    $('#quarter1').text('1st');
    $('#quarter2').text('2nd');
  }else {
    $('#quarter1').text('3rd');
    $('#quarter2').text('4th');
  }
}

setQuarter(semester);

function average(data) {
  var ave = 0, ctr = 0;
  data.forEach((item, i) => {
    ave = ave + parseInt(item.final);
    ctr++;
  });
  ave = Math.round(ave/ctr);
  return ave;
}
