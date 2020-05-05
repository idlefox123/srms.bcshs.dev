<?php
include_once('DatabaseController.php');
include_once('Defaults.class.php');
/**
 *
 */
class ClassSchedule extends DatabaseController
{
  protected $teacher = "teacher";
  protected $offerings;

  function __construct() {
    $this->offerings  = "offerings_{$this->getAY()}_{$this->getSemesterID()}";
  }

  public function getAllAY() {
    $def = new Defaults();
    $AY = $def->allAY();
    return $AY;
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
    $DB->setQuery("SELECT teacher_id, first_name, last_name, middle_name, extension_name, teacher.dept_id, concat(last_name, ', ', first_name, ' ', middle_name) as name,
                    contact, address, position, department.dept_name FROM teacher
                    INNER join department on teacher.dept_id = department.dept_id
                    WHERE user_id = $id");
    $user = $DB->getRes();
    return $user;
  }

  public function getClass($id){
    $DB = new DatabaseController();
    $DB->setQuery("SELECT section.section, enrolled, grade_level, adviser,
            concat(teacher.last_name, ', ', teacher.first_name,' ', teacher.middle_name) as adviser,
            concat(strands.strand_desc, '( ',strands.strand,' )') as strand
            FROM $this->offerings
            INNER JOIN section on $this->offerings.section_id = section.section_id
            INNER JOIN strands on $this->offerings.strand_id = strands.strand_id
            INNER JOIN teacher on $this->offerings.adviser = teacher.teacher_id
            WHERE adviser = $id");
    $class = $DB->getRes();
    return $class;
  }





}
