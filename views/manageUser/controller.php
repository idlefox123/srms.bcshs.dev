<?php
include_once('../../classes/User.class.php');

if (isset($_POST['action']))
{
    $action = $_POST['action'];


    switch ($action) {
      case 'create':
        create();
        break;

      case 'edit':
        getUser();
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
    $user = new User();
    $user->user            = $_POST['user'];
    $user->username        = $_POST['uname'];
    $user->password        = $_POST['password'];
    $user->role            = $_POST['role'];

   $user = $user->create();
   if ($user === true) {
     echo message('success', 'New User Successfully Added');
   }else {
     echo $user;
   }
  }

  function getUser() {
    $user = new User();
    $id = $_POST['selectedUser'];

    $user = $user->getUser($id);

    echo json_encode($user);
  }

  function update() {
    $user = new User();
    $user->id              = $_POST['selectedUser'];
    $user->user            = $_POST['user'];
    $user->username        = $_POST['uname'];
    $user->role            = $_POST['role'];
    if (!empty($_POST['password'])) {
      $user->password      = $_POST['password'];
    }

    $user = $user->update();
    if ($user === true) {
      echo message('success', 'User Successfully Updated');
    }else {
      echo message('danger', 'Erron on Update');
    }
  }

  function del() {
    $user = new User();
    $user->id = $_POST['selectedUser'];

    $user = $user->delete();
    if ($user === true) {
      echo message('success', 'User Successfully Deleted');
    }else{
      echo message('danger', 'Error on Deletion');
    }
  }

 ?>
