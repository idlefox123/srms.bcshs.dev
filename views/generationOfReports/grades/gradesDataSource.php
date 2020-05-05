<?php
session_start();
include_once('../../../classes/databaseController.php');
include_once('../../../classes/tableSelectDataSource.inc.php');

function getData(){

  $schedule        = "schedule_{$_POST['ay']}_{$_POST['semester']}";
  $grades          = "grades_{$_POST['ay']}_{$_POST['semester']}";
  $enrollment      = "enrollment_{$_POST['ay']}_{$_POST['semester']}";
  $selectedStudent = $_POST['selectedStudent'];

  $DB = new DatabaseController();
  $DB->loadResult("SELECT grade_id, ions.ion, subjects.subject_name, first_quarter, second_quarter, final FROM $grades
          LEFT JOIN $enrollment on $grades.enrollment_id = $enrollment.enrollment_id
          LEFT JOIN $schedule on $grades.schedule_id = $schedule.schedule_id
          LEFT JOIN subjects on $schedule.subject_id = subjects.subject_id
          LEFT JOIN ions on subjects.ion_id = ions.ion_id
          WHERE $enrollment.enrollment_id = $selectedStudent ORDER BY FIND_IN_SET(ion, 'Core,Applied,Specialized')");

  foreach ($DB->getResult() as $value) {
    $data[] = array(
      'type'           => $value['ion'],
      'first_quarter'  => $value['first_quarter'],
      'second_quarter' => $value['second_quarter'],
      'subject'        => $value['subject_name'],
      'final'          => $value['final']
    );
  }
  echo json_encode($data);
}
getData();
