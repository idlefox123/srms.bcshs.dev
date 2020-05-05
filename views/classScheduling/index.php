
<?php
  include_once('classSchedulingView.php');

  $view = new ClassSchedulingView();
?>
<!doctype html>

<html lang="en">
 <head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Class Scheduling</title>
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
         <h4><i class="fa fa-calendar-alt"> Class Scheduling</i></h4>
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
         <span class="float-left mt-2 mb-2">
           <button id="go-to-class-Offerings-btn" class="btn costBtn btn-outline-info" type="button" name="go-to-class-offerings-btn"><i class="fa fa-arrow-circle-left"> Class Offerings</i></button>
         </span>
       </div>
     </div>

     <div class="row">
       <div class="col-md-6">
         <div class="card">
           <div class="card-header">
             <div class="text-center">
               <h5><i class="fa fa"> Default Class Schedules</i></h5>
             </div>
           </div>
           <div class="card-body">
             <div class="row">
               <div class="col-md-12">
                 <div class="form-row font-weight-bold padding-top-10">
                   <div class="form-group col-md-4">
                     <label for="filterSection">Section:</label>
                     <select id="filterSection" name="filterSection" class="form-control">
                       <option value="">SELECT</option>
                       <<?php
                       foreach ($view->defClassOfferings() as $value):?>
                         <option value="<?php echo $value["offer_id"]?>">
                           <?php echo $value["section"]?>
                         </option>
                       <?php endforeach;?>
                     </select>
                   </div>
                   <div class="form-group col-md-4">
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
                   <div class="form-group col-md-4">
                     <label for="filterLevel">Grade Level:</label>
                     <select id="filterLevel" name="filterLevel" class="form-control">
                       <option value="">SELECT</option>
                       <option value="Grade 11">Grade 11</option>
                       <option value="Grade 12">Grade 12</option>
                     </select>
                   </div>
                 </div>
               </div>
               </div>

               <div style="margin-top: 10px">
                 <table id="defScheduleTable" class="table table-hover" width="100%">
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
                 <button id="go-to-def-scheduling-btn" class="btn costBtn btn-outline-info" type="button" name="go-to-def-scheduling-btn"><i class="fa fa-arrow-circle-down"> Default Scheduling</i></button>
               </span>
               <span class="float-right mt-2 mb-2">
                 <!--<button id="Edit" class="btn costBtn" data-toggle="modal" data-target="#editScheduleModal" type="button" name="button"><i class="fa fa-edit"> Edit</i></button>-->
                 <button id="add-subject-btn" class="btn costBtn btn-outline-primary" type="button" name="add-subject-btn"><i class="fa fa-plus-circle"> Add to Class</i></button>
               </span>

           </div><!--card body end-->
         </div><!--card end-->
       </div> <!--1st col end-->

       <div class="col-md-6">
         <div class="card">
           <div class="card-header">
             <div class="">
               <h5><i class="fa fa"> Class Schedule</i></h5>
             </div>
           </div>
           <div class="card-body">

             <form class="classScheduleForm" action="" method="post">
               <div class="form-row font-weight-bold">
                 <div class="form-group col-md-4">
                   <label for="classOffering">Section:</label>
                   <select id="classOffering" name="classOffering" class="form-control">
                     <option value="">SELECT</option>
                     <<?php
                     foreach ($view->classOfferings() as $value):?>
                       <option value="<?php echo $value["offer_id"]?>">
                         <?php echo $value["section"]?>
                       </option>
                     <?php endforeach;?>
                   </select>
                 </div>
                 <div class="form-group col-md-4">
                   <label for="strand">Strand:</label>
                   <select disabled id="strand" name="strand" class="form-control">
                     <option value="">SELECT</option>
                     <<?php
                     foreach ($view->strand() as $value):?>
                       <option value="<?php echo $value["strand_id"]?>">
                         <?php echo $value["strand"]?>
                       </option>
                     <?php endforeach;?>
                   </select>
                 </div>
                 <div class="form-group col-md-4">
                   <label for="level">Grade Level:</label>
                   <select disabled id="level" name="level" class="form-control">
                     <option value="">SELECT</option>
                     <option value="Grade 11">Grade 11</option>
                     <option value="Grade 12">Grade 12</option>
                   </select>
                 </div>
               </div>
               <div class="form-row font-weight-bold" style="margin-top:-15px">
                 <div class="form-group col-md-6">
                   <label for="adviser">Adviser:</label>
                   <select disabled id="adviser" name="adviser" class="form-control">
                     <option value="">SELECT</option>
                     <<?php
                     foreach ($view->teacher() as $value):?>
                       <option value="<?php echo $value["teacher_id"]?>">
                         <?php echo $value["teacher"]?>
                       </option>
                     <?php endforeach;?>
                   </select>
                 </div>
                 <div class="form-group col-md-1"></div>
                 <div class="form-group col-md-5">
                   <span class="ml-2">
                     <label>Enrolled / Max Enrollee:</label>
                   </span>
                   <div class="form-group">
                   <div class="form-row">
                     <span class="ml-4"></span>
                     <input disabled id="enrolled" class="form-control" style="width:50px" type="text" name="enrolled" value="">
                      <span class="ml-2"></span> <span style="font-size:20px">/</span> <span class="mr-2"></span>
                     <input disabled id="maxEnrollee" class="form-control" style="width:50px" type="text" name="maxEnrollee" value="">
                   </div>
                   </div>
                 </div>
               </div>


             <div style="margin-top:-30px">
               <table id="classScheduleTable" class="table table-hover cell-border" width="100%">
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

             <div class="float-left mt-2 mb-2">
               <button id="remove-schedule-btn" class="btn costBtn btn-outline-danger" type="button" name="button"><i class="fa fa-trash-alt"> Remove</i></button>
             </div>
             <div class="float-right mt-2 mb-2">
               <button id="save-class-btn" class="btn costBtn btn-outline-success" type="submit" name="button"><i class="fa fa-save"> Save Changes</i></button>
             </div>
             </form>
           </div>
         </div>
       </div> <!--2nd col end-->
     </div> <!--row end-->

   </div>

  </div> <!--- container END -->

</div> <!--- main class END  -->

</div> <!--- wrapper END -->
<?php include_once('modal.php') ?>


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
  <script src="/srms.bcshs.dev/views/classScheduling/index.js" type="text/javascript"></script>


 </body>
</html>

<script type="text/javascript">

</script>
