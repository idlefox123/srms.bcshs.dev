<?php
/**
 *
 */
class Teacher extends DatabaseController
{
  public function getTeacher() {
    $this->loadResult("SELECT teacher_id, concat(last_name, ', ', first_name, ' ', middle_name)as teacher FROM `teacher`");
    $teacher = $this->getResult();
    return $teacher;
  }


}
