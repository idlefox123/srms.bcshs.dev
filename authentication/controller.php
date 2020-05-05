<?php
include_once('../classes/authentication.class.php');
include_once('../classes/Message.class.php');

if (isset($_POST['action'])) {
  $auth = new Authentication();

  $auth->username = $_POST['username'];
  $auth->password = $_POST['password'];

  $auth = $auth->authenticateUser();

  if ($auth === true) {
    echo "success";
  }else {
    echo $auth;
  }
}
