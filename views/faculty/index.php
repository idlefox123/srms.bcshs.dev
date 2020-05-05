
<?php
  include_once('facultyView.php');

  $view = new FacultyView();
?>
<!doctype html>

<html lang="en">
 <head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Faculty</title>
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
           <h4> <i class="fa fa-users"> Faculty</i> </h4>
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
             <button id="new-faculty-btn" class="btn costBtn btn-outline-primary" name="new-faculty-btn" type="button"><i class="fa fa-plus-circle"> New Teacher</i></button>
           </div>
         </div>
       </div>

       <div class="row">
         <div class="col-md-5">
           <div class="mt-2">
             <div class="float-right">
               <div class="form-inline padding-bottom-10">
                 <label class="" for="search">Search:&nbsp&nbsp</label>
                 <input id="search" class="form-control input-height" type="text" name="search" value="">
               </div>
             </div>
             <table id="facultyTable" class="table table-hover table-bordered" width="100%">
               <thead>
                 <tr class="text-center">
                   <th width="70%">Faculty</th>
                 </tr>
               </thead>
             </table>
           </div>
         </div>
         <div class="col-md-7 font-weight-bold">

           <div class="card-header mt-2">
             <h5 class="font-weight-bold"><i class="fa fa-info-circle"> Teacher 's Profile</i></h5>
           </div>
           <hr>

           <form class="facultyForm needs-validation" novalidate action="" method="post">

             <div class="form-row">
               <div class="form-group col-md-4">
                 <label for="lname">Family Name:</label>
                 <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required>
               </div>
               <div class="form-group col-md-3">
                 <label for="fname">First Name:</label>
                 <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required>
               </div>
               <div class="form-group col-md-3">
                 <label for="mname">Middle Name:</label>
                 <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name" required>
               </div>
               <div class="form-group col-md-2">
                 <label for="extension">Extenion:</label>
                 <input type="text" class="form-control" id="extension" name="extension" placeholder="Extension" required>
               </div>
             </div>

             <div class="form-row">
               <div class="form-group col-md-6">
                 <label for="contact">Contact:</label>
                 <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact" required>
               </div>
               <div class="form-group col-md-6">
                 <label for="address">Address:</label>
                 <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
               </div>
             </div>

             <div class="form-group row">
               <label for="position" class="col-sm-4 col-form-label">Position: </label>
               <div class="col-sm-8">
                 <input type="text" class="form-control" id="position" name="position" placeholder="Position" required>
               </div>
             </div>


             <div class="form-group row">
               <label class="col-sm-4 col-form-label" for="department"><span>Department:</span></label>
               <div class="col-sm-8">
                 <select class="form-control" id="department" name="department" required>
                   <option value="">Department</option>
                   <?php
                   foreach ($view->department() as $value):?>
                     <option value="<?php echo $value["dept_id"]?>">
                       <?php echo $value["dept_name"]?>
                     </option>
                   <?php endforeach;?>
                 </select>
               </div>
             </div>

             <span class="float-right">
               <button id="delete-faculty-btn" class="btn costBtn btn-outline-danger" name="delete-faculty-btn" type="button"><i class="btn-action-icon fa fa-trash-alt"> Delete</i></button>
             </span>
             <span class="float-right mr-2">
               <button id="update-faculty-btn" class="btn costBtn btn-outline-success" name="update-faculty-btn" type="submit"><i class="btn-action-icon fa fa-save"> Update</i></button>
             </span>
             <span class="float-left mr-2">
               <button disabled id="add-faculty-btn" class="btn costBtn btn-outline-info" name="add-faculty-btn" type="submit"><i class="btn-action-icon fa fa-plus-circle"> Add Teacher</i></button>
             </span>
           </form>

         </div>
       </div>

     </div><!--- container END -->

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
  <script src="/srms.bcshs.dev/views/faculty/index.js" type="text/javascript"></script>
 </body>
</html>
