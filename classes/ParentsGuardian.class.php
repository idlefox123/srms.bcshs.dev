<?php
include_once('dbConnection.php');
include_once('databaseController.php');
include_once('Parents.class.php');

//include_once('databaseController.php');
/**
 *
 */
class ParentsGuardian
{
  protected $parents = "parents";

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

  public function getParents($id){
    $parents = new Parents();
    $parents = $parents->getParents($id);
    return $parents;
  }

  public function create() {
    $attributes = $this->setAttributes($this->parents);
    $parameter = $this->genParameter($attributes);

    try{
      $DB = new DatabaseController();
      $query = "INSERT INTO $this->parents ";
      $query .= '('.join(', ', array_keys($attributes)).')';
      $query .= " VALUES (" .$parameter. ")";
      $DB->setQuery($query);
      $DB->bindParameter(array_values($attributes));

    }catch(PDOException $ex){
      echo 'ERROR: ' .$ex->getMessage();
      return false;
    }
    return true;
  }

  public function update($id) {
    $setOfAttributePairs = $this->setAttributePairs($this->parents);
    $parameter = $this->genParameter($setOfAttributePairs);
    $attributes = $this->setAttributes($this->parents);
    array_push($attributes,$id);
    try {
      $DB = new DatabaseController();
      $query = "Update $this->parents ";
      $query .= "SET ".join(', ', $setOfAttributePairs);
      $query .= " WHERE parent_id=?";
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
      $db = new DatabaseController();
      $id = array($id);
      $db->setQuery("DELETE FROM $this->parents WHERE `parent_id` = ?");
      $db->bindParameter($id);
    } catch (PDOException $e) {
      echo 'ERROR: ' .$exception->getMessage();
      return false;
    }
    return true;
  }

}
