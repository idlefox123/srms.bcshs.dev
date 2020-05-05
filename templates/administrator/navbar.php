<?php
//if ($_SESSION['role']!='Administrator') {
  //header('Location: /myenrollmentsys/login.php');
//}
?>
<div class="">
  <nav class="navbar fixed-top navbar-dark bg-dark navbar">
    <div id="btn-toggle-sidebar" style="">
     <button type="button" id="sidebarCollapse" class="btn">
       <i class="fa fa-align-justify"></i> <span></span>
     </button>
    </div>
    <div id="btn-rightside">
        <div class="btn-group">
         <button id="btn-logout" type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <span><i class="fa fa-power-off"></i></span>
         </button>
         <div class="dropdown-menu dropdown-menu-right" id="">
           <a href="/srms.bcshs.dev/logout.php" class="dropdown-item" id="btn-dropdown-menu-item" type="" name="logout">
             <i id="icon-logout" class="fa fa-power-off"> Log Out</i>
           </a>
         </div>
       </div>
    </div>
  </nav>
</div>
