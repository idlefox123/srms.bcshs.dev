<?php
  include_once('includes/classAutoLoader.inc.php');

  $page = new Pages();
  if (!$url->segment(1)) {
    $content = $page->getStudentContent('My-Profile');
  }else {
    $content = $page->getStudentContent($url->segment(1));
  }

 ?>
