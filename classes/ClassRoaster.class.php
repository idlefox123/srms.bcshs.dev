<?php
include_once('DatabaseController.php');
include_once('Defaults.class.php');
/**
 *
 */
class ClassRoaster
{
  protected $offerings;

  function __construct() {
    $this->offerings  = "offerings_{$this->getAY()}_{$this->getSemesterID()}";
  }

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


  public function getStrand() {
    $strand = new Strand();
    $strand = $strand->getStrand();
    return $strand;
  }

  public function getClass($id) {
    $DB = new DatabaseController();
    $DB->setQuery("SELECT section.section FROM $this->offerings
                    INNER JOIN section on $this->offerings.section_id = section.section_id
                    WHERE offer_id = $id");
    $class = $DB->getRes();
    return $class;
  }





}
