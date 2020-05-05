
//*****************Class Schedules Table**************************
var  schedulesTable = $('#schedulesTable').DataTable({
  bFilter: false, bInfo: false, paging: false,
  bLengthChange: false, "bSort" : false,
  "aoColumns": [
          { mData: 'subject' },{ mData: 'days' },{ mData: 'time' },{ mData: 'room' },
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

function getClass() {
  action = 'getClass';
  $.ajax({
    url: "/srms.bcshs.dev/views/student - ClassSchedule/controller.php",
    method:"POST",
    dataType: "json",
    data:{
      action:action,
    },
    success:function(data)
    {
      $('#section').text(data.section);
    }
  });
}

function getClassSchedules() {
  $.ajax({
    url: "/srms.bcshs.dev/views/student - ClassSchedule/schedulesDataSource.php",
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
getClass();
getClassSchedules();
