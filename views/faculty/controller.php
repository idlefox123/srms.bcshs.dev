<?php
include_once('../../classes/Faculty.class.php');
include_once('../../classes/Message.class.php');

if (isset($_POST['action']))
{
    $action = $_POST['action'];


    switch ($action) {
      case 'create':
        create();
        break;

      case 'edit':
        getFaculty();
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

  function create(){
   $faculty = new Faculty();
   $faculty->first_name     = $_POST['fname'];
   $faculty->last_name      = $_POST['lname'];
   $faculty->middle_name    = $_POST['mname'];
   $faculty->extension_name = $_POST['extension'];
   $faculty->contact        = $_POST['contact'];
   $faculty->address        = $_POST['address'];
   $faculty->position       = $_POST['position'];
   $faculty->dept_id        = $_POST['department'];

   $faculty = $faculty->create();
   if ($faculty === true) {
     echo message('success', 'Teacher Successfully Added.');
   }else {
     echo $faculty;
   }
  }

  function getFaculty(){
    $faculty = new Faculty();
    $id = $_POST['selectedFaculty'];

    $faculty = $faculty->getFaculty($id);

    echo json_encode($faculty);
  }

  function update() {
    $faculty = new Faculty();
    $id                      = $_POST['selectedFaculty'];
    $faculty->first_name     = $_POST['fname'];
    $faculty->last_name      = $_POST['lname'];
    $faculty->middle_name    = $_POST['mname'];
    $faculty->extension_name = $_POST['extension'];
    $faculty->contact        = $_POST['contact'];
    $faculty->address        = $_POST['address'];
    $faculty->position       = $_POST['position'];
    $faculty->dept_id        = $_POST['department'];

    $faculty = $faculty->update($id);
    if ($faculty === true) {
      echo message('success', 'Teacher Successfully Updated');
    }else {
      echo message('success', 'Error on Updated');
    }
  }

  function del(){
    $faculty = new Faculty();
    $id      = $_POST['selectedFaculty'];

    $faculty = $faculty->delete($id);
    if ($faculty === true) {
      echo message('success', 'Successfully Deleted');
    }else{
      echo message('danger', 'Error on Deletion');
    }
  }

 ?>
