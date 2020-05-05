var selectedEnrolleeSchedule ,offerSelectedID, schedSelectedID,actionv, removable = false, classEnrolledID;
var selectedEnrolleeID = $('#selectedEnrolleeID').val(), selectedStudent= $('#selectedStudent').val();

  var  enrolleeTable = $('#enrolleeTable').DataTable({
    "serverSide": true,
    "processing": true,
    "sAjaxSource": '/srms.bcshs.dev/views/studentScheduling/enrolleeDataSource.php',
    bFilter: false, bInfo: true, bLengthChange: false, "bSort" : false,
    "aoColumns": [
          { mData: 'subject'},{ mData: 'days'},{ mData: 'time'},{ mData: 'room'}

        ],
        "fnServerData": function ( sSource, aoData, fnCallback ) {
          aoData.push({ "name": "selectedEnrolleeID", "value": selectedEnrolleeID });
          $.getJSON( sSource, aoData, function (json) {
          /* Do whatever additional processing you want on the callback, then tell DataTables */
            //alert(json.iTotalDisplayRecords);
            //offeringsTable.rows().recalcHeight().draw();
            //localStorage.removeItem("enrollSelectedID");
            fnCallback(json)
          });
        },
    "columnDefs":
      [
        {
          "targets": '_all',
          "createdCell": function (td, cellData, rowData, row, col) {
            $(td).css('padding', '10px')
          }
        },
        {"targets": [1,2,3], className: 'text-center'}
      ],
      createdRow: function( row, data, dataIndex ) {
        $(row).addClass('saved');
      },
      //*****************Select row on Enrollee Table**************************
      "initComplete": function () {
        $('#enrolleeTable tbody').on( 'click', 'tr', function () {
          var id = this.id;
            if ( $(this).hasClass('table-active') ) {
                $(this).removeClass('table-active');
                selectedEnrolleeSchedule = null;

            }else {
                enrolleeTable.$('tr.table-active').removeClass('table-active');
                $(this).addClass('table-active');
                selectedEnrolleeSchedule = id;
            }
        });
      }

  });


  var data;
  //*****************Offerings Table**************************
  var  offeringsTable = $('#offeringsTable').dataTable({
    "bServerSide": true,
    "bProcessing": false,
    "sAjaxSource": '/srms.bcshs.dev/views/studentScheduling/offeringsDataSource0.php',
    "bSort" : false,
    "bFilter": true, "bInfo": true,"dom":'lt<"row"<"col-sm-2"i><"col-sm-8"><"col-sm-2"p>>',
    "aoColumns": [
          { mData: 'section'},
          { mData: 'info'},
          { mData: 'enrolled'},
        ],
        "fnServerData": function ( sSource, aoData, fnCallback ) {
          aoData.push({ "name": "level", "value": $('#levelFilter').val() });
          aoData.push({ "name": "strand", "value": $('#strandFilter').val() });
          $.getJSON( sSource, aoData, function (json) {
          /* Do whatever additional processing you want on the callback, then tell DataTables */
            //alert(json.iTotalDisplayRecords);
            fnCallback(json)
          });
        },
    "columnDefs":
      [{
          "targets": '_all',
          "createdCell": function (td, cellData, rowData, row, col) {
              $(td).css('padding', '10px')
            }
        },
        {"targets": [2], className: 'text-center'}
      ],
      "initComplete": function () {
        //*****************Select row on Offerings Table**************************
        $('#offeringsTable tbody').on( 'click', 'tr', function () {
          var id = this.id;
            if ( $(this).hasClass('table-active') ) {
                $(this).removeClass('table-active');
                offerSelectedID = null;

            }else {
                offeringsTable.$('tr.table-active').removeClass('table-active');
                $(this).addClass('table-active');
                offerSelectedID = id;
                $.ajax({
                  url: "/srms.bcshs.dev/views/studentScheduling/classSchedule.php",
                  method: "POST",
                  dataType: "json",
                  data: {
                    selectedOfferingsID:offerSelectedID,
                  },
                  success:function(data){
                    scheduleTable.clear();
                    scheduleTable.rows.add(data);
                    scheduleTable.draw();
                  }
                })

            }
        });
      }
  });

  //*****************Costum Search Box for Offerings Table**************************
  $('#search').keyup( function(){
    offeringsTable.fnFilter($(this).val());
  });

  //*****************Filter on Offerings Table**************************
  $('#levelFilter, #strandFilter').on('change', function(){
    offeringsTable.fnDraw();
  });


  //*****************Offering Schedule Table On Modal**************************
  var  scheduleTable = $('#scheduleTable').DataTable({
    bFilter: false, bInfo: true,
    bLengthChange: false, "bSort" : false,
    "aoColumns": [
          { mData: 'subject' },{ mData: 'days' },{ mData: 'time' },{ mData: 'room' },
        ],
    "columnDefs": [{
            "targets": '_all',
            "createdCell": function (td, cellData, rowData, row, col) {
                //$(td).css('padding', '10px')
              }
            },
            {"targets": [1,2,3], className: 'text-center'}
          ]
  });

  //*****************Enroll student to a class Table**************************
    $('#enroll-class-btn').on('click', function(){

      var row = scheduleTable.rows().data().toArray();
      var subjects = JSON.stringify(row);
      var action = 'enroll';
      if (offerSelectedID!=null) {
        $.ajax({
          url: "/srms.bcshs.dev/views/studentScheduling/schedulingEnrolleeController.php",
          method: "POST",
          data: {
            action:action, selectedEnrolleeID:selectedEnrolleeID,selectedStudent:selectedStudent,
            selectedOfferingsID:offerSelectedID, subjects:subjects,//check or validate if exist
          },
          success:function(data){
            getClassEnrolled();
            enrolleeTable.draw();
            offeringsTable.fnDraw();
            $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
          }
        })
      }else {
        $('#message').fadeIn().delay(2000).fadeOut('slow').html(message1());
      }
    })

  //*****************Enrollee Schedule Table On Modal**************************
  var  enrolleeTableOnModal = $('#enrolleeTableOnModal').DataTable({
    "bServerSide": false,
    "bProcessing": false,
    bFilter: false, bInfo: true, bSort : false,
    bLengthChange: false, bSort : false,
    "aoColumns": [
          { mData: 'subject'},{ mData: 'days'},{ mData: 'time'},{ mData: 'room'}

        ],
        "fnServerData": function ( sSource, aoData, fnCallback ) {
          aoData.push({ "name": "selectedEnrolleeID", "value": selectedEnrolleeID });
          $.getJSON( sSource, aoData, function (json) {
          /* Do whatever additional processing you want on the callback, then tell DataTables */
            //alert(json.iTotalDisplayRecords);
            //offeringsTable.rows().recalcHeight().draw();
            //localStorage.removeItem("enrollSelectedID");
            fnCallback(json)
          });
        },
    "columnDefs":
      [
        {
          "targets": '_all',
          "createdCell": function (td, cellData, rowData, row, col) {
            $(td).css('padding', '10px')
          }
        },
        {"targets": [1,2,3], className: 'text-center'}
      ],
      createdRow: function( row, data, dataIndex ) {
        $(row).addClass('saved');
      },
      "initComplete": function () {
        //*****************Select row on enrolleeTableOnModal Table**************************
        $('#enrolleeTableOnModal tbody').on( 'click', 'tr', function () {
          var id = this.id;
            if ($(this).hasClass('new-schedule')) {
              setRemovable = true;
            }
            if ($(this).hasClass('saved')) {
              setRemovable = false;
            }
            if ( $(this).hasClass('table-active') ) {
                $(this).removeClass('table-active');

            }else {
                enrolleeTableOnModal.$('tr.table-active').removeClass('table-active');
                $(this).addClass('table-active');

            }
        });
      }

  });

  //*****************Remove Button On enrolleeTableOnModal (for custom adding of subjects for enrollee - currently disabled)**************************
    /*$('#remove').on('click', function(){
      if (setRemovable){
        enrolleeTableOnModal.row( '.table-active' ).remove().draw(false);
      }
        //enrolleeTableOnModal.row( '.table-active' ).remove().draw(false);
    });*/

  //*****************Default Schedule Table**************************
  var select,row,data;
  var defScheduleTable = $('#defScheduleTable').DataTable({
    "bServerSide": true,
    "bProcessing": false,
    "sAjaxSource": '/srms.bcshs.dev/views/studentScheduling/defScheduleDataSource.php',
    "bFilter": true,
    "sSearch":true,
    "bInfo": true,
    "bPaginate": true,
    "bSort" : false,
    "aoColumns": [
          { mData: 'subject'},{ mData: 'days'},{ mData: 'time'},{ mData: 'room'}
        ],
        "fnServerData": function ( sSource, aoData, fnCallback ) {
          //aoData.push({ "name": "selectedID", "value": offerSelectedID });
          $.getJSON( sSource, aoData, function (json) {
          /* Do whatever additional processing you want on the callback, then tell DataTables */
          //alert(json.iTotalDisplayRecords);

            fnCallback(json)
          });
        },
        "columnDefs": [{
          "targets": '_all',
          "createdCell": function (td, cellData, rowData, row, col) {
            $(td).css('padding', '10px');
          },

        },
        {"targets": [1,2,3], className: 'text-center'}
      ]

  });

  $('#defScheduleTable tbody').on( 'click', 'tr', function () {
    var id = this.id;
      if ( $(this).hasClass('table-active') ) {
          $(this).removeClass('table-active');
      }else {
        //defScheduleTable.$('tr.table-active').removeClass('table-active');
        $(this).addClass('table-active');
      }

  });

  //*****************Add to New Schedule Table (for custom adding of subjects for enrollee currently disabled)**************************
              /*$('#add-subject-btn').on('click', function(){
              var newSchedule = defScheduleTable.rows('.table-active').data();
              for ( var i=0 ; i<newSchedule.length ; i++ )
              {
                var schedule = enrolleeTableOnModal.row.add(newSchedule[i]).draw(false).node();
                $(schedule).addClass('new-schedule');
                $(schedule).removeClass('saved');
                defScheduleTable.row('.table-active').remove().draw( false );
              }
            });*/

  $('#setSchedModal').on('click', function(){
    if (offerSelectedID != null) {
      $('#schedulingEnrolleeModal').modal('show');
    }else {
      $('#message').fadeIn().delay(2000).fadeOut('slow').html(message3());
    }
  })

  //*****************Adding custom subjects to the enrollee (optional)**************************
  /*$('#costSubjEnroll').on('click', function(){    //custom addingtion of subjects (optional)
    $('#subjectSchedulingModal').modal('show');
    getEnrolleeSchedule();
  })

  $('#enroll-subject-btn').on('click', function(){

    var action = 'enrollSubjects';
    var row = enrolleeTableOnModal.rows('.new-schedule').data().toArray();
    var subjects = JSON.stringify(row);
    if ($('enrolled-class-modal').val() != '') {
      $.ajax({
        url: "/srms.bcshs.dev/views/studentScheduling/schedulingEnrolleeController.php",
        method: "POST",
        data: {
          action:action, selectedEnrolleeID:selectedEnrolleeID,
          subjects:subjects
        },
        success:function(data){
          $('#subjectSchedulingModal').modal('hide');
          enrolleeTable.draw();
          offeringsTable.draw();
        }
      })
    }else {
      alert('Must be Enrolled to a Class first.')
    }
  })*/

  $('.clear').on('click', function(){
    enrolleeTableOnModal.clear().draw();
  });

  $('#withdrawAll').on('click', function(){
    if (classEnrolledID != null) {
      action = 'withdrawAll';
      if (confirm("Are you sure you want to Withdraw All Subjects?")) {
        $.ajax({
          url: "/srms.bcshs.dev/views/studentScheduling/schedulingEnrolleeController.php",
          method:"POST",
          data:{
            action:action, selectedEnrolleeID:selectedEnrolleeID, classEnrolledID:classEnrolledID
          },
          success:function(data)
          {
            $('#enrolled-class').text('');
            //$('#enrolled-class-modal').text('');(currently disabled)
            enrolleeTable.draw();
            offeringsTable.fnDraw();
            classEnrolledID = null; // remove enrolled class
            offerSelectedID = null;
            $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
          }
        });
      }
    }else {
      $('#message').fadeIn().delay(2000).fadeOut('slow').html(message2());
    }
  });

  $('#withdraw').on('click', function(){
    action = 'withdraw';
    if (selectedEnrolleeSchedule != null) {
      if (confirm("Are you sure you want to Withdraw this Subjects?")) {
        $.ajax({
          url: "/srms.bcshs.dev/views/studentScheduling/schedulingEnrolleeController.php",
          method:"POST",
          data:{
            action:action, selectedEnrolleeSchedule:selectedEnrolleeSchedule, selectedEnrolleeID:selectedEnrolleeID
          },
          success:function(data)
          {
            enrolleeTable.draw();
            selectedEnrolleeSchedule = null;
            $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
          }
        });
      }
    }else {
      $('#message').fadeIn().delay(2000).fadeOut('slow').html(message4());
    }

  });

  function getEnrolleeSchedule(){
    $.ajax({
      url: "/srms.bcshs.dev/views/studentScheduling/enrolleeScheduleDataSource.php",
      method: "POST",
      dataType: "json",
      data: {
        selectedEnrolleeID:selectedEnrolleeID,
      },
      success:function(data){
        enrolleeTableOnModal.clear();
        enrolleeTableOnModal.rows.add(data);
        enrolleeTableOnModal.draw();
      }
    })
  }

  function getClassEnrolled(){
    action = 'classEnrolled';
    $.ajax({
      url: "/srms.bcshs.dev/views/studentScheduling/schedulingEnrolleeController.php",
      method: "POST",
      dataType: 'json',
      data: {
        action:action,selectedStudent:selectedStudent
      },
      success:function(data){
        $('#enrolled-class').text(data.classEnrolled);
        //$('#enrolled-class-modal').text(data.classEnrolled);(currently disabled)
        classEnrolledID = data.classEnrolledID;
      }
    });
  }

  getClassEnrolled();


  $('#back-btn').on('click', function(){
    location.href = "/srms.bcshs.dev/Enrollment" + '/' + selectedStudent;
  });

  $('#go-to-registration-btn').on('click', function(){
    location.href = "/srms.bcshs.dev/Registration";
  });

  function message1() {
    message = '<div class="alert alert-warning position-absolute text-center" style="width:100%;">'
      + "Select a Class to Enroll." +
      '</div>'
      return message;
  }

  function message2() {
    message = '<div class="alert alert-warning position-absolute text-center" style="width:100%;">'
      + "You are not Enrolled on any Class." +
      '</div>'
      return message;
  }

  function message3() {
    message = '<div class="alert alert-warning position-absolute text-center" style="width:100%;">'
      + "Select a Class View Schedules." +
      '</div>'
      return message;
  }

  function message4() {
    message = '<div class="alert alert-warning position-absolute text-center" style="width:100%;">'
      + "Select a Subject to Withdraw." +
      '</div>'
      return message;
  }


  function validated() {
    if (action == 'update') {
      var forms = document.getElementsByClassName('needs-validation');

      var validation = Array.prototype.filter.call(forms, function(form) {
        form.classList.remove('was-validated');
      });
    }
  }

  function validate() {
    var forms = document.getElementsByClassName('needs-validation');

    var validation = Array.prototype.filter.call(forms, function(form) {
      form.classList.add('was-validated');
    });
  }
