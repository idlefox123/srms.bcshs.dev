
<nav id="sidebar">
  <div class="sidebar-profile">
    <div class="">
      <h1> <i class="fa fa-user-circle"></i> </h1>
    </div>
    <div class="">
      <?php echo $_SESSION['user'] ?>
    </div>
    <span>Logged as : | <span ><?php echo $_SESSION['role'] ?></span></span>
  </div>
  <ul class="list-unstyled components">

    <li class="">
      <a href="/srms.bcshs.dev/Home" ><i id="sidebarIcon" class="fa fa-home"></i>Home</a>
    </li>
    <li>
      <a href="#enrollmentSubmenu" data-toggle="collapse" aria-expanded="false" class=""><i id="sidebarIcon" class="fa fa-book"></i>Enrollment<i id="navIcon" class="fa fa-caret-down"></i></a>
      <ul class="collapse list-unstyled" id="enrollmentSubmenu">
        <li>
          <a href="/srms.bcshs.dev/Registration"><i class="fa fa-pen-square"></i> Registration</a>
        </li>
        <li>
          <a href="/srms.bcshs.dev/Certificate-of-Registration"><i class="fa fa-print"></i> Printing of COR</a>
        </li>
      </ul>
    </li>
    <li class="">
      <a style="" href="#gradeSubmenu" data-toggle="collapse" aria-expanded="false" class=""><i id="sidebarIcon" class="fa fa-table"></i> Grade Management<i id="navIcon" class="fa fa-caret-down"></i></a>
      <ul class="collapse list-unstyled" id="gradeSubmenu">
        <li>
          <a href="/srms.bcshs.dev/Grading"><i class="fa fa-table"></i> Grading</a>
        </li>
        <li>
          <a href="/srms.bcshs.dev/Generate-Grades"><i class="fa fa-print"></i> Print Grades</a>
        </li>
      </ul>
    </li>
    <li class="">
    <a style="" href="#schedulingSubmenu" data-toggle="collapse" aria-expanded="false" class=""><i id="sidebarIcon" class="fa fa-list"></i> Scheduling<i id="navIcon"class="fa fa-caret-down"></i></a>
    <ul class="collapse list-unstyled" id="schedulingSubmenu">
      <li>
        <a href="/srms.bcshs.dev/Class-Offerings"><i class="fa fa-calendar-alt"></i> Class Scheduling</a>
      </li>
      <li>
        <a href="/srms.bcshs.dev/Curriculum"><i class="fa fa-pen-square"></i> Curriculum</a>
      </li>
      <li>
        <a href="/srms.bcshs.dev/Department"><i class="fa fa-pen-square"></i> Department</a>
      </li>
      <li>
        <a href="/srms.bcshs.dev/Subject"><i class="fa fa-pen-square"></i> Subject</a>
      </li>
      <li>
        <a href="/srms.bcshs.dev/Room"><i class="fa fa-pen-square"></i> Room</a>
      </li>
      <li>
        <a href="/srms.bcshs.dev/Section"><i class="fa fa-pen-square"></i> Section</a>
      </li>
      <li>
        <a href="/srms.bcshs.dev/Faculty"><i class="fa fa-pen-square"></i> Faculty</a>
      </li>
    </ul>
  </li>
  <li>
    <a href="#generationOfReportsSubmenu" data-toggle="collapse" aria-expanded="false" class=""><i id="sidebarIcon" class="fa fa-print"></i>Generation of Reports<i id="navIcon" class="fa fa-caret-down"></i></a>
    <ul class="collapse list-unstyled" id="generationOfReportsSubmenu">
      <li>
        <a href="/srms.bcshs.dev/Master-List"><i class="fa fa-print"></i> Master List</a>
      </li>
      <li>
        <a href="/srms.bcshs.dev/Class-Roaster"><i class="fa fa-print"></i> Class Roaster</a>
      </li>
      <li>
        <a href="/srms.bcshs.dev/Class-Schedules"><i class="fa fa-print"></i> Class Schedules</a>
      </li>
      <!--<li>
        <a href="/srms.bcshs.dev/Form-137"><i class="fa fa-print"></i> Form - 137</a>
      </li>-->
      <li>
        <a href="/srms.bcshs.dev/Generate-Grades"><i class="fa fa-print"></i> Grades</a>
      </li>
      <li>
        <a href="/srms.bcshs.dev/Certificate-of-Registration"><i class="fa fa-print"></i> COR</a>
      </li>
      <li>
        <a href="/srms.bcshs.dev/Student-Inquiry"><i class="fa fa-print"></i> Student Inquiry</a>
      </li>
    </ul>
  </li>
  <li>
    <a href="/srms.bcshs.dev/Set-Defaults" ><i id="sidebarIcon" class="fa fa-calendar-alt"></i>Set Defaults</a>
  </li>
  <li>
      <a href="/srms.bcshs.dev/Manage-Users"><i id="sidebarIcon" style =""class="fa fa-user-cog"> </i>Manage User</a>
  </li>
  </ul>

  <div class="navFooter">

  </div>
</nav>
