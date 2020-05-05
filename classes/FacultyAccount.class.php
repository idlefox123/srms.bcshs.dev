<?php
include_once('DatabaseController.php');
/**
 *
 */
class Account extends DatabaseController
{
  protected $users = "users";

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

  public function getUser($id) {
    $DB = new DatabaseController();
    $DB->setQuery("SELECT user,username,role FROM `users` WHERE user_id = $id");
    $user = $DB->getRes();
    return $user;
  }

  public function update($id) {
    if (property_exists($this, 'password')) {
      $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    }
    $setOfAttributePairs = $this->setAttributePairs($this->users);
    $parameter = $this->genParameter($setOfAttributePairs);
    $attributes = $this->setAttributes($this->users);
    array_push($attributes,$id);

    try {
      $DB = new DatabaseController();
      $query = "Update $this->users ";
      $query .= "SET ".join(', ', $setOfAttributePairs);
      $query .= " WHERE user_id=?";
      $DB->setQuery($query);
      $DB->bindParameter(array_values($attributes));
    }catch(PDOException $ex){
      echo 'ERROR: ' .$ex->getMessage();
      return false;
    }
    return true;
  }

}
