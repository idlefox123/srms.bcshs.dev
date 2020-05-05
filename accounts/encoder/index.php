<?php
  include_once('includes/classAutoLoader.inc.php');

  $page = new Pages();
  if (!$url->segment(1)) {
    $content = $page->getEncoderContent('Registration');
  }else {
    $content = $page->getEncoderContent($url->segment(1));
  }

 ?>
