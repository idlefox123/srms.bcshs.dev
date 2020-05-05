<?php
session_start();
include_once('../../classes/tableSelectDataSource.inc.php');
$selectedID = $_GET['selectedID'];

$source = new sourceTable();

$columns = array(
  array('db' => 'enrollment_id', 'dt' => 'DT_RowId',
          'formatter' => function($d,$row){
              return $d;
            }
        ),
  array('db' => 'lrn', 'dt' => 'lrn'),
    array('db' => 'student', 'dt' => 'student'),


  );

$qry = "SELECT student.lrn, enrollment_2018_1.enrollment_id, enrollment_2018_1.grade_level, concat(student.last_name, ', ', student.first_name, ' ', student.middle_name) as student
        from enrollment_2018_1 LEFT JOIN student on enrollment_2018_1.student_id = student.student_id
        LEFT join offerings_2018_1 on enrollment_2018_1.offer_id = offerings_2018_1.offer_id
        WHERE offerings_2018_1.section_id = $selectedID";
$records = "SELECT student.lrn, enrollment_2018_1.enrollment_id, enrollment_2018_1.grade_level, concat(student.last_name, ', ', student.first_name, ' ', student.middle_name) as student
        from enrollment_2018_1 LEFT JOIN student on enrollment_2018_1.student_id = student.student_id
        LEFT join offerings_2018_1 on enrollment_2018_1.offer_id = offerings_2018_1.offer_id
        WHERE offerings_2018_1.section_id = $selectedID";
$search = " concat(student.last_name,student.first_name,student.middle_name)";
$source->get_total_records($records);

echo json_encode($source->getData($columns,$qry,$search));

 ?>
