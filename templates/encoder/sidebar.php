
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
        <a href="/srms.bcshs.dev/Registration"><i id="sidebarIcon" class="fa fa-pen-square"></i>Registration</a>
    </li>
    <li>
        <a href="/srms.bcshs.dev/Certificate-of-Registration"><i id="sidebarIcon" class="fa fa-print"></i>Printing of COR</a>
    </li>
    <li>
        <a href="/srms.bcshs.dev/My-Account"><i id="sidebarIcon" class="fa fa-user-cog"></i>Account</a>
    </li>
  </ul>

  <div class="navFooter">

  </div>
</nav>
