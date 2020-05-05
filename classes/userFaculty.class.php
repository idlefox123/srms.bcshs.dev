<?php
include_once('databaseController.php');

class UserFaculty
{
  protected $faculty = 'teacher';
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

  public function getClassSchedule($id){
    $db = new DatabaseController();
    $db->setQuery("SELECT offer_id FROM offerings_{$_SESSION['schl_year']}_{$_SESSION['sem_id']} WHERE adviser = $id");
    $data = $db->getRes();
    $classID = $data['offer_id'];
    return $classID;
  }

  public function getUser($id){
    $db = new DatabaseController();
    $db->setQuery("SELECT teacher_id FROM teacher WHERE user_id = $id");
    $data = $db->getRes();
    $userID = $data['teacher_id'];
    return $userID;
  }

  public function update($id) {
    $setOfAttributePairs = $this->setAttributePairs($this->faculty);
    $parameter = $this->genParameter($setOfAttributePairs);
    $attributes = $this->setAttributes($this->faculty);
    array_push($attributes,$id);

    try {
      $db = new DatabaseController();
      $query = "Update $this->faculty ";
      $query .= "SET ".join(', ', $setOfAttributePairs);
      $query .= " WHERE teacher_id=?";
      $db->setQuery($query);
      $db->bindParameter(array_values($attributes));
    }catch(PDOException $ex){
      echo 'ERROR: ' .$ex->getMessage();
      return false;
    }
    return true;
  }

}
