
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php

  include_once('classes/UserValidation.class.php');
  /*if (isset($_POST['sign-in'])) {
    $validation = new Validation($_POST);
    $message = $validation->validate();
  }*/
 ?>
  <head>
    <meta charset="utf-8">
    <title>BCSHS</title>
    <!-- Bootstrap CSS -->
    <link href="/myenrollmentsys/css/Bootstrap 4/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="public/css/administratorCSS/customCSS/contentCSS.css">

    <!-- font CSS -->
    <link rel="stylesheet" href="public/font/css/all.min.css">

  </head>
  <style media="screen">
    body,html{
        height: 100%;
        margin: 0px;
        background: #DEDEDE;
    }
  </style>
  <body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">
        <img class="rounded-circle" src="bcshs.jpg" width="40" height="40" alt="">
        BAYBAY CITY SENIOR HIGH SCHOOL
      </a>
    </nav>
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-9">

          <div class="flexbox">
            <div class="">
              <div class="title">
                BCSHS
              </div>
              <div class="title-below">
                <h2>STUDENT RECORD MANAGEMENT SYSTEM</h2>
              </div>
            </div>

          </div>

        </div>
        <div class="col-md-3">

          <div class="login-container">
            <div class="cust-card">

              <!--<div class="row">
                <div class="col-md-12">
                  <p id="message"><?php //echo $message['username'] ?? '' ?></p>
                </div>
              </div>-->
              <div class="cust-card-header">
                <h4>LOGIN</h4>
              </div>

              <div class="cust-card-"><!--/srms.bcshs.dev/authentication/authenticationController.php-->
                <form class="login-form needs-validation" novalidate action="/srms.bcshs.dev/authentication/authenticationController.php<?php //echo $_SERVER['PHP_SELF'] ?>" method="post">
                  <div class="mt-3">
                    <div class="form-group textbox">
                      <label for="username"><i class="fa fa-user-circle"> Username:</i></label>&nbsp|
                      <input type="text" class="" name="username" placeholder="Username" value="" required>
                    </div>
                  </div>
                  <div class="mt-3">
                    <div class="form-group textbox">
                      <label for="password"><i class="fa fa-lock"> Password:</i></label>&nbsp&nbsp|
                      <input type="password" class="" name="password" placeholder="Password" value="" required>
                    </div>
                  </div>

                    <p id="message"><?php //echo $message['password'] ?? '' ?></p>

                  <button class="btn btn-outline-secondary btn-block" type="submit" name="sign-in">Sign in</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="/srms.bcshs.dev/public/js/jquery/jquery.slim.min.js" ></script>
  <script src="/srms.bcshs.dev/public/js/jquery/jquery.min.js" ></script>

  <!-- Bootstrap -->
  <script src="/srms.bcshs.dev/public/css/Bootstrap 4/js/bootstrap.min.js" ></script>

  <!-- Custom
  <script src="/srms.bcshs.dev/authentication/auth.js" charset="utf-8"></script>-->
</html>
