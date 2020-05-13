<?php
  include_once('profileView.php');
  $view = new ProfileView();

?>
<!doctype html>

<html lang="en">
 <head>
   <title>Profile</title>
   <!-- Bootstrap CSS -->
   <link href="/srms.bcshs.dev/public/css/Bootstrap 4/css/bootstrap.min.css" rel="stylesheet">

   <!-- Costum Css -->
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/facultyCSS/sidebarCSS.css">
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/facultyCSS/navBarCSS.css">
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/facultyCSS/contentCSS.css">
   <link rel="stylesheet" href="/srms.bcshs.dev/public/font/css/all.min.css">

   <!-- Bootstrap DataTables -->
   <link rel="stylesheet" href="/srms.bcshs.dev/public/DataTables/css/dataTables.bootstrap4.min.css">
 </head>
 </head>

 <body>
   <?php require('templates/faculty/navbar.php'); ?>
   <?php require('templates/faculty/sidebar.php'); ?>

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
       <div class="row">
         <div class="col-md-4"></div>
         <div class="col-md-4">
           <span id="message">
           </span>
         </div>
         <div class="col-md-4"></div>
       </div>
       <hr>

       <!--<div class="profile-container">
         <div class="row">
           <div class="col-md-2 flex-center" >
             <img class="profile-img img-thumbnail img-responsive" width="150px" height="150px"  src="/myenrollmentsys/default-profile.png" alt="">
           </div>
           <div class="col-md-10">

           </div>
         </div>
       </div>-->

       <div class="row mt-2">
         <div class="col-md-2"></div>
         <div class="col-md-8 flex">
           <div class="card">
             <div class="card-header">
               <h5><i class="fa fa-info-circle"> My Profile</i></h5>
             </div>
             <div class="card-body">
               <div class="row">
                 <div class="col-md-3 font-weight-bold">
                   <ul class="list-group list-group-flush">
                     <li class="list-group-item">Name:</li>
                     <li class="list-group-item">Contact:</li>
                     <li class="list-group-item">Home Address:</li>
                     <li class="list-group-item">Position:</li>
                     <li class="list-group-item">Department:</li>
                   </ul>
                 </div>
                 <div class="col-md-9">
                   <ul class="list-group list-group-flush">
                     <li class="list-group-item"> <span id="name"></span> </li>
                     <li class="list-group-item"> <span id="contact"></span> </li>
                     <li class="list-group-item"> <span id="address"></span> </li>
                     <li class="list-group-item"> <span id="position"></span> </li>
                     <li class="list-group-item"> <span id="department"></span> </li>
                   </ul>
                 </div>
               </div>
               <div class="float-right mt-2">
                 <button id="edit-faculty-btn" class="btn costBtn btn-outline-success" type="button" name="button"> <i class="fa fa-edit"> Edit</i></button>
               </div>
             </div>
           </div>
         </div>
         <div class="col-md-2"></div>
       </div>
       <?php include_once('modal.php') ?>

     </div> <!--- container END -->

    </div> <!--- main class END  -->

  </div> <!--- wrapper END -->


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
  <script src="/srms.bcshs.dev/views/facultyProfile/index.js" type="text/javascript"></script>
