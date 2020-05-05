<?php
include_once('databaseConnection.php');
/**
 *
 */
class ManageRow
{
  public $count;
  public function __construct()
  {
    $db = new Database;
    $db->openConnection();
  }


  function data_output ( $columns, $data)
  {

    $out = array();
    for ( $i=0, $ien=count($data) ; $i<$ien ; $i++ ) {
      $row = array();
      for ( $j=0, $jen=count($columns) ; $j<$jen ; $j++ ) {
        $column = $columns[$j];
        // Is there a formatter?
        if ( isset( $column['formatter'] ) ) {
          $row[ $column['dt'] ] = $column['formatter']( $data[$i][ $column['db'] ], $data[$i] );
        }
        else {
          $row[ $column['dt'] ] = $data[$i][ $columns[$j]['db'] ];
        }
      }
      $out[] = $row;
    }
    return $out;
  }

  function get_total_records($count)
  {
    //include_once('authentication.php');
    include_once('databaseConnection.php');

    $db = new Database;
    $db->openConnection();
    $conn = $db->openConnection();
  	$statement = $conn->prepare($count);
  	$statement->execute();
  	$result = $statement->fetchAll();
  	return $this->count = $statement->rowCount();
  }

  function getData($columns,$qry,$search,$order){
    include_once('dbConnection.php');
    $db = new Database2;
    $db->openConnection();
    $conn = $db->openConnection();

    if(isset($_POST["search"]["value"]))
    {
    	$qry .= 'WHERE '.$search.' LIKE "%'.$_POST["search"]["value"].'%"';
    }
    if($_POST["length"] != -1)
    {
    	$qry .= 'order by ' .$order. 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'] ;
    }

    $statement = $conn->prepare($qry);
    $statement->execute();
    $result = $statement->fetchAll();

    $filtered_rows = $statement->rowCount();


    return $getData = array(
      "draw"            => intval($_POST["draw"]),
      "recordsTotal"    => $filtered_rows,
      "recordsFiltered" => $this->count,
      "data"            => self::data_output($columns,$result)
    );
  }

}

 ?>
