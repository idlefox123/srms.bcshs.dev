<?php
include_once('classes/Faculty.class.php');

class FacultyView extends Faculty
{
  public function AY(){
    return $this->getAY();
  }

  public function semester(){
    return $this->getSemester();
  }

  public function department(){
    return $this->getDepartment();
  }

}
