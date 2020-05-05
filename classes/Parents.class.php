<?php
include_once('dbConnection.php');
include_once('databaseController.php');
/**
 *
 */
class Parents extends DatabaseController
{
  public function getParents($id) {
    $this->setQuery("SELECT * FROM parents WHERE parent_id = $id ");
    $parents = $this->getRes();
    return $parents;
  }

}
