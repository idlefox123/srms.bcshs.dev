var selectedClass,action;
var  classOfferingsTable = $('#classOfferingsTable').DataTable({
  "bServerSide": true,
  "bProcessing": false,
  "sAjaxSource": '/srms.bcshs.dev/views/generationOfReports/classRoaster/classOfferingsDataSource.php',
  "bSort" : false,"bLengthChange":false,
  "bFilter": false, "bInfo": true,"dom":'lt<"row"<"col-sm-2"i><"col-sm-8"><"col-sm-2"p>>',
  "aoColumns": [
        { mData: 'section'},
        { mData: 'info'}
      ],
      "fnServerData": function ( sSource, aoData, fnCallback ) {
        aoData.push({ "name": "level", "value": $('#levelFilter').val() });
        aoData.push({ "name": "strand", "value": $('#strandFilter').val() });
        $.getJSON( sSource, aoData, function (json) {
        /* Do whatever additional processing you want on the callback, then tell DataTables */
          //alert(json.iTotalDisplayRecords);
          fnCallback(json)
        });
      }
});

//*****************Select row on Offerings Table**************************
$('#classOfferingsTable tbody').on( 'click', 'tr', function () {
  var id = this.id;
    if ( $(this).hasClass('table-active') ) {
        $(this).removeClass('table-active');
        selectedClass = null;
        classStudentsTable.clear().draw();
        $('#section').text('');
    }else {
        classOfferingsTable.$('tr.table-active').removeClass('table-active');
        $(this).addClass('table-active');
        selectedClass = id;
        getClassStudents();
        getClass();
    }
});

//*****************Filter on Offerings Table**************************
$('#levelFilter, #strandFilter').on('change', function(){
  classOfferingsTable.draw();
});

$.fn.DataTable.ext.pager.numbers_length = 5;

//*****************Class Students Table**************************
var  classStudentsTable = $('#classStudentsTable').DataTable({
  bFilter: false, bInfo: false, paging: false,
  bLengthChange: false, "bSort" : false,
  "aoColumns": [
          { mData: 'no' },{ mData: 'lrn' },{ mData: 'name' },{ mData: 'gender' },
      ],
  "columnDefs": [{
          "targets": '_all',
          "createdCell": function (td, cellData, rowData, row, col) {
              $(td).css('padding', '10px')
            }
          },
          {"targets": [0,1,3], className: 'text-center'},

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
    url: "/srms.bcshs.dev/views/generationOfReports/classRoaster/controller.php",
    method:"POST",
    dataType: "json",
    data:{
      action:action,
      selectedClass:selectedClass
    },
    success:function(data)
    {
      $('#section').text(data.section);
    }
  });
}

function getClassStudents() {
  $.ajax({
    url: "/srms.bcshs.dev/views/generationOfReports/classRoaster/classStudentsDataSource.php",
    method: "POST",
    dataType: "json",
    data: {
      selectedClass:selectedClass,
    },
    success:function(data){
      classStudentsTable.clear();
      classStudentsTable.rows.add(data);
      classStudentsTable.draw();
    }
  });
}
