<?php
include_once('DatabaseController.php');
include_once('Defaults.class.php');

/**
 *
 */
class StudentInquiry
{
  protected $grades;
  protected $schedule;
  protected $enrollment;

  function __construct($AY,$semester) {
    $this->grades     = "grades_{$AY}_{$semester}";
    $this->schedule   = "schedule_{$AY}_{$semester}";
    $this->enrollment = "enrollment_{$AY}_{$semester}";
  }

  public function getAllAY() {
    $def = new Defaults();
    $AY = $def->allAY();
    return $AY;
  }

  public function getAY() {
    $def = new Defaults();
    $AY = $def->sy();
    return $AY;
  }

  public function getSemester() {
    $def = new Defaults();
    $semester = $def->semester();
    return $semester;
  }

  public function getSemesterID() {
    $def = new Defaults();
    $semester = $def->semesterID();
    return $semester;
  }

}
