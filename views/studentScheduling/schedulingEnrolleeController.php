<?php
include_once('../../classes/SchedulingEnrollee.class.php');
include_once('../../classes/Message.class.php');

session_start();

if (isset($_POST['action']))
{
    $action = $_POST['action'];

    switch ($action) {
      case 'enroll':
        enroll();
        break;

      case 'enrollSubjects':
      //*****************Adding custom subjects to the enrollee (currently disabled)**************************
        //enrollSubjects();
        break;

      case 'withdrawAll':
        withdrawAll();
        break;

      case 'withdraw':
        withdraw();
        break;

      case 'classEnrolled':
        classEnrolled();
        break;

      default:
        // code...
        break;
    }

}


function enroll(){
  $schedulingEnrollee = new SchedulingEnrollee();
  $schedulingEnrollee->id         = $_POST['selectedEnrolleeID'];
  $schedulingEnrollee->offer_id   = $_POST['selectedOfferingsID'];
  $schedulingEnrollee->subjects   = $_POST['subjects'];

  $enrollSubjects = $schedulingEnrollee->enroll();
  if ($enrollSubjects===true) {
    echo message('success', 'All Class Subjects Successfully Enrolled');
  }else {
    echo message('danger', 'Error on Subject Enrollment');
  }
}

//*****************Adding custom subjects to the enrollee (currently disabled)**************************
/*function enrollSubjects(){
  $schedulingEnrollee = new SchedulingEnrollee();

  $schedulingEnrollee->id       = $_POST['selectedEnrolleeID'];
  $schedulingEnrollee->subjects = $_POST['subjects'];

  $enrollSubjects = $schedulingEnrollee->enrollSubjects();

  if ($enrollSubjects===true) {
    echo "Subjects Successfully Added.";
  }else {
    echo "Error on Adding Subjects";
  }
}*/

function withdrawAll(){
  $schedulingEnrollee = new SchedulingEnrollee();
  $selectedEnrolleeID = $_POST['selectedEnrolleeID'];
  $classEnrolleeID    = $_POST['classEnrolledID'];

  $enrollSubjects = $schedulingEnrollee->withdrawAll($selectedEnrolleeID,$classEnrolleeID);

  if ($enrollSubjects===true) {
    echo message('success', 'All Subjects Successfully Withdraw');
  }else {
    echo message('danger', 'Error on Withdrawing All Subjects');
  }
}

function withdraw(){
  $schedulingEnrollee = new SchedulingEnrollee();

  $schedulingEnrollee->id             = $_POST['selectedEnrolleeID'];
  $schedulingEnrollee->enrolleeScedID = $_POST['selectedEnrolleeSchedule'];
  $enrollSubjects = $schedulingEnrollee->withdraw();

  if ($enrollSubjects===true) {
    echo message('success', 'Subjects Successfully Withdraw');
  }else {
    echo message('danger', 'Error on Withdrawing Subject');
  }
}

function classEnrolled(){
  $schedulingEnrollee = new SchedulingEnrollee();

  $enrolledClass = $schedulingEnrollee->getEnrollee($_POST['selectedStudent']);
  $enrolledClass['classEnrolled'] = $enrolledClass['section'];
  $enrolledClass['classEnrolledID'] = $enrolledClass['offer_id'];
  echo json_encode($enrolledClass);
}
