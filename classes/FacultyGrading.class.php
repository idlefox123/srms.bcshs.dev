<?php
include_once('DatabaseController.php');
include_once('Defaults.class.php');

/**
 *
 */
class Grading extends DatabaseController
{
  protected $grades;
  protected $schedule;
  protected $offerings;
  protected $enrollment;

  function __construct() {
    $this->grades     = "grades_{$this->getAY()}_{$this->getSemesterID()}";
    $this->schedule   = "schedule_{$this->getAY()}_{$this->getSemesterID()}";
    $this->offerings = "offerings_{$this->getAY()}_{$this->getSemesterID()}";
    $this->enrollment = "enrollment_{$this->getAY()}_{$this->getSemesterID()}";
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

  public function getStrand() {
    $strand = new Strand();
    $strand = $strand->getStrand();
    return $strand;
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

  public function getGrade($id) {
    $DB = new DatabaseController();
    $DB->setQuery("SELECT grade_id, ions.ion, subjects.subject_name, first_quarter, second_quarter, final, remark, $this->enrollment.enrollment_id FROM $this->grades
                    LEFT JOIN $this->enrollment on $this->grades.enrollment_id = $this->enrollment.enrollment_id
                    LEFT JOIN $this->schedule on $this->grades.schedule_id = $this->schedule.schedule_id
                    LEFT JOIN subjects on $this->schedule.subject_id = subjects.subject_id
                    LEFT JOIN ions on subjects.ion_id = ions.ion_id
                    WHERE grade_id = $id");
    $grade = $DB->getRes();
    return $grade;
  }

  public function update($id) {
    $setOfAttributePairs = $this->setAttributePairs($this->grades);
    $parameter = $this->genParameter($setOfAttributePairs);
    $attributes = $this->setAttributes($this->grades);
    array_push($attributes,$id);

    try {
      $DB = new DatabaseController();
      $query = "Update $this->grades ";
      $query .= "SET ".join(', ', $setOfAttributePairs);
      $query .= " WHERE grade_id=?";
      $DB->setQuery($query);
      $DB->bindParameter(array_values($attributes));
    }catch(PDOException $ex){
      echo 'ERROR: ' .$ex->getMessage();
      return false;
    }
    return true;
  }

}
