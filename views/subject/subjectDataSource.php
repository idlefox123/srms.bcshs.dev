<?php
session_start();
include_once('../../classes/dataTable.inc.php');

$dataOutput = new ManageRow();

$columns = array(
  array('db' => 'subject_id', 'dt' => 'DT_RowId',
          'formatter' => function($d,$row){
              return $d;
            }
        ),
  array('db' => 'subject_name', 'dt' => 0)

  );

$sql = "SELECT `subject_id`, `subject_name` from `subjects`";
$search = 'subject_name';
$order = 'subject_name ';
$count = 'SELECT * from student';
$dataOutput->get_total_records($count);

echo json_encode($dataOutput->getData($columns,$sql,$search,$order));
