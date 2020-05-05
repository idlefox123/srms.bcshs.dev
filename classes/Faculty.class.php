<?php
include_once('DatabaseController.php');
include_once('Validation.class.php');
include_once('Message.class.php');
/**
 *
 */
class Faculty extends DatabaseController
{
  protected $teacher = "teacher";
  private $validated_attr = array();
  private $message;

  public function getTableFields($table) {
    $DB = new DatabaseController();
    $attribute = $DB->getFieldsOnTable($table);
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

  public function getSemesterID() {
    $def = new Defaults();
    $semester = $def->semesterID();
    return $semester;
  }

  public function getDepartment() {
    $this->loadResult("SELECT * FROM department");
    $department = $this->getResult();
    return $department;
  }

  public function getFaculty($id) {
    $this->setQuery("SELECT * from teacher where teacher_id = $id");
    $faculty = $this->getRes();
    return $faculty;
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
    $attributes = $this->setAttributes($this->teacher);
    $attributes = $this->validation($this->getTableFields($this->teacher), $attributes);

    if ($this->status == true) {
      $parameter = $this->genParameter($attributes);
      try{
        $DB = new DatabaseController();
        $query = "INSERT INTO $this->teacher ";
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

  public function update($id) {
    $setOfAttributePairs = $this->setAttributePairs($this->teacher);
    $parameter = $this->genParameter($setOfAttributePairs);
    $attributes = $this->setAttributes($this->teacher);
    array_push($attributes,$id);

    try {
      $DB = new DatabaseController();
      $query = "Update $this->teacher ";
      $query .= "SET ".join(', ', $setOfAttributePairs);
      $query .= " WHERE teacher_id=?";
      $DB->setQuery($query);
      $DB->bindParameter(array_values($attributes));
    }catch(PDOException $ex){
      echo 'ERROR: ' .$ex->getMessage();
      return false;
    }
    return true;
  }


  public function delete($id) {
    try {
      $DB = new DatabaseController();
      $id = array($id);
      $DB->setQuery("DELETE FROM $this->teacher WHERE `teacher_id` = ?");
      $DB->bindParameter($id);
    } catch (PDOException $ex) {
      echo 'ERROR: ' .$ex->getMessage();
      return false;
    }
    return true;
  }

}
