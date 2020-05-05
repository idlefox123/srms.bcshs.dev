<?php
include_once('databaseConnection.php');
 class sourceTable
 {
   public $count;

   function data_output ( $columns, $data){
     $out = array();
     for ( $i=0, $ien=count($data) ; $i<$ien ; $i++ ) {
       $row = array();
       for ( $j=0, $jen=count($columns) ; $j<$jen ; $j++ ) {
         $column = $columns[$j];

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

  function get_total_records($records){

     $db = new Database;
     $db->openConnection();
     $conn = $db->openConnection();
     $statement = $conn->prepare($records);
     $statement->execute();
     $result = $statement->fetch(PDO::FETCH_ASSOC);
     $this->count = $statement->rowCount();
     return $this->count;
  }

  function getData($columns,$qry,$search){
    include_once('dbConnection.php');
    $db = new Database2;
    $db->openConnection();
    $conn = $db->openConnection();

    try {
      if(isset($_GET["sSearch"]))
      {
       $qry .= ' AND '.$search.' LIKE "%'.$_GET["sSearch"].'%" ';
      }
      if($_GET["iDisplayLength"] != -1)
      {
       $qry .= ' LIMIT ' . $_GET['iDisplayStart'] . ', ' . $_GET['iDisplayLength'];
      }

       $statement = $conn->prepare($qry);
       $statement->execute();
       $result = $statement->fetchAll();

       $filtered_rows = $statement->rowCount();

    } catch (PDOException $ex) {
      $results = ["sEcho" => 1,
                "iTotalRecords" =>  0,
                "iTotalDisplayRecords" => 0,
                "aaData" => []];
                return $results;
    }

       $results = ["sEcho" => $_GET['sEcho'],
                 "iTotalRecords" =>  intval($this->count),
                 "iTotalDisplayRecords" => intval($this->count),
                 "aaData" => self::data_output($columns,$result)];
                 return $results;


   }

 }
