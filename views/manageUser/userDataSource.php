<?php
include_once('../../classes/dataTable.inc.php');

$dataOutput = new ManageRow;

$columns = array(
    array('db' => 'user_id', 'dt' => 'DT_RowId',
            'formatter' => function($d,$row){
                return $d;
              }
          ),
    array('db' => 'user', 'dt' => 0),
    array('db' => 'role', 'dt' => 1),

  );

$sql = "SELECT user_id, user, role FROM `users` ";
$search = 'user';
$order = 'user ';
$count = 'SELECT * from users';
$dataOutput->get_total_records($count);


echo json_encode($dataOutput->getData($columns,$sql,$search,$order));
