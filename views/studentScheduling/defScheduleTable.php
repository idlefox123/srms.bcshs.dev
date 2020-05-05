<?php
session_start();
include_once('../../classes/databaseController.php');
include_once('../../classes/tableSelectDataSource.inc.php');
function getData(){
  $schedule = "schedule_{$_SESSION['AY']}_{$_SESSION['semID']}";

  $db = new DatabaseController();
  $selectedOfferingsID = $_POST['selectedOfferingsID'];
  $db->loadResult("SELECT schedule_id, offer_id, subjects.subject_name, days, time, room.room FROM $schedule
                  INNER JOIN subjects on $schedule.subject_id = subjects.subject_id
                  INNER JOIN room on $schedule.room_id = room.room_id WHERE offer_id = $selectedOfferingsID");
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

}
getData();
 ?>
