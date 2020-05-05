
<?php
  include_once('enrollmentView.php');
  global $url;
  $view = new EnrollmentView($url->segment(2));
  $enrollee = $view->student();
?>

<!doctype html>

<html lang="en">
 <head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- Bootstrap CSS -->
   <link href="/srms.bcshs.dev/public/css/Bootstrap 4/css/bootstrap.min.css" rel="stylesheet">

   <!-- Costum Css -->
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/administratorCSS/customCSS/customCSS.css">
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/administratorCSS/customCSS/navBarCSS.css">
   <link rel="stylesheet" href="/srms.bcshs.dev/public/css/administratorCSS/customCSS/contentCSS.css">
   <link rel="stylesheet" href="/srms.bcshs.dev/public/font/css/all.min.css">

   <!-- Bootstrap DataTables -->
   <link rel="stylesheet" href="/srms.bcshs.dev/public/DataTables/css/dataTables.bootstrap4.min.css">


   <title>Enrollment</title>
 </head>

 <body>
   <?php
   $role = $_SESSION['role'];
   switch ($role) {
     case 'Administrator':
       require('templates/administrator/navbar.php');
       require('templates/administrator/sidebar.php');
       break;

     case 'Encoder':
       require('templates/encoder/navbar.php');
       require('templates/encoder/sidebar.php');
       break;

     default:
       // code...
       break;
   }
   ?>

 <div class="wrapper">

   <div id= "main-container" class="" style = "">
     <div class="container-fluid">

       <div class="row">
         <div class="col-sm-3">
           <h4><i class="fa fa-calendar-alt"> Enrollment</i></h4>
         </div>
         <div class="col-sm-9">
           <div class="float-right">
             <h5>SY: <?php echo $view->AY() ?> - <?php echo $view->AY()+1 ?>  <?php echo $view->semester() ?></h5>
           </div>
         </div>
       </div>
       <hr>

        <div class="">
          <div class="row padding-bottom-10">
            <div class="col-md-12">
              <button id="back-btn" class="btn costBtn btn-outline-info"><i class="fa fa-arrow-circle-left"> BACK</i></button>
            </div>
          </div>
          <div class="card">
            <div class="card-body font-weight-bold">
              <div class="padding-20">
                <div class="">
                  <h5>
                    <p id="student"><i class="fa fa-user-circle"> Enrollee: </i><?php echo ' '.$enrollee['student'];  ?></p>
                  </h5>
                    <h5>
                      <p style="text-indent:113px"><span id="lrn"><?php echo $enrollee['lrn']; ?></span></p>
                    </h5>
                  <div class="container">
                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-8">
                        <div class="form-row padding-10">
                          <div class="form-group col-sm-4">
                            <label for="strand">Strand:</label>
                            <select disabled id="strand" name="strand" class="form-control">
                              <option value="">SELECT</option>
                              <?php
                              foreach ($view->strand() as $value):?>
                                <option <?php if($enrollee['strand_id']==$value['strand_id']){echo "selected";} ?> value="<?php echo $value["strand_id"]?>">
                                  <?php echo $value["strand"]?>
                                </option>
                              <?php endforeach;?>
                            </select>

                          </div>
                          <div class="form-group col-sm-4">
                            <label for="level">Grade:</label>
                            <select disabled id="level" name="level" class="form-control">
                              <option value="">SELECT</option>
                              <option <?php if($enrollee['grade_level']== 'Grade 11'){echo "selected";} ?> value="Grade 11">Grade 11</option>
                              <option <?php if($enrollee['grade_level']== 'Grade 12'){echo "selected";} ?> value="Grade 12">Grade 12</option>
                            </select>
                          </div>
                          <div class="form-group col-sm-4">
                            <label for="status">Status:</label>
                            <select disabled id="status" name="status" class="form-control">
                              <option value="">SELECT</option>
                              <option <?php if($enrollee['status']== 'new'){echo "selected";} ?> value="new">New</option>
                              <option <?php if($enrollee['status']== 'old'){echo "selected";} ?> value="old">Old</option>
                              <option <?php if($enrollee['status']== 'transferee'){echo "selected";} ?> value="transferee">Transferee</option>
                            </select>
                          </div>
                        </div>
                        <input hidden id="enrollee" type="text" name="" value="<?php echo $enrollee['student_id'] ?>">
                        <div class="float-right">
                          <button id="edit-enrollee-btn" class="btn costBtn btn-outline-success" type="button" name="button"><i class="fa fa-edit"> Edit</i></button>
                          <?php include_once('modal.php'); ?>
                        </div>
                      </div>
                      <div class="col-md-2"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div><!--- div Card END -->
          <div class="row padding-top-10">
            <div class="col-md-12">
              <div class="float-right">
                <button id="enroll-student-btn" type="button" class="btn costBtn btn-outline-info" name="button"> <span class="font-weight-bold">Enroll Student </span><i class="fa fa-arrow-circle-right"></i></button>
              </div>
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
  <script src="/srms.bcshs.dev/public/css/Bootstrap 4/js/bootstrap.bundle.min.js" ></script>

  <!-- JavaScript DataTables-->

  <script src="/srms.bcshs.dev/public/DataTables/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="/srms.bcshs.dev/public/DataTables/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>


  <!-- Costum JavaScript -->
  <script src="/srms.bcshs.dev/public/js/customJS/customJS.js" type="text/javascript"></script>
  <script src="/srms.bcshs.dev/views/studentEnrollment/studentEnrollment.js" type="text/javascript"></script>

 </body>
</html>
