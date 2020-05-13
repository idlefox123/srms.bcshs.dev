<?php
  include_once('gradingView.php');
  $view = new View();
?>

<!doctype html>

<html lang="en">
 <head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Grades Management</title>
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
   <?php require('templates/faculty/navbar.php'); ?>
   <?php require('templates/faculty/sidebar.php'); ?>
  <div class="wrapper">

  <div id= "main-container">

     <div class="container-fluid">
       <div class="row hide">
         <div class="col-sm-3">
           <h4><i class="fa fa-table"> Grades Management</i></h4>
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
       <hr class="hide">

       <div class="row mb-2 hide">
         <div class="col-md-12">
           <span class="float-right">
             <button class="btn costBtn btn-outline-primary" onclick="window.print()" type="button" name="button"> <i class="fa fa-print"> Print</i> </button>
           </span>
         </div>
       </div>

        <div class="row">
          <!---1st col-->
          <div class="col-md-5 hide">
            <div class="card card-def-size">
              <div class="card-header">
                <h5> <i class="fa fa"> Handled Subject</i> </h5>
              </div>
              <div class="card-body">


                <table id="handledSubjectTable" class="table table-hover" width="100%">
                  <thead>
                    <tr>
                      <th class="text-center" width="65%">Subject</th>
                      <th width="45%">Section</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div><!---1st col end-->

          <div class="col-md-7">
            <div class="card card-def-size">

              <div class="card-body">
                <div class="print-content">
                  <div class="mt-3 text-center">
                    <p class="report-title-grades">REPORT ON LEARNING PROGRESS AND ACHIVEMENT</p>
                    <p class="sy">School Year <?php echo $view->AY() ?> - <?php echo $view->AY()+1 ?>  <?php echo $view->semester() ?></p>
                    <br>
                    <span class="class-section">Class Section:</span>
                    <span class="section" id="section"></span>
                  </div>

                  <div class="mt-2">
                    <table id="studentsTable" class="table-bordered table-hover" >
                      <thead>
                        <tr>
                          <th rowspan="2" width="45%">Name</th>
                          <th colspan="2" width="30%">Quarter</th>
                          <th rowspan="2" width="10%">Final</th>
                          <th rowspan="2" width="15%">Remark</th>
                        </tr>
                        <tr>
                          <th width="10%">1st</th>
                          <th width="10%" style="border-right:1px solid lightgrey;">2nd</th>
                        </tr>
                      </thead>
                    </table>
                  </div>

                </div>
              </div>
            </div>
          </div><!--- 2nd col END -->
        </div><!--- row END -->

    </div><!--- container-fluid END -->
    <?php include_once('modal.php'); ?>

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
  <script src="/srms.bcshs.dev/views/facultyGrading/index.js" type="text/javascript"></script>

 </body>
</html>
