<?php
include_once('../../classes/Room.class.php');
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
   $room = new Room();
   $room->room = $_POST['room'];

   $room = $room->create();
   if ($room === true) {
     echo message('success', 'Room Successfully Added');
   }else {
     echo $room;
   }
  }

  function edit() {
    $room = new Room();
    $id   = $_POST['selectedRoom'];
    $room = $room->getRoom($id);
    echo json_encode($room);
  }

  function update() {
    $room = new Room();
    $id         = $_POST['selectedRoom'];
    $room->room = $_POST['room'];

    $room = $room->update($id);
    if ($room === true) {
      echo message('success', 'Room Successfully Updated');
    }else {
      echo message('danger', 'Failed on Updated');
    }
  }

  function del() {
    $room = new Room();
    $id = $_POST['selectedRoom'];

    $room = $room->delete($id);
    if ($room === true) {
      echo message('success', 'Room Successfully Updated');
    }else{
      echo message('danger', 'Failed on Deletion');
    }
  }

 ?>
