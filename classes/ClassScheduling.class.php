<?php
include_once('DatabaseController.php');
include_once('Defaults.class.php');

/**
 *
 */

class ClassScheduling
{
  protected $offerings;
  protected $schedule;
  protected $defOffering;

  function __construct(){
    $this->schedule = "schedule_{$this->getAY()}_{$this->getSemesterID()}";
    $this->offerings = "offerings_{$this->getAY()}_{$this->getSemesterID()}";
    $this->defOfferings = "offerings_def_{$this->getSemesterID()}";
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

  public function getDefClassOfferings() {
    $DB = new DatabaseController();
    $DB->loadResult("SELECT offer_id, section.section from $this->defOfferings
                     INNER JOIN section on $this->defOfferings.section_id = section.section_id");
    $classOfferings = $DB->getResult();
    return $classOfferings;
  }

  public function getClassOfferings() {
    $DB = new DatabaseController();
    $DB->loadResult("SELECT offer_id, section.section from $this->offerings
                     INNER JOIN section on $this->offerings.section_id = section.section_id");
    $classOfferings = $DB->getResult();
    return $classOfferings;
  }

  public function getClassOffering($id) {
    $DB = new DatabaseController();
    $DB->setQuery("SELECT * FROM $this->offerings WHERE offer_id = $id");
    $classOffering = $DB->getRes();
    return $classOffering;
  }

  public function getSchedule($id) {
    $DB = new DatabaseController();
    $DB->setQuery("SELECT * FROM $this->schedule WHERE schedule_id = $id");
    $schedule = $DB->getRes();
    return $schedule;
  }

  public function insertSchedule($schedules){
    print_r($schedules);
    $db = new DatabaseController();
    foreach ($schedules as $schedule) {
      $data = array($this->id, $schedule['DT_Subject_Id'], $schedule['days'], $schedule['time'], $schedule['DT_Room_Id'], $schedule['DT_Teacher_Id']);
      $db->setQuery("INSERT INTO $this->schedule (`offer_id`, `subject_id`, `days`, `time`, `room_id`, `teacher_id`)
                    VALUES (?,?,?,?,?,?)");
      $db->bindParameter($data);
    }
  }

  public function create() {
    try{

      $schedules = json_decode($this->schedules, true);
      if (!empty($schedules)) {
        $this->insertSchedule($schedules);
      }

    }catch(PDOException $ex){
      echo 'error: ', $ex;
      return false;
     }
    return true;
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
      echo 'ERROR: ' .$ex->getMessage();
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
      echo 'ERROR: ' .$ex->getMessage();
      return false;
    }
    return true;
  }

}
