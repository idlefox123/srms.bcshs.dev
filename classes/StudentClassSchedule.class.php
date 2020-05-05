<?php
include_once('DatabaseController.php');
include_once('Defaults.class.php');
/**
 *
 */
class ClassSchedule
{
  protected $enrollment;
  protected $offerings;

  function __construct() {
    $this->enrollment  = "enrollment_{$this->getAY()}_{$this->getSemesterID()}";
    $this->offerings  = "offerings_{$this->getAY()}_{$this->getSemesterID()}";
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

  public function getDepartment() {
    $department = new Department();
    $department = $department->getDepartment();
    return $department;
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

  private function getClassOffering($id) {
    $id = $this->getEnrolleeID($id);
    $DB = new DatabaseController();
    $DB->setQuery("SELECT offer_id FROM $this->enrollment WHERE enrollment_id = $id");
    $data = $DB->getRes();
    $classID = $data['offer_id'];
    return $classID;
  }

  public function getClass($id) {
    $id = $this->getClassOffering($id);
    $DB = new DatabaseController();
    $DB->setQuery("SELECT section.section FROM $this->offerings
                    INNER JOIN section on $this->offerings.section_id = section.section_id
                    WHERE offer_id = $id");
    $class = $DB->getRes();
    return $class;
  }





}
