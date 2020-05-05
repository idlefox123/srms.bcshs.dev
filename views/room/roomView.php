<?php
include_once('classes/Room.class.php');
class RoomView extends Room
{
  public function AY(){
    return $this->getAY();
  }

  public function semester(){
    return $this->getSemester();
  }

  /*public function room($id) {
    return $this->getRoom($id);
  }*/

}
