<?php
  include_once('profileView.php');
  $view = new View();

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
       <div class="row">
         <div class="col-md-4"></div>
         <div class="col-md-4">
           <span id="message">
           </span>
         </div>
         <div class="col-md-4"></div>
       </div>
       <hr>

       <div class="row mt-2">
         <div class="col-md-2"></div>
         <div class="col-md-8">
           <div class="card">
             <div class="card-header">
               <h5><i class="fa fa-info-circle"> My Profile</i></h5>
             </div>
             <div class="card-body">
               <div class="row">
                 <div class="col-md-3 font-weight-bold">
                   <ul class="list-group list-group-flush">
                     <li class="list-group-item">Name:</li>
                     <li class="list-group-item">LRN:</li>
                     <li class="list-group-item">Strand:</li>
                     <li class="list-group-item">Grade:</li>
                     <li class="list-group-item">Contact:</li>
                     <li class="list-group-item">Home Address:</li>
                   </ul>
                 </div>
                 <div class="col-md-9">
                   <ul class="list-group list-group-flush">
                     <li class="list-group-item"> <span id="name"></span> </li>
                     <li class="list-group-item"> <span id="lrn"></span> </li>
                     <li class="list-group-item"> <span id="strand"></span> </li>
                     <li class="list-group-item"> <span id="level"></span> </li>
                     <li class="list-group-item"> <span id="contact"></span> </li>
                     <li class="list-group-item"> <span id="address"></span> </li>
                     <li class="list-group-item"> <span id=""></span> </li>

                   </ul>
                 </div>
               </div>
               <div class="float-right mt-2">
                 <button id="edit-profile-btn" class="btn costBtn btn-outline-success" type="button"  data-toggle="modal" data-target="#profile-modal" name="button"> <i class="fa fa-edit"> Edit</i></button>
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
  <script src="/srms.bcshs.dev/views/student - Profile/index.js" type="text/javascript"></script>
