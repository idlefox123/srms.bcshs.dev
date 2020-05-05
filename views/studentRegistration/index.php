<?php
  include_once('registrationView.php');
  $view = new RegistrationView();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Registration</title>
    <meta charset="utf-8">

    <!-- Bootstrap CSS -->
    <link href="/srms.bcshs.dev/public/css/Bootstrap 4/css/bootstrap.min.css" rel="stylesheet">

    <!-- Costum Css -->
    <link rel="stylesheet" href="/srms.bcshs.dev/public/css/administratorCSS/customCSS/customCSS.css">
    <link rel="stylesheet" href="/srms.bcshs.dev/public/css/administratorCSS/customCSS/navBarCSS.css">
    <link rel="stylesheet" href="/srms.bcshs.dev/public/css/administratorCSS/customCSS/contentCSS.css">
    <link rel="stylesheet" href="/srms.bcshs.dev/public/font/css/all.min.css">

    <!-- Datepicker -->
    <link rel="stylesheet" href="/srms.bcshs.dev/public/datepicker/css/jquery.datetimepicker.css">

    <!-- Bootstrap DataTables -->
    <link rel="stylesheet" href="/srms.bcshs.dev/public/DataTables/css/dataTables.bootstrap4.min.css">

  </head>

  <body>
    <?php
    $role = $_SESSION['role'];
    switch ($role) {
      case 'Administrator':
        require('templates/administrator/navbar.php');
        require('templates/administrator/sidebar.php');
        break;

      case 'Encoder':
        require('templates/encoder/navbar.php');
        require('templates/encoder/sidebar.php');
        break;

      default:
        // code...
        break;
    }
    ?>

    <div class="wrapper">
      <div id="main-container">
        <div class="container-fluid">

          <div class="row">
            <div class="col-sm-3">
              <h4><i class="fa fa-calendar-alt"> Student Registration</i></h4>
            </div>
            <div class="col-sm-9">
              <div class="float-right">
                <h5>SY: <?php echo $view->AY() ?> - <?php echo $view->AY()+1 ?>  <?php echo $view->semester() ?></h5>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <span id="message">
              </span>
            </div>
            <div class="col-md-4"></div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <div class="float-right mb-2">
                <button id="add-new-student-btn" class="btn costBtn btn-outline-primary" data-toggle="modal" href="#addModal" name="addModal"><i class="fa fa-plus-circle"> New Student</i></button>
              </div>
            </div>
          </div>
          <?php include_once('newRegistrationForm.php') ?><!---Adding new Student-->
          <div class="row">
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h5 class="font-weight-bold"> Registered Students </h5>
                </div>
                <div class="card-body">
                  <div class="mt-2 mb-2">
                    <div class="float-right">
                      <div class="form-inline">
                        <label class="mr-1" for="search">Search:</label>
                        <input id="search" class="form-control input-height" type="text" name="search" value="">
                      </div>
                    </div>
                  </div>
                  <div class="mt-5">
                    <table id="studentTable" class="table table-hover" width="100%" height="100%">
                      <thead>
                        <tr>
                          <th class="text-center" width='30%'>LRN</th>
                          <th class="text-center" width='70%'>Name</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-8">

              <div class="">
                <?php require_once('parentGuardian/pgmodal.php') ?>
                <?php require_once('registrationForm.php');?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="/srms.bcshs.dev/public/js/jquery/jquery.slim.min.js" ></script>
    <script src="/srms.bcshs.dev/public/js/jquery/jquery.min.js" ></script>
    <script src="/srms.bcshs.dev/public/css/Bootstrap 4/js/bootstrap.bundle.min.js" ></script>

    <!-- JavaScript DataTables-->

    <script src="/srms.bcshs.dev/public/DataTables/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/srms.bcshs.dev/public/DataTables/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

    <!-- Datepicker -->
    <script src="/srms.bcshs.dev/public/datepicker/js/jquery.datetimepicker.full.min.js" type="text/javascript"></script>

    <!-- Costum JavaScript -->
    <script src="/srms.bcshs.dev/public/js/customJS/customJS.js" type="text/javascript"></script>
    <script src="/srms.bcshs.dev/views/studentRegistration/js/studentRecordJS.js" type="text/javascript"></script>
    <script src="/srms.bcshs.dev/views/studentRegistration/js/addNewRecordJS.js" type="text/javascript"></script>
    <script src="/srms.bcshs.dev/views/studentRegistration/parentGuardian/js/parentGuardianJS.js" type="text/javascript"></script>

  </body>
</html>
