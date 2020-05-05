<?php
session_start();
include_once('../../classes/tableSelectDataSource.inc.php');

$selectedID = $_GET['selectedID'];

$enrollment = "enrollment_{$_GET['AY']}_{$_GET['semester']}";
$grades     = "grades_{$_GET['AY']}_{$_GET['semester']}";
$schedule   = "schedule_{$_GET['AY']}_{$_GET['semester']}";
$source = new sourceTable();

$columns = array(
  array('db' => 'grade_id', 'dt' => 'DT_RowId',
          'formatter' => function($d,$row){
              return $d;
            }
        ),
  array('db' => 'ion', 'dt' => 'ion'),
  array('db' => 'subject_name', 'dt' => 'subject'),
  array('db' => 'first_quarter', 'dt' => 'first_quarter'),
  array('db' => 'second_quarter', 'dt' => 'second_quarter'),
  array('db' => 'final', 'dt' => 'final'),
  array('db' => 'remark', 'dt' => 'remark')
  );

$qry = "SELECT grade_id, ions.ion, subjects.subject_name, first_quarter, second_quarter, final, remark, $enrollment.enrollment_id FROM $grades
        LEFT JOIN $enrollment on $grades.enrollment_id = $enrollment.enrollment_id
        LEFT JOIN $schedule on $grades.schedule_id = $schedule.schedule_id
        LEFT JOIN subjects on $schedule.subject_id = subjects.subject_id
        LEFT JOIN ions on subjects.ion_id = ions.ion_id
        WHERE $enrollment.enrollment_id = $selectedID ";
$records = "SELECT * from $grades where enrollment_id = $selectedID";
$search = "subject_name";
$source->get_total_records($records);

echo json_encode($source->getData($columns,$qry,$search));

 ?>
