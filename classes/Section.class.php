<?php
include_once('databaseController.php');
include_once('Validation.class.php');
include_once('Message.class.php');
/**
 *
 */
class Section
{
  protected $sections = "section";
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

  public function getSection($id) {
    $DB = new DatabaseController();
    $DB->setQuery("SELECT section  from section where section_id = $id");
    $section = $DB->getRes();
    return $section;
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

  public function create(){
    $attributes = $this->setAttributes($this->sections);
    $attributes = $this->validation($this->getTableFields($this->sections), $attributes);

    if ($this->status == true) {
      $parameter = $this->genParameter($attributes);
      try{
        $DB = new DatabaseController();
        $query = "INSERT INTO $this->sections ";
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
    $setOfAttributePairs = $this->setAttributePairs($this->sections);
    $parameter = $this->genParameter($setOfAttributePairs);
    $attributes = $this->setAttributes($this->sections);
    array_push($attributes,$id);

    try {
      $DB = new DatabaseController();
      $query = "Update $this->sections ";
      $query .= "SET ".join(', ', $setOfAttributePairs);
      $query .= " WHERE section_id=?";
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
      $DB->setQuery("DELETE FROM $this->sections WHERE `section_id` = ?");
      $DB->bindParameter($id);
    } catch (PDOException $e) {
      echo 'ERROR: ' .$e->getMessage();
      return false;
    }
    return true;
  }

}
