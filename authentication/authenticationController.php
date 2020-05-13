<?php
include_once('../classes/authentication.class.php');
include_once('../classes/Message.class.php');

if (isset($_POST['sign-in'])) {
  //$validate = new ValidateUser($_POST);
  //print_r($validate->validate());
  $auth = new Authentication();
  $auth->username = $_POST['username'];
  $auth->password = $_POST['password'];

  $auth = $auth->authenticateUser();
  if ($auth === true) {
    echo "success";
  }else {
    header('Location: /srms.bcshs.dev/');
  }
}
