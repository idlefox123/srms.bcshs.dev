<?php
include_once('DatabaseController.php');
include_once('Defaults.class.php');

/**
 *
 */
class ClassRoaster
{
  protected $offerings;
  protected $schedule;

  function __construct() {
    $this->schedule   = "schedule_{$this->getAY()}_{$this->getSemesterID()}";
    $this->offerings  = "offerings_{$this->getAY()}_{$this->getSemesterID()}";
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

  public function getClass($id) {
    $DB = new DatabaseController();
    $DB->setQuery("SELECT section.section
                  FROM $this->schedule
                  INNER JOIN $this->offerings on $this->schedule.offer_id = $this->offerings.offer_id
                  INNER JOIN section on $this->offerings.section_id = section.section_id
                  WHERE schedule_id = $id");
    $class = $DB->getRes();
    return $class;
  }

  public function getTeacherID($id) {
    $DB = new DatabaseController();
    $DB->setQuery("SELECT teacher_id FROM teacher WHERE user_id = $id");
    $teacherID = $DB->getRes();
    $teacherID = $teacherID['teacher_id'];
    return $teacherID;
  }

}
