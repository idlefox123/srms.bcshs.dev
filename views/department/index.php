<?php
  include_once('departmentView.php');

  $view = new View();
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Department</title>
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
                <h4><i class="fa fa-book"> Department</i></h4>
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
                  <button id="new-department-btn" class="btn costBtn btn-outline-primary" name="new-department-btn" type="button"><i class="fa fa-plus-circle"> New Department</i></button>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-5">
                <div class="mt-2">
                  <div class="float-right">
                    <div class="form-inline mb-2">
                      <label class="" for="search">Search:&nbsp&nbsp</label>
                      <input id="search" class="form-control input-height" type="text" name="search" value="">
                    </div>
                  </div>
                  <table id="deptTable" class="table table-hover table-bordered" width="100%">
                    <thead>
                      <tr class="text-center">
                        <th width="100%">Department</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
              <div class="col-md-7 font-weight-bold">

                <div class="card-header mt-2">
                  <h5 class="font-weight-bold"><i class="fa fa-info-circle"> Department</i></h5>
                </div>
                <hr>

                <form class="department-form needs-validation" novalidate action="" method="post">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="department"><span>Department:</span></label>
                    <div class="col-sm-8">
                      <input id="department" class="form-control" type="text" name="department" value="" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="acronym"><span>Acronym:</span></label>
                    <div class="col-sm-8">
                      <input id="acronym" class="form-control" type="text" name="acronym" value="" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="dept-head"><span>Department Head:</span></label>
                    <div class="col-sm-8">
                      <select class="form-control" id="dept-head" name="dept-head" required>
                        <option value="">Select</option>
                        <?php
                        foreach ($view->teacher() as $value):?>
                          <option value="<?php echo $value["teacher_id"]?>">
                            <?php echo $value["name"]?>
                          </option>
                        <?php endforeach;?>
                      </select>
                    </div>
                  </div>

                  <span class="float-right">
                    <button id="delete-department-btn" class="btn costBtn btn-outline-danger" name="delete-department-btn" type="button"><i class="btn-action-icon fa fa-trash-alt"> Delete</i></button>
                  </span>
                  <span class="float-right mr-2">
                    <button id="update-department-btn" class="btn costBtn btn-outline-success" name="update-department-btn" type="submit"><i class="btn-action-icon fa fa-save"> Update</i></button>
                  </span>
                  <span class="float-left mr-2">
                    <button disabled id="add-department-btn" class="btn costBtn btn-outline-info" name="add-department-btn" type="submit"><i class="btn-action-icon fa fa-plus-circle"> Add Department</i></button>
                  </span>
                </form>
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
