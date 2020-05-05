<?php
session_start();
include_once('../../../classes/tableSelectDataSource.inc.php');
$selectedID = $_GET['selectedID'];
$id=$selectedID;
if ($id==null) {
  $id=0;
}
$source = new sourceTable();

$columns = array(
  array('db' => 'parent_id', 'dt' => 'DT_RowId',
          'formatter' => function($d,$row){
              return $d;
            }
        ),
  array('db' => 'relationship', 'dt' => 0),
  array('db' => 'p_name', 'dt' => 1),
  array('db' => 'p_address', 'dt' => 2),
  array('db' => 'p_contact', 'dt' => 3)
  );

$qry = "SELECT parent_id, relationship, p_name, p_address, p_contact FROM `parents` WHERE student_id = $id";
$records = "SELECT count(*) from parents where student_id = $id";
$search = "p_name";
$source->get_total_records($records);

echo json_encode($source->getData($columns,$qry,$search));

 ?>
