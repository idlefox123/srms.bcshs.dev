<?php
include_once('classes/Defaults.class.php');

class View extends SetDefaults
{

  public function allAY() {
    return $this->getAllAY();
  }

  public function AY() {
    return $this->getAY();
  }

  public function semester() {
    return $this->getSemester();
  }

}
