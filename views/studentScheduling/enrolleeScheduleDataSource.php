<?php
session_start();
include_once('../../classes/databaseController.php');
include_once('../../classes/tableSelectDataSource.inc.php');
function getData(){
  $schedule = "schedule_{$_SESSION['AY']}_{$_SESSION['semID']}";
  $class = "class_{$_SESSION['AY']}_{$_SESSION['semID']}";

  $selectedEnrolleeID = $_POST['selectedEnrolleeID'];

  $DB = new DatabaseController();
  $DB->loadResult("SELECT subjects.subject_name, $schedule.days, $schedule.time, room.room FROM $class
				  INNER JOIN $schedule on $class.schedule_id = $schedule.schedule_id
                  INNER JOIN subjects on $schedule.subject_id = subjects.subject_id
                  INNER JOIN room on $schedule.room_id = room.room_id WHERE `enrollment_id` = $selectedEnrolleeID");
  $schedule_data = array();
  foreach ($DB->getResult() as $value) {
    $schedule_data[] = array(
      'subject' => $value['subject_name'],
      'days' => $value['days'],
      'time' => $value['time'],
      'room' => $value['room']
    );
  }
  echo json_encode($schedule_data);
}

getData();
 ?>
