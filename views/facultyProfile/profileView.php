<?php
include_once('classes/FacultyProfile.class.php');


class ProfileView extends Profile
{

  public function AY() {
    return $this->getAY();
  }

  public function semester() {
    return $this->getSemester();
  }

  public function department() {
    return $this->getDepartment();
  }

}
