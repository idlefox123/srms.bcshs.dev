<?php
include_once('databaseController.php');
include_once('Validation.class.php');
include_once('Message.class.php');
/**
 *
 */
class Authentication
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

  public function getAY(){
    $db = new DatabaseController();
    $db->setQuery("SELECT schl_year FROM `academicyear` WHERE `current` = 'yes'");
    $data = $db->getRes();
    return $data;
  }

  public function getSemester(){
    $db = new DatabaseController();
    $db->setQuery("SELECT * FROM semester WHERE `current` = 'yes'");
    $data = $db->getRes();
    return $data;
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

  public function authenticateUser() {
    $attributes = $this->setAttributes($this->users);
    $setOfAttributePairs = $this->setAttributePairs($this->users);
    $attributes = $this->validation($this->getTableFields($this->users), $attributes);

    if ($this->status == true) {
      $DB = new DatabaseController();
      $conn = $DB->openConnection();
      $query = "SELECT * FROM $this->users WHERE username = ?";
      $stmt = $conn->prepare($query);
      $stmt->bindParam(1, $this->username);
      $stmt->execute();
      $res = $stmt->fetchAll();
      $count = $stmt->rowCount();
      $password = $this->password;
      if ($count > 0) {

        foreach ($res as $value) {
          if (password_verify($this->password, $value['password'])) {
            $session['userID']   = $value['user_id'];
            $session['username'] = $value['username'];
            $session['user']     = $value['user'];
            $session['role']     = $value['role'];
            $AY = $this->getAY();
            $session["AY"]	= $AY['schl_year'];
            $semester = $this->getSemester();
            $session["semID"]	    = $semester['sem_id'];
            $session["semester"]	= $semester['semester'];
            $this->setSession($session);
          }
        }
      }
      }else {
        return $this->message;
      }
  }

  public function setSession($data) {
    session_start();
    $_SESSION["userID"] = $data['userID'];
    $_SESSION["username"] = $data['username'];
    $_SESSION["user"]	= $data['user'];
    $_SESSION["role"] = $data['role'];
    $_SESSION["AY"] = $data['AY'];
    $_SESSION["semester"] = $data['semester'];
    $_SESSION["semID"] = $data['semID'];
    header('Location: /srms.bcshs.dev/');
  }
}
