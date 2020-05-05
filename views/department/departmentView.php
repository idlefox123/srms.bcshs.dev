<?php
include_once('classes/Subject.class.php');
class View extends Department
{
  public function AY(){
    return $this->getAY();
  }

  public function semester(){
    return $this->getSemester();
  }

  public function teacher(){
    return $this->getTeacher();
  }

}
