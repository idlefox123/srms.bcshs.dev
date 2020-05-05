<?php
session_start();
include_once('../includes/tableSelectDataSource.inc.php');
$selectedID = $_GET['selectedID'];

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

  );

$qry = "SELECT schedule_id, subjects.subject_name, days, time, room.room FROM `schedule_2018_1`
        LEFT JOIN subjects on schedule_2018_1.subject_id = subjects.subject_id
        LEFT JOIN room on schedule_2018_1.room_id = room.room_id
        WHERE schedule_2018_1.teacher_id = $selectedID";
$records = "SELECT * from schedule_2018_1 where teacher_id = $selectedID";
$search = "subject_name";
$source->get_total_records($records);

echo json_encode($source->getData($columns,$qry,$search));

 ?>
