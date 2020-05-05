<?php
session_start();
include_once('../../classes/tableDataSource.inc.php');

$schedule = "schedule_{$_SESSION['AY']}_{$_SESSION['semID']}";

$source = new sourceTable();
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
  array('db' => 'schedule_id', 'dt' => 'schedule'),
  array('db' => 'teacher', 'dt' => 'teacher')
  );

$qry = "SELECT schedule_id, offer_id, $schedule.subject_id,subjects.subject_name, days, time, $schedule.room_id, room.room,
        $schedule.teacher_id, concat(teacher.last_name, ', ', teacher.first_name)
        as teacher FROM $schedule
        INNER JOIN subjects on $schedule.subject_id = subjects.subject_id
        INNER JOIN teacher on $schedule.teacher_id = teacher.teacher_id
        INNER JOIN room on $schedule.room_id = room.room_id ";
$search = "subject_name";
$records = $qry;
$source->get_total_records($records);

echo json_encode($source->getData($columns,$qry,$search));

 ?>
