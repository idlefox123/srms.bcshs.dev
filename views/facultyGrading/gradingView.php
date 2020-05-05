<?php
include_once('classes/FacultyGrading.class.php');
/**
 *
 */
class View extends Grading
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

  public function strand() {
    return $this->getStrand();
  }

  public function section() {
    return $this->getSection();
  }

}
