//*****************Class Schedules Table**************************
var  schedulesTable = $('#schedulesTable').DataTable({
  bFilter: false, bInfo: false, paging: false,
  bLengthChange: false, "bSort" : false,
  "aoColumns": [
          { mData: 'subject' },{ mData: 'days' },{ mData: 'time' },{ mData: 'room' }
      ],
  "columnDefs": [{
          "targets": '_all',
          "createdCell": function (td, cellData, rowData, row, col) {
              $(td).css('padding', '10px')
            }
          },
          {"targets": [1,2,3], className: 'text-center'},

        ],

});

function getSchedules() {
  $.ajax({
    url: "/srms.bcshs.dev/views/facultyClassSchedule/schedulesDataSource.php",
    method: "POST",
    dataType: "json",
    data: {

    },
    success:function(data){
      schedulesTable.clear();
      schedulesTable.rows.add(data);
      schedulesTable.draw();
    }
  });
}
getSchedules();
