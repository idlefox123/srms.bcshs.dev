<?php
session_start();
include_once('../../classes/tableDataSource.inc.php');

$source = new sourceTable();
$schlYear = $_GET['AY'];
$semester = $_GET['semester'];
$user     = $_SESSION['userID'];

$columns = array(
  array('db' => 'enrollment_id', 'dt' => 'DT_RowId',
          'formatter' => function($d,$row){
              return $d;
            }
        ),
  array('db' => 'lrn', 'dt' => 'id'),
  array('db' => 'student', 'dt' => 'student'),

  );

  $qry = "SELECT enrollment_id, student.student_id, student.lrn, concat(student.`last_name`, ', ', student.`first_name`, ' ', student.`middle_name`) AS `student`
          FROM enrollment_{$schlYear}_{$semester}
          INNER JOIN `student` on enrollment_{$schlYear}_{$semester}.student_id = student.student_id
          INNER JOIN offerings_{$schlYear}_{$semester} on enrollment_{$schlYear}_{$semester}.offer_id = offerings_{$schlYear}_{$semester}.offer_id
          INNER JOIN teacher on offerings_{$schlYear}_{$semester}.adviser = teacher.teacher_id
          INNER JOIN users on teacher.user_id = users.user_id
          WHERE users.user_id = $user";




$records = "SELECT * from enrollment_{$schlYear}_{$semester}";
$search = "concat(student.`last_name`, ', ', student.`first_name`, ' ', student.`middle_name`)";
$source->get_total_records($records);

echo json_encode($source->getData($columns,$qry,$search));

 ?>
