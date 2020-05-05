<?php
  include_once('curriculumView.php');

  $view = new View();
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Curriculum</title>
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
                <h4><i class="fa fa-book"> Curriculum</i></h4>
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
                  <button id="new-subject-btn" class="btn costBtn btn-outline-primary" name="new-subject-btn" type="button"><i class="fa fa-plus-circle"> New Subject</i></button>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mt-2">
                  <div class="form-row font-weight-bold">
                    <div class="form-group col-md-4">
                      <label for="filterStrand">Strand:</label>
                      <select id="filterStrand" name="filterStrand" class="form-control">
                        <option value="">SELECT</option>
                        <?php
                        foreach ($view->strand() as $value):?>
                          <option value="<?php echo $value["strand_id"]?>">
                            <?php echo $value["strand"]?>
                          </option>
                        <?php endforeach;?>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="filterLevel">Grade Level:</label>
                      <select id="filterLevel" name="filterLevel" class="form-control input-height">
                        <option value="">SELECT</option>
                        <option value="Grade 11">Grade 11</option>
                        <option value="Grade 12">Grade 12</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="filterSemester">Semester:</label>
                      <select id="filterSemester" name="filterSemester" class="form-control">
                        <option value="">SELECT</option>
                        <option value="First Semester">First Semester</option>
                        <option value="Second Semester">Second Semester</option>
                      </select>
                    </div>
                  </div>

                  <div class="float-right mb-2">
                    <div class="form-inline">
                      <label class="" for="search"> <span class="mr-2">Search:</span> </label>
                      <input id="search" class="form-control input-height" type="text" name="search" value="">
                    </div>
                  </div>

                  <table id="currTable" class="table table-hover" width="100%">
                    <thead>
                      <tr>
                        <th class="text-center" width="15%">Type</th>
                        <th class="text-center" width="55%">Subject</th>
                        <th class="text-center" width="20%">No. of Hrs.</th>
                        <th class="text-center" width="10%">Strand</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>

              <div class="col-md-6">
                <div class="card-header mt-2">
                  <h5 class> <i class="fa fa-info-circle"> Subject</i> </h5>
                </div>
                <hr>
                <form class="curr-form needs-validation" novalidate action="#" method="post">
                  <div class="font-weight-bold">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label" for="subject"><span>Subject:</span></label>
                      <div class="col-sm-8">
                        <select class="form-control" id="subject" name="subject" required>
                          <option value="">SELECT</option>
                          <<?php
                          foreach ($view->subject() as $value):?>
                            <option value="<?php echo $value["subject_id"]?>">
                              <?php echo $value["subject_name"]?>
                            </option>
                          <?php endforeach;?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label" for="hours"><span>No. of Hours:</span></label>
                      <div class="col-sm-8">
                        <input id="hours" class="form-control text-center" type="text" name="hours" value="" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label" for="strand"><span>Strand:</span></label>
                      <div class="col-sm-8">
                        <select class="form-control" id="strand" name="strand" required>
                          <option value="">SELECT</option>
                          <?php
                          foreach ($view->strand() as $value):?>
                            <option value="<?php echo $value["strand_id"]?>">
                              <?php echo $value["strand"]?>
                            </option>
                          <?php endforeach;?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label" for="level"><span>Grade Level:</span></label>
                      <div class="col-sm-8">
                        <select class="form-control" id="level" name="level" required>
                          <option value="">SELECT</option>
                          <option value="Grade 11">Grade 11</option>
                          <option value="Grade 12">Grade 12</option>
                        </select>
                      </div>
                      <div class="invalid-feedback">
                        Please provide a valid zip.
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label" for="semester"><span>Semester:</span></label>
                      <div class="col-sm-8">
                        <select class="form-control" id="semester" name="semester" required>
                          <option value="">SELECT</option>
                          <option value="First Semester">First Semester</option>
                          <option value="Second Semester">Second Semester</option>
                        </select>
                      </div>
                    </div>

                    <span class="float-right">
                      <button id="delete-subject-btn" class="btn costBtn btn-outline-danger" name="delete-subject-btn" type="button"><i class="btn-action-icon fa fa-trash-alt"> Delete</i></button>
                    </span>
                    <span class="float-right mr-2">
                      <button id="update-subject-btn" class="btn costBtn btn-outline-success" name="update-subject-btn" type="submit"><i class="btn-action-icon fa fa-save"> Update</i></button>
                    </span>
                    <span class="float-left mr-2">
                      <button disabled id="add-subject-btn" class="btn costBtn btn-outline-info" name="add-subject-btn" type="submit"><i class="btn-action-icon fa fa-plus-circle"> Add Subject</i></button>
                    </span>
                  </div>
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
     <script src="/srms.bcshs.dev/public/css/Bootstrap 4/js/bootstrap.bundle.min.js" ></script>

     <!-- JavaScript DataTables-->

     <script src="/srms.bcshs.dev/public/DataTables/js/jquery.dataTables.min.js" type="text/javascript"></script>
     <script src="/srms.bcshs.dev/public/DataTables/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>


     <!-- Costum JavaScript -->
     <script src="/srms.bcshs.dev/public/js/customJS/customJS.js" type="text/javascript"></script>
     <script src="/srms.bcshs.dev/views/curriculum/index.js" type="text/javascript"></script>
   </body>
 </html>
<script type="text/javascript">

</script>
