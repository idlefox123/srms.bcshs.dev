<?php
include_once('classes/Curriculum.class.php');

class View extends Curriculum
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

  public function subject(){
    return $this->getSubject();
  }

  public function strand(){
    return $this->getStrand();
  }

}
