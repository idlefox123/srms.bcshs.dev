<?php
include_once('DatabaseController.php');
include_once('Defaults.class.php');
include_once('Sections.class.php');
include_once('Strand.class.php');

/**
 *
 */
class Grading extends DatabaseController
{
  protected $grades;
  protected $schedule;
  protected $enrollment;
  protected $studentID;

  function __construct($AY,$semester) {
    $this->grades     = "grades_{$AY}_{$semester}";
    $this->schedule   = "schedule_{$AY}_{$semester}";
    $this->enrollment = "enrollment_{$AY}_{$semester}";
  }

  public function getTableFields($table) {
    $db = new DatabaseController();
    $attribute = $db->getFieldsOnTable($table);
    return $attribute;
  }

  public function setAttributes($table) {
    $setAttributes = array();
    foreach ($this->getTableFields($table) as $field) {
      if (property_exists($this, $field)) {
          $setAttributes[$field] = $this->$field;
      }
    }
    return $setAttributes;
  }

  public function setAttributePairs($table) {
    $setOfAttributePairs = array();
    foreach ($this->setAttributes($table) as $key => $value) {
      $setOfAttributePairs[$key] = "{$key}=?";
    }
    return $setOfAttributePairs;
  }

  public function genParameter($attributes) {
    $parameter = '?';
    for ($i=1; $i < count($attributes); $i++) {
      $parameter .= ',?';
    }
    return $parameter;
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

  public function getSection() {
    $section = new Sections();
    $section = $section->getSection();
    return $section;
  }

  public function getStrand(){
    $strand = new Strand();
    $strand = $strand->getStrand();
    return $strand;
  }

  private function getStudentID($id) {
    $DB = new DatabaseController();
    $DB->setQuery("SELECT student_id from student WHERE user_id = $id");
    $student = $DB->getRes();
    $student = $student['student_id'];
    return $student;
  }

  public function getEnrolleeID($id) {
    $id = $this->getStudentID($id);
    $DB = new DatabaseController();
    $DB->setQuery("SELECT enrollment_id from $this->enrollment WHERE student_id = $id");
    $enrollee = $DB->getRes();
    $enrollee = $enrollee['enrollment_id'];
    return $enrollee;
  }

}
