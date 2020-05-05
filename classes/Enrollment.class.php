<?php
include_once('dbConnection.php');
include_once('databaseController.php');
include_once('Student.class.php');
include_once('Defaults.class.php');


class Enrollment extends DatabaseController
{
  protected $student = "student";
  protected $enrollment;

  function __construct() {
    $this->enrollment = "enrollment_{$this->getAY()}_{$this->getSemesterID()}";
  }

  private function getTableFields($table) {
    $db = new DatabaseController();
    $attribute = $db->getFieldsOnTable($table);
    return $attribute;
  }

  private function setAttributes($table) {
    $setAttributes = array();
    foreach ($this->getTableFields($table) as $field) {
      if (property_exists($this, $field)) {
          $setAttributes[$field] = $this->$field;
      }
    }
    return $setAttributes;
  }

  private function setAttributePairs($table) {
    $setOfAttributePairs = array();
    foreach ($this->setAttributes($table) as $key => $value) {
      $setOfAttributePairs[$key] = "{$key}=?";
    }
    return $setOfAttributePairs;
  }

  private function genParameter($attributes) {
    $parameter = '?';
    for ($i=1; $i < count($attributes); $i++) {
      $parameter .= ',?';
    }
    return $parameter;
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

  public function getStrand() {
    $strand = new Strand();
    $strand = $strand->getStrand();
    return $strand;
  }

  public function getStudent($id) {
    $student = new Student();
    $student = $student->getStudent($id);
    return $student;
  }

  public function enroll(){
    $attributes = $this->setAttributes($this->student);
    $parameter = $this->genParameter($attributes);

    $DB = new DatabaseController();

    $query = "INSERT INTO $this->enrollment ";
    $query .= '('.join(', ', array_keys($attributes)).')';
    $query .= " VALUES (" .$parameter. ")";
    $DB->setQuery($query);
    $DB->bindParameter(array_values($attributes));

  }

  public function create() {
    $DB = new DatabaseController();

    try{
      $DB->loadResult("SELECT student_id FROM $this->enrollment WHERE student_id = $this->student_id");
      $row = $DB->getRowCount();
      if ($row > 0) {
        return true;
      }else {
        $this->enroll();
      }

    }catch(PDOException $ex){
      echo 'error: ', $ex;
      return false;
     }
    return true;
  }

  private function updateEnrollment($id) {
    $DB = new DatabaseController();
    $setOfAttributePairs = $this->setAttributePairs($this->enrollment);
    $parameter = $this->genParameter($setOfAttributePairs);
    $attributes = $this->setAttributes($this->enrollment);
    array_push($attributes,$id);

    $query = "Update $this->enrollment ";
    $query .= "SET ".join(', ', $setOfAttributePairs);
    $query .= " WHERE student_id=?";
    $DB->setQuery($query);
    $DB->bindParameter(array_values($attributes));
  }

  private function updateStudent($id) {
    $DB = new DatabaseController();
    $setOfAttributePairs = $this->setAttributePairs($this->student);
    $parameter = $this->genParameter($setOfAttributePairs);
    $attributes = $this->setAttributes($this->student);
    array_push($attributes,$id);

    $query = "Update $this->student ";
    $query .= "SET ".join(', ', $setOfAttributePairs);
    $query .= " WHERE student_id=?";
    $DB->setQuery($query);
    $DB->bindParameter(array_values($attributes));
  }

  public function update($id) {
    $DB = new DatabaseController();
    try{
      $set = $DB->loadResult("SELECT student_id FROM $this->enrollment WHERE student_id = $id");
      $row = $DB->getRowCount();
      if ($row > 0) {
        $this->updateEnrollment($id);
      }
      $this->updateStudent($id);
    }catch(PDOException $exception){
      echo 'ERROR: ' .$exception->getMessage();
      return false;
    }
      return true;
  }



}
