<?php
include_once('DatabaseController.php');
include_once('Defaults.class.php');
include_once('Teacher.class.php');
include_once('Validation.class.php');
include_once('Message.class.php');
/*
  **
  **
  **
 */

class DefaultClassOfferings
{

  protected $offerings;
  protected $schedule;
  private $validated_attr = array();
  private $message;

  function __construct(){
    $this->offerings = "offerings_def_{$this->getSemesterID()}";
    $this->schedule  = "schedule_def_{$this->getSemesterID()}";
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

  public function getSection() {
    $section = new Sections();
    $section = $section->getSection();
    return $section;
  }

  public function getSubjects() {
    $subjects = new Subjects();
    $subjects = $subjects->getSubjects();
    return $subjects;
  }

  public function getRooms() {
    $rooms = new Rooms();
    $rooms = $rooms->getRooms();
    return $rooms;
  }

  public function getTeacher() {
    $teacher = new Teacher();
    $teacher = $teacher->getTeacher();
    return $teacher;
  }

  public function getClassOffering($id) {
    $DB = new DatabaseController();
    $DB->setQuery("SELECT * FROM $this->offerings WHERE offer_id = $id");
    $classOffering = $DB->getRes();
    return $classOffering;
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
    $attributes = $this->setAttributes($this->offerings);
    $attributes = $this->validation($this->getTableFields($this->offerings), $attributes);

    if ($this->status == true) {
      $parameter = $this->genParameter($attributes);
      try{
      $DB = new DatabaseController();
      $query = "INSERT INTO $this->offerings ";
      $query .= '('.join(', ', array_keys($attributes)).')';
      $query .= " VALUES (" .$parameter. ")";
      $DB->setQuery($query);
      $DB->bindParameter(array_values($attributes));

      }catch(PDOException $ex){
        echo 'error: ', $ex;
        return false;
       }
      return true;
    }else {
      return $this->message;
    }


  }

  public function update($id) {
    $setOfAttributePairs = $this->setAttributePairs($this->offerings);
    $parameter = $this->genParameter($setOfAttributePairs);
    $attributes = $this->setAttributes($this->offerings);
    array_push($attributes,$id);
    $DB = new databaseController();
    try{
      $query = "Update $this->offerings ";
      $query .= "SET ".join(', ', $setOfAttributePairs);
      $query .= " WHERE offer_id=?";
      $DB->setQuery($query);
      $DB->bindParameter(array_values($attributes));
  }catch(PDOException $exception){
    echo 'ERROR: ' .$exception->getMessage();
    return false;
  }
    return true;
}

public function delete($id){
  try {
    $DB = new DatabaseController();

    $id = array($id);
    //Delete All Schedule in Offerings
    $DB->setQuery("DELETE FROM $this->schedule WHERE offer_id = ?");
    $DB->bindParameter($id);
    //Delete Offeings
    $DB->setQuery("DELETE FROM $this->offerings WHERE offer_id = ?");
    $DB->bindParameter($id);

  } catch (PDOException $exception) {
    echo 'ERROR: ' .$exception->getMessage();
    return false;
  }
  return true;
}


}
