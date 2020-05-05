<?php
include_once('../../../classes/ParentsGuardian.class.php');

if (isset($_POST['action']))
{
    $action = $_POST['action'];
    //echo $action;

    switch ($action) {
      case 'create'://pgInser
        create();
        break;

      case 'edit':
        edit();
        break;

      case 'update':
        update();
        break;

      case 'delete':
        del();
        break;

      default:
        // code...
        break;
    }

}

  function create() {
   $parent = new ParentsGuardian();
   $parent->student_id   = $_POST['selectedStudent'];
   $parent->p_name       = $_POST['pg-name'];
   $parent->relationship = $_POST['pg-relationship'];
   $parent->p_address    = $_POST['pg-address'];
   $parent->p_contact    = $_POST['pg-contact'];

   $parent = $parent->create();
   if ($parent === true) {
     echo 'Parent/Guardian Successfully Added.';
   }else {
     echo "Error on Insertion";
   }
  }

  function edit() {
    $parents = new ParentsGuardian();
    $id      = $_POST['selectedPG'];
    $parents = $parents->getParents($id);
    echo json_encode($parents);
  }

  function update() {
    $parent = new ParentsGuardian();
    $id                   = $_POST['selectedPG'];
    $parent->p_name       = $_POST['pg-name'];
    $parent->relationship = $_POST['pg-relationship'];
    $parent->p_address    = $_POST['pg-address'];
    $parent->p_contact    = $_POST['pg-contact'];

    $parent = $parent->update($id);
    if ($parent === true) {
      echo "Parent Successfully Updated.";
    }else {
      echo "Error on Update.";
    }
  }

  function del() {
    $parent = new ParentsGuardian();
    $id     = $_POST['selectedPG'];

    $parent = $parent->delete($id);
    if ($parent === true) {
      echo "Successfully Deleted...";
    }else{
      echo "Select row to Delete.";
    }
  }

 ?>
