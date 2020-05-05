<?php
include_once('classes/ClassScheduling.class.php');
/**
 *
 */

class ClassSchedulingView extends ClassScheduling
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

  public function section() {
    return $this->getSection();
  }

  public function rooms() {
    return $this->getRooms();
  }

  public function subjects() {
    return $this->getSubjects();
  }

  public function defClassOfferings() {
    return $this->getDefClassOfferings();
  }

  public function classOfferings() {
    return $this->getClassOfferings();
  }

  public function class() {
    return $this->getClass();
  }

  public function teacher() {
    return $this->getTeacher();
  }

}
