<?php
include_once('DatabaseController.php');
include_once('Defaults.class.php');
include_once('Validation.class.php');
include_once('Message.class.php');
/**
 *
 */

class DefaultClassScheduling
{
  protected $offerings;
  private $validated_attr = array();
  private $message;

  function __construct(){
    $this->schedule = "schedule_def_{$this->getSemesterID()}";
    $this->offerings = "offerings_def_{$this->getSemesterID()}";
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
    $strands = new Strand();
    $strands = $strands->getStrand();
    return $strands;
  }

  public function getSection() {
    $sections = new Sections();
    $sections = $sections->getSection();
    return $sections;
  }

  public function getRooms() {
    $rooms = new Rooms();
    $rooms = $rooms->getRooms();
    return $rooms;
  }

  public function getSubjects() {
    $subjects = new Subjects();
    $subjects = $subjects->getSubjects();
    return $subjects;
  }

  public function getTeacher() {
    $teacher = new Teacher();
    $teacher = $teacher->getTeacher();
    return $teacher;
  }

  public function getSchedule($id) {
    $DB = new DatabaseController();
    $DB->setQuery("SELECT * FROM $this->schedule WHERE schedule_id = $id");
    $schedule = $DB->getRes();
    return $schedule;
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
    $attributes = $this->setAttributes($this->schedule);
    $attributes = $this->validation($this->getTableFields($this->schedule), $attributes);

    if ($this->status == true) {
      $parameter = $this->genParameter($attributes);
      try{
        $DB = new DatabaseController();
        $query = "INSERT INTO $this->schedule ";
        $query .= '('.join(', ', array_keys($attributes)).')';
        $query .= " VALUES (" .$parameter. ")";
        $DB->setQuery($query);
        $DB->bindParameter(array_values($attributes));

      }catch(PDOException $ex){
        //echo 'ERROR: ' .$ex->getMessage();
        return false;
      }
      return true;
    }else {
      return $this->message;
    }
  }


  public function update($id) {
    $setOfAttributePairs = $this->setAttributePairs($this->schedule);
    $parameter = $this->genParameter($setOfAttributePairs);
    $attributes = $this->setAttributes($this->schedule);
    array_push($attributes,$id);
    try {
      $db = new databaseController();
      $query = "Update $this->schedule ";
      $query .= "SET ".join(', ', $setOfAttributePairs);
      $query .= " WHERE schedule_id=?";
      $db->setQuery($query);
      $db->bindParameter(array_values($attributes));
    }catch(PDOException $ex){
      //echo 'ERROR: ' .$ex->getMessage();
      return false;
    }
    return true;
  }

  public function delete($id) {
    try {
      $db = new databaseController();
      $id = array($id);
      $db->setQuery("DELETE FROM $this->schedule WHERE `schedule_id` = ?");
      $db->bindParameter($id);
    } catch (PDOException $ex) {
      //echo 'ERROR: ' .$ex->getMessage();
      return false;
    }
    return true;
  }

}
