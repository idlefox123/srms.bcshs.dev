<?php
  include_once('masterListView.php');

  $view = new View();
?>
<!doctype html>

<html lang="en">
 <head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Master List</title>
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

     <div id= "main-container" class="" style = "">

     <div class="container-fluid">

       <div class="row hide">
         <div class="col-sm-3">
           <h4><i class="fa fa-list"> Master List</i></h4>
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

         <div class="col-md-1"></div>

         <div class="col-md-10">
           <div class="card">
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
                 <p class="report-title">Master List</p>
                 <p class="sy">School Year <?php echo $view->AY() ?> - <?php echo $view->AY()+1 ?>  <?php echo $view->semester() ?></p>
                 <br>
               </div>

               <table width="100%" id="studentsTable" class="table-bordered">
                 <thead>
                   <th class="text-center" width="3%">No.</th>
                   <th class="text-center" width="12%">LRN</th>
                   <th class="text-center" width="30%">Name</th>
                   <th class="text-center" width="25%">Track / Strand</th>
                   <th class="text-center" width="12%">Grade Level</th>
                   <th class="text-center" width="18%">Section</th>
                 </thead>
               </table>
             </div>
           </div>
         </div>

         <div class="col-md-1"></div>

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
  <script src="/srms.bcshs.dev/views/generationOfReports/masterList/index.js" type="text/javascript"></script>
 </body>
</html>
