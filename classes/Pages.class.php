<?php
/**
 *
 */
class Pages
{

  public function getAdminContent($page) {
    switch ($page) {
      case 'Home':
        include 'views/home/index.php';
        break;

      case 'Registration':
        include 'views/studentRegistration/index.php';
        break;

      case 'Certificate-of-Registration':
        include 'views/generationOfReports/COR/index.php';
        break;

      case 'Enrollment':
        include 'views/studentEnrollment/index.php';
        break;

      case 'Grading':
      include 'views/grading/index.php';
        break;

      case 'Scheduling-Enrollee':
        include 'views/studentScheduling/index.php';
        break;

      case 'Class-Offerings':
      include 'views/classOfferings/index.php';
        break;

      case 'Class-Scheduling':
        include 'views/classScheduling/index.php';
        break;

      case 'Default-Class-Offerings':
        include 'views/defClassOfferings/index.php';
        break;

      case 'Curriculum':
        include 'views/curriculum/index.php';
        break;

      case 'bootstrap':
        include 'views/department/bootstrap.php';
        break;

      case 'Subject':
        return include 'views/subject/index.php';
        break;

      case 'Room':
        return include 'views/room/index.php';
        break;

      case 'Section':
        return include 'views/section/index.php';
        break;

      case 'Faculty':
        return include 'views/faculty/index.php';
        break;

      case 'Department':
        return include 'views/department/index.php';
        break;

      case 'Dashboard':
        include 'views/studentInquiry/student.php';
        break;

      case 'Master-List':
      include 'views/generationOfReports/masterList/index.php';
        break;

      case 'Generate-Grades':
        include 'views/generationOfReports/Grades/index.php';
        break;

      case 'Form-137':
        include 'views/generationOfReports/form-137/index.php';
        break;

      case 'Class-Roaster':
      include 'views/generationOfReports/classRoaster/index.php';
        break;

      case 'Class-Schedules':
      include 'views/generationOfReports/classSchedules/index.php';
        break;

      case 'Student-Inquiry':
      include 'views/generationOfReports/studentInquiry/index.php';
        break;

      case 'Set-Defaults':
      include 'views/setDefaults/index.php';
        break;

      case 'Manage-Users':
        include 'views/manageUser/index.php';
        break;

      default:
        include 'views/home/index.php';
        break;
    }
  }

  public function getEncoderContent($page) {
    switch ($page) {
      case 'Registration':
        include 'views/studentRegistration/index.php';
        break;

      case 'Certificate-of-Registration':
        include 'views/generationOfReports/COR/index.php';
        break;

      case 'Enrollment':
        include 'views/studentEnrollment/index.php';
        break;

      case 'Scheduling-Enrollee':
        include 'views/studentScheduling/index.php';
        break;

      default:
        include 'views/studentRegistration/index.php';
        break;
    }
  }

  public function getFacultyContent($page) {
    switch ($page) {
      case 'My-Profile':
        include 'views/facultyProfile/index.php';
        break;

      case 'Grade-Management':
        include 'views/facultyGrading/index.php';
        break;

      case 'Class-Schedules':
        include 'views/facultyClassSchedule/index.php';
        break;

      case 'Class-Roaster':
      include 'views/facultyClassRoaster/index.php';
        break;

      case 'My-Account':
        include 'views/facultyAccount/index.php';
        break;

      default:
        return include 'views/facultyProfile/index.php';
        break;
    }
  }

  public function getStudentContent($page) {
    switch ($page) {
      case 'My-Profile':
        include 'views/student - Profile/index.php';
        break;

      case 'My-Grades':
        include 'views/student - Grades/index.php';
        break;

      case 'My-Class-Schedules':
        include 'views/student - ClassSchedule/index.php';
        break;

      case 'My-Account':
        include 'views/student - Account/index.php';
        break;

      default:
        include 'views/student - Profile/index.php';
        break;
    }
  }
}
