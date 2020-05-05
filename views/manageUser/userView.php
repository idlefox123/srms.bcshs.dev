<?php
include_once('classes/User.class.php');
class View extends User
{
  public function AY(){
    return $this->getAY();
  }

  public function semester(){
    return $this->getSemester();
  }

}
