<?php
/**
 *
 */
class Subjects extends DatabaseController
{
  public function getSubjects() {
    $this->loadResult("SELECT * FROM `subjects`");
    $subjects = $this->getResult();
    return $subjects;
  }


}
 ?>
