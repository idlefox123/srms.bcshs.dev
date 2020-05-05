<?php
include_once('DatabaseController.php');
/**
 *
 */
class Defaults
{

  public function sy(){
    $DB = new DatabaseController();
    $DB->setQuery("SELECT schl_year FROM `academicyear` WHERE current = 'yes'");
    $arr = $DB->loadRes();

    foreach ($DB->loadRes() as $value) {
      $sy = $value;
    }
    return $sy;
  }

  public function semesterID(){
    $DB = new DatabaseController();
    $DB->loadResult("SELECT sem_id, semester FROM semester WHERE current = 'yes'");

    foreach ($DB->getResult() as $value) {
      $semesterID = $value['sem_id'];
    }
    return $semesterID;
  }

  public function semester(){
    $DB = new DatabaseController();
    $DB->setQuery("SELECT semester FROM semester WHERE current = 'yes'");

    foreach ($DB->getRes() as $value) {
      $semester = $value;
    }
    return $semester;
  }

  public function allAY(){

    $DB = new DatabaseController();
    $DB->loadResult("SELECT * FROM academicyear");
    $AY = $DB->getResult();

    return $AY;
  }

  public function defaults() {
    $DB = new DatabaseController();
    $DB->setQuery("SELECT semester, schl_year FROM academicyear
                    INNER JOIN semester on academicyear.current = semester.current
                    WHERE academicyear.current = 'yes'");
    $defaults = $DB->getRes();
    return $defaults;
  }

}
$def = new Defaults();
