<?php
include_once('classes/DefClassOfferings.class.php');
/**
 *
 */

class OfferingsView extends DefaultClassOfferings
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

  public function subjects() {
    return $this->getSubjects();
  }

  public function rooms() {
    return $this->getRooms();
  }

  public function teacher() {
    return $this->getTeacher();
  }

}
