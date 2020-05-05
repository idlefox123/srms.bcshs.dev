<?php
include_once('classes/StudentProfile.class.php');


class View extends Profile
{

  public function AY() {
    return $this->getAY();
  }

  public function semester() {
    return $this->getSemester();
  }


}
