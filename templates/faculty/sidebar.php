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
    <li class="">
      <a style="" href="/srms.bcshs.dev/Grade-Management"><i id="sidebarIcon" class="fa fa-table"></i> Grade Management</i></a>
    </li>
    <li class="">
      <a href="/srms.bcshs.dev/Class-Schedules"><i id="sidebarIcon" class="fa fa-calendar-alt"></i> Class Schedule</a>
    </li>
    <li class="">
      <a href="/srms.bcshs.dev/Class-Roaster"><i id="sidebarIcon" class="fa fa-list"></i> Class Roaster</a>
    </li>
    <li style="">
      <a href="/srms.bcshs.dev/My-Account"><i id="sidebarIcon" style =""class="fa fa-cog"> </i>Account</a>
    </li>
  </ul>
  <div class="navFooter">

  </div>
</nav>
