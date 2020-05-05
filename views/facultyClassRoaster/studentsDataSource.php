<?php
session_start();
include_once('../../classes/databaseController.php');

function getData(){

  $class           = "class_{$_SESSION['AY']}_{$_SESSION['semID']}";
  $enrollment      = "enrollment_{$_SESSION['AY']}_{$_SESSION['semID']}";
  $selectedSubject = $_POST['selectedSubject'];
  $ctr = 0;
  $DB = new DatabaseController();
  $DB->loadResult("SELECT lrn, concat(student.last_name, ', ', student.first_name, ' ', student.middle_name, student.extension_name) as name,
                    gender
                    FROM $class
                    INNER JOIN $enrollment on $class.enrollment_id = $enrollment.enrollment_id
                    INNER JOIN student on $enrollment.student_id = student.student_id
                    WHERE schedule_id = $selectedSubject ORDER BY name ASC");

  foreach ($DB->getResult() as $value) {
    $ctr++;
    $data[] = array(
      'no'     => $ctr,
      'lrn'    => $value['lrn'],
      'name'   => $value['name'],
      'gender' => $value['gender'],
    );
  }
  echo json_encode($data);
}
getData();
