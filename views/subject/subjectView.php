<?php
include_once('classes/Subject.class.php');
class SubjectView extends Subject
{
  public function AY(){
    return $this->getAY();
  }

  public function semester(){
    return $this->getSemester();
  }

  public function ion(){
    return $this->getION();
  }

}
