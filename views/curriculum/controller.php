<?php
include_once('../../classes/Curriculum.class.php');
include_once('../../classes/Message.class.php');


if (isset($_POST['action']))
{
    $action = $_POST['action'];


    switch ($action) {
      case 'create':
        create();
        break;

      case 'edit':
        getSubject();
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
    $subject = new Curriculum();
    $subject->subject_id   = $_POST['subject'];
    $subject->hours        = $_POST['hours'];
    $subject->strand_id    = $_POST['strand'];
    $subject->grade_level  = $_POST['level'];
    $subject->semester     = $_POST['semester'];

    $subject = $subject->create();

    if ($subject === true) {
      echo message('success', 'Subject Successfully Added');
    }else {
      echo $subject;
    }
  }

  function getSubject() {
    $subject = new Curriculum();
    $id = $_POST['selectedSubject'];

    $subject = $subject->getCurrSubject($id);

    echo json_encode($subject);

  }

  function update() {
    $subject = new Curriculum();
    $id                    = $_POST['selectedSubject'];
    $subject->subject_id = $_POST['subject'];
    $subject->hours        = $_POST['hours'];
    $subject->strand_id    = $_POST['strand'];
    $subject->grade_level  = $_POST['level'];
    $subject->semester     = $_POST['semester'];

    $subject = $subject->update($id);
    if ($subject === true) {
      echo message('success', 'Subject Successfully Updated');
    }else {
      echo message('danger', 'Failed on Update');
    }
  }

  function del() {
    $subject = new Curriculum();
    $id      = $_POST['selectedSubject'];

    $subject = $subject->delete($id);
    if ($subject === true) {
      echo message('success', 'Subject Successfully Deleted');
    }else{
      echo message('danger', 'Failed on Deletion');
    }
  }

 ?>
