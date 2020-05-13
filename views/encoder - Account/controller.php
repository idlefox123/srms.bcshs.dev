<?php
session_start();
include_once('../../classes/EncoderAccount.class.php');
include_once('../../classes/Message.class.php');

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
    echo message('success', 'Account Successfully Updated.');
  }else {
    echo message('danger', 'Error on Update.');
  }
}

function edit() {
  $user = new Account();

  $user = $user->getUser($_SESSION['userID']);

  echo json_encode($user);
}
