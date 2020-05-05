<?php
include_once('classes/ClassSchedules.class.php');

class View extends ClassSchedules
{
  public function AY() {
    return $this->getAY();
  }

  public function semester() {
    return $this->getSemester();
  }

  public function strand() {
    return $this->getStrand();
  }

}
