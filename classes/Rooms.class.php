<?php
/**
 *
 */
class Rooms extends DatabaseController
{
  public function getRooms() {
    $this->loadResult("SELECT * FROM `room`");
    $rooms = $this->getResult();
    return $rooms;
  }


}
 ?>
