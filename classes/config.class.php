<?php
/**
 *
 */
class Configuration
{
  public $path;
  function __construct($path)
  {
    $this->path = $this->removeSlash($path);
  }

  function __toString() {
    return $this->path;
  }

  private function removeSlash($string) {
    if ($string[strlen($string) - 1] == '/')
      $string = rtrim($string, '/');

    return $string;
  }

  public function segment($segment) {
    $url = str_replace($this->path, '', $_SERVER['REQUEST_URI']);
    $url = explode('/', $url);

    if (isset($url[$segment]))
      return $url[$segment];
    else
      return false;

  }

  public function rootPath() {
    $root_path = $_SERVER['REQUEST_URI'];
    return $root_path;
  }
}
