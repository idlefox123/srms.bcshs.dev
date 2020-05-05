<?php
include_once('databaseController.php');
include_once('Validation.class.php');
include_once('Message.class.php');

/**
 *
 */
class Department
{
  protected $department = "department";
  private $validated_attr = array();
  private $message;

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
          $this->fields_val[$field] = $this->$field;
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

  public function getSemesterID() {
    $def = new Defaults();
    $semester = $def->semesterID();
    return $semester;
  }

  public function getTeacher() {
    $DB = new DatabaseController();
    $DB->loadResult("SELECT teacher_id, concat(last_name, ', ', first_name, ' ', middle_name, ' ', extension_name) as name
                       FROM teacher");
    $teacher = $DB->getResult();
    return $teacher;
  }

  public function getDepartment($id) {
    $DB = new DatabaseController();
    $DB->setQuery("SELECT *  from department WHERE dept_id = $id");
    $department = $DB->getRes();
    return $department;
  }

  public function validation($attributes, $data) {
    $attributes = new Validation($attributes, $data);

    $validated_attr = $attributes->validate();
    $this->status = $attributes->status();

    if ($this->status == true) {
      return $validated_attr;
    }else {
      $this->message = $attributes->getMessage();
      return $this->message;
    }
  }

  public function create() {
    $attributes = $this->setAttributes($this->department);
    $attributes = $this->validation($this->getTableFields($this->department), $attributes);

    if ($this->status == true) {
      $parameter = $this->genParameter($attributes);
      try{
        $DB = new DatabaseController();
        $query = "INSERT INTO $this->department ";
        $query .= '('.join(', ', array_keys($attributes)).')';
        $query .= " VALUES (" .$parameter. ")";
        $DB->setQuery($query);
        $DB->bindParameter(array_values($attributes));

      }catch(PDOException $ex){
        echo 'ERROR: ' .$ex->getMessage();
        return false;
      }
      return true;
    }else {
      return $this->message;
    }
  }

  public function update() {
    $setOfAttributePairs = $this->setAttributePairs($this->department);
    $parameter = $this->genParameter($setOfAttributePairs);
    $attributes = $this->setAttributes($this->department);
    array_push($attributes,$this->id);

    try {
      $DB = new DatabaseController();
      $query = "Update $this->department ";
      $query .= "SET ".join(', ', $setOfAttributePairs);
      $query .= " WHERE dept_id=?";
      $DB->setQuery($query);
      $DB->bindParameter(array_values($attributes));
    }catch(PDOException $ex){
      echo 'ERROR: ' .$ex->getMessage();
      return false;
    }
    return true;
  }


  public function delete() {
    try {
      $DB = new DatabaseController();
      $id = array($this->id);
      $DB->setQuery("DELETE FROM $this->department WHERE `dept_id` = ?");
      $DB->bindParameter($id);
    } catch (PDOException $e) {
      echo 'ERROR: ' .$exception->getMessage();
      return false;
    }
    return true;
  }

}
