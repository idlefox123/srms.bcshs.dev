<?php
include_once('../includes/databaseController.php');
  $db = new DatabaseController();
  $selectedID = $_POST['selectedID'];
  $data = array();
  $db->loadResult("SELECT concat(last_name, ', ', first_name, ' ', middle_name) as teacher, position,
                  concat(department.`dept_name`, ' ( ', department.acronym, ' )') as department FROM `teacher`
                  INNER JOIN department on teacher.dept_id = department.dept_id WHERE teacher_id = $selectedID");

  foreach ($db->getResult() as $value) {
    $data['teacher'] = $value['teacher'];
    $data['department'] = $value['department'];
    $data['position'] = $value['position'];
  }

  echo json_encode($data);
