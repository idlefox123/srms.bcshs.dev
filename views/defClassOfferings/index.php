<?php
  include_once('offeringsView.php');

  $view = new OfferingsView();
?>
<!doctype html>

<html lang="en">
 <head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Class Offerings</title>
   <!-- Bootstrap CSS -->
   <link href="/srms.bcshs.dev/public/css/Bootstrap 4/css/bootstrap.min.css" rel="stylesheet">

   <!-- Costum Css -->
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/administratorCSS/customCSS/customCSS.css">
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/administratorCSS/customCSS/navBarCSS.css">
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/administratorCSS/customCSS/contentCSS.css">
   <link rel="stylesheet" href="/srms.bcshs.dev/public/font/css/all.min.css">

   <!-- Bootstrap DataTables -->
   <link rel="stylesheet" href="/srms.bcshs.dev/public/DataTables/css/dataTables.bootstrap4.min.css">

 </head>

 <body>
   <?php require('templates/administrator/navbar.php'); ?>
   <?php require('templates/administrator/sidebar.php'); ?>

   <div class="wrapper">

     <div id= "main-container">

     <div class="container-fluid">

       <div class="row">
         <div class="col-sm-4">
           <h4><i class="fa fa-calendar-alt"> Default Class Offerings</i></h4>
         </div>
         <div class="col-sm-8">
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

       <div class="row mb-2">
         <div class="col-md-12 float-right">
           <div class="float-right">
             <button id="new-class-btn" class="btn costBtn btn-outline-primary" data-toggle="modal" data-target="#class-modal" name="new-class-btn" type="button"><i class="fa fa-plus-circle"> New Offering</i></button>
           </div>
         </div>
       </div>

       <div class="row">
         <div class="col-md-5">
           <div class="form-row font-weight-bold">
             <div class="form-group col-md-6">
               <label for="filterStrand">Strand:</label>
               <select id="filterStrand" name="filterStrand" class="form-control">
                 <option value="">SELECT</option>
                 <<?php
                 foreach ($view->strand() as $value):?>
                   <option value="<?php echo $value["strand_id"]?>">
                     <?php echo $value["strand"]?>
                   </option>
                 <?php endforeach;?>
               </select>
             </div>
             <div class="form-group col-md-6">
               <label for="filterLevel">Grade Level:</label>
               <select id="filterLevel" name="filterLevel" class="form-control input-height">
                 <option value="">SELECT</option>
                 <option value="Grade 11">Grade 11</option>
                 <option value="Grade 12">Grade 12</option>
               </select>
             </div>
           </div>

           <div class="float-right">
             <div class="form-inline padding-bottom-10">
               <label class="" for="search">Search:&nbsp&nbsp</label>
               <input id="search" class="form-control input-height" type="text" name="search" value="">
             </div>
           </div>
           <table id="offeringsTable" class="table table-hover" width="100%">
             <thead>
               <tr class="text-center">
                 <th width="50%">Class Offerings</th>
                 <th width="50%">Grade & Strand</th>
               </tr>
             </thead>
           </table>
           <span class="float-right mt-2 mb-2 ml-2">
             <button id="edit-class-btn" class="btn costBtn btn-outline-success" type="button" name="edit-class-btn"><i class="fa fa-edit"> Edit</i></button>
           </span>
           <span class="float-right mt-2 mb-2">
             <button id="remove-class-btn" class="btn costBtn btn-outline-danger" type="button" name="remove-class-btn"><i class="fa fa-trash-alt"> Remove</i></button>
           </span>
         </div>

         <div class="col-md-7">
           <div class="card">
             <div class="card-header">
               <h5 class="font-weight-bold">Schedules</h5>
             </div>
             <div class="card-body">
               <div class="">
                 <table id="schedulesTable" class="table table-hover" width="100%">
                   <thead>
                     <tr>
                       <th class="text-center" width="45%">Subject</th>
                       <th class="text-center" width="5%">Day</th>
                       <th class="text-center" width="20%">Time</th>
                       <th class="text-center" width="10%">Room</th>
                       <th class="text-center" width="20%">Teacher</th>
                     </tr>
                   </thead>
                 </table>
               </div>
               <span class="float-left mt-2 mb-2">
                 <button id="add-schedule-btn" class="btn costBtn btn-outline-primary" data-toggle="modal" data-target="#schedule-modal" type="button" name="add-schedule-btn"><i class="fa fa-plus-circle"> Add Schedule</i></button>
               </span>
             </div>
           </div>
         </div>
       </div>
       <span class="float-right mt-2 mb-2">
           <button id="go-to-scheduling-btn" class="btn costBtn btn-outline-info" type="button" name="button">
             <span class="font-weight-bold">Class Scheduling <i class="fa fa-arrow-circle-up"></i></span>
           </button>
       </span>
     </div><!--- container END -->

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
  <script src="/srms.bcshs.dev/views/DefClassOfferings/index.js" type="text/javascript"></script>

 </body>
</html>
