<?php
include_once('databaseController.php');
/**
 *
 */
class Sections extends DatabaseController
{
  public function getSection() {
    $this->loadResult("SELECT * FROM section");
    $sections = $this->getResult();
    return $sections;
  }

  public function getClassOfferings() {
    $this->loadResult("SELECT offer_id, section.section from offerings_{$_SESSION['AY']}_{$_SESSION['semID']}
                       INNER JOIN section on offerings_{$_SESSION['AY']}_{$_SESSION['semID']}.section_id = section.section_id");
    $sections = $this->getResult();
    return $sections;
  }
}
 ?>
