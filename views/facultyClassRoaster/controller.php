<?php
session_start();
include_once('../../classes/FacultyClassRoaster.class.php');

if (isset($_POST['action']))
{
    $action = $_POST['action'];

    switch ($action) {
      case 'getClass':
        getClass();
        break;

      default:
        // code...
        break;
    }

}

  function getClass() {
    $class = new ClassRoaster($_SESSION['AY'],$_SESSION['semID']);
    $id = $_POST['selectedSubject'];

    $class = $class->getClass($id);

    echo json_encode($class);
  }
