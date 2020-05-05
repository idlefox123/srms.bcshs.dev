<?php
include_once('classes/Section.class.php');

class SectionView extends Section
{
  public function AY(){
    return $this->getAY();
  }

  public function semester(){
    return $this->getSemester();
  }

}
