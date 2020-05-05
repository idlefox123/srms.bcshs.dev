<?php
include_once('DatabaseController.php');
include_once('Student.class.php');
include_once('Defaults.class.php');

class SchedulingEnrollee extends DatabaseController
{
  protected $enrollment;
  protected $class;
  protected $grades;
  protected $offerings;

  function __construct() {
    $this->enrollment = "enrollment_{$this->getAY()}_{$this->getSemesterID()}";
    $this->class      = "class_{$this->getAY()}_{$this->getSemesterID()}";
    $this->grades     = "grades_{$this->getAY()}_{$this->getSemesterID()}";
    $this->offerings  = "offerings_{$this->getAY()}_{$this->getSemesterID()}";
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

  public function getSection() {
    $section = new Sections();
    $section = $section->getSection();
    return $section;
  }

  public function getStudent($id) {
    $student = new Student();
    $student = $student->getStudent($id);
    return $student;
  }

  public function getEnrollee($id) {
    $enrollee = new Student();
    $enrollee = $enrollee->getEnrollee($id);
    return $enrollee;
  }

  public function insertToClass($subjects) { //insert selected schedule to class table
    $DB = new DatabaseController();
    foreach ($subjects as $data) {
      $data = array($this->id, $data['schedule']);
      $DB->setQuery("INSERT INTO $this->class (enrollment_id, schedule_id) VALUES (?, ?)");
      $DB->bindParameter($data);
    }
  }

  public function insertToGrades($subjects) { //insert selected schedule to grades table
    $remark = 'PENDING';
    $DB = new DatabaseController();
    foreach ($subjects as $value) {
      $data = array($this->id, $value['schedule'], $remark);
      $DB->setQuery("INSERT INTO $this->grades (enrollment_id, schedule_id, remark) VALUES (?, ?, ?)");
      $DB->bindParameter($data);
    }
  }

  public function getNumOfEnrollee($classID) { //get the number of enrollee in class
    $DB = new DatabaseController();
    $DB->setQuery("SELECT enrolled from $this->offerings WHERE offer_id = $classID");
    $numOfEnrollee = $DB->getRes();
    $numOfEnrollee = $numOfEnrollee['enrolled'];
    return $numOfEnrollee;
  }

  public function incNumOfEnrollee($classID) { //increment number of enrollee in class
    $DB = new DatabaseController();
    $id = array($classID);
    $numOfEnrollee = $this->getNumOfEnrollee($classID);
    $numOfEnrollee++;
    $DB->setQuery("UPDATE $this->offerings SET `enrolled` = $numOfEnrollee WHERE offer_id = ?");
    $DB->bindParameter($id);
  }

  public function decNumOfEnrollee($classID) { //decrement number of enrollee in class
    $DB = new DatabaseController();
    $id = array($classID);
    $numOfEnrollee = $this->getNumOfEnrollee($classID);
    $numOfEnrollee--;
    $DB->setQuery("UPDATE $this->offerings SET `enrolled` = $numOfEnrollee WHERE offer_id = ?");
    $DB->bindParameter($id);
  }

  private function classEnrolled($enrolleeID) { // check if enrolled
    $DB = new DatabaseController();
    $DB->setQuery("SELECT offer_id from $this->enrollment WHERE enrollment_id = $enrolleeID");
    $class = $DB->getRes();
    $class = $class['offer_id'];
    if ($class==null) {
      return false;
    }
    return true;
  }

  public function enroll() {//check if already enrolled to a class
    $setOfAttributePairs = $this->setAttributePairs($this->enrollment);
    $parameter = $this->genParameter($setOfAttributePairs);
    $attributes = $this->setAttributes($this->enrollment);
    array_push($attributes,$this->id);

    try {
      if (!$this->classEnrolled($this->id)) {//check if not enrolled
        $DB = new DatabaseController();
        $query = "Update $this->enrollment ";
        $query .= "SET ".join(', ', $setOfAttributePairs);
        $query .= " WHERE enrollment_id=?";
        $DB->setQuery($query);
        $DB->bindParameter(array_values($attributes));

        $this->incNumOfEnrollee($this->offer_id); //increment number of enrollee in class

        $subjects = json_decode($this->subjects, true);
        $this->insertToClass($subjects);

        $this->insertToGrades($subjects);
      }else { // if enrolled then
        return false;
      }

    }catch(PDOException $ex){
      echo 'ERROR: ' .$ex->getMessage();
      return false;
    }
    return true;
  }

  //*****************Adding custom subjects to the enrollee (currently disabled)**************************
  /*public function enrollSubjects() {

    try{
    $subjects = json_decode($this->subjects, true);
    $this->insertToClass($subjects);

    $this->insertToGrades($subjects);

  }catch(PDOException $ex){
    echo 'ERROR: ' .$ex->getMessage();
    return false;
  }
  return true;
}*/

  public function withdrawAll($selectedEnrolleeID,$classEnrolleeID) {
    try {

      $DB = new DatabaseController();

      $this->decNumOfEnrollee($classEnrolleeID);

      $id = array($selectedEnrolleeID);
      //Delete All Schedule in Offerings
      $DB->setQuery("DELETE FROM $this->class WHERE enrollment_id = ?");
      $DB->bindParameter($id);
      //Delete Offeings
      $DB->setQuery("DELETE FROM $this->grades WHERE enrollment_id = ?");
      $DB->bindParameter($id);

      $DB->setQuery("UPDATE $this->enrollment SET `offer_id` = null WHERE enrollment_id = ?");
      $DB->bindParameter($id);
    } catch (PDOException $exception) {
      //$conn->rollBack();
      echo 'ERROR: ' .$exception->getMessage();
      return false;
    }
    return true;
  }

  public function withdraw() {
    try {
      $DB = new DatabaseController();

      $ids = array($this->id, $this->enrolleeScedID);
      //Delete Schedule in Offerings
      $DB->setQuery("DELETE FROM $this->class WHERE enrollment_id = ? AND schedule_id = ?");
      $DB->bindParameter($ids);
      //Delete Grades
      $DB->setQuery("DELETE FROM $this->grades WHERE enrollment_id = ? AND schedule_id = ?");
      $DB->bindParameter($ids);

    } catch (PDOException $exception) {
      echo 'ERROR: ' .$exception->getMessage();
      return false;
    }
    return true;
  }
}
