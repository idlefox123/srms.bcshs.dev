<?php
include_once('../../classes/ClassOfferings.class.php');
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
    $offerings = new Offerings();
    $offerings->grade_level  = $_POST['level'];
    $offerings->section_id   = $_POST['section'];
    $offerings->adviser      = $_POST['adviser'];
    $offerings->strand_id    = $_POST['strand'];
    $offerings->max_enrollee = $_POST['maxEnrollee'];
    $offerings->enrolled     = $_POST['enrolled'];
    $offerings = $offerings->create();

    if ($offerings===true) {
      echo message('success', 'New Class Offering Successfully Added');
    }else {
      echo message('danger', 'Error on Insertion');
    }
  }

  function edit() {
    $id = $_POST['selectedOffering'];
    $offering = new Offerings();

    $offering = $offering->getClassOffering($id);

    echo json_encode($offering);
  }

  function update() {
    $offerings = new Offerings();
    $id                      = $_POST['selectedOffering'];
    $offerings->grade_level  = $_POST['level'];
    $offerings->section_id   = $_POST['section'];
    $offerings->adviser      = $_POST['adviser'];
    $offerings->strand_id    = $_POST['strand'];
    $offerings->max_enrollee = $_POST['maxEnrollee'];
    $offerings->enrolled     = $_POST['enrolled'];

    $offerings = $offerings->update($id);

    if ($offerings===true) {
      echo message('success', 'Class Offering Successfully Updated');
    }else {
      echo message('danger', 'Error on Update');
    }
  }

  function del() {
    $id = $_POST['selectedOffering'];
    $db = new Offerings();
    $offerings = $db->delete($id);

    if ($offerings == true) {
      echo message('success', 'ClassOffering Successfully Deleted');
    }else{
      echo message('danger', 'Error on Deletion');
    }
  }
