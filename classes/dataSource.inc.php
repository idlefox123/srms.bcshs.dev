<?php
 class sourceTable
 {
   public $count;
   function __construct()
   {
     // code...
   }

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
     include_once('databaseConnection.php');
     $db = new Database;
     $db->openConnection();
     $conn = $db->openConnection();
     $statement = $conn->prepare($records);
     $statement->execute();
     $result = $statement->fetchAll();
     $this->count = $statement->rowCount();
     return $this->count;
  }

   function getData($columns,$qry){
     include_once('dbConnection.php');
     $db = new Database2;
     $db->openConnection();
     $conn = $db->openConnection();

     $statement = $conn->prepare($qry);
     $statement->execute();
     $result = $statement->fetchAll();

     $filtered_rows = $statement->rowCount();
     
       $results = ["sEcho" => $_GET['sEcho'],
                 "iTotalRecords" =>  $this->count,
                 "iTotalDisplayRecords" => $this->count,
                 "aaData" => self::data_output($columns,$result)];
                 return $results;

   }

 }
