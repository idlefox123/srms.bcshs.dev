<style media="screen">


</style>
<nav id="sidebar">
  <div class="sidebar-profile">
    <div class="">
      <h1> <i class="fa fa-user-circle"></i> </h1>
    </div>
    <div class="">
      <?php echo $_SESSION['user']; ?>
    </div>
    <span>Logged as : | <span><?php echo $_SESSION['role'] ?></span></span>
  </div>
  <ul class="list-unstyled components">
    <li>
      <a href="/srms.bcshs.dev/My-Profile"><i id="sidebarIcon" class="fa fa-user-circle"></i>Profile</a>
    </li>
    <li>
      <a style="" href="/srms.bcshs.dev/My-Grades"><i id="sidebarIcon" class="fa fa-table"></i> Grades</i></a>
    </li>
    <li>
      <a href="/srms.bcshs.dev/My-Class-Schedules"><i id="sidebarIcon" class="fa fa-calendar-alt"></i> Class Schedule</a>
    </li>
    <li>
      <a href="/srms.bcshs.dev/My-Account"><i id="sidebarIcon" style =""class="fa fa-user-cog"> </i>Account</a>
    </li>
  </ul>
  <div class="navFooter">

  </div>
</nav>
