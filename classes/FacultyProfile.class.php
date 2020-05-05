<?php
include_once('DatabaseController.php');

/**
 *
 */
class Profile
{
  protected $teacher = "teacher";

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
    $DB = new DatabaseController();
    $DB->loadResult("SELECT * FROM department");
    $department = $DB->getResult();
    return $department;
  }

  public function getUser($id) {
    $DB = new DatabaseController();
    $DB->setQuery("SELECT first_name, last_name, middle_name, extension_name, teacher.dept_id, concat(last_name, ', ', first_name, ' ', middle_name) as name,
                    contact, address, position, department.dept_name FROM $this->teacher
                    INNER join department on teacher.dept_id = department.dept_id
                    WHERE user_id = $id");
    $user = $DB->getRes();
    return $user;
  }

  public function update($id) {
    $setOfAttributePairs = $this->setAttributePairs($this->teacher);
    $parameter = $this->genParameter($setOfAttributePairs);
    $attributes = $this->setAttributes($this->teacher);
    array_push($attributes,$id);

    try {
      $DB = new DatabaseController();
      $query = "Update $this->teacher ";
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
