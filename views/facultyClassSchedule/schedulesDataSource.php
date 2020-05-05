<?php
include_once('../../classes/databaseController.php');
include_once('../../classes/facultyClassSchedule.class.php');
session_start();

function getData(){
  $schedule  = "schedule_{$_SESSION['AY']}_{$_SESSION['semID']}";
  $class = new ClassSchedule();
  $user = $class->getUser($_SESSION['userID']);
  $user = $user['teacher_id'];
  $DB = new DatabaseController();
  $DB->loadResult("SELECT subjects.subject_name, days, time, room.room
                    FROM $schedule
                    INNER JOIN subjects on $schedule.subject_id = subjects.subject_id
                    INNER JOIN room on $schedule.room_id = room.room_id
                    WHERE teacher_id = $user");
  $schedule_data = array();
  foreach ($DB->getResult() as $value) {
    $schedule_data[] = array(
      'subject'  => $value['subject_name'],
      'days'     => $value['days'],
      'time'     => $value['time'],
      'room'     => $value['room'],
    );
  }
  echo json_encode($schedule_data);

}
getData();
