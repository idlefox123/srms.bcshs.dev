<?php
include_once('classes/FacultyGrading.class.php');
/**
 *
 */
class GradingView extends Grading
{
  public function __construct($AY,$semester) {
        parent::__construct($AY,$semester);
    }
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
