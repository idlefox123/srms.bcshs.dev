<?php
session_start();
include_once('../../classes/tableDataSource.inc.php');

$source = new sourceTable();

$columns = array(
  array('db' => 'offer_id', 'dt' => 'DT_RowId',
          'formatter' => function($d,$row){
              return $d;
            }
        ),
  array('db' => 'section', 'dt' => 'section'),
  array('db' => 'info', 'dt' => 'info'),
  array('db' => 'enrolled', 'dt' => 'enrolled'),

  );
  $qry = "SELECT offer_id, concat(enrolled, ' / ', max_enrollee) as enrolled, section.section, concat(grade_level, ', &nbsp&nbsp&nbsp',strands.strand) as info
  FROM offerings_{$_SESSION['AY']}_{$_SESSION['semID']} inner join section on offerings_{$_SESSION['AY']}_{$_SESSION['semID']}.section_id = section.section_id
  inner join strands on offerings_{$_SESSION['AY']}_{$_SESSION['semID']}.strand_id = strands.strand_id";
  if (isset($_GET['level']) || isset($_GET['strand'])) {
    if ($_GET['level']!='' && $_GET['strand']=='') {
      $qry.= " where grade_level = '".$_GET['level']."'";
    }elseif ($_GET['strand']!='' && $_GET['level']=='') {
      $qry.= " where offerings_{$_SESSION['AY']}_{$_SESSION['semID']}.strand_id = '".$_GET['strand']."'";
    }elseif ($_GET['level']!='' && $_GET['strand']!='') {
      $qry.= " where grade_level = '".$_GET['level']."' and offerings_{$_SESSION['AY']}_{$_SESSION['semID']}.strand_id = '".$_GET['strand']."'";
    }
  }

$records = $qry;
$search = "section";
$source->get_total_records($records);

echo json_encode($source->getData($columns,$qry,$search));

 ?>
