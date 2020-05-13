
<?php
include_once('userView.php');

$view = new View();
?>
<!doctype html>

<html lang="en">
   <head>

     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title>Manage Users</title>
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
           <h4><i class="fa fa-users-cog"> Manage Users</i></h4>
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
           <div class="float-right">
             <button id="new-user-btn" class="btn costBtn btn-outline-primary" name="new-user-btn" type="button"><i class="fa fa-plus-circle"> New User</i></button>
           </div>
         </div>
       </div>

       <div class="row">
         <div class="col-md-5">
           <div class="">
             <div class="float-right">
               <div class="form-inline padding-bottom-10">
                 <label class="" for="search">Search:&nbsp&nbsp</label>
                 <input id="search" class="form-control input-height" type="text" name="search" value="">
               </div>
             </div>
             <table id="userTable" class="table table-hover table-bordered" width="100%">
               <thead>
                 <tr class="text-center">
                   <th width="70%"><i class="fa fa"> Accounts</i></th>
                 </tr>
               </thead>
             </table>
           </div>
         </div>
         <div class="col-md-7 font-weight-bold">

           <div class="card-header mt-2">
             <h5 class="font-weight-bold"><i class="fa fa-info-circle"> Account</i></h5>
           </div>
           <hr>

           <form class="userForm needs-validation" novalidate action="" method="post">
             <div class="form-group row">
               <label class="col-sm-4 col-form-label" for="user"><span>User's name:</span></label>
               <div class="col-sm-8">
                 <input id="user" class="form-control" type="text" name="user" value="" required>
               </div>
             </div>
             <div class="form-group row">
               <label class="col-sm-4 col-form-label" for="uname"><span>Username:</span></label>
               <div class="col-sm-8">
                 <input id="uname" class="form-control" type="text" name="uname" value="" required>
               </div>
             </div>
             <div class="form-group row">
               <label class="col-sm-4 col-form-label" for="password"><span>Password:</span></label>
               <div class="col-sm-8">
                 <input id="password" class="form-control" type="password" name="password" value="" required>
               </div>
             </div>
             <div class="form-group row">
               <label class="col-sm-4 col-form-label" for="role"><span>Role:</span></label>
               <div class="col-sm-8">
                 <select class="form-control" id="role" name="role" required>
                   <option value="">SELECT</option>
                   <option value="Administrator">Administrator</option>
                   <option value="Faculty">Faculty</option>
                   <option value="Encoder">Encoder</option>
                   <option value="Student">Student</option>
                 </select>
               </div>
             </div>

             <input type="text" id="selectedUser" name="selectedUser" hidden value=""/>

             <span class="float-right">
               <button id="delete-user-btn" class="btn costBtn btn-outline-danger" name="delete-user-btn" type="button"><i class="btn-action-icon fa fa-trash-alt"> Delete</i></button>
             </span>
             <span class="float-right mr-2">
               <button id="update-user-btn" class="btn costBtn btn-outline-success" name="update-user-btn" type="submit"><i class="btn-action-icon fa fa-save"> Update</i></button>
             </span>
             <span class="float-left mr-2">
               <button disabled id="add-user-btn" class="btn costBtn btn-outline-info" name="add-user-btn" type="submit"><i class="btn-action-icon fa fa-plus-circle"> Add User</i></button>
             </span>
           </form>

         </div>
       </div>
     </div>

    </div> <!--- container END -->

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
  <script src="/srms.bcshs.dev/views/manageUser/index.js" type="text/javascript"></script>
 </body>
</html>

<script type="text/javascript">

</script>
