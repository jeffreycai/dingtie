<?php
include_once MODULESROOT . DS . 'core' . DS . 'includes' . DS . 'classes' . DS . 'DBObject.class.php';

/**
 * DB fields
 * - id
 * - title
 * - email
 * - editpwd
 * - jiaoyixingzhi
 * - chuzufangshi
 * - jiage
 * - huxing
 * - suozaiquyu
 * - fangwudizhi
 * - fangwupeizhi
 * - fujingsheshi
 * - content
 * - outurl1
 * - outurl2
 * - outurl3
 * - outurl4
 * - outurl5
 * - outurl6
 * - outurl7
 * - outurl8
 * - fid
 * - post_id
 */
class BaseStZufang extends DBObject {
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
    $this->table_name = 'st_zufang';
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
   public function setEditpwd($var) {
     $this->setDbFieldEditpwd($var);
   }
   public function getEditpwd() {
     return $this->getDbFieldEditpwd();
   }
   public function setJiaoyixingzhi($var) {
     $this->setDbFieldJiaoyixingzhi($var);
   }
   public function getJiaoyixingzhi() {
     return $this->getDbFieldJiaoyixingzhi();
   }
   public function setChuzufangshi($var) {
     $this->setDbFieldChuzufangshi($var);
   }
   public function getChuzufangshi() {
     return $this->getDbFieldChuzufangshi();
   }
   public function setJiage($var) {
     $this->setDbFieldJiage($var);
   }
   public function getJiage() {
     return $this->getDbFieldJiage();
   }
   public function setHuxing($var) {
     $this->setDbFieldHuxing($var);
   }
   public function getHuxing() {
     return $this->getDbFieldHuxing();
   }
   public function setSuozaiquyu($var) {
     $this->setDbFieldSuozaiquyu($var);
   }
   public function getSuozaiquyu() {
     return $this->getDbFieldSuozaiquyu();
   }
   public function setFangwudizhi($var) {
     $this->setDbFieldFangwudizhi($var);
   }
   public function getFangwudizhi() {
     return $this->getDbFieldFangwudizhi();
   }
   public function setFangwupeizhi($var) {
     $this->setDbFieldFangwupeizhi($var);
   }
   public function getFangwupeizhi() {
     return $this->getDbFieldFangwupeizhi();
   }
   public function setFujingsheshi($var) {
     $this->setDbFieldFujingsheshi($var);
   }
   public function getFujingsheshi() {
     return $this->getDbFieldFujingsheshi();
   }
   public function setContent($var) {
     $this->setDbFieldContent($var);
   }
   public function getContent() {
     return $this->getDbFieldContent();
   }
   public function setOuturl1($var) {
     $this->setDbFieldOuturl1($var);
   }
   public function getOuturl1() {
     return $this->getDbFieldOuturl1();
   }
   public function setOuturl2($var) {
     $this->setDbFieldOuturl2($var);
   }
   public function getOuturl2() {
     return $this->getDbFieldOuturl2();
   }
   public function setOuturl3($var) {
     $this->setDbFieldOuturl3($var);
   }
   public function getOuturl3() {
     return $this->getDbFieldOuturl3();
   }
   public function setOuturl4($var) {
     $this->setDbFieldOuturl4($var);
   }
   public function getOuturl4() {
     return $this->getDbFieldOuturl4();
   }
   public function setOuturl5($var) {
     $this->setDbFieldOuturl5($var);
   }
   public function getOuturl5() {
     return $this->getDbFieldOuturl5();
   }
   public function setOuturl6($var) {
     $this->setDbFieldOuturl6($var);
   }
   public function getOuturl6() {
     return $this->getDbFieldOuturl6();
   }
   public function setOuturl7($var) {
     $this->setDbFieldOuturl7($var);
   }
   public function getOuturl7() {
     return $this->getDbFieldOuturl7();
   }
   public function setOuturl8($var) {
     $this->setDbFieldOuturl8($var);
   }
   public function getOuturl8() {
     return $this->getDbFieldOuturl8();
   }
   public function setFid($var) {
     $this->setDbFieldFid($var);
   }
   public function getFid() {
     return $this->getDbFieldFid();
   }
   public function setPostId($var) {
     $this->setDbFieldPost_id($var);
   }
   public function getPostId() {
     return $this->getDbFieldPost_id();
   }

  
  
  /**
   * self functions
   */
  static function dropTable() {
    return parent::dropTableByName('st_zufang');
  }
  
  static function tableExist() {
    return parent::tableExistByName('st_zufang');
  }
  
  static function createTableIfNotExist() {
    global $mysqli;

    if (!self::tableExist()) {
      return $mysqli->query('
CREATE TABLE IF NOT EXISTS `st_zufang` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(512) ,
  `email` VARCHAR(50) ,
  `editpwd` VARCHAR(20) ,
  `jiaoyixingzhi` VARCHAR(6) ,
  `chuzufangshi` VARCHAR(6) ,
  `jiage` VARCHAR(6) ,
  `huxing` VARCHAR(10) ,
  `suozaiquyu` VARCHAR(20) ,
  `fangwudizhi` VARCHAR(128) ,
  `fangwupeizhi` VARCHAR(128) ,
  `fujingsheshi` VARCHAR(128) ,
  `content` TEXT ,
  `outurl1` VARCHAR(512) ,
  `outurl2` VARCHAR(512) ,
  `outurl3` VARCHAR(512) ,
  `outurl4` VARCHAR(512) ,
  `outurl5` VARCHAR(512) ,
  `outurl6` VARCHAR(512) ,
  `outurl7` VARCHAR(512) ,
  `outurl8` VARCHAR(512) ,
  `fid` INT ,
  `post_id` INT ,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;
      ');
    }
    
    return true;
  }
  
  static function findById($id, $instance = 'StZufang') {
    global $mysqli;
    $query = 'SELECT * FROM st_zufang WHERE id=' . $id;
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
    $query = "SELECT * FROM st_zufang";
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new StZufang();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function findAllWithPage($page, $entries_per_page) {
    global $mysqli;
    $query = "SELECT * FROM st_zufang LIMIT " . ($page - 1) * $entries_per_page . ", " . $entries_per_page;
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new StZufang();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function countAll() {
    global $mysqli;
    $query = "SELECT COUNT(*) as 'count' FROM st_zufang";
    if ($result = $mysqli->query($query)) {
      return $result->fetch_object()->count;
    }
  }
  
  static function truncate() {
    global $mysqli;
    $query = "TRUNCATE TABLE st_zufang";
    return $mysqli->query($query);
  }
}