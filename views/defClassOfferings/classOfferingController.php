<?php
include_once('../../classes/DefClassOfferings.class.php');
include_once('../../classes/Message.class.php');


if (isset($_POST['action']))
{
    $action = $_POST['action'];

    switch ($action) {
      case 'create':
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
    $offering = new DefaultClassOfferings();
    $offering->grade_level  = $_POST['level'];
    $offering->section_id   = $_POST['section'];
    $offering->strand_id    = $_POST['strand'];

    $offering = $offering->create();

    if ($offering===true) {
      echo message('success', 'Class Successfully Added.');
    }else {
      echo $offering;
    }
  }

  function edit() {
    $id = $_POST['selectedClass'];
    $offering = new DefaultClassOfferings();

    $offering = $offering->getClassOffering($id);

    echo json_encode($offering);
  }

  function update() {
    $offering = new DefaultClassOfferings();
    $id                     = $_POST['selectedClass'];
    $offering->grade_level  = $_POST['level'];
    $offering->section_id   = $_POST['section'];
    $offering->strand_id    = $_POST['strand'];

    $offering = $offering->update($id);

    if ($offering===true) {
      echo message('success', 'Class Successfully Updated.');
    }else {
      echo message('danger', 'Error on Deleteion');
    }
  }

  function del() {
    $id = $_POST['selectedClass'];

    $db = new DefaultClassOfferings();

    $offering = $db->delete($id);

    if ($offering == true) {
      echo message('success', 'Class Successfully Deleted');
    }else{
      echo message('danger', 'Error on Deleteion');
    }
  }
