<?php
include_once('../../classes/Grading.class.php');

session_start();

if (isset($_POST['action']))
{
    $action = $_POST['action'];

    switch ($action) {
      case 'edit':
        edit();
        break;

      case 'update':
        update();
        break;

      default:
        // code...
        break;
    }

}
  function update(){
    $AY = $_POST['AY'];
    $semester = $_POST['semester'];
    $grade = new Grading($AY,$semester);

    $id                    = $_POST['gradeSelectedID'];
    $grade->first_quarter  = $_POST['1st_quarter'];
    $grade->second_quarter = $_POST['2nd_quarter'];
    $grade->final          = $_POST['final'];
    $grade->remark         = $_POST['remark'];

    $grade = $grade->update($id);

    if ($grade===true) {
      echo 'Grades Updated.';
    }else {
      echo "Error on Update";
    }
  }

function edit(){
  $AY = $_POST['ay'];
  $semester = $_POST['semester'];
  $grade = new Grading($AY,$semester);
  $id = $_POST['gradeSelectedID'];

  $grade = $grade->getGrade($id);

  echo json_encode($grade);
}
