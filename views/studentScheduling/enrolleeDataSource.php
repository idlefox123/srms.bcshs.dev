<?php
session_start();
include_once('../../classes/tableSelectDataSource.inc.php');

$source = new sourceTable();

$selectedID = $_GET['selectedEnrolleeID'];
$enrollment = "enrollment_{$_SESSION['AY']}_{$_SESSION['semID']}";
$schedule   = "schedule_{$_SESSION['AY']}_{$_SESSION['semID']}";
$class      = "class_{$_SESSION['AY']}_{$_SESSION['semID']}";


$columns = array(
  array('db' => 'schedule_id', 'dt' => 'DT_RowId',
          'formatter' => function($d,$row){
              return $d;
            }
        ),
  array('db' => 'subject_name', 'dt' => 'subject'),
  array('db' => 'days', 'dt' => 'days'),
  array('db' => 'time', 'dt' => 'time'),
  array('db' => 'room', 'dt' => 'room'),

  );
  $qry = "SELECT $class.schedule_id, subjects.subject_name, $schedule.days,$schedule.time, room.room FROM $class
          left JOIN $enrollment on $class.enrollment_id = $enrollment.enrollment_id
          left JOIN $schedule on $class.schedule_id = $schedule.schedule_id
          left JOIN subjects on $schedule.subject_id = subjects.subject_id
          left JOIN room on $schedule.room_id = room.room_id where $class.enrollment_id = $selectedID ";


$records = "SELECT * from $class where enrollment_id = $selectedID";
$search = "subject_name";
$source->get_total_records($records);

echo json_encode($source->getData($columns,$qry,$search));

 ?>
