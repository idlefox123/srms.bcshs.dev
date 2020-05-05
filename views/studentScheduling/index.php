<?php
  include_once('studentSchedulingView.php');
  global $url;
  $view = new StudentSchedulingView($url->segment(2));
  $student = $view->student();
  $enrollee = $view->enrollee();
?>
<!doctype html>

<html lang="en">
 <head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- Bootstrap CSS -->
   <link href="/srms.bcshs.dev/public/css/Bootstrap 4/css/bootstrap.min.css" rel="stylesheet">

   <!-- Costum Css -->
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/administratorCSS/customCSS/customCSS.css">
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/administratorCSS/customCSS/navBarCSS.css">
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/administratorCSS/customCSS/contentCSS.css">
   <link rel="stylesheet" href="/srms.bcshs.dev/public/font/css/all.min.css">

   <!-- Bootstrap DataTables -->
   <link rel="stylesheet" href="/srms.bcshs.dev/public/DataTables/css/dataTables.bootstrap4.min.css">

   <title>Scheduling</title>
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
   <div id= "main-container">
     <div class="container-fluid">
       <div class="row">
         <div class="col-sm-3">
           <h4><i class="fa fa-calendar-alt"> Enrollment</i></h4>
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

       <div class="">
         <div class="row padding-bottom-10">
           <div class="col-md-12">
             <button id="back-btn" class="btn costBtn btn-outline-info" type="button" name="button"><i class="fa fa-arrow-circle-left"> BACK</i></button>
           </div>
         </div>

         <div class="card mt-1 mb-1">
           <div class="card-body">
             <div class="row p-3">
               <div class="col-sm-5">
                 <div class="">
                   <h5>
                     <p><span><i class="fa fa-user-circle"> Enrollee: </i> <?php echo ' '.$student['student'];  ?> </p>
                   </h5>
                 </div>
                 <h5>
                   <p style="text-indent:113px"><span><?php echo $student['lrn']; ?></span></p>
                 </h5>
               </div>
               <div class="col-sm-7">
                 <div class="">
                   <h5>
                     <i class="fa fa"> Strand:&nbsp</i>
                     <span><?php echo $student['strand']; ?> (<?php echo $student['strand_desc']; ?>)</span>
                   </h5>
                 </div>
                 <div class="">
                   <h5>
                     <i class="fa fa"> Grade:&nbsp&nbsp</i>
                     <span><?php echo $student['grade_level']; ?></span>
                   </h5>
                 </div>
               </div>
             </div>
           </div>
         </div>

         <div class="card mt-3">
           <div class="card-body">
             <div class="row">
               <!---1st col-->
               <div class="col-md-5">
                 <div class="mt-3">
                   <div class="form-row font-weight-bold">
                     <div class="form-group col-md-6">
                       <label for="strandFilter">Strand:</label>
                       <select id="strandFilter" name="strandFilter" class="form-control">
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
                       <label for="levelFilter">Grade Level:</label>
                       <select id="levelFilter" name="levelFilter" class="form-control">
                         <option value="">SELECT</option>
                         <option value="Grade 11">Grade 11</option>
                         <option value="Grade 12">Grade 12</option>
                       </select>
                     </div>
                   </div>
                   <div class="mt-1">
                     <div class="float-right">
                       <div class="form-inline padding-bottom-10">
                         <label class="" for="search">Search:&nbsp&nbsp</label>
                         <input id="search" class="form-control input-height" type="text" name="search" value="">
                       </div>
                     </div>

                     <table id="offeringsTable" class="table table-hover" width="100%">
                       <thead>
                         <tr>
                           <th width="40%" class="text-center">Section</th>
                           <th width="40%" class="text-center">Grade & Strand</th>
                           <th width="20%" class="text-center"><i class="fa fa-users"></i></th>
                         </tr>
                       </thead>
                     </table>
                   </div>
                   <span class="float-left mt-2 mb-2">
                     <button id="setSchedModal" class="btn costBtn btn-outline-info" type="button" name="button"><i class="fa fa-book"> Show Subjects</i></button>
                     <?php include_once('schedulingStudentModal.php') ?>
                   </span>
                   <span class="float-right mt-2 mb-2">
                     <button id="enroll-class-btn" type="button" class="btn costBtn btn-outline-success"><i class="fa fa-pen-square"> Enroll</i></button>
                   </span>
                 </div>
               </div><!---1st col end-->

               <div class="col-md-7 mt-4">
                 <div class="card-header">
                   <h5> <i class="fa fa-calendar-alt">  Enrollee 's Schedule</i></h5>
                 </div>
                 <hr>

                 <div class="mt-3">
                   <h5 style="text-indent:10px" class="font-weight-bold"> Section: <span id="enrolled-class"><?php echo $enrollee['section']; ?></span> </h5>
                 </div>
                 <table id="enrolleeTable" class="table table-hover" width="100%">
                   <thead>
                     <tr>
                       <th>Subject</th>
                       <th>Day</th>
                       <th>Time</th>
                       <th>Room</th>
                     </tr>
                   </thead>
                 </table>
                 <!--<div class="float-left mt-2">
                   <button id="costSubjEnroll" class="btn costBtn btn-outline-info" type="button" name="button"><i class="fa fa-pen-square"> Enroll Subjects</i></button>
                 </div>-->
                 <div class="float-right mt-2 mb-2">
                   <button id="withdrawAll" class="btn costBtn btn-outline-danger" type="button" name="button"><i class="fa fa-arrow-circle-down"> Withdraw All</i></button>
                   <button id="withdraw" class="btn costBtn btn-outline-danger" type="button" name="button"><i class="fa fa-arrow-circle-down"> Withdraw</i></button>
                 </div>
               </div><!--- 2nd col END -->
             </div><!--- row END -->
               <input id="selectedEnrolleeID" hidden type="text" name="" value="<?php echo $enrollee['enrollment_id'] ?>">
               <input id="selectedStudent" hidden type="text" name="" value="<?php echo $enrollee['student_id'] ?>">
           </div><!--- card END -->
         </div>
         <div class="row">
           <div class="col-md-12 padding-top-10">
             <div class="float-right">
               <button id="go-to-registration-btn" class="btn costBtn btn-outline-info" type="button" name="button"><span class="font-weight-bold">Go to Registration</span> <i class="fa fa-arrow-circle-right"></i></button>
             </div>
           </div>
         </div>

         </div>


      </div><!--- card END -->

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
  <script src="/srms.bcshs.dev/views/studentScheduling/index.js" type="text/javascript"></script>

 </body>
</html>

<script type="text/javascript">
var selectedID = 0;
var schedSelectedID;
var grade = 'Grade 12'
  //$.fn.DataTable.ext.pager.number_length = 1;
$(document).ready(function(){



});
</script>
