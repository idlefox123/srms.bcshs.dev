<?php
   include_once('accountView.php');
   $view = new View();
   $user = $view->user();
 ?>
<!doctype html>

<html lang="en">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Account</title>
   <!-- Bootstrap CSS -->
   <link href="/srms.bcshs.dev/public/css/Bootstrap 4/css/bootstrap.min.css" rel="stylesheet">

   <!-- Costum Css -->
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/studentCSS/sidebarCSS.css">
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/studentCSS/navBarCSS.css">
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/studentCSS/contentCSS.css">
   <link rel="stylesheet" href="/srms.bcshs.dev/public/font/css/all.min.css">

   <!-- Bootstrap DataTables -->
   <link rel="stylesheet" href="/srms.bcshs.dev/public/DataTables/css/dataTables.bootstrap4.min.css">
 </head>
 </head>

 <body>
   <?php require('templates/student/navbar.php'); ?>
   <?php require('templates/student/sidebar.php'); ?>
   <div class="wrapper">

     <div id= "main-container">

     <div class="container-fluid">

       <div class="row">
         <div class="col-sm-3">
           <h4><i class="fa fa-user-circle"> Profile</i></h4>
         </div>
         <div class="col-sm-9">
           <div class="float-right">
             <h5>SY: <?php echo $view->AY() ?> - <?php echo $view->AY()+1 ?>  <?php echo $view->semester() ?></h5>
           </div>
         </div>
       </div>
       <hr>

       <div class="row">
         <div class="col-md-3"></div>
         <div class="col-md-6">
           <div class="card">
             <div class="card-header">
               <h5> <i class="fa fa-info-circle"> User</i> </h5>
             </div>
             <div class="card-body">
               <div class="row">
                 <div class="col-md-4 font-weight-bold">
                   <ul class="list-group list-group-flush">
                     <li class="list-group-item">User's name:</li>
                     <li class="list-group-item">Username:</li>
                     <li class="list-group-item">Role:</li>
                   </ul>
                 </div>
                 <div class="col-md-8">

                   <ul class="list-group list-group-flush">
                     <li class="list-group-item"> <span id="user"></span> </li>
                     <li class="list-group-item"> <span id="username"></span> </li>
                     <li class="list-group-item"> <span id="role"></span> </li>
                   </ul>
                 </div>
               </div>
               <div class="float-right mt-2">
                 <button id="edit-account-btn" class="btn costBtn btn-outline-success"  data-toggle="modal" data-target="#account-modal"  type="button" name="button"> <i class="fa fa-edit"> Edit</i></button>
               </div>
             </div>
           </div>
         </div>
         <div class="col-md-3"></div>
       </div>

     </div> <!--- container END -->

    </div> <!--- main class END  -->

  </div> <!--- wrapper END -->
  <?php include_once('modal.php'); ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  <script src="/srms.bcshs.dev/public/js/jquery/jquery.slim.min.js" ></script>
  <script src="/srms.bcshs.dev/public/js/jquery/jquery.min.js" ></script>
  <script src="/srms.bcshs.dev/public/css/Bootstrap 4/js/bootstrap.bundle.min.js" ></script>

  <!-- JavaScript DataTables-->

  <script src="/srms.bcshs.dev/public/DataTables/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="/srms.bcshs.dev/public/DataTables/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>


  <!-- Costum JavaScript -->
  <script src="/srms.bcshs.dev/public/js/customJS/customJS.js" type="text/javascript"></script>
  <script src="/srms.bcshs.dev/views/student - Account/index.js" type="text/javascript"></script>
 </body>
</html>
