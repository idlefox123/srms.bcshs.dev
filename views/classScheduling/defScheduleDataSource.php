<?php
session_start();
include_once('../../classes/tableDataSource.inc.php');
//$AY = $_SESSION['AY'];
//$AY--;
//$semester  = $_SESSION['semID'];
$schedule  = "schedule_def_{$_SESSION['semID']}";
$offerings = "offerings_def_{$_SESSION['semID']}";
$source = new sourceTable();

$columns = array(
  array('db' => 'schedule_id', 'dt' => 'DT_RowId',
          'formatter' => function($d,$row){
              return $d;
            }
        ),
  array('db' => 'offer_id', 'dt' => 'DT_Offer_Id',
          'formatter' => function($d,$row){
              return $d;
            }
        ),
  array('db' => 'subject_id', 'dt' => 'DT_Subject_Id',
          'formatter' => function($d,$row){
              return $d;
            }
        ),
  array('db' => 'room_id', 'dt' => 'DT_Room_Id',
          'formatter' => function($d,$row){
              return $d;
            }
        ),
  array('db' => 'teacher_id', 'dt' => 'DT_Teacher_Id',
    'formatter' => function($d,$row){
        return $d;
        }
      ),
  array('db' => 'subject_name', 'dt' => 'subject'),
  array('db' => 'days', 'dt' => 'days'),
  array('db' => 'time', 'dt' => 'time'),
  array('db' => 'room', 'dt' => 'room'),
  array('db' => 'teacher', 'dt' => 'teacher')
  );

  $qry = "SELECT schedule_id, $schedule.offer_id,
          $schedule.subject_id,subjects.subject_name, days, time, $schedule.room_id,room.room, $schedule.teacher_id,
          concat(teacher.last_name, ', ', teacher.first_name) as teacher
          FROM $schedule
          INNER JOIN subjects on $schedule.subject_id = subjects.subject_id
          INNER JOIN teacher on $schedule.teacher_id = teacher.teacher_id
          INNER JOIN room on $schedule.room_id = room.room_id
          INNER JOIN $offerings on $schedule.offer_id = $offerings.offer_id";
        if (isset($_GET['section']) || isset($_GET['level']) || isset($_GET['strand'])) {
        if ($_GET['section']!='') {
          $qry.= " where $schedule.offer_id = '".$_GET['section']."'";
        }elseif ($_GET['level']!='' && $_GET['strand']=='') {
            $qry.= " where grade_level = '".$_GET['level']."'";
          }elseif ($_GET['strand']!='' && $_GET['level']=='') {
            $qry.= " where $offerings.strand_id = '".$_GET['strand']."'";
          }elseif ($_GET['level']!='' && $_GET['strand']!='') {
            $qry.= " where grade_level = '".$_GET['level']."' and $offerings.strand_id = '".$_GET['strand']."'";
          }
        }
$search = "subject_name";
$records = $qry;
$source->get_total_records($records);

echo json_encode($source->getData($columns,$qry,$search));

 ?>
