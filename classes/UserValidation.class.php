<?php
include_once('Message.class.php');

/**
 *
 */
class Validation
{
  private $data;
  private $messages = [];
  private static $fields = ['username', 'password'];
  function __construct($post_data)
  {
    $this->data = $post_data;
  }

  public function validate() {
    foreach (self::$fields as $field) {
      if(!array_key_exists($field, $this->data)){
        trigger_error("$field does not exist.");
        return;
      }
    }

    $this->validateUsername();
    $this->validatePassword();
    return $this->messages;
  }

  public function getMessage() {
    return true;
  }

  private function validateUsername() {
    $val = trim($this->data['username']);

    if (empty($val)) {
      $this->message('username', message('danger', 'All Fields Required.'));
      $this->getMessage('true');
    }else {
      if(preg_match('/^[a-zA-Z0-9]{6-12}$/', $val)) {
        $this->message('username', 'username must be 6-12 chars & alphanumeric');

      }
    }

  }

  private function validatePassword() {
    $val = trim($this->data['password']);

    if (empty($val)) {
      $this->message('password', 'password cannot be empty.');
    }else {
      if(preg_match('/^[a-zA-Z0-9]{6-12}$/', $val)) {
        $this->message('password', 'password must be 6-12 chars & alphanumeric');
      }
    }

  }

  private function message($key, $val) {
    $this->messages[$key] = $val;
    //return true;
  }

}
