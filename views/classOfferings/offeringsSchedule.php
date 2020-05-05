<?php
include_once('../../classes/databaseController.php');
session_start();
function getData(){
  $schedule = "schedule_{$_SESSION['AY']}_{$_SESSION['semID']}";
  $selectedOffering = $_POST['selectedOffering'];
  $db = new DatabaseController();

  $db->loadResult("SELECT schedule_id, offer_id, subjects.subject_name, days, time, room.room FROM $schedule
                  INNER JOIN subjects on $schedule.subject_id = subjects.subject_id
                  INNER JOIN room on $schedule.room_id = room.room_id WHERE offer_id = $selectedOffering");
  $schedule_data = array();
  foreach ($db->getResult() as $value) {
    $schedule_data[] = array(
      'subject' => $value['subject_name'],
      'days' => $value['days'],
      'time' => $value['time'],
      'room' => $value['room'],
      'schedule' => $value['schedule_id'],
    );
  }
  echo json_encode($schedule_data);
  return json_encode($schedule_data);

}
getData();
//$tableData = "data.json";
//file_put_contents($tableData, getData());
 ?>
