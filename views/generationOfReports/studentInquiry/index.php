<?php
  include_once('studentInquiryView.php');
  $view = new View('','');
?>

<!doctype html>

<html lang="en">
 <head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Student Inquiry</title>
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
       <div class="row hide">
         <div class="col-sm-3">
           <h4><i class="fa fa-info-circle"> Student Inquiry</i></h4>
         </div>
         <div class="col-sm-9">
           <div class="float-right">
             <h5>SY: <?php echo $view->AY() ?> - <?php echo $view->AY()+1 ?>  <?php echo $view->semester() ?></h5>
           </div>
         </div>
       </div>
       <hr class="hide">

       <div class="row hide">
         <div class="col-md-4">
           <div class="row">
             <div class="col-md-12">
               <div class="flex-center">
                 <span>
                   <button id="set-ay-btn" class="btn costBtn btn-outline-primary" data-toggle="modal" data-target="#set-AY-modal" name="set-ay-btn" type="button"><i class="fa fa-calendar-alt"> Set Academic Year</i></button>
                 </span>
               </div>
             </div>
           </div>
         </div>
         <div class="col-md-8">
           <span class="float-right">
             <button class="btn costBtn btn-outline-primary" onclick="window.print()" type="button" name="button"> <i class="fa fa-print"> Print</i> </button>
           </span>
         </div>
       </div>

        <div class="row mt-2">
          <!---1st col-->
          <div class="col-md-4 hide">

            <div class="card">
              <div class="card-header">
                <h5 class="font-weight-bold"> Students </h5>
              </div>
              <div class="card-body">
                <div class="mt-2">

                  <div class="float-right mb-2">
                    <div class="form-inline padding-bottom-10">
                      <label class="" for="search">Search:&nbsp&nbsp</label>
                      <input id="search" class="form-control input-height" type="text" name="search" value="">
                    </div>
                  </div>

                  <table id="studentTable" class="table table-hover" width="100%">
                    <thead>
                      <tr>
                        <th class="text-center" width="30%">LRN</th>
                        <th class="text-center" width="70%">Name</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div><!---1st col end-->

          <div class="col-md-8">
            <div class="print-content">
              <div class="card">
                <div class="card-body">
                  <div class="mt-3 text-center">
                    <p class="hdr">Republic of the Philippines</p>
                    <p class="hdr">
                      <span>
                        <img class="doe-logo" src="/srms.bcshs.dev/public/images/DOE.png" alt="">
                      </span>
                      Department of Education
                      <span>
                        <img class="bcshs-logo" src="/srms.bcshs.dev/public/images/bcshs.jpg" alt="">
                      </span>
                    </p>
                    <p class="hdr">Region VIII (Eastern Visayas)</p>
                    <p class="schl-div">Baybay City Division</p>
                    <p class="schl-name">Baybay City Senior High School</p>
                    <i class="schl-add">Baybay City, Leyte</i>
                    <br>
                    <br>
                    <br>
                    <p class="report-title">Student Profile</p>
                    <p class="sy">School Year <span id="currYear"><?php echo $view->AY() ?></span> - <span id="toYear"><?php echo $view->AY()+1 ?></span> <span id="currSemester"><?php echo $view->semester() ?></span> </p>
                    <br>
                  </div>

                  <div class="student-info">

                    <div class="row">
                      <div class="col-md-12">
                        <p> <span class="field">LRN: </span> <span id="lrn"></span></p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-8">
                        <p> <span class="field">Name: </span> <span id="name"><u></u></span></p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3">
                        <p> <span class="field">Gender: </span> <span id="gender"><u></u></span></p>
                      </div>
                      <div class="col-md-2">
                        <p> <span class="field">Age: </span> <span id="age"><u></u></span></p>
                      </div>
                      <div class="col-md-3">
                        <p> <span class="field">Birth Date: </span> <span id="bdate"><u></u></span></p>
                      </div>
                      <div class="col-md-4">
                        <p> <span class="field">Contact: </span> <span id="contact"><u></u></span></p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <p> <span class="field">Home Address: </span> <span id="address"><u></u></span></p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-8">
                        <p> <span class="field">Track/Strand:</span> <span id="trackStrand"></span></p>
                      </div>
                      <div class="col-md-4">
                        <p> <span class="field">Grade: </span> <span class="" id="level"></span></p>
                      </div>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-12  text-center">
                      <p class="report-title">Schedules</p>
                      <p> <span class="field">Class Section:</span> <span id="section"></span></p>
                    </div>
                  </div>
                  <div class="">
                    <table id="schedulesTable" class="table-bordered" >
                      <thead>
                        <tr>
                          <th class="text-center" width="10%">Type</th>
                          <th class="text-center" width="50%">Subject</th>
                          <th class="text-center" width="5%">No.of Hrs.</th>
                          <th class="text-center" width="5%">Day</th>
                          <th class="text-center" width="15%">Time</th>
                          <th class="text-center" width="15%">Room</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div><!--- 2nd col END -->
        </div><!--- row END -->

        <?php include_once('modal.php'); ?>
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
  <script src="/srms.bcshs.dev/views/generationOfReports/studentInquiry/index.js" type="text/javascript"></script>

 </body>
</html>
