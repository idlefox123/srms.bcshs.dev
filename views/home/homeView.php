<?php
include_once('classes/Home.class.php');

class View extends Home
{
  public function AY(){
    return $this->getAY();
  }

  public function semester(){
    return $this->getSemester();
  }

}
