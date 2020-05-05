<?php
  include_once('includes/classAutoLoader.inc.php');

  $page = new Pages();
  if (!$url->segment(1)) {
    $content = $page->getAdminContent('Home');
  }else {
    $content = $page->getAdminContent($url->segment(1));
  }

 ?>
