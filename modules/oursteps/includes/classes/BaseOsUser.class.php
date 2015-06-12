<?php
include_once MODULESROOT . DS . 'core' . DS . 'includes' . DS . 'classes' . DS . 'DBObject.class.php';

/**
 * DB fields
 * - id
 * - username
 * - password
 * - email
 * - valid
 * - last_used
 * - last_success_cookie_refresh
 * - registered_at
 * - rank
 */
class BaseOsUser extends DBObject {
  /**
   * Implement parent abstract functions
   */
  protected function setPrimaryKeyName() {
    $this->primary_key = array(
      'id'
    );
  }
  protected function setPrimaryKeyAutoIncreased() {
    $this->pk_auto_increased = TRUE;
  }
  protected function setTableName() {
    $this->table_name = 'os_user';
  }
  
  /**
   * Setters and getters
   */
   public function setId($var) {
     $this->setDbFieldId($var);
   }
   public function getId() {
     return $this->getDbFieldId();
   }
   public function setUsername($var) {
     $this->setDbFieldUsername($var);
   }
   public function getUsername() {
     return $this->getDbFieldUsername();
   }
   public function setPassword($var) {
     $this->setDbFieldPassword($var);
   }
   public function getPassword() {
     return $this->getDbFieldPassword();
   }
   public function setEmail($var) {
     $this->setDbFieldEmail($var);
   }
   public function getEmail() {
     return $this->getDbFieldEmail();
   }
   public function setValid($var) {
     $this->setDbFieldValid($var);
   }
   public function getValid() {
     return $this->getDbFieldValid();
   }
   public function setLastUsed($var) {
     $this->setDbFieldLast_used($var);
   }
   public function getLastUsed() {
     return $this->getDbFieldLast_used();
   }
   public function setLastSuccessCookieRefresh($var) {
     $this->setDbFieldLast_success_cookie_refresh($var);
   }
   public function getLastSuccessCookieRefresh() {
     return $this->getDbFieldLast_success_cookie_refresh();
   }
   public function setRegisteredAt($var) {
     $this->setDbFieldRegistered_at($var);
   }
   public function getRegisteredAt() {
     return $this->getDbFieldRegistered_at();
   }
   public function setRank($var) {
     $this->setDbFieldRank($var);
   }
   public function getRank() {
     return $this->getDbFieldRank();
   }

  
  
  /**
   * self functions
   */
  static function dropTable() {
    return parent::dropTableByName('os_user');
  }
  
  static function tableExist() {
    return parent::tableExistByName('os_user');
  }
  
  static function createTableIfNotExist() {
    global $mysqli;

    if (!self::tableExist()) {
      return $mysqli->query('
CREATE TABLE IF NOT EXISTS `os_user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(25) ,
  `password` VARCHAR(16) ,
  `email` VARCHAR(128) NOT NULL ,
  `valid` TINYINT(1) ,
  `last_used` INT ,
  `last_success_cookie_refresh` INT ,
  `registered_at` INT ,
  `rank` VARCHAR(4) DEFAULT 0 ,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;
      ');
    }
    
    return true;
  }
  
  static function findById($id, $instance = 'OsUser') {
    global $mysqli;
    $query = 'SELECT * FROM os_user WHERE id=' . $id;
    $result = $mysqli->query($query);
    if ($result && $b = $result->fetch_object()) {
      $obj = new $instance();
      DBObject::importQueryResultToDbObject($b, $obj);
      return $obj;
    }
    return null;
  }
  
  static function findAll() {
    global $mysqli;
    $query = "SELECT * FROM os_user";
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new OsUser();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function findAllWithPage($page, $entries_per_page) {
    global $mysqli;
    $query = "SELECT * FROM os_user LIMIT " . ($page - 1) * $entries_per_page . ", " . $entries_per_page;
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new OsUser();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function countAll() {
    global $mysqli;
    $query = "SELECT COUNT(*) as 'count' FROM os_user";
    if ($result = $mysqli->query($query)) {
      return $result->fetch_object()->count;
    }
  }
  
  static function truncate() {
    global $mysqli;
    $query = "TRUNCATE TABLE os_user";
    return $mysqli->query($query);
  }
}