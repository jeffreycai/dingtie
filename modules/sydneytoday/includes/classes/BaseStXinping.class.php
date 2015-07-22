<?php
include_once MODULESROOT . DS . 'core' . DS . 'includes' . DS . 'classes' . DS . 'DBObject.class.php';

/**
 * DB fields
 * - id
 * - title
 * - email
 * - mobile
 * - editpwd
 * - jiaoyifangshi
 * - shifousonghuo
 * - chanpingfenlei
 * - jiage
 * - content
 * - images
 * - nid
 */
class BaseStXinping extends DBObject {
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
    $this->table_name = 'st_xinping';
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
   public function setTitle($var) {
     $this->setDbFieldTitle($var);
   }
   public function getTitle() {
     return $this->getDbFieldTitle();
   }
   public function setEmail($var) {
     $this->setDbFieldEmail($var);
   }
   public function getEmail() {
     return $this->getDbFieldEmail();
   }
   public function setMobile($var) {
     $this->setDbFieldMobile($var);
   }
   public function getMobile() {
     return $this->getDbFieldMobile();
   }
   public function setEditpwd($var) {
     $this->setDbFieldEditpwd($var);
   }
   public function getEditpwd() {
     return $this->getDbFieldEditpwd();
   }
   public function setJiaoyifangshi($var) {
     $this->setDbFieldJiaoyifangshi($var);
   }
   public function getJiaoyifangshi() {
     return $this->getDbFieldJiaoyifangshi();
   }
   public function setShifousonghuo($var) {
     $this->setDbFieldShifousonghuo($var);
   }
   public function getShifousonghuo() {
     return $this->getDbFieldShifousonghuo();
   }
   public function setChanpingfenlei($var) {
     $this->setDbFieldChanpingfenlei($var);
   }
   public function getChanpingfenlei() {
     return $this->getDbFieldChanpingfenlei();
   }
   public function setJiage($var) {
     $this->setDbFieldJiage($var);
   }
   public function getJiage() {
     return $this->getDbFieldJiage();
   }
   public function setContent($var) {
     $this->setDbFieldContent($var);
   }
   public function getContent() {
     return $this->getDbFieldContent();
   }
   public function setImages($var) {
     $this->setDbFieldImages($var);
   }
   public function getImages() {
     return $this->getDbFieldImages();
   }
   public function setNid($var) {
     $this->setDbFieldNid($var);
   }
   public function getNid() {
     return $this->getDbFieldNid();
   }

  
  
  /**
   * self functions
   */
  static function dropTable() {
    return parent::dropTableByName('st_xinping');
  }
  
  static function tableExist() {
    return parent::tableExistByName('st_xinping');
  }
  
  static function createTableIfNotExist() {
    global $mysqli;

    if (!self::tableExist()) {
      return $mysqli->query('
CREATE TABLE IF NOT EXISTS `st_xinping` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(512) ,
  `email` VARCHAR(50) ,
  `mobile` VARCHAR(20) ,
  `editpwd` VARCHAR(20) ,
  `jiaoyifangshi` VARCHAR(6) ,
  `shifousonghuo` VARCHAR(6) ,
  `chanpingfenlei` VARCHAR(16) ,
  `jiage` VARCHAR(16) ,
  `content` TEXT ,
  `images` VARCHAR(800) ,
  `nid` INT ,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;
      ');
    }
    
    return true;
  }
  
  static function findById($id, $instance = 'StXinping') {
    global $mysqli;
    $query = 'SELECT * FROM st_xinping WHERE id=' . $id;
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
    $query = "SELECT * FROM st_xinping";
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new StXinping();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function findAllWithPage($page, $entries_per_page) {
    global $mysqli;
    $query = "SELECT * FROM st_xinping LIMIT " . ($page - 1) * $entries_per_page . ", " . $entries_per_page;
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new StXinping();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function countAll() {
    global $mysqli;
    $query = "SELECT COUNT(*) as 'count' FROM st_xinping";
    if ($result = $mysqli->query($query)) {
      return $result->fetch_object()->count;
    }
  }
  
  static function truncate() {
    global $mysqli;
    $query = "TRUNCATE TABLE st_xinping";
    return $mysqli->query($query);
  }
}