
<?php
  include_once('sectionView.php');

  $view = new SectionView();
?>
<!doctype html>

<html lang="en">
 <head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Section</title>
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

     <div id= "main-container" class="" style = "">

     <div class="container-fluid">

       <div class="row">
         <div class="col-sm-3">
           <h4><i class="fa fa-book"> Section</i></h4>
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
         <div class="col-md-12">
           <div class="float-right">
             <button id="new-section-btn" class="btn costBtn btn-outline-primary" name="new-section-btn" type="button"><i class="fa fa-plus-circle"> New Section</i></button>
           </div>
         </div>
       </div>

       <div class="row">
         <div class="col-md-5">
           <div class="mt-2">
             <div class="float-right">
               <div class="form-inline">
                 <label class="" for="search">Search:&nbsp&nbsp</label>
                 <input id="search" class="form-control input-height" type="text" name="search" value="">
               </div>
             </div>
             <table id="sectionTable" class="table table-hover table-bordered" width="100%">
               <thead>
                 <tr class="text-center">
                   <th width="70%">Section</th>
                 </tr>
               </thead>
             </table>
           </div>
         </div>
         <div class="col-md-7 font-weight-bold">

           <div class="card-header mt-2">
             <h5 class="font-weight-bold"><i class="fa fa-info-circle"> Section</i></h5>
           </div>
           <hr>

           <form class="sectionForm needs-validation" novalidate action="" method="post">
             <div class="form-group row">
               <label class="col-sm-4 col-form-label" for="section"><span>Section:</span></label>
               <div class="col-sm-8">
                 <input id="section" class="form-control" type="text" name="section" value="" required>
               </div>
             </div>

             <span class="float-right">
               <button id="delete-section-btn" class="btn costBtn btn-outline-danger" name="delete-section-btn" type="button"><i class="btn-action-icon fa fa-trash-alt"> Delete</i></button>
             </span>
             <span class="float-right mr-2">
               <button id="update-section-btn" class="btn costBtn btn-outline-success" name="update-section-btn" type="submit"><i class="btn-action-icon fa fa-save"> Update</i></button>
             </span>
             <span class="float-left mr-2">
               <button disabled id="add-section-btn" class="btn costBtn btn-outline-info" name="add-section-btn" type="submit"><i class="btn-action-icon fa fa-plus-circle"> Add Section</i></button>
             </span>
           </form>

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
  <script src="/srms.bcshs.dev/views/section/index.js" type="text/javascript"></script>
 </body>
</html>
