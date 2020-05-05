<?php
session_start();
include_once('../../classes/dataTable.inc.php');

$dataOutput = new ManageRow();

$columns = array(
  array('db' => 'room_id', 'dt' => 'DT_RowId',
          'formatter' => function($d,$row){
              return $d;
            }
        ),
  array('db' => 'room', 'dt' => 0)

  );

$sql = "SELECT `room_id`, `room` from `room`";
$search = 'room';
$order = 'room ';
$count = 'SELECT * from room';
$dataOutput->get_total_records($count);

echo json_encode($dataOutput->getData($columns,$sql,$search,$order));
