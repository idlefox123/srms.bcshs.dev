<?php
include_once('../../classes/DefaultClassScheduling.class.php');
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
  $schedule = new DefaultClassScheduling();
  $schedule->offer_id      = $_POST['selectedClass'];
  $schedule->subject_id    = $_POST['subject'];
  $schedule->days          = $_POST['day'];
  $schedule->time          = $_POST['time'];
  $schedule->room_id       = $_POST['room'];
  $schedule->teacher_id    = $_POST['teacher'];

  $schedule = $schedule->create();

  if ($schedule===true) {
    echo message('success', 'Schedule Successfully Added.');
  }else {
    echo $schedule;
  }
}

function edit() {
  $schedule = new DefaultClassScheduling();
  $id = $_POST['selectedSchedule'];

  $schedule = $schedule->getSchedule($id);

  echo json_encode($schedule);
}

function update() {
  $schedule = new DefaultClassScheduling();
  $id                      = $_POST['selectedSchedule'];
  $schedule->subject_id    = $_POST['subject'];
  $schedule->days          = $_POST['day'];
  $schedule->time          = $_POST['time'];
  $schedule->room_id       = $_POST['room'];
  $schedule->teacher_id    = $_POST['teacher'];

  $schedule = $schedule->update($id);

  if ($schedule===true) {
    echo message('success', 'Schedule Successfully Updated.');
  }else {
    echo message('danger', 'Error on Update.');
  }
}

function del(){
  $id = $_POST['selectedSchedule'];
  $schedule = new DefaultClassScheduling();
  $schedule = $schedule->delete($id);
  if ($schedule===true) {
    echo message('success', 'Schedule Successfully Deleted.');
  }else{
    echo message('danger', 'Error on Deletion.');
  }
}
