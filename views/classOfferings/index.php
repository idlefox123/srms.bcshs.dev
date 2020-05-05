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
         <div class="col-sm-3">
           <h4><i class="fa fa-calendar-alt"> Class Offerings</i></h4>
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

       <div class="row mb-2">
         <div class="col-md-12 float-right">
           <div class="float-right">
             <button id="new-offering-btn" class="btn costBtn btn-outline-primary" name="new-offering-btn" type="button"><i class="fa fa-plus-circle"> New Offering</i></button>
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
           <table id="offeringsTable" class="table table-hover table-bordered" width="100%">
             <thead>
               <tr class="text-center">
                 <th width="70%">Offerings</th>
               </tr>
             </thead>
           </table>
         </div>

         <div class="col-md-7">

           <div class="row font-weight-bold">
             <div class="col-md-12 mt-2">
               <div class="card-header">
                 <h5 class="font-weight-bold"><i class="fa fa-info-circle"> Class Offering</i></h5>
               </div>
                <hr>
               <form class="offeringsForm needs-validation" novalidate action="" method="post">

                 <div class="form-group row">
                   <label class="col-sm-4 col-form-label" for="section"><span>Section:</span></label>
                   <div class="col-sm-7">
                     <select class="form-control" id="section" name="section" required>
                       <option value="">Section</option>
                       <?php
                       foreach ($view->section() as $value):?>
                         <option value="<?php echo $value["section_id"]?>">
                           <?php echo $value["section"]?>
                         </option>
                       <?php endforeach;?>
                     </select>
                   </div>
                 </div>
                 <div class="form-group row">
                   <label class="col-sm-4 col-form-label" for="strand"><span>Strand:</span></label>
                   <div class="col-sm-7">
                     <select class="form-control" id="strand" name="strand" required>
                       <option value="">Strand</option>
                       <?php
                       foreach ($view->strand() as $value):?>
                         <option value="<?php echo $value["strand_id"]?>">
                           <?php echo $value["strand"]?>
                         </option>
                       <?php endforeach;?>
                     </select>
                   </div>
                 </div>
                 <div class="form-group row">
                   <label class="col-sm-4 col-form-label" for="level"><span>Grade Level:</span></label>
                   <div class="col-sm-7">
                     <select class="form-control" id="level" name="level" required>
                       <option value="">Grade Level</option>
                       <option value="Grade 11">Grade 11</option>
                       <option value="Grade 12">Grade 12</option>
                     </select>
                   </div>
                 </div>
                 <div class="form-group row">
                   <label class="col-sm-4 col-form-label" for="adviser"><span>Adviser:</span></label>
                   <div class="col-sm-7">
                     <select class="form-control" id="adviser" name="adviser" required>
                       <option value="">Adviser</option>
                       <?php
                       foreach ($view->teacher() as $value):?>
                         <option value="<?php echo $value["teacher_id"]?>">
                           <?php echo $value["teacher"]?>
                         </option>
                       <?php endforeach;?>
                     </select>
                   </div>
                 </div>
                 <div class="form-group row">
                   <div class="col-sm-5">
                     Enrollee / Max Enrollee:
                   </div>
                   <div class=" col-sm-1"></div>
                   <div class="col-sm-6 row">
                     <input id="enrolled" class="form-control" style="width:50px" type="text" name="enrolled" value="" required>
                     &nbsp&nbsp<span style="font-size:20px">/</span>&nbsp&nbsp
                     <input id="maxEnrollee" class="form-control" style="width:50px" type="text" name="maxEnrollee" value="" required>
                   </div>
                 </div>

                 <input type="text" id="selectedOffering" name="selectedOffering" hidden value=""/>

                 <span class="float-right">
                   <button id="delete-offering-btn" class="btn costBtn btn-outline-danger" name="delete-offering-btn" type="button"><i class="btn-action-icon fa fa-trash-alt"> Delete</i></button>
                 </span>
                 <span class="float-right mr-2">
                   <button id="update-offering-btn" class="btn costBtn btn-outline-success" name="update-offering-btn" type="submit"><i class="btn-action-icon fa fa-save"> Update</i></button>
                 </span>
                 <span class="float-left mr-2">
                   <button disabled id="add-offering-btn" class="btn costBtn btn-outline-info" name="add-offering-btn" type="submit"><i class="btn-action-icon fa fa-plus-circle"> Add Offering</i></button>
                 </span>

               </form>

             </div>
           </div>
           <hr>
           <div class="row mb-2">
             <div class="col-md-4"></div>
             <div class="col-md-4">
               <button id="show-schedule-btn" class="btn costBtn btn-block btn-outline-info" type="button" name="button">
                 <i class="fa fa-calendar-alt"> Show Schedule</i>
               </button>
               <?php include_once('modal.php') ?>
             </div>
             <div class="col-md-4"></div>
           </div>
         </div>
       </div>
       <span class="float-right mt-2 mb-2">
           <button id="go-to-scheduling-btn" class="btn costBtn btn-outline-info" type="button" name="button">
             <span class="font-weight-bold">Class Scheduling <i class="fa fa-arrow-circle-right"></i></span>
           </button>
       </span>
     </div><!--- container END -->

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
  <script src="/srms.bcshs.dev/views/classOfferings/index.js" type="text/javascript"></script>

 </body>
</html>
