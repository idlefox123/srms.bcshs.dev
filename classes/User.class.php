<?php
include_once('databaseController.php');
include_once('Validation.class.php');
include_once('Message.class.php');
/**
 *
 */
class User
{
  protected $users = "users";
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

  public function getUser($id) {
    $DB = new DatabaseController();
    $DB->setQuery("SELECT `user`, `username`, `role` from users where user_id = $id");
    $user = $DB->getRes();

    return $user;
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
    $attributes = $this->setAttributes($this->users);
    $attributes = $this->validation($this->getTableFields($this->users), $attributes);

    if ($this->status == true) {
      $parameter = $this->genParameter($attributes);
      try{
        $DB = new DatabaseController();
        $query = "INSERT INTO $this->users ";
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

  public function update() {
    if (property_exists($this, 'password')) {
      $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    }
    $setOfAttributePairs = $this->setAttributePairs($this->users);
    $parameter = $this->genParameter($setOfAttributePairs);
    $attributes = $this->setAttributes($this->users);
    array_push($attributes,$this->id);

    try {
      $db = new databaseController();
      $query = "Update $this->users ";
      $query .= "SET ".join(', ', $setOfAttributePairs);
      $query .= " WHERE user_id=?";
      $db->setQuery($query);
      $db->bindParameter(array_values($attributes));
    }catch(PDOException $ex){
      echo 'ERROR: ' .$ex->getMessage();
      return false;
    }
    return true;
  }


  public function delete() {
    try {
      $db = new databaseController();
      $id = array($this->id);
      $db->setQuery("DELETE FROM $this->users WHERE `user_id` = ?");
      $db->bindParameter($id);
    } catch (PDOException $e) {
      echo 'ERROR: ' .$exception->getMessage();
      return false;
    }
    return true;
  }

}
