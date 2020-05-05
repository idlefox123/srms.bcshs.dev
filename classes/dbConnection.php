<?php
/**
 *
 */
class Database2
{

  //public function Connection(){

		// connect to database
		/*$conn = new mysqli($servername, $username, $password,$database_name);
		// Check connection
		if ($conn->connect_error) {
		    // die("Connection failed: " . $conn->connect_error);
				echo "database connection failed";
		}
		// return the database connection
		return $conn;
	}
  */
  protected $servername = "localhost";
  protected $username 	= "root";
  protected $password 	= "";
  protected $database_name		= "bcshs_db";

  public static $result;

  public function openConnection() {
        try {
            $this->dbh = new PDO("mysql:host=localhost;dbname=bcshs_db", $this->username, $this->password);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->dbh;
        } catch(Exception $e) {
            $e->getMessage();
        }
    }

    public function closeConnection() {
        try {
            $this->dbh = null;

            return $this->dbh;
        } catch(Exception $e) {
            $e->getMessage();
        }
    }

    /*public static function setQuery($qry){
      $db = new Database2();
      $conn = $db->openConnection();
      $statement = $conn->prepare($qry);
      $statement->execute();
      self::$result = $statement->fetchAll();
      return self::$result;
    }*/

    /* static function getResult(){
      return self::$result;
    }*/


    /*public function getAttribute($table){
      $sql = ("SHOW COLUMNS FROM .$table.");

    }*/

}




 ?>
