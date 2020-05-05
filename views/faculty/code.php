<?php
include_once('../includes/databaseController.php');
include_once('../includes/defaults.inc.php');
  $db = new DatabaseController();
  $def = new Defaults();
?>
<!doctype html>

<html lang="en">
 <head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- Bootstrap CSS -->
   <link href="../css/Bootstrap 4/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="../css/myCSS/costumStyle.css">
   <link rel="stylesheet" href="../css/myCSS/myHeader.css">
   <link rel="stylesheet" href="../font/css/all.min.css">
   <link rel="stylesheet" href="../css/myCSS/subjectCss.css">

   <!-- Bootstrap DataTables -->
   <link rel="stylesheet" href="../datatables/DataTables/css/dataTables.bootstrap4.min.css">


   <title>Dashboard</title>
 </head>

 <?php require('../header.php');?>
 <body>

 <div class="wrapper">
   <?php require('../sidebar.php');?>

   <div id= "main" class="" style = "">

   <div class="container-fluid">

      <div class="row">
        <div class="col-sm-3">
          <h4><i class="fa fa-users"> Faculty</i></h4>
        </div>
        <div class="col-sm-9">
          <div class="float-right">
            <h5>SY: <?php echo $def->sy() ?> - <?php echo $def->sy()+1 ?>  <?php echo $def->semester() ?></h5>
          </div>
        </div>
      </div>

      <div class="cost-container">
        <div class="row padding-bottom-10">
          <div class="col-md-12">
            <div class="float-right">
              <button id="addTch" class="btn costBtn" data-toggle="modal" data-target="#modal" name="addRoom"><i class="fa fa-plus-circle"> Add Teacher</i></button>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card card-def-size">
              <div class="card-header">
                <h5><i class="fa fa-user-circle"> Faculty</i></h5>
              </div>
              <div class="card-body">
                <div class="float-right">
                  <div class="form-inline padding-bottom-10">
                    <label class="" for="search">Search:&nbsp&nbsp</label>
                    <input id="search" class="form-control input-height" type="text" name="search" value="">
                  </div>
                </div>
                <table id="teacherTable" class="table table-hover table-bordered" width="100%">
                  <thead>
                    <tr class="text-center">
                      <th width="">Teacher</th>
                    </tr>
                  </thead>
                </table>
                <div class="float-right">
                  <button id="edit" class="btn costBtn" type="button" name="edit"> <i class="fa fa-edit"> Edit</i> </button>
                  <button id="delete" class="btn costBtn" type="button" name="delete"> <i class="fa fa-trash-alt"> Delete</i> </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-def-size">
              <div class="card-body">
                <div class="cost-card-header">
                  <div class="text-center">
                    <h5> <i class="fa fa-calendar-alt"> Teacher's Schedule</i> </h5>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8"><br>
                    <p><span class="font-weight-bold">Name: </span> <span id="teacher"></span></p>
                  </div>
                  <div class="col-md-4"><br>
                    <p><span class="font-weight-bold">Position: </span> <span id="positionInfo"></span></p>
                  </div>
                </div>
                <div class="">
                  <p><span class="font-weight-bold">Department: </span> <span id="departmentInfo"></span></p>
                </div>
                <div class="">
                  <table id="tSchedTable" class="table table-hover table-bordered" width="100%">
                    <thead>
                      <tr class="text-center">
                        <th width="50%">Subject</th>
                        <th width="10%">Day</th>
                        <th width="20%">Time</th>
                        <th width="20%">Room</th>
                      </tr>
                    </thead>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>

          <!-- Button Add Modal -->


          <?php include_once('modal.php')?>



    </div> <!--- container END -->

  </div> <!--- main class END  -->

</div> <!--- wrapper END -->


   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="../css/jquery/jquery.slim.min.js" ></script>
   <script src="../css/jquery/jquery.min.js" ></script>
   <script src="../css/Bootstrap 4/js/bootstrap.bundle.min.js" ></script>

   <!-- JavaScript DataTables-->

   <script src="../datatables/DataTables/js/jquery.dataTables.min.js" type="text/javascript"></script>

   <script src="../datatables/DataTables/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

   <script src="../datatables/FixedColumns-3.2.5/js/fixedColumns.bootstrap4.min.js" type="text/javascript"></script>

   <!-- Costum JavaScript -->
   <script src="../js/costumScript.js" ></script>
   <script src="teacher.js" ></script>

 </body>
</html>

<script type="text/javascript">


</script>

<div class="modal fade" id="teacherModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="">
  <div class="modal-content">
  <div class="modal-header">
    <h5><i class="title-icon font-weight-bold"> <span class="modal-title"></span></i></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body font-weight-bold">

    <form id="tchform" class="" action="index.html" method="post">

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="lname">Family Name:</label>
          <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
        </div>
        <div class="form-group col-md-6">
          <label for="fname">First Name:</label>
          <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
        </div>

      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="mname">Middle Name:</label>
          <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name">
        </div>
        <div class="form-group col-md-6">
          <label for="extension">Extenion:</label>
          <input type="text" class="form-control" id="extension" name="extension" placeholder="Extension">
        </div>
      </div>

      <div class="form-group row">
        <label for="subject" class="col-sm-4 col-form-label">Position: </label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="position" name="position" placeholder="Position">
        </div>
      </div>


      <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="department"><span>Department:</span></label>
        <div class="col-sm-8">
          <select class="form-control" id="department" name="department">
            <option value="">Department</option>
            <?php $db->loadResult("SELECT * FROM department");

            foreach ($db->getResult() as $value):?>
              <option value="<?php echo $value["dept_id"]?>">
                <?php echo $value["dept_name"]?>
              </option>
            <?php endforeach;?>
          </select>
        </div>
      </div>

  </div><!--end Modal body-->
  <div class="modal-footer">
    <button type="button" class="btn costBtn" data-dismiss="modal"><i class="fa fa-danger"> Close</i></button>
    <button type="submit" name="" class="btn costBtn" value=""><i class="btn-action-icon"></i><span class="font-weight-bold btn-action-text"></span></button>
    <input id ="action" hidden type="text" name="action" value="">
    <input id ="selectedID" hidden type="text" name="selectedID" value="">
  </div><!--end modal footer -->
</div><!--end Modal Content-->
</div><!--end Modal dialog-->
</div> <!--end Modal-->
</form>


var selectedTeacher,teacherSelectedID, action = $('#action').val();

var teacherTable = $('#teacherTable').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "bFilter": true, "bInfo": true, "dom":'t<"row"<"col-sm-2"i><"col-sm-8"><"col-sm-2"p>>',
  "ajax":{
    url:"teacherDataSource.php",
    type:"POST",
  },
  "initComplete": function () {
    $('#teacherTable tbody').on( 'click', 'tr', function () {
      var id = this.id;
        if ( $(this).hasClass('table-active') ) {
            $(this).removeClass('table-active');
            selectedTeacher = null;
        }
        else {
            teacherTable.$('tr.table-active').removeClass('table-active');
            $(this).addClass('table-active');
            selectedTeacher = id;
            teacherInfo();
            tSchedTable.draw();
        }
    });
  }
});

$('#search').keyup( function(){
  teacherTable.search($(this).val()).draw();
});

var tSchedTable = $('#tSchedTable').DataTable({
  "bServerSide": true,
  "bProcessing": false,
  "sAjaxSource": 'teacherScheduleDataSource.php',
  //"bFilter": true, "bInfo": true, "dom":'t<"row"<"col-sm-2"i><"col-sm-8"><"col-sm-2"p>>',
  "aoColumns": [
        { mData: 'subject' },{ mData: 'days' },{ mData: 'time' },{ mData: 'room' }
      ],
  "fnServerData": function ( sSource, aoData, fnCallback ) {
    aoData.push({ "name": "selectedID", "value": selectedTeacher });
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
      "targets": [1,2,3],
      className: 'text-center'
    }
  ],
  "initComplete": function () {

    $('#tSchedTable tbody').on( 'click', 'tr', function () {
      var id = this.id;
        if ( $(this).hasClass('table-active') ) {
            $(this).removeClass('table-active');
            teacherSelectedID = null;
        }else {
          teacherSchedTable.$('tr.table-active').removeClass('table-active');
          $(this).addClass('table-active');
          teacherSelectedID = id;

        }
    });

  }
});


$('#addTch').on('click', function(){
  $('#tchform')[0].reset();
  $('#teacherModal').modal('show');
  $('.btn-action-icon').removeClass('fa fa-save');
  $('.title-icon').addClass('fa fa-plus-circle');
  $('.modal-title').text("New Teacher");
  $('.btn-action-icon').addClass('fa fa-plus-circle');
  $('.btn-action-text').text(" Add");
  $('#action').val("insert");
  $('#selectedID').val("");
});

$('#tchform').on('submit', function(event){
  event.preventDefault();
  var fname = $('#fname'),
  lname = $('#lname'),
  mname = $('#mname'),
  position = $('#position'),
  department = $('#department');
  if (isNotEmpty(fname) && isNotEmpty(lname) && isNotEmpty(mname) && isNotEmpty(position) && isNotEmpty(department)) {
    $.ajax({
      url: "controller.php",
      method:"POST",
      data:$('#tchform').serialize(),
      success:function(data)
      {
        $('#teacherModal').modal('hide');
        teacherTable.row('.table-active').remove().draw( false );
      }
    });
  }

});


$('#edit').on('click', function(){
  action = 'update';
  $.ajax({
    url: "controller.php",
    method:"POST",
    dataType: "json",
    data:{
      action:action,
      selectedID:selectedTeacher
    },
    success:function(data)
    {
      $('#teacherModal').modal('show');
      $('#fname').val(data.fname);
      $('#lname').val(data.lname);
      $('#mname').val(data.mname);
      $('#extension').val(data.extension);
      $('#position').val(data.position);
      $('.title-icon').removeClass('fa fa-plus-circle');
      $('.modal-title').text("Edit Teacher");
      $('.title-icon').addClass('fa fa-edit');
      $('.btn-action-icon').addClass('fa fa-save');
      $('.btn-action-text').text(" Update");
      $('#action').val('insert');
      $('#selectedID').val(selectedTeacher);
      switch (data.department) {
        case '21':$('#department').val(21);break;
        case '22':$('#department').val(22);break;
        case '23':$('#department').val(23);break;
        case '24':$('#department').val(24);break;
        case '25':$('#department').val(25);break;
      }
    }
  });
});

$('#delete').on('click', function(){
  action = 'delete';
  if (selectedTeacher != null) {
    if (confirm("Are you sure you want to delete ?")) {
      $.ajax({
        url: "controller.php",
        method:"POST",
        data:{
          action:action,
          selectedID:selectedTeacher
        },
        success:function(data)
        {
          alert(data);
          teacherTable.row('.table-active').remove().draw( false );
          selectedTeacher = null;
        }
      });
    }
  }else {
    alert('Select a Row to Delete');
  }

});

function isNotEmpty(caller) {
    if (caller.val() == '') {
        caller.css('border', '1px solid red');
        return false;
    } else
        caller.css('border', '');
    return true;
}

function teacherInfo(){
  $.ajax({
    url: "teacher.php",
    method: "POST",
    dataType: "json",
    data: {
      selectedID:selectedTeacher,
    },
    success:function(data){
      $('#teacher').text(data.teacher);
      $('#departmentInfo').text(data.department);
      $('#positionInfo').text(data.position);
    }
  })
}

<?php
//include_once('../includes/authentication.php');
include_once('../includes/dataTable.inc.php');
//include_once('../includes/dbConnection.php');
//$mydb = new Database;
//$mydb->openConnection();



$dataOutput = new ManageRow;

$columns = array(
    array('db' => 'teacher_id', 'dt' => 'DT_RowId',
            'formatter' => function($d,$row){
                return $d;
              }
          ),
    array('db' => 'teacher_name', 'dt' => 0),
    //array('db' => 'position', 'dt' => 1),
    //array('db' => 'dept_name', 'dt' => 2)

  );

$sql = "SELECT `teacher_id`, concat(`last_name`, ', ', `first_name`, ' ', `middle_name`, ' ', `extension_name`) as teacher_name,
      `position`, `user_id`, department.`dept_name`  FROM `teacher`
      inner JOIN department on teacher.dept_id = department.dept_id ";
$search = 'concat(`last_name`, `first_name`, `middle_name`)';
$order = 'concat(`last_name`, `first_name`, `middle_name`) ';
$count = 'SELECT * from room';
$dataOutput->get_total_records($count);


echo json_encode($dataOutput->getData($columns,$sql,$search,$order));

<?php
session_start();
include_once('../includes/tableSelectDataSource.inc.php');
$selectedID = $_GET['selectedID'];

$source = new sourceTable();

$columns = array(
  array('db' => 'schedule_id', 'dt' => 'DT_RowId',
          'formatter' => function($d,$row){
              return $d;
            }
        ),
  array('db' => 'subject_name', 'dt' => 'subject'),
  array('db' => 'days', 'dt' => 'days'),
  array('db' => 'time', 'dt' => 'time'),
  array('db' => 'room', 'dt' => 'room'),

  );

$qry = "SELECT schedule_id, subjects.subject_name, days, time, room.room FROM `schedule_2018_1`
        LEFT JOIN subjects on schedule_2018_1.subject_id = subjects.subject_id
        LEFT JOIN room on schedule_2018_1.room_id = room.room_id
        WHERE schedule_2018_1.teacher_id = $selectedID";
$records = "SELECT * from schedule_2018_1 where teacher_id = $selectedID";
$search = "subject_name";
$source->get_total_records($records);

echo json_encode($source->getData($columns,$qry,$search));

 ?>
