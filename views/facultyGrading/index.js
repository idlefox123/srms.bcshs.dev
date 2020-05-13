var selectedSubject,selectedStudent,final;

var handledSubjectTable = $('#handledSubjectTable').DataTable({
  "bServerSide": true,
  "bProcessing": true,
  "sAjaxSource": '/srms.bcshs.dev/views/facultyGrading/handledSubjectDataSource.php',
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
      getStudentsGrades();
    }
});

//*****************Students Table**************************
var  studentsTable = $('#studentsTable').DataTable({
  "rowId": 'gradeID',
  bFilter: false, bInfo: false, paging: false,
  bLengthChange: false, "bSort" : false,
  "aoColumns": [
        { mData: 'name' },{ mData: 'first_quarter' },{ mData: 'second_quarter' },{ mData: 'final' },{ mData: 'remark' }
      ],
      "columnDefs": [
        {
          "targets": '_all',
          "createdCell": function (td, cellData, rowData, row, col) {
            $(td).css('padding', '10px');
          },
        },
        {
          "targets": [1,2,3,4],
          className: 'text-center'
        }
      ],

});

$('#studentsTable tbody').on( 'dblclick', 'tr', function () {
  var id = this.id;
    if ( $(this).hasClass('table-active') ) {
        $(this).removeClass('table-active');
        selectedStudent = null;

    }else {
      studentsTable.$('tr.table-active').removeClass('table-active');
      $(this).addClass('table-active');
      selectedStudent = id;
      getGrade();
    }
});

$('.gradingForm').on('submit', function(event) {
  event.preventDefault();
  action = 'update';
  $.ajax({
    url: "/srms.bcshs.dev/views/facultyGrading/controller.php",
    method:"POST",
    data:$('.gradingForm').serialize() + '&action=' + action + '&selectedStudent=' + selectedStudent,
    success:function(data)
    {
      $('#gradingModal').modal('hide');
      getStudentsGrades();
      studentsTable.draw(false);
      $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
    }
  })
})

function getGrade() {
  action = 'edit';
  $('#gradingModal').modal('show');
  if (selectedStudent != null) {
    $('#gradingModal').modal('show');
    $.ajax({
      url: "/srms.bcshs.dev/views/facultyGrading/controller.php",
      method: "POST",
      dataType: "json",
      data: {action:action, selectedStudent:selectedStudent},
      success:function(data){
        action = 'update';
        $('#action').val('update');
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
}

function getClass() {
  action = 'getClass';
  $.ajax({
    url: "/srms.bcshs.dev/views/facultyGrading/controller.php",
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

function getStudentsGrades() {
  $.ajax({
    url: "/srms.bcshs.dev/views/facultyGrading/studentsDataSource.php",
    method: "POST",
    dataType: "json",
    data: {
      selectedSubject:selectedSubject,
    },
    success:function(data){
      studentsTable.clear();
      studentsTable.rows.add(data);
      studentsTable.draw();
      $('#studentsTable').append(
        '<tr>'
          +'<td></td>'+ '<td></td>'+ '<td></td>'+ '<td></td>'+ '<td></td>'+
        '</tr>'
      );
    }
  })
}

$('#1st_quarter').on('change', function() {
  var f = parseInt($('#1st_quarter').val());
  if (f=='') {
    f=0;
  }
  if (f!=0 || f!='') {
    if (f>=75) {
      $('#remark').val('PASSED');
    }else {
      $('#remark').val('FAILED');
    }
  }else {
    $('#remark').val('PENDING');
  }
  $('#final').val(f);
})

$('#2nd_quarter').on('change', function() {
  var f = parseInt($('#1st_quarter').val()), s = parseInt($('#2nd_quarter').val());
  var final = Math.round(finalGrade(f,s));
  $('#final').val(final);
  if (s!=0 || s!='') {
    if (final>=75) {
      $('#remark').val('PASSED');
    }else {
      $('#remark').val('FAILED');
    }
  }else {
    $('#final').val(f);
    $('#remark').val('PENDING');
  }

})

function finalGrade(f_quarter,s_quarter) {
  var final = (f_quarter + s_quarter)/2;
  return final;
}
