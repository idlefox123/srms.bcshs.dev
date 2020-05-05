<?php
include_once('../../classes/Section.class.php');
include_once('../../classes/Message.class.php');


if (isset($_POST['action']))
{
    $action = $_POST['action'];

    switch ($action) {
      case 'create':
        create();
        break;

      case 'edit':
        getSection();
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

  function create(){
   $section = new Section();
   $section->section = $_POST['section'];

   $section = $section->create();
   if ($section === true) {
     echo message('success', 'Section Successfully Added');
   }else {
     echo $section;
   }
  }

  function getSection(){
    $section = new Section();
    $id = $_POST['selectedSection'];

    $section = $section->getSection($id);

    echo json_encode($section);
  }

  function update() {
    $section = new Section();
    $id               = $_POST['selectedSection'];
    $section->section = $_POST['section'];

    $section = $section->update($id);
    if ($section === true) {
      echo message('success', 'Section Successfully Updated');
    }else {
      echo message('danger', 'Failed on Update');
    }
  }

  function del(){
    $section = new Section();
    $id = $_POST['selectedSection'];

    $section = $section->delete($id);
    if ($section === true) {
      echo message('success', 'Section Successfully Deleted');
    }else{
      echo message('danger', 'Failed on Deletion');
    }
  }
