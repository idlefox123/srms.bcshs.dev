<?php
include_once('classes/FacultyAccount.class.php');


class AccountView extends Account
{

  public function AY() {
    return $this->getAY();
  }

  public function semester() {
    return $this->getSemester();
  }

  public function user() {
    return $this->getUser(2);
  }

}
