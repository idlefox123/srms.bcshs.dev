<?php
include_once('../../classes/facultyAccount.class.php');
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
  $user = new Account();
  $user->user     = $_POST['user'];
  $user->username = $_POST['username'];
  if (!empty($_POST['password'])) {
    $user->password = $_POST['password'];
  }

  $user = $user->update($_SESSION['userID']);
  if ($user === true) {
    echo "Successfully Updated.";
  }else {
    echo "Error on Update.";
  }
}

function edit() {
  $user = new Account();

  $user = $user->getUser($_SESSION['userID']);

  echo json_encode($user);
}
