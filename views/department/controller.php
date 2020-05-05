<?php
include_once('../../classes/Department.class.php');
include_once('../../classes/Message.class.php');


if (isset($_POST['action']))
{
    $action = $_POST['action'];


    switch ($action) {
      case 'create':
        create();
        break;

      case 'edit':
        getDepartment();
        break;

      case 'update':
        update();
        break;

      case 'delete':
        del();
        break;

      default:
        // code...
        break;
    }

}

  function create() {
    $department = new Department();
    $department->dept_name = $_POST['department'];
    $department->acronym   = $_POST['acronym'];
    $department->dept_head = $_POST['dept-head'];


    $department = $department->create();

    if ($department === true) {
      echo message('success', 'Department Successfully Added');
    }else {
      echo $department;
    }
  }

  function getDepartment() {
    $department = new Department();
    $id = $_POST['selectedDepartment'];

    $department = $department->getDepartment($id);

    echo json_encode($department);

  }

  function update() {
    $department = new Department();
    $department->id           = $_POST['selectedDepartment'];
    $department->dept_name = $_POST['department'];
    $department->acronym   = $_POST['acronym'];
    $department->dept_head = $_POST['dept-head'];

    $department = $department->update();
    if ($department === true) {
      echo message('success', 'Department Successfully Updated');
    }else {
      echo message('danger', 'Failed on Update');
    }
  }

  function del() {
    $department = new Department();
    $department->id = $_POST['selectedDepartment'];

    $department = $department->delete();
    if ($department === true) {
      echo message('success', 'Department Successfully Deleted');
    }else{
      echo message('danger', 'Failed on Deletion');
    }
  }

 ?>
