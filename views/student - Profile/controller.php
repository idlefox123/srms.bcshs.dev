<?php
include_once('../../classes/StudentProfile.class.php');
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

function update() {
  $faculty = new Profile();
  $faculty->first_name     = $_POST['fname'];
  $faculty->last_name      = $_POST['lname'];
  $faculty->middle_name    = $_POST['mname'];
  $faculty->extension_name = $_POST['extension'];
  $faculty->contact        = $_POST['edit-contact'];
  $faculty->home_address   = $_POST['edit-address'];

  $faculty = $faculty->update($_SESSION['userID']);
  if ($faculty === true) {
    echo "Successfully Updated.";
  }else {
    echo "Error on Update.";
  }
}

function edit(){
  $user = new Profile();

  $user = $user->getUser($_SESSION['userID']);

  echo json_encode($user);
}
