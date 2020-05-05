<?php
session_start(); // start session to access the session variables
unset($_SESSION['user_id']);
unset($_SESSION["username"]);
unset($_SESSION["user_name"]);
unset($_SESSION['isUserLoggedIn']);
session_destroy(); // destroy existing session
header("Location: login.php");
?>
