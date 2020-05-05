<?php
include_once('dbConnection.php');
include_once('databaseController.php');
/**
 *
 */
class Strand extends DatabaseController
{
  public function getStrand() {
    $this->loadResult("SELECT strand_id, strand FROM strands");
    $strand = $this->getResult();
    return $strand;
  }
}
 ?>
