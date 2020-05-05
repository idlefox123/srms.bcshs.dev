
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
          <h4><i class="fa fa-book"> Section</i></h4>
        </div>
        <div class="col-sm-9">
          <div class="" style="float:right">
            <h5>SY: <?php echo $def->sy() ?> - <?php echo $def->sy()+1 ?>  <?php echo $def->semester() ?></h5>
          </div>
        </div>
      </div>

      <div class="cost-container">
        <div class="row padding-bottom-10">
          <div class="col-md-12">
            <div class="float-right">          <!-- Button Add Modal -->
              <button id="addSection" class="btn costBtn"><i class="fa fa-plus-circle"> Add Section</i></button>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card card-def-size">
              <div class="card-header">
                <h5><i class="fa fa-"> Section</i></h5>
              </div>
              <div class="card-body">
                <div class="form-row font-weight-bold">
                  <div class="form-group col-md-6">
                    <label for="strandFilter">Strand:</label>
                    <select id="strandFilter" name="strandFilter" class="form-control">
                      <option value="">SELECT</option>
                      <<?php $db->loadResult("SELECT strand_id, strand FROM strands");

                      foreach ($db->getResult() as $value):?>
                        <option value="<?php echo $value["strand_id"]?>">
                          <?php echo $value["strand"]?>
                        </option>
                      <?php endforeach;?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="levelFilter">Grade Level:</label>
                    <select id="levelFilter" name="levelFilter" class="form-control input-height">
                      <option value="">SELECT</option>
                      <option value="Grade 11">Grade 11</option>
                      <option value="Grade 12">Grade 12</option>
                    </select>
                  </div>
                </div>
                <div class="float-right">
                  <div class="form-inline padding-bottom-10">
                    <label class="" for="search">Search:&nbsp&nbsp</label>
                    <input id="search" class="form-control input-height" type="text" name="search" value="">
                  </div>
                </div>
                <table id="sectionTable" class="table table-hover table-bordered" width="100%">
                  <thead>
                    <tr class="text-center">
                      <th width="30%">Section</th>
                      <th width="60%">Grade & Strand</th>
                      <th width="10%"><i class="fa fa-users"></i></th>
                    </tr>
                  </thead>
                </table>
                <div class="float-right">
                  <button id="edit" class="btn costBtn" data-toggle="modal" data-target="" type="button" name="edit" value="edit"><i class="fa fa-pencil-alt"> Edit</i></button>
                  <button id="delete" class="btn costBtn" type="button" name="delete"><i class="fa fa-trash-alt"> Delete</i></button>
                </div>
              </div>
            </div>
          </div>
          <style >
            td { font-size: 13.5px; }
            tr {
              height: 40px;
            }
          </style>
          <div class="col-md-8">
            <div class="card card-def-size">
              <div class="card-body">
                <div class="cost-card-header">
                  <h5><i class="fa fa-users"> Enrolled Students</i></h5>
                </div>
                <div class="row">
                  <div class="col-md-8"><br>
                    <p><span class="font-weight-bold">Strand: </span> <span id="strand"></span></p>
                    <p><span class="font-weight-bold">Adviser: </span> <span id="adviser"></span></p>
                  </div>
                  <div class="col-md-4"><br>
                    <p><span class="font-weight-bold">Grade: </span> <span id="level"></span></p>
                    <p><span class="font-weight-bold">Section: </span> <span id="sectionInfo"></span></p>
                  </div>
                </div>
                <table id="sStudTable" class="table table-hover table-bordered" width="100%">
                  <thead>
                    <tr class="text-center">
                      <th width="20%">ID</th>
                      <th width="80%">Student</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

        <?php include_once('modal.php') ?>
    </div> <!--- container END -->

  </div> <!--- main class END  -->

</div> <!--- wrapper END -->


   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="../css/jquery/jquery.slim.min.js" ></script>
   <script src="../css/jquery/jquery.min.js" ></script>

   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>-->
   <script src="../css/Bootstrap 4/js/bootstrap.bundle.min.js" ></script>
   <!--<script src="../../css/jquery/jquery.min.js" type="text/javascript">-->

   <!-- JavaScript DataTables-->

   <script src="../datatables/DataTables/js/jquery.dataTables.min.js" type="text/javascript"></script>

   <script src="../datatables/DataTables/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

   <!-- Costum JavaScript -->
   <script src="../js/costumScript.js" ></script>
   <script src="section.js" ></script>



 </body>
</html>

<script type="text/javascript">



  $(document).ready(function(){





  });

</script>

var selectedSection,selectedStud,action = $('#action').val();

var sectionTable = $('#sectionTable').dataTable({
  "bServerSide": true,
  "bProcessing": false,
  "bFilter": true, "bInfo": true, "dom":'t<"row"<"col-sm-2"><"col-sm-8"><"col-sm-2"p>>',
  "order":[],
  "sAjaxSource": 'sectionDataSource.php',
  "aoColumns": [
        { mData: 'section' },{ mData: 'info' },{ mData: 'enrolled' },
      ],
      "fnServerData": function ( sSource, aoData, fnCallback ) {
        aoData.push({ "name": "level", "value": $('#levelFilter').val() });
        aoData.push({ "name": "strand", "value": $('#strandFilter').val() });
        $.getJSON( sSource, aoData, function (json) {
        /* Do whatever additional processing you want on the callback, then tell DataTables */
          //alert(json.iTotalDisplayRecords);
          //offeringsTable.rows().recalcHeight().draw();

          fnCallback(json)
        });
      },
      "columnDefs": [{
                  "targets": '_all',
                  "createdCell": function (td, cellData, rowData, row, col) {
                      $(td).css('padding', '5px')
                  }
              },
              {
                "targets": [2],
                className: 'text-center'
              }
            ],
  "initComplete": function () {

    $('#sectionTable tbody').on( 'click', 'tr', function () {
      var id = this.id;
        if ( $(this).hasClass('table-active') ) {
            $(this).removeClass('table-active');
            selectedSection = null;
        }
        else {
            sectionTable.$('tr.table-active').removeClass('table-active');
            $(this).addClass('table-active');
            selectedSection = id;
            studentInfo();
            sStudTable.fnDraw();
        }
    });
  }
});

$('#search').keyup( function(){
  sectionTable.fnFilter($(this).val());
});

$('#levelFilter, #strandFilter').on('change', function(){
  sectionTable.fnClearTable();
});

var sStudTable = $('#sStudTable').dataTable({
  "bServerSide": true,
  "bProcessing": false,
  "sAjaxSource": 'sectionStudentDataSource.php',
  //"bFilter": true, "bInfo": true, "dom":'t<"row"<"col-sm-2"i><"col-sm-8"><"col-sm-2"p>>',
  "aoColumns": [
        { mData: 'lrn' },{ mData: 'student' }
      ],
  "fnServerData": function ( sSource, aoData, fnCallback ) {
    aoData.push({ "name": "selectedID", "value": selectedSection });
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
  "initComplete": function () {

    $('#sStudTable tbody').on( 'click', 'tr', function () {
      var id = this.id;
        if ( $(this).hasClass('table-active') ) {
            $(this).removeClass('table-active');
            selectedStud = null;
        }else {
          sStudTable.$('tr.table-active').removeClass('table-active');
          $(this).addClass('table-active');
          selectedStud = id;

        }
    });

  }
});

$('#addSection').on('click', function(){
  $('#sectionform')[0].reset();
  $('#modal').modal('show');
  $('.title-icon').addClass('fa fa-plus');
  $('.modal-title').text("New Section");
  $('.btn-action-icon').removeClass('fa fa-save');
  $('.btn-action-icon').addClass('fa fa-plus-circle');
  $('.btn-action-text').text(" Add");
  $('#action').val("insert");
  $('#selectedID').val("");
});

$('#sectionform').on('submit', function(event){
  event.preventDefault();
  var room = $('#room');
  if (isNotEmpty(room)) {
    $.ajax({
      url: "controller.php",
      method:"POST",
      data:$('#sectionform').serialize(),
      success:function(data)
      {
        $('#modal').modal('hide')
        sectionTable.fnDraw(false);
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
      selectedID:selectedSection
    },
    success:function(data)
    {
      $('#modal').modal('show');
      $('#section').val(data.section);
      $('.modal-title').text("Edit Section");
      $('.title-icon').removeClass('fa fa-plus-circle');
      $('.title-icon').addClass('fa fa-edit');
      $('.btn-action-icon').addClass('fa fa-save');
      $('.btn-action-text').text(" Update");
      $('#action').val('insert');
      $('#selectedID').val(selectedSection);
    }
  });
});

$('#delete').on('click', function(){
  action = 'delete';
  if (selectedSection != null) {
    if (confirm("Are you sure you want to delete ?")) {
      $.ajax({
        url: "controller.php",
        method:"POST",
        data:{
          action:action,
          selectedID:selectedSection
        },
        success:function(data)
        {
          alert(data);
          sectionTable.row('.table-active').remove().draw( false );
          selectedSection = null;
        }
      });
    }

  }else {
    alert('Select a Room to Delete');
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

function studentInfo(){
  $.ajax({
    url: "student.php",
    method: "POST",
    dataType: "json",
    data: {
      selectedID:selectedSection,
    },
    success:function(data){
      $('#level').text(data.level);
      $('#strand').text(data.strand);
      $('#adviser').text(data.adviser);
      $('#sectionInfo').text(data.section);
    }
  })
}


<?php
session_start();
include_once('../includes/tableDataSource.inc.php');

$source = new sourceTable();
$year = $_SESSION['schl_year'];
$semester = $_SESSION['sem_id'];
$strand = $_GET['strand'];
$level = $_GET['level'];

$columns = array(
  array('db' => 'section_id', 'dt' => 'DT_RowId',
          'formatter' => function($d,$row){
              return $d;
            }
        ),
  array('db' => 'section', 'dt' => 'section'),
  array('db' => 'info', 'dt' => 'info'),
  array('db' => 'enrolled', 'dt' => 'enrolled'),

  );
  $qry = "SELECT section.section_id, offer_id, concat(enrolled, ' / ', max_enrollee) as enrolled, section.section, concat(grade_level, ', &nbsp&nbsp&nbsp',strands.strand) as info
  FROM `section` left join offerings_{$year}_{$semester} on section.section_id = offerings_{$year}_{$semester}.section_id
  left join strands on offerings_{$year}_{$semester}.strand_id = strands.strand_id";
  if (isset($_GET['level']) || isset($_GET['strand'])) {
    if ($level!='' && $strand=='') {
      $qry.= " where grade_level = '".$level."'";
    }elseif ($strand!='' && $level=='') {
      $qry.= " where offerings_{$year}_{$semester}.strand_id = '".$strand."'";
    }elseif ($level!='' && $_GET['strand']!='') {
      $qry.= " where grade_level = '".$level."' and offerings_{$year}_{$semester}.strand_id = '".$strand."'";
    }
  }

$records = "SELECT * from section";
$search = "section";
$source->get_total_records($records);

echo json_encode($source->getData($columns,$qry,$search));

 ?>
