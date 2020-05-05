<?php
include_once('Message.class.php');
/**
 *
 */
class Validation
{
  private $msg;
  private $validated;
  private $fields;
  private $dbFields;
  private $validateFields = [];

  function __construct($fields,$post_data)
  {
    $this->fields = $post_data;
    $this->dbFields = $fields;
  }


  public function validate() {
    /*foreach ($this->dbFields as $field) {
      if(!array_key_exists($field, $this->fields)){
        $this->message("$field does not exist.", "danger");
        return $this->msg;
      }else {
        $this->validateField[$field] = $this->fields[$field];
      }
    }*/

    return $this->fieldsToValidate($this->fields);
    //return $this->msg;
  }


  private function fieldsToValidate($fields) {
    foreach ($fields as $field => $value) {
      if (empty($value)) {
        $this->message("All Fields Required.", "danger");
        $this->validated = false;
        return;
      }

      $this->validateFields[$field] = filter_var($value, FILTER_SANITIZE_STRING);
      $this->validateFields[$field] = trim($value);

    }
    $this->validated = true;

    return $this->validateFields;
  }

  public function status() {
    $status = $this->validated;
    return $status;
  }



  public function message($msg, $msgType) {
    $message = message($msgType, $msg);
    $this->msg = $message;
    return $this->msg;
  }

  public function getMessage() {
    return $this->msg;
  }

}
