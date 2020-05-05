<?php
session_start();
include_once('../../../classes/databaseController.php');
function getData(){

  $offerings  = "offerings_{$_SESSION['AY']}_{$_SESSION['semID']}";
  $enrollment = "enrollment_{$_SESSION['AY']}_{$_SESSION['semID']}";
  $ctr = 1;
  $DB = new DatabaseController();
  $DB->loadResult("SELECT lrn, concat(last_name, ', ', first_name, ' ', middle_name, ' ', extension_name) as name,
                    concat(tracks.track_name, ' / ',strands.strand) as trackStrand,
                    $enrollment.grade_level, section.section
                    FROM $enrollment
                    INNER JOIN student on $enrollment.student_id = student.student_id
                    INNER JOIN strands on $enrollment.strand_id = strands.strand_id
                    INNER JOIN tracks on strands.track_id = tracks.track_id
                    INNER JOIN $offerings on $enrollment.offer_id = $offerings.offer_id
                    inner JOIN section on $offerings.section_id = section.section_id ORDER BY name ASC");
  $schedule_data = array();
  foreach ($DB->getResult() as $value) {
    $schedule_data[] = array(
      'no'      => $ctr++,
      'lrn'     => $value['lrn'],
      'name'    => $value['name'],
      'trackStrand'  => $value['trackStrand'],
      'level'   => $value['grade_level'],
      'section' =>$value['section']
    );
  }
  echo json_encode($schedule_data);
}
getData();
