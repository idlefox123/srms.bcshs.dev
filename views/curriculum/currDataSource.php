<?php
session_start();
include_once('../../classes/tableDataSource.inc.php');

$source = new sourceTable();
$semester = $_GET['semester'];
$strand   = $_GET['strand'];
$level    = $_GET['level'];

$columns = array(
  array('db' => 'curriculum_id', 'dt' => 'DT_RowId',
          'formatter' => function($d,$row){
              return $d;
            }
        ),
  array('db' => 'ion', 'dt' => 'type'),
  array('db' => 'subject_name', 'dt' => 'subjects'),
  array('db' => 'hours', 'dt' => 'hours'),
  array('db' => 'strand', 'dt' => 'strand'),
  );
  $qry = "SELECT curriculum_id, ions.ion, subjects.subject_name, hours, strands.strand FROM curriculum
          INNER JOIN subjects on curriculum.subject_id = subjects.subject_id
          INNER JOIN ions on subjects.ion_id = ions.ion_id
          INNER JOIN strands on curriculum.strand_id = strands.strand_id";


          if ($semester!='' && $strand=='' && $level=='') {
            $qry.= " where semester = '".$semester."'";
          }elseif ($semester=='' && $strand!='' && $level=='') {
            $qry.= " where curriculum.strand_id = '".$strand."'";
          }elseif ($semester=='' && $_GET['strand']=='' && $_GET['level']!='') {
            $qry.= " where grade_level = '".$level."'";
          }elseif ($semester=='' && $strand!='' && $_GET['level']!='') {
            $qry.= " where curriculum.strand_id = '".$strand."' AND grade_level = '".$level."'";
          }elseif ($semester!='' && $strand!='' && $_GET['level']=='') {
            $qry.= " where semester = '".$semester."' AND curriculum.strand_id = '".$strand."'";
          }elseif ($semester!='' && $strand=='' && $_GET['level']!='') {
            $qry.= " where semester = '".$semester."' AND grade_level = '".$level."'";
          }elseif ($semester!='' && $strand!='' && $_GET['level']!='') {
            $qry.= " where semester = '".$semester."' AND curriculum.strand_id = '".$strand."' AND grade_level = '".$level."'";
          }

$records = $qry;
$search = "subject_name";
$source->get_total_records($records);

echo json_encode($source->getData($columns,$qry,$search));

 ?>
