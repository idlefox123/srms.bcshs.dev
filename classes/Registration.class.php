<?php
include_once('DatabaseController.php');
include_once('Validation.class.php');
include_once('Message.class.php');
/**
 *
 */
class Registration extends DatabaseController
{
  protected $users = "users";
  protected $student = "student";
  protected $parents = "parents";
  protected $educationalbackground = "educationalbackground";
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
    $DB->loadResult("SELECT strand_id, strand FROM strands");
    $strand = $DB->getResult();
    return $strand;
  }

  public function getRecord($id) {
    $DB = new DatabaseController();
    $DB->setQuery("SELECT  *, parents.*, educationalbackground.school_name,educationalbackground.school_address FROM `student`
      LEFT JOIN parents on student.student_id = parents.student_id
      LEFT JOIN educationalbackground on student.student_id = educationalbackground.student_id
      WHERE student.student_id = $id");
    $studentRecord = $DB->getRes();
    return $studentRecord;
  }

  public function getStudent($id) {
    $DB = new DatabaseController();
    $DB->setQuery("SELECT concat(last_name, ', ', first_name, ' ', middle_name, ' ', extension_name) as name FROM student");
    $student = $DB->getRes();
    return $student;
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

  private function insertPG($id, $p_data) {
    $DB = new DatabaseController();
    foreach ($p_data as $data) {
      $pg_data = array($data['pgName'], $data['relationship'], $data['pgAddress'], $data['pgContact'], $id);
      $DB->setQuery("INSERT INTO $this->parents (`p_name`, `relationship`, `p_address`, `p_contact`, `student_id`)
                    VALUES (?,?,?,?,?)");
      $DB->bindParameter($pg_data);
    }
  }

  private function insertEduBack($id) {
    $attributes = $this->setAttributes($this->educationalbackground);
    $attributes = array('student_id'=>$id) + $attributes;
    $parameter = $this->genParameter($attributes);
    $DB = new DatabaseController();
    $query = "INSERT INTO $this->educationalbackground ";
    $query .= '('.join(', ', array_keys($attributes)).')';
    $query .= " VALUES (" .$parameter. ")";
    $DB->setQuery($query);
    $DB->bindParameter(array_values($attributes));
  }

  private function createAccount($id) {
    try {
      $student = new User();
      //$student->user     = $this->getStudent();
      echo $this->getStudent($id);;
      /*$student->username = '';
      $student->password = '123';
      $student->role     = 'Student';

      $student->create();

      $user_id = $student->getLastInsertedID();

      $student = new Registration();
      $student->user_id = $user_id;
      $this->updateStudent($id);*/

    } catch(PDOException $ex){
      echo 'error: ', $ex;
      return false;
     }
    return true;

  }

  public function create() {
    $this->createAccount($lastInsertedID);

    /*$attributes = $this->setAttributes($this->student);
    $attributes = $this->validation($this->getTableFields($this->student), $attributes);

    if ($this->status == true) {
      try{
        $parameter = $this->genParameter($attributes);

        $DB = new DatabaseController();
        $query = "INSERT INTO $this->student ";
        $query .= '('.join(', ', array_keys($attributes)).')';
        $query .= " VALUES (" .$parameter. ")";
        $DB->setQuery($query);
        $DB->bindParameter(array_values($attributes));
        $lastInsertedID = $DB->getLastInsertedID();

        $p_data = json_decode($this->data, true);
        if (!empty($p_data)) {
          $this->insertPG($lastInsertedID, $p_data);
        }

        if (!empty($this->school_name) || !empty($this->school_address)) {
          $this->insertEduBack($lastInsertedID);
        }

        $this->createAccount($lastInsertedID);

      }catch(PDOException $ex){
        echo 'error: ', $ex;
        return false;
       }
      return true;
    }else {
      return $this->message;
    }*/

  }

  private function updateStudent($id) {
    $attributes = $this->setAttributes($this->student);
    print_r($attributes);
    /*$setOfAttributePairs = $this->setAttributePairs($this->student);
    $parameter = $this->genParameter($setOfAttributePairs);
    $attributes = $this->setAttributes($this->student);
    array_push($attributes,$id);

    $DB = new DatabaseController();
    $query = "Update $this->student ";
    $query .= "SET ".join(', ', $setOfAttributePairs);
    $query .= " WHERE student_id=?";
    $DB->setQuery($query);
    $DB->bindParameter(array_values($attributes));*/
  }

  private function updateEducBack($id) {
    $setOfAttributePairs = $this->setAttributePairs($this->educationalbackground);
    $parameter = $this->genParameter($setOfAttributePairs);
    $attributes = $this->setAttributes($this->educationalbackground);
    array_push($attributes,$id);

    $DB = new DatabaseController();
    $query = "Update $this->educationalbackground ";
    $query .= "SET ".join(', ', $setOfAttributePairs);
    $query .= " WHERE student_id=?";
    $DB->setQuery($query);
    $DB->bindParameter(array_values($attributes));
  }

  public function update($id) {
    $DB = new DatabaseController();
    try{
      $this->updateStudent($id);
      $DB->loadResult("SELECT student_id FROM $this->educationalbackground WHERE student_id = $id");
      $row = $DB->getRowCount();
      if ($row > 0) {
        $this->updateEducBack($id);
      }else {
        if (!empty($this->school_name) || !empty($this->school_address)) {
          $this->insertEduBack($id);
        }
      }
    }catch(PDOException $exception){
      echo 'ERROR: ' .$exception->getMessage();
      return false;
    }
      return true;
  }

}
