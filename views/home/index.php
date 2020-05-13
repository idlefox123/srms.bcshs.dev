<?php
  include_once('homeView.php');

  $view = new View();
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Home</title>
     <!-- Bootstrap CSS -->
     <link href="/srms.bcshs.dev/public/css/Bootstrap 4/css/bootstrap.min.css" rel="stylesheet">

     <!-- Costum Css -->
     <link rel="stylesheet" href="/srms.bcshs.dev/public/css/administratorCSS/customCSS/customCSS.css">
     <link rel="stylesheet" href="/srms.bcshs.dev/public/css/administratorCSS/customCSS/navBarCSS.css">
     <link rel="stylesheet" href="/srms.bcshs.dev/public/css/administratorCSS/customCSS/contentCSS.css">
     <link rel="stylesheet" href="/srms.bcshs.dev/public/font/css/all.min.css">
   </head>
   <body>
     <?php require('templates/administrator/navbar.php'); ?>
     <?php require('templates/administrator/sidebar.php'); ?>
     <div class="wrapper">

       <div id= "main-container">

          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-3">
                <h4><i class="fa fa-home"> Home</i></h4>
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
                <div class="background-img">

                </div>
              </div>
            </div>

          </div><!--- container-fluid END -->

       </div> <!--- main class END  -->

     </div> <!--- wrapper END -->

     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->

     <script src="/srms.bcshs.dev/public/js/jquery/jquery.slim.min.js" ></script>
     <script src="/srms.bcshs.dev/public/js/jquery/jquery.min.js" ></script>

     <!-- Bootstrap -->
     <script src="/srms.bcshs.dev/public/css/Bootstrap 4/js/bootstrap.min.js" ></script>

     <!-- JavaScript DataTables-->

     <script src="/srms.bcshs.dev/public/DataTables/js/jquery.dataTables.min.js" type="text/javascript"></script>
     <script src="/srms.bcshs.dev/public/DataTables/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>


     <!-- Costum JavaScript -->
     <script src="/srms.bcshs.dev/public/js/customJS/customJS.js" type="text/javascript"></script>
     <script src="/srms.bcshs.dev/views/department/index.js" type="text/javascript"></script>
   </body>
 </html>
