<?php


  function message($messageType, $message) {
    $message = "<div class='alert alert-$messageType position-absolute text-center' style='width:100%;z-index:1'>
                    $message
                  </div>";
    return $message;
  }
