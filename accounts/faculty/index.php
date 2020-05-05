<?php
  include_once('includes/classAutoLoader.inc.php');

  $page = new Pages();
  if (!$url->segment(1)) {
    $content = $page->getFacultyContent('My-Profile');
  }else {
    $content = $page->getFacultyContent($url->segment(1));
  }

 ?>
