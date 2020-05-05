<?php
include_once('DatabaseController.php');

/**
 *
 */
class Profile extends DatabaseController
{
  protected $student = "student";

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

  public function getDepartment() {
    $department = new Department();
    $department = $department->getDepartment();
    return $department;
  }

  public function getUser($id) {
    $this->setQuery("SELECT lrn, last_name, first_name, middle_name, extension_name, concat(last_name, ', ', first_name, ' ', middle_name, ' ', extension_name) as name,
                      lrn, student.strand_id, grade_level, contact, home_address, concat(strands.strand_desc, ' ( ', strands.strand, ' )') as strand
                      FROM student INNER JOIN strands on student.strand_id = strands.strand_id
                      WHERE user_id = $id ");
    $user = $this->getRes();
    return $user;
  }

  public function update($id) {
    $setOfAttributePairs = $this->setAttributePairs($this->student);
    $parameter = $this->genParameter($setOfAttributePairs);
    $attributes = $this->setAttributes($this->student);
    array_push($attributes,$id);

    try {
      $DB = new DatabaseController();
      $query = "Update $this->student ";
      $query .= "SET ".join(', ', $setOfAttributePairs);
      $query .= " WHERE user_id=?";
      $DB->setQuery($query);
      $DB->bindParameter(array_values($attributes));
    }catch(PDOException $ex){
      echo 'ERROR: ' .$ex->getMessage();
      return false;
    }
    return true;
  }

}
