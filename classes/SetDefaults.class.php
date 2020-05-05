<?php
include_once('DatabaseController.php');
include_once('Defaults.class.php');
include_once('Validation.class.php');
include_once('Message.class.php');
/**
 *
 */
class SetDefaults
{
  protected $AY = "academicyear";
  protected $semesterTable = "semester";
  private $validated_attr = array();
  private $message;

  public function getTableFields($table) {
    $DB = new DatabaseController();
    $attribute = $DB->getFieldsOnTable($table);
    return $attribute;
  }

  public function setAttributes($table) {
    $setAttributes = array();
    foreach ($this->getTableFields($table) as $field) {
      if (property_exists($this, $field)) {
          $setAttributes[$field] = $this->$field;
      }
    }
    return $setAttributes;
  }

  public function setAttributePairs($table) {
    $setOfAttributePairs = array();
    foreach ($this->setAttributes($table) as $key => $value) {
      $setOfAttributePairs[$key] = "{$key}=?";
    }
    return $setOfAttributePairs;
  }

  public function genParameter($attributes) {
    $parameter = '?';
    for ($i=1; $i < count($attributes); $i++) {
      $parameter .= ',?';
    }
    return $parameter;
  }

  public function getAllAY() {
    $def = new Defaults();
    $AY = $def->allAY();
    return $AY;
  }

  public function getAY() {
    $def = new Defaults();
    $AY = $def->sy();
    return $AY;
  }

  public function getSemester() {
    $def = new Defaults();
    $semester = $def->semester();
    return $semester;
  }

  public function getSemesterID() {
    $def = new Defaults();
    $semester = $def->semesterID();
    return $semester;
  }



  private function createOfferingsTables($AY, $semester) {
    try{
      $DB = new DatabaseController();
      $DB->setQuery("CREATE TABLE offerings_{$AY}_{$semester} (
        offer_id int not null AUTO_INCREMENT,
        grade_level enum ('Grade 11','Grade 12') not null,
        section_id int not null,
        strand_id int not null,
        adviser int null,
        max_enrollee int null,
        enrolled int null,
        PRIMARY KEY (offer_id),
        CONSTRAINT fk_section_offerings_{$AY}_{$semester} FOREIGN KEY (section_id)
        REFERENCES section(section_id),
        CONSTRAINT fk_strand_offerings_{$AY}_{$semester} FOREIGN KEY (strand_id)
        REFERENCES strands(strand_id),
        CONSTRAINT fk_adviser_offerings_{$AY}_{$semester} FOREIGN KEY (adviser)
        REFERENCES teacher(teacher_id)
      );
      ");
      $DB->executeQuery();
    }catch(PDOException $ex){
      echo 'ERROR: ' .$ex->getMessage();
      return false;
    }
    return true;
  }

  private function createEnrollmentTable($AY, $semester) {
    try{
      $DB = new DatabaseController();
      $DB->setQuery(
          "CREATE table enrollment_{$AY}_{$semester}(
        	enrollment_id int not null AUTO_INCREMENT,
        	student_id int not null,
        	grade_level enum('Grade 11','Grade 12') not null,
        	strand_id int not null,
        	offer_id int null,
        	PRIMARY KEY (enrollment_id),
        	CONSTRAINT fk_strand_enrollment_{$AY}_{$semester} FOREIGN KEY (strand_id)
        	REFERENCES strands(strand_id),
        	CONSTRAINT fk_offerings_{$AY}_{$semester}_enrollment_{$AY}_{$semester} FOREIGN KEY (offer_id)
        	REFERENCES offerings_{$AY}_{$semester}(offer_id)
        );
      ");
      $DB->executeQuery();
    }catch(PDOException $ex){
      echo 'ERROR: ' .$ex->getMessage();
      return false;
    }
    return true;
  }

  private function createClassTable($AY, $semester) {
    try{
      $DB = new DatabaseController();
      $DB->setQuery(
        "CREATE TABLE class_{$AY}_{$semester} (
        	enrollment_id int not null,
        	schedule_id int not null,
        	status enum('Attending','Not Attending') DEFAULT NULL,
        	CONSTRAINT fk_schedule_{$AY}_{$semester}_class_{$AY}_{$semester} FOREIGN KEY (schedule_id)
          REFERENCES schedule_{$AY}_{$semester}(schedule_id),
        	CONSTRAINT fk_enrollment_{$AY}_{$semester}_class_{$AY}_{$semester} FOREIGN KEY (enrollment_id)
          REFERENCES enrollment_{$AY}_{$semester}(enrollment_id)
        );
      ");
      $DB->executeQuery();
    }catch(PDOException $ex){
      echo 'ERROR: ' .$ex->getMessage();
      return false;
    }
    return true;
  }

  private function createGradesTable($AY, $semester) {
    try{
      $DB = new DatabaseController();
      $DB->setQuery(
        "CREATE TABLE grades_{$AY}_{$semester} (
         grade_id int(11) NOT NULL AUTO_INCREMENT,
         schedule_id int(11) NOT NULL,
         first_quarter float NOT NULL,
         second_quarter float NOT NULL,
         final float NOT NULL,
         remark enum('PENDING','PASSED','FAILED') DEFAULT NULL,
         enrollment_id int(11) NOT NULL,
         PRIMARY key(grade_id),
      	 CONSTRAINT fk_schedule_{$AY}_{$semester}_grades_{$AY}_{$semester} FOREIGN KEY (schedule_id)
         REFERENCES schedule_{$AY}_{$semester}(schedule_id),
      	 CONSTRAINT fk_enrollment_{$AY}_{$semester}_grades_{$AY}_{$semester} FOREIGN KEY (enrollment_id)
         REFERENCES enrollment_{$AY}_{$semester}(enrollment_id)
         );
      ");
      $DB->executeQuery();
    }catch(PDOException $ex){
      echo 'ERROR: ' .$ex->getMessage();
      return false;
    }
    return true;
  }

  private function createScheduleTable($AY, $semester) {
    try{
      $DB = new DatabaseController();
      $DB->setQuery(
        "CREATE TABLE schedule_{$AY}_{$semester} (
        	schedule_id int not null AUTO_INCREMENT,
        	offer_id int not null,
        	subject_id int not null,
        	days varchar(10) not null,
        	time varchar(20) not null,
        	room_id int not null,
        	teacher_id int not null,
        	PRIMARY key (schedule_id),
        	CONSTRAINT fk_subjects_scedule_{$AY}_{$semester} FOREIGN KEY (subject_id)
          REFERENCES subjects(subject_id),
        	CONSTRAINT fk_offerings_{$AY}_{$semester}_schedule_{$AY}_{$semester} FOREIGN KEY (offer_id)
          REFERENCES offerings_{$AY}_{$semester}(offer_id),
        	CONSTRAINT fk_room_schedule_{$AY}_{$semester} FOREIGN KEY (room_id)
          REFERENCES room(room_id),
        	CONSTRAINT fk_teacher_schedule_{$AY}_{$semester} FOREIGN KEY (teacher_id)
          REFERENCES teacher(teacher_id)
        );
      ");
      $DB->executeQuery();
    }catch(PDOException $ex){
      echo 'ERROR: ' .$ex->getMessage();
      return false;
    }
    return true;
  }

  public function getDefaults() {
    $def = new Defaults();
    $defaults = $def->defaults();
    return $defaults;
  }

  public function validation($attributes, $data) {
    $attributes = new Validation($attributes, $data);

    $validated_attr = $attributes->validate();
    $this->status = $attributes->status();

    if ($this->status == true) {
      return $validated_attr;
    }else {
      $this->message = $attributes->getMessage();
      return $this->message;
    }
  }

  public function create() {
    $attributes = $this->setAttributes($this->AY);
    $attributes = $this->validation($this->getTableFields($this->AY), $attributes);

    if ($this->status == true) {
      $parameter = $this->genParameter($attributes);
      try{

        $DB = new DatabaseController();
        $query = "INSERT INTO $this->AY ";
        $query .= '('.join(', ', array_keys($attributes)).')';
        $query .= " VALUES (" .$parameter. ")";
        $DB->setQuery($query);
        $DB->bindParameter(array_values($attributes));

        //Creating Tables
        for ($i=1; $i <= 2; $i++) {
          $this->createOfferingsTables($this->schl_year,$i);
          $this->createEnrollmentTable($this->schl_year,$i);
          $this->createScheduleTable($this->schl_year,$i);
          $this->createClassTable($this->schl_year,$i);
          $this->createGradesTable($this->schl_year,$i);
        }

      }catch(PDOException $ex){
        //echo 'ERROR: ' .$ex->getMessage();
        return false;
      }
      return true;
    }else {
      return $this->message;
    }

  }



  private function resetAY() {
    $attributes = array('current' => 'no');
    $setOfAttributePairs = $this->setAttributePairs($this->AY);
    $parameter = $this->genParameter($setOfAttributePairs);
    array_push($attributes,$this->getAY());

    try {
      $DB = new DatabaseController();
      $query = "Update $this->AY ";
      $query .= "SET ".join(', ', $setOfAttributePairs);
      $query .= " WHERE schl_year=?";
      $DB->setQuery($query);
      $DB->bindParameter(array_values($attributes));
    }catch(PDOException $ex){
      echo 'ERROR: ' .$ex->getMessage();
      return false;
    }
    return true;
  }

  private function resetSemester() {
    $attributes = array('current' => 'no');
    $setOfAttributePairs = $this->setAttributePairs($this->semesterTable);
    $parameter = $this->genParameter($setOfAttributePairs);
    array_push($attributes,$this->getSemesterID());
    try {
      $DB = new DatabaseController();
      $query = "Update $this->semesterTable ";
      $query .= "SET ".join(', ', $setOfAttributePairs);
      $query .= " WHERE sem_id=?";
      $DB->setQuery($query);
      $DB->bindParameter(array_values($attributes));
    }catch(PDOException $ex){
      echo 'ERROR: ' .$ex->getMessage();
      return false;
    }
    return true;
  }

  private function updateAY($AY) {
    $this->resetAY();
    $setOfAttributePairs = $this->setAttributePairs($this->AY);
    $parameter = $this->genParameter($setOfAttributePairs);
    $attributes = $this->setAttributes($this->AY);
    array_push($attributes,$AY);
    try {
      $DB = new DatabaseController();
      $query = "Update $this->AY ";
      $query .= "SET ".join(', ', $setOfAttributePairs);
      $query .= " WHERE schl_year=?";
      $DB->setQuery($query);
      $DB->bindParameter(array_values($attributes));
    }catch(PDOException $ex){
      echo 'ERROR: ' .$ex->getMessage();
      return false;
    }
    return true;
  }

  private function updateSemester($semester) {
    $this->resetSemester();
    $setOfAttributePairs = $this->setAttributePairs($this->semesterTable);
    $parameter = $this->genParameter($setOfAttributePairs);
    $attributes = $this->setAttributes($this->semesterTable);
    array_push($attributes,$semester);

    try {
      $DB = new DatabaseController();
      $query = "Update $this->semesterTable ";
      $query .= "SET ".join(', ', $setOfAttributePairs);
      $query .= " WHERE sem_id=?";
      $DB->setQuery($query);
      $DB->bindParameter(array_values($attributes));
    }catch(PDOException $ex){
      echo 'ERROR: ' .$ex->getMessage();
      return false;
    }
    return true;
  }


  public function update($AY, $semester) {
    try {
      $this->updateAY($AY);
      $this->updateSemester($semester);
    }catch(PDOException $ex){
      echo 'ERROR: ' .$ex->getMessage();
      return false;
    }
    return true;
  }

}
