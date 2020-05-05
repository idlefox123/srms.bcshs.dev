<?php


  function message($messageType, $message) {
    $message = "<div class='alert alert-$messageType position-absolute text-center' style='width:100%;'>
                    $message
                  </div>";
    return $message;
  }
