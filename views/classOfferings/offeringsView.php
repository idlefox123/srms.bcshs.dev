<?php
include_once('classes/ClassOfferings.class.php');
/**
 *
 */

class OfferingsView extends Offerings
{

  public function AY() {
    return $this->getAY();
  }

  public function semester() {
    return $this->getSemester();
  }

  public function strand() {
    return $this->getStrand();
  }

  public function section() {
    return $this->getSection();
  }

  public function teacher() {
    return $this->getTeacher();
  }

}
