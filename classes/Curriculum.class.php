<?php
include_once('databaseController.php');
include_once('Validation.class.php');
include_once('Message.class.php');
/**
 *
 */
class Curriculum
{
  protected $curriculum = "curriculum";
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

  public function getStrand() {
    $DB = new DatabaseController();
    $DB->loadResult("SELECT * FROM strands");
    $strand = $DB->getResult();
    return $strand;
  }

  public function getSubject() {
    $DB = new DatabaseController();
    $DB->loadResult("SELECT * from subjects");
    $subject = $DB->getResult();
    return $subject;
  }

  public function getCurrSubject($id) {
    $DB = new DatabaseController();
    $DB->setQuery("SELECT * FROM curriculum WHERE curriculum_id = $id");
    $subject = $DB->getRes();
    return $subject;
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
    $attributes = $this->setAttributes($this->curriculum);
    $attributes = $this->validation($this->getTableFields($this->curriculum), $attributes);

    if ($this->status == true) {
      $parameter = $this->genParameter($attributes);
      try{
        $db = new DatabaseController();
        $query = "INSERT INTO $this->curriculum ";
        $query .= '('.join(', ', array_keys($attributes)).')';
        $query .= " VALUES (" .$parameter. ")";
        $db->setQuery($query);
        $db->bindParameter(array_values($attributes));

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
    $setOfAttributePairs = $this->setAttributePairs($this->curriculum);
    $parameter = $this->genParameter($setOfAttributePairs);
    $attributes = $this->setAttributes($this->curriculum);
    array_push($attributes,$id);

    try {
      $db = new DatabaseController();
      $query = "Update $this->curriculum ";
      $query .= "SET ".join(', ', $setOfAttributePairs);
      $query .= " WHERE curriculum_id=?";
      $db->setQuery($query);
      $db->bindParameter(array_values($attributes));
    }catch(PDOException $ex){
      echo 'ERROR: ' .$ex->getMessage();
      return false;
    }
    return true;
  }


  public function delete($id) {
    try {
      $db = new DatabaseController();
      $id = array($id);
      $db->setQuery("DELETE FROM $this->curriculum WHERE `curriculum_id` = ?");
      $db->bindParameter($id);
    } catch (PDOException $e) {
      echo 'ERROR: ' .$exception->getMessage();
      return false;
    }
    return true;
  }

}
