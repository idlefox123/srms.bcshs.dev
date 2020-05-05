<?php
session_start();
include_once('../../../classes/databaseController.php');
include_once('../../../classes/tableSelectDataSource.inc.php');
function getData(){
  $enrollment = "enrollment_{$_SESSION['AY']}_{$_SESSION['semID']}";
  $selectedClass = $_POST['selectedClass'];
  $ctr = 1;
  $DB = new DatabaseController();
  $DB->loadResult("SELECT lrn, concat(last_name, ', ', first_name, ' ', middle_name, ' ', extension_name) as name, gender
                    FROM $enrollment
                    INNER JOIN student on $enrollment.student_id = student.student_id
                    WHERE offer_id = $selectedClass");
  $schedule_data = array();
  foreach ($DB->getResult() as $value) {
    $schedule_data[] = array(
      'no' => $ctr++,
      'lrn' => $value['lrn'],
      'name' => $value['name'],
      'gender' => $value['gender'],
    );
  }
  echo json_encode($schedule_data);
}
getData();
