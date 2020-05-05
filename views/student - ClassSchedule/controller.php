<?php
include_once('../../classes/StudentClassSchedule.class.php');
session_start();
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

  function getClass(){
    $class = new ClassSchedule();
    $id = $_SESSION['userID'];

    $class = $class->getClass($id);

    echo json_encode($class);
  }
