<?php
include_once('classes/Enrollment.class.php');
//echo $url->segment(2);
/**
 *
 */


class EnrollmentView extends Enrollment
{
  public $enrollee;
  function __construct($enrollee)
  {
    $this->enrollee = $enrollee;
  }

  public function AY(){
    return $this->getAY();
  }

  public function semester(){
    return $this->getSemester();
  }

  public function strand() {
    return $this->getStrand();
  }

  public function student() {
    return $this->getStudent($this->enrollee);
  }

}
