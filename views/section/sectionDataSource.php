<?php
include_once('../../classes/dataTable.inc.php');


$dataOutput = new ManageRow();

$columns = array(
  array('db' => 'section_id', 'dt' => 'DT_RowId',
          'formatter' => function($d,$row){
              return $d;
            }
        ),
  array('db' => 'section', 'dt' => 0)

  );

$sql = "SELECT `section_id`, `section` from `section`";
$search = 'section';
$order = 'section ';
$count = 'SELECT * from section';
$dataOutput->get_total_records($count);

echo json_encode($dataOutput->getData($columns,$sql,$search,$order));
