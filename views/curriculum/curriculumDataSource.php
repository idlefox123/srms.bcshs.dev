<?php
session_start();
include_once('../../classes/dataTable.inc.php');

$dataOutput = new ManageRow();

$columns = array(
  array('db' => 'curriculum_id', 'dt' => 'DT_RowId',
          'formatter' => function($d,$row){
              return $d;
            }
        ),
  array('db' => 'ion', 'dt' => 0),
  array('db' => 'subject_name', 'dt' => 1),
  array('db' => 'hours', 'dt' => 2),

  );

$sql = "SELECT curriculum_id, ions.ion, subjects.subject_name, hours  FROM curriculum
        INNER JOIN subjects on curriculum.subject_id = subjects.subject_id
        INNER JOIN ions on subjects.ion_id = ions.ion_id ";

$search = 'subject_name';
$order = 'subject_name ';
$count = 'SELECT * from curriculum';
$dataOutput->get_total_records($count);

echo json_encode($dataOutput->getData($columns,$sql,$search,$order));
