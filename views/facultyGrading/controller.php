<?php
session_start();
include_once('../../classes/FacultyGrading.class.php');

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

      case 'getClass':
        getClass();
        break;

      default:
        // code...
        break;
    }

}

  function update() {
    $grade = new Grading();

    $id                    = $_POST['selectedStudent'];
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

  function edit() {
  $grade = new Grading();
  $id = $_POST['selectedStudent'];

  $grade = $grade->getGrade($id);

  echo json_encode($grade);
  }

  function getClass() {
    $class = new Grading();
    $id = $_POST['selectedSubject'];

    $class = $class->getClass($id);

    echo json_encode($class);
  }
