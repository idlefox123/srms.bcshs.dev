<?php
include_once('../../../classes/ClassRoaster.class.php');

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
    $class = new ClassRoaster();
    $id = $_POST['selectedClass'];

    $class = $class->getClass($id);

    echo json_encode($class);
  }
