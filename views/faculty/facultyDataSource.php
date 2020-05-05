<?php
include_once('../../classes/dataTable.inc.php');

$dataOutput = new ManageRow;

$columns = array(
    array('db' => 'teacher_id', 'dt' => 'DT_RowId',
            'formatter' => function($d,$row){
                return $d;
              }
          ),
    array('db' => 'teacher_name', 'dt' => 0),

  );

$sql = "SELECT `teacher_id`, concat(`last_name`, ', ', `first_name`, ' ', `middle_name`, ' ', `extension_name`) as teacher_name FROM `teacher` ";
$search = 'concat(`last_name`, `first_name`, `middle_name`)';
$order = 'concat(`last_name`, `first_name`, `middle_name`) ';
$count = $sql;
$dataOutput->get_total_records($count);


echo json_encode($dataOutput->getData($columns,$sql,$search,$order));
