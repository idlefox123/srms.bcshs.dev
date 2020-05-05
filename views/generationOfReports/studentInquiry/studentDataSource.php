<?php
session_start();
include_once('../../../classes/tableDataSource.inc.php');

$source = new sourceTable();
$schlYear = $_GET['AY'];
$semester = $_GET['semester'];
$section  = $_GET['section'];
$strand   = $_GET['strand'];
$level    = $_GET['level'];
$columns = array(
  array('db' => 'enrollment_id', 'dt' => 'DT_RowId',
          'formatter' => function($d,$row){
              return $d;
            }
        ),
  array('db' => 'lrn', 'dt' => 'id'),
  array('db' => 'student', 'dt' => 'student'),

  );
  if (isset($_GET['schlYear']) || isset($_GET['semester'])) {
    $qry = "SELECT enrollment_id, student.student_id, student.lrn, concat(student.`last_name`, ', ', student.`first_name`, ' ', student.`middle_name`) AS `student` FROM enrollment_{$schlYear}_{$semester}
            INNER JOIN `student` on enrollment_{$schlYear}_{$semester}.student_id = student.student_id
            INNER JOIN offerings_{$schlYear}_{$semester} on enrollment_{$schlYear}_{$semester}.offer_id = offerings_{$schlYear}_{$semester}.offer_id";
      if (isset($_GET['section']) || isset($_GET['strand']) || isset($_GET['level'])) {
        if ($section!='' && $strand=='' && $level=='') {
          $qry.= " where offerings_{$schlYear}_{$semester}.section_id = '".$section."'";
        }elseif ($section=='' && $strand!='' && $level=='') {
          $qry.= " where offerings_{$schlYear}_{$semester}.strand_id = '".$level."'";
        }elseif ($section=='' && $_GET['strand']=='' && $_GET['level']!='') {
          $qry.= " where offerings_{$schlYear}_{$semester}.grade_level = '".$level."'";
        }elseif ($section=='' && $strand!='' && $_GET['level']!='') {
          $qry.= " where offerings_{$schlYear}_{$semester}.strand_id = '".$strand."' AND offerings_{$schlYear}_{$semester}.grade_level = '".$level."'";
        }
      }
  }



$records = $qry;
$search = "concat(student.`last_name`, ', ', student.`first_name`, ' ', student.`middle_name`)";
$source->get_total_records($records);

echo json_encode($source->getData($columns,$qry,$search));

 ?>
