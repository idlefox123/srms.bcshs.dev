<?php
include_once('classes/SchedulingEnrollee.class.php');
/**
 *
 */
class StudentSchedulingView extends SchedulingEnrollee
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

  public function section() {
    return $this->getSection();
  }

  public function student() {
    return $this->getStudent($this->enrollee);
  }

  public function enrollee() {
    return $this->getEnrollee($this->enrollee);
  }

}
