var selectedClass,action;
//*****************Class Students Table**************************
var  studentsTable = $('#studentsTable').DataTable({
  bFilter: false, bInfo: false, paging: false,
  bLengthChange: false, "bSort" : false,
  "aoColumns": [
          { mData: 'no' },{ mData: 'lrn' },{ mData: 'name' },{ mData: 'trackStrand' },{ mData: 'level' },{ mData: 'section' },
      ],
  "columnDefs": [{
          "targets": '_all',
          "createdCell": function (td, cellData, rowData, row, col) {
              $(td).css('padding', '10px')
            }
          },
          {"targets": [0,1,4], className: 'text-center'},

        ],

});

getEnrolledStudent();

function getEnrolledStudent() {
  $.ajax({
    url: "/srms.bcshs.dev/views/generationOfReports/masterList/studentsDataSource.php",
    method: "POST",
    dataType: "json",
    success:function(data){
      studentsTable.clear();
      studentsTable.rows.add(data);
      studentsTable.draw();
    }
  });
}
