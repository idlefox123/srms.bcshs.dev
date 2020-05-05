<?php
include_once('../../classes/dataTable.inc.php');

$dataOutput = new ManageRow;

$columns = array(
  array('db' => 'student_id', 'dt' => 'DT_RowId',
          'formatter' => function($d,$row){
              return $d;
            }
        ),
        array('db' => 'student_name', 'dt' => 'DT_rowDesc',
                'formatter' => function($d,$row){
                    return $d;
                  }
              ),
  array('db' => 'lrn', 'dt' => 0),
  array('db' => 'student_name', 'dt' => 1),
  array('db' => 'enrollee', 'dt' => 2)
  );

$sql = "SELECT `student_id`, `lrn`, concat(`last_name`, ', ', `first_name`, ' ', `middle_name`) AS student_name, `extension_name`, `gender`, `bdate`, `home_address`, `strand_id`, `user_id`, `status`, `enrollee` FROM `student`";
$search = 'concat(`last_name`,`first_name`,`middle_name`)';
$order = 'concat(`last_name`,`first_name`,`middle_name`) ';
$count = 'SELECT * from student';
$dataOutput->get_total_records($count);

echo json_encode($dataOutput->getData($columns,$sql,$search,$order));
