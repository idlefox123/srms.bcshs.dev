<?php
include_once('../../classes/SetDefaults.class.php');
include_once('../../classes/Message.class.php');
session_start();
if (isset($_POST['action']))
{
    $action = $_POST['action'];

    switch ($action) {
      case 'create':
        create();
        break;

      case 'getDefaults':
        getDefaults();
        break;

      case 'update':
        update();
        break;

      default:
        // code...
        break;
    }

}

  function create() {
   $default = new SetDefaults();
   $default->schl_year = $_POST['AY'];
   $default->current   = 'no';

   $default = $default->create();
   if ($default === true) {
     echo message('success', 'Academic Year Successfully Added.');
   }else {
     echo $default;
   }
  }

  function getDefaults() {
    $default = new SetDefaults();

    $default = $default->getDefaults();

    echo json_encode($default);
  }

  function update() {
    $defaults = new SetDefaults();
    $AY       = $_POST['set-AY'];
    $semester = $_POST['set-semester'];
    $defaults->current = 'yes';

    $default = $defaults->update($AY, $semester);
    if ($default === true) {
      echo message('success', 'Defaults Successfully Updated.');
      $_SESSION['AY'] = $AY;
      $_SESSION['semID'] = $semester;
    }else {
      echo $default;
    }
  }
