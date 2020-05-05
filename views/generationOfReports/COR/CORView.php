<?php
include_once('classes/GenerationOfCOR.class.php');
//echo $url->segment(2);
/**
 *
 */

class View extends COR
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

  public function semesterID(){
    return $this->getSemesterID();
  }

  public function strand() {
    return $this->getStrand();
  }

  public function section() {
    return $this->getSection();
  }

}
