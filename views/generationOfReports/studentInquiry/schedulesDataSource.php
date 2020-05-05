<?php
session_start();
include_once('../../../classes/databaseController.php');
include_once('../../../classes/tableSelectDataSource.inc.php');

function getData(){

  $schedule        = "schedule_{$_POST['ay']}_{$_POST['semester']}";
  $class          = "class_{$_POST['ay']}_{$_POST['semester']}";
  $selectedStudent = $_POST['selectedStudent'];

  $DB = new DatabaseController();
  $DB->loadResult("SELECT ions.ion,enrollment_id, subjects.subject_name, hours, $schedule.days, $schedule.time, room.room
                    FROM $class
                    INNER JOIN $schedule on $class.schedule_id = $schedule.schedule_id
                    INNER JOIN subjects on $schedule.subject_id = subjects.subject_id
                    LEFT JOIN curriculum on subjects.subject_id = curriculum.subject_id
                    INNER JOIN ions on subjects.ion_id = ions.ion_id
                    INNER JOIN room on $schedule.room_id = room.room_id
                    WHERE enrollment_id = $selectedStudent ORDER BY FIND_IN_SET(ion, 'Core,Applied,Specialized')");

  foreach ($DB->getResult() as $value) {
    $data[] = array(
      'type'    => $value['ion'],
      'subject' => $value['subject_name'],
      'hours'   => $value['hours'],
      'days'    => $value['days'],
      'time'    => $value['time'],
      'room'    => $value['room']
    );
  }
  echo json_encode($data);
}
getData();
