var selectedSubject,selectedStudent,final;

var handledSubjectTable = $('#handledSubjectTable').DataTable({
  "bServerSide": true,
  "bProcessing": true,
  "sAjaxSource": '/srms.bcshs.dev/views/facultyClassRoaster/handledSubjectDataSource.php',
  "bFilter": true, "bInfo": true,"bSort" : false, "dom":'t<"row"<"col-sm-2"i><"col-sm-8"><"col-sm-2"p>>',
  "aoColumns": [
        { mData: 'subject' },{ mData: 'section' }
      ],
  "fnServerData": function ( sSource, aoData, fnCallback ) {
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

$('#handledSubjectTable tbody').on( 'click', 'tr', function () {
  var id = this.id;
    if ( $(this).hasClass('table-active') ) {
        $(this).removeClass('table-active');
        //selectedSubject = null;

    }else {
      handledSubjectTable.$('tr.table-active').removeClass('table-active');
      $(this).addClass('table-active');
      selectedSubject = id;
      getClass();
      getStudents();
    }
});

//*****************Students Table**************************
var  studentsTable = $('#studentsTable').DataTable({
  "rowId": 'gradeID',
  bFilter: false, bInfo: false, paging: false,
  bLengthChange: false, "bSort" : false,
  "aoColumns": [
        { mData: 'no' },{ mData: 'lrn' },{ mData: 'name' },{ mData: 'gender' },
      ],
      "columnDefs": [
        {
          "targets": '_all',
          "createdCell": function (td, cellData, rowData, row, col) {
            $(td).css('padding', '10px');
          },
        },
        {
          "targets": [0,1,3],
          className: 'text-center'
        }
      ],
      "rowCallback": function( row, data ) {
        if (data.gender == '1') {
          $('td:eq(3)',row).html('Male');
        }else{
          $('td:eq(3)',row).html('Female');
        }
      }

});

function getClass() {
  action = 'getClass';
  $.ajax({
    url: "/srms.bcshs.dev/views/facultyClassRoaster/controller.php",
    method:"POST",
    dataType: "json",
    data:{
      action:action,
      selectedSubject:selectedSubject,
    },
    success:function(data)
    {
      $('#section').text(data.section);
    }
  });
}

function getStudents() {
  $.ajax({
    url: "/srms.bcshs.dev/views/facultyClassRoaster/studentsDataSource.php",
    method: "POST",
    dataType: "json",
    data: {
      selectedSubject:selectedSubject,
    },
    success:function(data){
      studentsTable.clear();
      studentsTable.rows.add(data);
      studentsTable.draw();
    }
  })
}
