<?php
include_once('../../classes/Enrollment.class.php');

  if (isset($_POST['action']))
  {
      $action = $_POST['action'];

      switch ($action) {
        case 'create':
          create();
          break;

        case 'update':
          update();
          break;

        default:
          // code...
          break;
      }

  }

  function create() {
    $enrollment = new Enrollment();
    $enrollment->student_id  = $_POST['enrollee'];
    $enrollment->grade_level = $_POST['level'];
    $enrollment->strand_id   = $_POST['strand'];

    $enrollment = $enrollment->create();
    if ($enrollment==true) {
      echo "Successfully Enrolled";
    }else {
      echo "Failed in Enroll";
    }
  }

  function update() {
    $enrollment = new Enrollment();
    $id                      = $_POST['enrollee'];
    $enrollment->grade_level = $_POST['level'];
    $enrollment->strand_id   = $_POST['strand'];
    $enrollment->status      = $_POST['status'];

    $enrollment->update($id);

    if ($enrollment == true) {
      $enrollee = $enrollment->getStudent($id);
      echo json_encode($enrollee);

    }else {
      echo "Failed on Update";
    }
  }
