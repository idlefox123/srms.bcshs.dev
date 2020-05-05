<?php
include_once('classes/StudentClassSchedule.class.php');

class View extends ClassSchedule
{

  public function allAY(){
    return $this->getAllAY();
  }

  public function AY(){
    return $this->getAY();
  }

  public function semester(){
    return $this->getSemester();
  }

  public function enrollee() {
    return $this->getEnrolleeID($_SESSION['userID']);
  }

}
