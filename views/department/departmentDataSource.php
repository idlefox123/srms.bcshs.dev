<?php
session_start();
include_once('../../classes/dataTable.inc.php');

$dataOutput = new ManageRow();

$columns = array(
  array('db' => 'dept_id', 'dt' => 'DT_RowId',
          'formatter' => function($d,$row){
              return $d;
            }
        ),
  array('db' => 'dept_name', 'dt' => 0)

  );

$sql = "SELECT * from department ";
$search = 'dept_name';
$order = 'dept_name ';
$count = 'SELECT * from department';
$dataOutput->get_total_records($count);

echo json_encode($dataOutput->getData($columns,$sql,$search,$order));
