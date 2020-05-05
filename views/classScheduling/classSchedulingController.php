<?php
include_once('../../classes/ClassScheduling.class.php');
include_once('../../classes/Message.class.php');

session_start();

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
      case 'getClass':
        getClass();
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
  $schedule = new ClassScheduling();
  $schedule->id           = $_POST['selectedClass'];
  $schedule->schedules    = $_POST['schedules'];

  $schedule = $schedule->create();

  if ($schedule===true) {
    echo message('success', 'New Schedules Successfully Added');
  }else {
    echo message('danger', 'Error on Insertion');
  }
}

function edit(){
  $schedule = new ClassScheduling();
  $id = $_POST['selectedSchedule'];

  $schedule = $schedule->getSchedule($id);

  echo json_encode($schedule);
}

function getClass(){
  $class = new ClassScheduling();
  $id = $_POST['selectedClass'];

  $class = $class->getClassOffering($id);

  echo json_encode($class);
}

function update(){
  $schedule = new ClassScheduling();
  $id                      = $_POST['selectedSchedule'];
  $schedule->subject_id    = $_POST['subject'];
  $schedule->days          = $_POST['day'];
  $schedule->time          = $_POST['time'];
  $schedule->room_id       = $_POST['room'];
  $schedule->teacher_id    = $_POST['editAdviser'];

  $schedule = $schedule->update($id);

  if ($schedule===true) {
    echo message('success', 'Schedule Successfully Updated');
  }else {
    echo message('danger', 'Error on Update');
  }
}

function del(){
  $id = $_POST['selectedSchedule'];
  $schedule = new ClassScheduling();
  $schedule = $schedule->delete($id);
  if ($schedule===true) {
    echo message('success', 'Schedule Successfully Deleted');
  }else{
    echo message('danger', 'Error on Deletion');

  }
}
