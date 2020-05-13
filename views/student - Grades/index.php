<?php
  include_once('gradesView.php');
  $view = new View($_SESSION['AY'],$_SESSION['semID']);
?>

<!doctype html>

<html lang="en">
 <head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Grades</title>
   <!-- Bootstrap CSS -->
   <link href="/srms.bcshs.dev/public/css/Bootstrap 4/css/bootstrap.min.css" rel="stylesheet">

   <!-- Costum Css -->
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/facultyCSS/sidebarCSS.css">
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/facultyCSS/navBarCSS.css">
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/facultyCSS/contentCSS.css">
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/generateGradesCSS/genOfGradesCSS.css">
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
           <h4><i class="fa fa-table"> Grades</i></h4>
         </div>
         <div class="col-sm-9">
           <div class="float-right">
             <h5>SY: <?php echo $view->AY() ?> - <?php echo $view->AY()+1 ?>  <?php echo $view->semester() ?></h5>
           </div>
         </div>
       </div>
       <hr class="hide">

       <div class="row mb-2 hide">
         <div class="col-md-12">
           <div class="float-left">
             <button id="set-ay-btn" class="btn costBtn btn-outline-primary" data-toggle="modal" data-target="#set-AY-modal" name="set-ay-btn" type="button"><i class="fa fa-calendar-alt"> Set Academic Year</i></button>
           </div>
           <span class="float-right">
             <button class="btn costBtn btn-outline-primary" onclick="window.print()" type="button" name="button"> <i class="fa fa-print"> Print</i> </button>
           </span>
         </div>
       </div>

        <div class="row">
          <div class="col-md-1 hide"></div>

          <div class="col-md-10">
            <div class="card">
              <div class="card-body">
                <div class="print-content">

                  <div class="mt-3 text-center">
                    <p class="report-title-grades">REPORT ON LEARNING PROGRESS AND ACHIVEMENT</p>
                    <p class="sy">School Year <span id="currYear"><?php echo $view->AY() ?></span> - <span id="toYear"><?php echo $view->AY()+1 ?></span> <span id="currSemester"><?php echo $view->semester() ?></span> </p>
                    <br>
                  </div>

                  <div class="mt-2">
                    <table id="gradesTable" class="table-bordered">
                      <thead>
                        <tr>
                          <th rowspan="2" width="15%">Type</th>
                          <th rowspan="2" width="45%">Subject</th>
                          <th colspan="2" width="20%">Quarter</th>
                          <th rowspan="2" width="10%">Final</th>
                        </tr>
                        <tr style="">
                          <th width="10%"> <span id="quarter1"></span> </th>
                          <th width="10%" style="border-right:1px solid lightgrey;"> <span id="quarter2"></span> </th>
                        </tr>
                      </thead>
                    </table>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="col-md-1 hide"></div>
        </div><!--- row END -->


    </div><!--- container-fluid END -->


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
  <script src="/srms.bcshs.dev/views/student - Grades/index.js" type="text/javascript"></script>

 </body>
</html>
