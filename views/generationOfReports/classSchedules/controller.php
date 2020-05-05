<?php
include_once('../../../classes/ClassSchedules.class.php');

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
    $class = new ClassSchedules();
    $id = $_POST['selectedClass'];

    $class = $class->getClass($id);

    echo json_encode($class);
  }
