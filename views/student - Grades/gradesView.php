<?php
include_once('classes/StudentGrades.class.php');
/**
 *
 */
class View extends Grading
{
  public function __construct($AY,$semester) {
        parent::__construct($AY,$semester);
    }
  public function allAY() {
    return $this->getAllAY();
  }

  public function AY() {
    return $this->getAY();
  }

  public function semester() {
    return $this->getSemester();
  }

  public function enrollee() {
    return $this->getEnrolleeID($_SESSION['userID']);
  }

}
