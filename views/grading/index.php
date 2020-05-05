<?php
  include_once('gradingView.php');
  $view = new View('','');
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
           <h4><i class="fa fa-table"> Grades Management</i></h4>
         </div>
         <div class="col-sm-9">
           <div class="float-right">
             <h5>SY: <?php echo $view->AY() ?> - <?php echo $view->AY()+1 ?>  <?php echo $view->semester() ?></h5>
           </div>
         </div>
       </div>
       <hr>

       <div class="row mb-2">
         <div class="col-md-12">
           <div class="float-right">
             <button id="set-ay-btn" class="btn costBtn" data-toggle="modal" data-target="#set-AY-modal" name="set-ay-btn" type="button"><i class="fa fa-calendar-alt"> Set Academic Year</i></button>
           </div>
         </div>
       </div>

        <div class="row">
          <!---1st col-->
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h5> <i class="fa fa-users"> Student</i> </h5>
              </div>
              <div class="card-body">
                <div class="mt-2">
                  <div class="form-row font-weight-bold">
                    <div class="form-group col-md-4">
                      <label for="sectionFilter">Section:</label>
                      <select id="sectionFilter" name="sectionFilter" class="form-control">
                        <option value="">SELECT</option>
                        <?php
                        foreach ($view->section() as $value):?>
                          <option value="<?php echo $value["section_id"]?>">
                            <?php echo $value["section"]?>
                          </option>
                        <?php endforeach;?>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="strandFilter">Strand:</label>
                      <select id="strandFilter" name="strandFilter" class="form-control">
                        <option value="">SELECT</option>
                        <<?php
                        foreach ($view->strand() as $value):?>
                          <option value="<?php echo $value["strand_id"]?>">
                            <?php echo $value["strand"]?>
                          </option>
                        <?php endforeach;?>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="levelFilter">Grade Level:</label>
                      <select id="levelFilter" name="levelFilter" class="form-control">
                        <option value="">SELECT</option>
                        <option value="Grade 11">Grade 11</option>
                        <option value="Grade 12">Grade 12</option>
                      </select>
                    </div>
                  </div>
                  <div class="float-right mb-2">
                    <div class="form-inline padding-bottom-10">
                      <label class="" for="search">Search:&nbsp&nbsp</label>
                      <input id="search" class="form-control input-height" type="text" name="search" value="">
                    </div>
                  </div>

                  <table id="studentTable" class="table table-hover" width="100%">
                    <thead>
                      <tr>
                        <th class="text-center" width="30%">ID</th>
                        <th class="text-center" width="70%">Name</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div><!---1st col end-->

          <div class="col-md-8">
            <div class="card card-def-size">
              <div class="card-header">
                <div class="text-center">
                  <h5> <i class="fa fa-info-circle"> Learner's Information</i> </h5>
                </div>
              </div>
              <div class="card-body">
                <div class="row mt-2" style="font-size:1.1em">
                  <div class="col-sm-8">
                    <p><span class="font-weight-bold">Name: </span><span id="student"></span></p>
                    <p style="text-indent:50px;line-height:1px;"><span id="lrn">&nbsp</span></p>
                    <p><span class="font-weight-bold">Strand: </span> <span id="strand"></span></p>
                    <p><span class="font-weight-bold">Adviser: </span> <span id="adviser"></span></p>
                  </div>
                  <div class="col-sm-4"><br>
                    <p style="line-height:2px;"><span>&nbsp</span></p><p style="line-height:2px;"><span>&nbsp</span></p>
                    <p><span class="font-weight-bold">Grade: </span> <span id="level"></span></p>
                    <p><span class="font-weight-bold">Section: </span> <span id="section"></span></p>
                  </div>

                </div>

                <table  id="gradingTable" class="table table-hover" width="100%">
                  <thead>
                    <tr>
                      <th class="text-center" width="15%">ION</th>
                      <th class="text-center" width="45%">Subject</th>
                      <th class="text-center" width="5%">1st</th>
                      <th class="text-center" width="5%">2nd</th>
                      <th class="text-center" width="10%">Final</th>
                      <th class="text-center" width="10%">Remark</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div><!--- 2nd col END -->
        </div><!--- row END -->

        <?php include_once('modal.php') ?>

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
  <script src="/srms.bcshs.dev/views/grading/index.js" type="text/javascript"></script>

 </body>
</html>
