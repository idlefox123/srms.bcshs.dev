<?php
session_start();
include_once('../../classes/databaseController.php');

function getData(){

  $grades          = "grades_{$_SESSION['AY']}_{$_SESSION['semID']}";
  $enrollment      = "enrollment_{$_SESSION['AY']}_{$_SESSION['semID']}";
  $selectedSubject = $_POST['selectedSubject'];

  $DB = new DatabaseController();
  $DB->loadResult("SELECT grade_id, student.student_id, concat(student.last_name, ', ', student.first_name, ' ', student.middle_name, ' ', student.extension_name) as name ,
                    first_quarter,second_quarter,final, remark
                    FROM $grades
                    INNER JOIN $enrollment on $grades.enrollment_id = $enrollment.enrollment_id
                    INNER JOIN student on $enrollment.student_id = student.student_id
                    WHERE schedule_id = $selectedSubject  ORDER BY name ASC");

  foreach ($DB->getResult() as $value) {
    $data[] = array(
      'gradeID'        => $value['grade_id'],
      'name'           => $value['name'],
      'first_quarter'  => $value['first_quarter'],
      'second_quarter' => $value['second_quarter'],
      'final'          => $value['final'],
      'remark'         => $value['remark']
    );
  }
  echo json_encode($data);
}
getData();
