<?php
include_once('classes/Registration.class.php');

class RegistrationView extends Registration
{
  public function AY(){
    return $this->getAY();
  }

  public function semester(){
    return $this->getSemester();
  }

  public function strand() {
    return $this->getStrand();
  }

}
