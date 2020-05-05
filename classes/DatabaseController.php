<?php
include_once('dbConnection.php');
/**
 *
 */
class DatabaseController
{
  private $conn;
  private $query = '';
  public static $result;
  public static $count;


  function __construct()
  {
    $this->openConnection();
  }

  public function openConnection(){
    $db = new Database2();
    $this->conn = $db->openConnection();
    return $db->openConnection();
  }

  public function rollBack(){
    $db = new Database2();
    return $db->rollBack();
  }

  public function setQuery($qry){
    $this->query = $qry;
  }

  public function executeQry(){
    $resList = $this->conn->prepare($this->query);
    return $resList;
  }
  public function executeQuery(){
    $stmt = $this->conn->prepare($this->query);
    $stmt->execute();
  }

  public function bindParameter($data){
    $stmt = $this->conn->prepare($this->query);
    for ($i=1, $ien=count($data); $i <= $ien; $i++) {
      $stmt->bindParam($i, $data[$i-1]);
    }
    $stmt->execute();
  }

  public function getLastInsertedID(){
    $lastInsertedID = $this->conn->lastInsertId();
    return $lastInsertedID;
  }

  /*public function rollBack($id){
    $this->setQuery("DELETE FROM subjects WHERE `subject_id` = ?");
    $this->executeQuery(array($id));

    return true;
  }*/

  public static function getRowCount(){
    return self::$count;
  }

  public function loadResult($query){
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    self::$result = $stmt->fetchAll();
    self::$count = $stmt->rowCount();
    return self::$result;
  }

  public function loadRes(){
    $stmt = $this->executeQry();
    $stmt->execute();
    $resList = $stmt->fetch(PDO::FETCH_ASSOC);

    return $resList;
  }
  public function getRes(){
    $stmt = $this->executeQry();
    $stmt->execute();
    $resList = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resList;
  }

  public function getFieldsOnTable($table) {
    $stmt = $this->conn->prepare("Show COLUMNS from .$table ");
    $stmt->execute();
    self::$result = $stmt->fetchAll();
    self::$count = $stmt->rowCount();
    $attr = array();
    foreach (self::$result as $value) {
      $attr[] = $value['Field'];
    }
    return $attr;
  }

  public static function getResult(){
    return self::$result;
  }

}

?>
