<?php
session_start();
include_once('../../../classes/DatabaseController.php');

  $enrollment = "enrollment_{$_POST['ay']}_{$_POST['semester']}";
  $offerings = "offerings_{$_POST['ay']}_{$_POST['semester']}";

  $selectedStudent = $_POST['selectedStudent'];

  $DB = new DatabaseController();
  $DB->setQuery("SELECT concat(teacher.last_name, ', ', teacher.first_name, ' ', teacher.middle_name) as adviser,
                  section.section, $enrollment.grade_level,student.gender,age,bdate,student.contact,home_address,
            	    concat(tracks.track_name, ' / ',strands.strand) as trackStrand, student.lrn,
                  concat(student.last_name, ', ', student.first_name, ' ', student.middle_name) as student FROM $enrollment
                  LEFT JOIN strands on $enrollment.strand_id = strands.strand_id
                  LEFT JOIN tracks on strands.track_id = tracks.track_id
                  LEFT JOIN student on $enrollment.student_id = student.student_id
                  LEFT JOIN $offerings on $enrollment.offer_id = $offerings.offer_id
                  LEFT JOIN teacher on $offerings.adviser = teacher.teacher_id
                  LEFT join section on $offerings.section_id = section.section_id
                  WHERE `enrollment_id` = $selectedStudent");
  $data = $DB->getRes();

  echo json_encode($data);
