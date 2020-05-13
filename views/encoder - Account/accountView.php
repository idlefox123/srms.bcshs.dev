<?php
include_once('classes/EncoderAccount.class.php');


class View extends Account
{

  public function AY() {
    return $this->getAY();
  }

  public function semester() {
    return $this->getSemester();
  }

  public function user() {
    return $this->getUser($_SESSION['userID']);
  }

}
