
<?php
  include_once('classSchedulesView.php');

  $view = new View();
?>
<!doctype html>

<html lang="en">
 <head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Class Roaster</title>
   <!-- Bootstrap CSS -->
   <link href="/srms.bcshs.dev/public/css/Bootstrap 4/css/bootstrap.min.css" rel="stylesheet">

   <!-- Costum Css -->
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/administratorCSS/customCSS/customCSS.css">
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/administratorCSS/customCSS/navBarCSS.css">
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/administratorCSS/customCSS/contentCSS.css">
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/genOfReportsCSS/genOfReportsCSS.css">
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

       <div class="row header-section">
         <div class="col-sm-3">
           <h4><i class="fa fa-calendar-alt"> Class Schedules</i></h4>
         </div>
         <div class="col-sm-9">
           <div class="float-right">
             <h5>SY: <?php echo $view->AY() ?> - <?php echo $view->AY()+1 ?>  <?php echo $view->semester() ?></h5>
           </div>
         </div>
       </div>
       <hr class="hide">

       <div class="row">
         <div class="col-md-5 left-section">
           <div class="card">
             <div class="card-header">
               <h5> <i class="fa fa-">Class Offerings</i> </h5>
             </div>
             <div class="card-body">
               <div class="form-row font-weight-bold mt-2">
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

                 <table id="classOfferingsTable" class="table table-hover" width="100%">
                   <thead>
                     <tr>
                       <th width="50%" class="text-center">Section</th>
                       <th width="50%" class="">Grade & Strand</th>
                     </tr>
                   </thead>
                 </table>
               </div>
             </div>
           </div>
         </div>

         <div class="col-md-7">

           <div class="row hide">
             <div class="col-sm-12">
               <span class="float-right">
                 <button class="btn costBtn btn-outline-primary" onclick="window.print()" type="button" name="button"> <i class="fa fa-print"> Print</i> </button>
               </span>
             </div>
           </div>

           <div class="print-content">
             <div class="card mt-2">
               <div class="card-body">
                 <div class="mt-3 text-center">
                   <p class="hdr">Republic of the Philippines</p>
                   <p class="hdr">Department of Education</p>
                   <p class="hdr">Region VIII (Eastern Visayas)</p>
                   <p class="schl-div">Baybay City Division</p>
                   <p class="schl-name">Baybay City Senior High School</p>
                   <i class="schl-add">Baybay City, Leyte</i>
                   <br>
                   <br>
                   <br>
                   <p class="report-title">Class Schedules</p>
                   <p class="sy">School Year <?php echo $view->AY() ?> - <?php echo $view->AY()+1 ?>  <?php echo $view->semester() ?></p>
                   <br>
                   <span class="class-section">Class Section:</span>
                   <span class="section" id="section"></span>
                 </div>
                 <style media="screen">

                 </style>
                 <div class="mt-2">
                   <table width="100%" id="classSchedulesTable" class="table-bordered">
                     <thead>
                       <th class="text-center" width="45%">Subjects</th>
                       <th class="text-center" width="5%">Day</th>
                       <th class="text-center" width="17%">Time</th>
                       <th class="text-center" width="10%">Room</th>
                       <th class="text-center" width="23%">Teacher</th>
                     </thead>
                   </table>
                 </div>

               </div>
             </div>
           </div>

         </div>
       </div>

     </div> <!--- container END -->

    </div><!--- main class END  -->

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
  <script src="/srms.bcshs.dev/views/generationOfReports/classSchedules/index.js" type="text/javascript"></script>
 </body>
</html>
