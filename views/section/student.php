<?php
include_once('../includes/databaseController.php');
  $db = new DatabaseController();
  $selectedID = $_POST['selectedID'];
  $data = array();
  $db->loadResult("SELECT section, concat(strands.strand_desc, ' ( ', strands.strand, ' )')as strand, offerings_2018_1.grade_level,
                  concat(teacher.last_name, ', ', teacher.first_name, ' ', teacher.middle_name) as adviser FROM section
                  inner JOIN offerings_2018_1 on offerings_2018_1.section_id = section.section_id
                  inner JOIN strands on offerings_2018_1.strand_id = strands.strand_id
                  inner JOIN teacher on offerings_2018_1.adviser = teacher.teacher_id
                  WHERE section.section_id = $selectedID");

  foreach ($db->getResult() as $value) {
    $data['strand'] = $value['strand'];
    $data['level'] = $value['grade_level'];
    $data['adviser'] = $value['adviser'];
    $data['section'] = $value['section'];
  }

  echo json_encode($data);
