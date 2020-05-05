<?php
include_once('classes/classRoaster.class.php');

class View extends ClassRoaster
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
