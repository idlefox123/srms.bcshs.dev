<?php
session_start();
include_once('../../classes/tableDataSource.inc.php');
include_once('../../classes/FacultyGrading.class.php');

$source = new sourceTable();
$schedule = "schedule_{$_SESSION['AY']}_{$_SESSION['semID']}";
$offerings = "offerings_{$_SESSION['AY']}_{$_SESSION['semID']}";


$teacher = new Grading();
$teacher = $teacher->getTeacherID($_SESSION['userID']);

$columns = array(
  array('db' => 'schedule_id', 'dt' => 'DT_RowId',
          'formatter' => function($d,$row){
              return $d;
            }
        ),
  array('db' => 'subject_name', 'dt' => 'subject'),
  array('db' => 'section', 'dt' => 'section'),

  );

  $qry = "SELECT $schedule.schedule_id, subjects.subject_name, section.section
          FROM $schedule
          INNER JOIN teacher on $schedule.teacher_id = teacher.teacher_id
          INNER JOIN subjects on $schedule.subject_id = subjects.subject_id
          INNER JOIN $offerings on $schedule.offer_id = $offerings.offer_id
          INNER JOIN section on $offerings.section_id = section.section_id
          WHERE $schedule.teacher_id = $teacher";




$records = $qry;
$search = "subject_name";
$source->get_total_records($records);

echo json_encode($source->getData($columns,$qry,$search));

 ?>
