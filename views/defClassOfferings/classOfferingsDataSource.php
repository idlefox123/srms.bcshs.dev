<?php
session_start();
include_once('../../classes/tableDataSource.inc.php');

$source = new sourceTable();

$offerings = "offerings_def_{$_SESSION['semID']}";

$columns = array(
  array('db' => 'offer_id', 'dt' => 'DT_RowId',
          'formatter' => function($d,$row){
              return $d;
            }
        ),
  array('db' => 'section', 'dt' => 'section'),
  array('db' => 'gradeStrand', 'dt' => 'gradeStrand'),

  );
  $qry = "SELECT offer_id, section.section, concat(grade_level, ', &nbsp&nbsp&nbsp',strands.strand) as gradeStrand
  FROM $offerings inner join section on $offerings.section_id = section.section_id
  inner join strands on $offerings.strand_id = strands.strand_id";
  if (isset($_GET['level']) || isset($_GET['strand'])) {
    if ($_GET['level']!='' && $_GET['strand']=='') {
      $qry.= " where grade_level = '".$_GET['level']."'";
    }elseif ($_GET['strand']!='' && $_GET['level']=='') {
      $qry.= " where $offerings.strand_id = '".$_GET['strand']."'";
    }elseif ($_GET['level']!='' && $_GET['strand']!='') {
      $qry.= " where grade_level = '".$_GET['level']."' and $offerings.strand_id = '".$_GET['strand']."'";
    }
  }

$records = $qry;
$search = "section";
$source->get_total_records($records);

echo json_encode($source->getData($columns,$qry,$search));

 ?>
