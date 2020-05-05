<?php
include_once('../../classes/Subject.class.php');
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
    $subject = new Subject();
    $subject->subject_name = $_POST['subject'];
    $subject->ion_id       = $_POST['ion'];

    $subject = $subject->create();

    if ($subject === true) {
      echo message('success', 'Subject Successfully Added');
    }else {
      echo $subject;
    }
  }

  function getSubject(){
    $subject = new Subject();
    $id = $_POST['selectedSubject'];

    $subject = $subject->getSubject($id);

    echo json_encode($subject);

  }

  function update() {
    $subject = new Subject();
    $subject->id           = $_POST['selectedSubject'];
    $subject->subject_name = $_POST['subject'];
    $subject->ion_id       = $_POST['ion'];

    $subject = $subject->update();
    if ($subject === true) {
      echo message('success', 'Subject Successfully Updated');
    }else {
      echo message('danger', 'Failed on Update');
    }
  }

  function del(){
    $subject = new Subject();
    $subject->id = $_POST['selectedSubject'];

    $subject = $subject->delete();
    if ($subject === true) {
      echo message('success', 'Subject Successfully Deleted');
    }else{
      echo message('danger', 'Failed on Deletion');
    }
  }

 ?>
