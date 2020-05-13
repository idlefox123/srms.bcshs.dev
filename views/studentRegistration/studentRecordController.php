<?php
session_start();
include_once('../../classes/Registration.class.php');
include_once('../../classes/Message.class.php');

if (isset($_POST['action']))
{
    $action = $_POST['action'];

    switch ($action) {
      case 'create':
        create();
        break;

      case 'edit':
        getRecord();
        break;

      case 'update':
        update();
        break;


    }

}


 function create() {

  $student = new Registration();
  $student->lrn             = '000000000000';
  $student->first_name      = $_POST['addfname'];
  $student->last_name       = $_POST['addlname'];
  $student->middle_name     = $_POST['addmname'];
  $student->extension_name  = $_POST['addextension'];
  $student->gender          = $_POST['addgender'];
  $student->bdate           = $_POST['addbdate'];
  $student->age             = $_POST['addage'];
  $student->home_address    = $_POST['addaddress'];
  $student->strand_id       = $_POST['addstrand'];
  $student->grade_level     = $_POST['addlevel'];
  $student->contact         = $_POST['addcontact'];
  $student->status          = $_POST['addstatus'];
  $student->enrollee        = 'Registered';
  $student->data            = $_POST['p_data'];
  if (isset($_POST['addschlName']) || isset($_POST['addschlAddress'])) {
    $student->school_name     = $_POST['addschlName'];
    $student->school_address  = $_POST['addschlAddress'];
  }

  $student = $student->create();
  if ($student === true) {
    echo message('success', 'Student Successfully Registered');
  }else {
    echo $student;
  }
}

 function getRecord() {
   $student = new Registration();
   $id      = $_POST['selectedStudent'];

   $student = $student->getRecord($id);
   echo json_encode($student);
 }

 function update() {
   $student = new Registration();
   $id                       = $_POST['selectedStudent'];
   $student->lrn             = '000000000000';
   $student->first_name      = $_POST['fname'];
   $student->last_name       = $_POST['lname'];
   $student->middle_name     = $_POST['mname'];
   $student->extension_name  = $_POST['extension'];
   $student->gender          = $_POST['gender'];
   $student->bdate           = $_POST['bdate'];
   $student->age             = $_POST['age'];
   $student->home_address    = $_POST['address'];
   $student->contact         = $_POST['contact'];
   $student->enrollee        = 'Registered';
   $student->school_name     = $_POST['schlName'];
   $student->school_address  = $_POST['schlAddress'];
   $student = $student->update($id);
   if ($student === true) {
     echo message('success', 'Profile Successfully Updated');
   }else {
     echo "Failed on Update";
   }
 }

 ?>
