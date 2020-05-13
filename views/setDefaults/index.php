
<?php
  include_once('defaultsView.php');

  $view = new View();
?>
<!doctype html>

<html lang="en">
 <head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Defaults</title>
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
           <h4><i class="fa fa-cog"> Set Defaults</i></h4>
         </div>
         <div class="col-sm-9">
           <div class="float-right">
             <h5>SY: <span id="academicyear"><?php echo $view->AY() ?></span> - <span id="toYear"><?php echo $view->AY()+1 ?></span>  <span id="semesterID"><?php echo $view->semester() ?></span> </h5>
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
         <div class="col-md-3"></div>
         <div class="col-md-6">
           <div class="card mt-5">
             <div class="card-header">
               <h5> <i class="fa fa-cog"> Defaults</i> </h5>
             </div>
             <div class="card-body">
               <form class="set-default-form" action="index.html" method="post">
                 <div class="form-row">
                   <div class="form-group col-md-6">
                     <label class=" col-form-label" for="set-AY"><span><i class="fa fa-calendar-alt"> School Year:</i></span></label>
                     <select class="form-control" id="set-AY" name="set-AY">
                       <?php
                       foreach ($view->allAY() as $value):?>
                        <option <?php if($view->AY () == $value["schl_year"]){echo "selected";} ?> value="<?php echo $value["schl_year"]?>">
                         <?php echo $value["schl_year"] . ' - '?><?php echo $value["schl_year"]+ 1  ?>
                        </option>
                       <?php endforeach;?>
                       <option value="add-new-AY">Add New Academic Year</option>
                     </select>
                   </div>
                   <div class="form-group col-md-6">
                     <label class=" col-form-label" for="set-semester"><span><i class="fa fa-leaf"> Semester:</i></span></label>
                     <select class="form-control" id="set-semester" name="set-semester">
                       <option <?php if($view->semesterID() == '1'){ echo 'selected';} ?> value="1">First Semester</option>
                       <option <?php if($view->semesterID() == '2'){ echo 'selected';} ?> value="2">Second Semester</option>
                     </select>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-sm-2"></div>
                   <div class="col-sm-8">
                     <div class="mt-2 mb-2">
                       <button class="btn btn-outline-success btn-block" type="submit" name="set-as-default-btn">
                         <i class="fa fa-save"> Set as Default</i>
                       </button>
                     </div>
                   </div>
                   <div class="col-sm-2"></div>
                 </div>
               </form>
             </div>
           </div>
         </div>
         <div class="col-md-3"></div>
       </div>
       <?php include_once('modal.php') ?>
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
  <script src="/srms.bcshs.dev/views/setDefaults/index.js" type="text/javascript"></script>
 </body>
</html>
