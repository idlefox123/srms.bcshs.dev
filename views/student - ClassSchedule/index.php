<?php
  include_once('classScheduleView.php');
  $view = new View();
  //$enrollee = $view->enrollee();
?>

<!doctype html>

<html lang="en">
 <head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>My Class Schedules</title>
   <!-- Bootstrap CSS -->
   <link href="/srms.bcshs.dev/public/css/Bootstrap 4/css/bootstrap.min.css" rel="stylesheet">

   <!-- Costum Css -->
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/studentCSS/sidebarCSS.css">
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/studentCSS/navBarCSS.css">
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/studentCSS/contentCSS.css">
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/genOfReportsCSS/genOfReportsCSS.css">
   <link rel="stylesheet" href="/srms.bcshs.dev/public/font/css/all.min.css">

   <!-- Bootstrap DataTables -->
   <link rel="stylesheet" href="/srms.bcshs.dev/public/DataTables/css/dataTables.bootstrap4.min.css">

 </head>
 <body>
   <?php require('templates/student/navbar.php'); ?>
   <?php require('templates/student/sidebar.php'); ?>

   <div class="wrapper">

   <div id= "main-container">

      <div class="container-fluid">

        <div class="row hide">
          <div class="col-sm-3">
            <h4><i class="fa fa-calendar-alt"> My Class Schedules</i></h4>
          </div>
          <div class="col-sm-9">
            <div class="float-right">
              <h5>SY: <?php echo $view->AY() ?> - <?php echo $view->AY()+1 ?>  <?php echo $view->semester() ?></h5>
            </div>
          </div>
        </div>
        <hr class="hide">

        <div class="row hide">
          <div class="col-sm-12">
            <span class="float-right">
              <button class="btn costBtn btn-outline-primary" onclick="window.print()" type="button" name="button"> <i class="fa fa-print"> Print</i> </button>
            </span>
          </div>
        </div>

         <div class="row">
           <div class="col-md-1">

           </div>
           <!---1st col-->
           <div class="col-md-10">
             <div class="card">
               <div class="card-body">

                 <div class="mt-3 text-center">
                   <p class="report-title">My Schedules</p>
                   <p class="sy">School Year <?php echo $view->AY() ?> - <?php echo $view->AY()+1 ?>  <?php echo $view->semester() ?></p>
                   <br>
                   <span class="class-section">Class Section:</span>
                   <span class="section" id="section"></span>
                 </div>

                 <table id="schedulesTable" class="table-bordered" width="100%">
                   <thead>
                     <tr class="text-center">
                       <th width="50%">Subject</th>
                       <th width="10%">Day</th>
                       <th width="20%">Time</th>
                       <th width="20%">Room</th>
                     </tr>
                   </thead>
                 </table>

               </div>
             </div>
           </div><!---1st col end-->
           <div class="col-md-1">

           </div>
         </div><!--- row END -->


     </div><!--- container-fluid END -->


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
   <script src="/srms.bcshs.dev/views/student - ClassSchedule/index.js" type="text/javascript"></script>

 </body>
</html>
