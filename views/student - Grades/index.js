var selectedStudent,gradeSelectedID,final;

$('#AY, #semester').on('change', function(){
  getStudentGrades();
  gradesTable.draw();
  //alert($('#schlYear').val()  );
  //studentTable.fnDraw();
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
    url: "/srms.bcshs.dev/views/student - Grades/student.php",
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

function getStudentGrades() {
  $.ajax({
    url: "/srms.bcshs.dev/views/student - Grades/gradesDataSource.php",
    method: "POST",
    dataType: "json",
    data: {
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
getStudentGrades();
function average(data) {
  var ave = 0, ctr = 0;
  data.forEach((item, i) => {
    ave = ave + parseInt(item.final);
    ctr++;
  });
  ave = Math.round(ave/ctr);
  return ave;
}
