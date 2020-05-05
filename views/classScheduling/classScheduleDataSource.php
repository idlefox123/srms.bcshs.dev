<?php
include_once('../../classes/databaseController.php');
session_start();

function getData(){
  $schedule  = "schedule_{$_SESSION['AY']}_{$_SESSION['semID']}";
  $selectedClass = $_POST['selectedClass'];

  $DB = new DatabaseController();
  $DB->loadResult("SELECT schedule_id, offer_id, subjects.subject_name, days, time, room.room,
                  concat(teacher.last_name, ', ', teacher.first_name) as teacher
                  FROM $schedule
                  INNER JOIN subjects on $schedule.subject_id = subjects.subject_id
                  INNER JOIN room on $schedule.room_id = room.room_id
                  INNER JOIN teacher on $schedule.teacher_id = teacher.teacher_id
                  WHERE offer_id = $selectedClass");
  $schedule_data = array();
  foreach ($DB->getResult() as $value) {
    $schedule_data[] = array(
      'rowID'    => $value['schedule_id'],
      'subject'  => $value['subject_name'],
      'days'     => $value['days'],
      'time'     => $value['time'],
      'room'     => $value['room'],
      'teacher'  => $value['teacher'],
      'schedule' => $value['schedule_id'],
    );
  }
  echo json_encode($schedule_data);

}
getData();
