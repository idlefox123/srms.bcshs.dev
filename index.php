<?php
session_start();
include ('classes/config.class.php');

$url = new Configuration('/srms.bcshs.dev');
if (isset($_SESSION['role'])) {

  $role = $_SESSION['role'];
  switch ($role) {
    case 'Administrator':
      return include 'accounts/administrator/index.php';
      break;

    case 'Encoder':
      include 'accounts/encoder/index.php';
      break;

    case 'Faculty':
      include 'accounts/faculty/index.php';
      break;

    case 'Student':
      include 'accounts/student/index.php';
      break;

    default:
      header('Location: /srms.bcshs.dev/login.php');
      break;
  }
}else {
  header('Location: /srms.bcshs.dev/login.php');
}
?>
