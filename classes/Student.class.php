<?php
/**
 *
 */
class Student extends DatabaseController
{
  public function getStudent($id) {
    $this->setQuery("SELECT student_id, concat(last_name, ', ', first_name, ' ', middle_name, ' ', extension_name) as student,
                      lrn, student.strand_id, grade_level, status, strands.strand, strands.strand_desc
                      FROM student INNER JOIN strands on student.strand_id = strands.strand_id
                      WHERE student_id = $id ");
    $student = $this->getRes();
    return $student;
  }

  public function getEnrollee($id) {
    $this->setQuery("SELECT enrollment_id, student_id, enrollment_{$_SESSION['AY']}_{$_SESSION['semID']}.offer_id,enrollment_{$_SESSION['AY']}_{$_SESSION['semID']}.grade_level, strands.strand, strands.strand_desc, section.section
                    FROM enrollment_{$_SESSION['AY']}_{$_SESSION['semID']}
                    LEFT JOIN offerings_{$_SESSION['AY']}_{$_SESSION['semID']} on enrollment_{$_SESSION['AY']}_{$_SESSION['semID']}.offer_id = offerings_{$_SESSION['AY']}_{$_SESSION['semID']}.offer_id
                    LEFT JOIN strands on enrollment_{$_SESSION['AY']}_{$_SESSION['semID']}.strand_id = strands.strand_id
                    LEFT JOIN section on offerings_{$_SESSION['AY']}_{$_SESSION['semID']}.section_id = section.section_id
                    WHERE student_id = $id ");
    $enrollee = $this->getRes();
    return $enrollee;
  }

  public function getNumOfEnrollee($id) {
    $this->setQuery("SELECT enrolled from offerings_{$_SESSION['AY']}_{$_SESSION['semID']} WHERE offer_id = $id");
    $numOfEnrollee = $this->getRes();
    $numOfEnrollee = $numOfEnrollee['enrolled'];
    return $numOfEnrollee;
  }

}
