<?php
include_once MODULESROOT . DS . 'core' . DS . 'includes' . DS . 'classes' . DS . 'DBObject.class.php';

/**
 * DB fields
 * - id
 * - username
 * - password
 * - created
 * - valid
 * - last_success_cookie_refresh
 * - last_used
 */
class TigtagUser extends DBObject {
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
    $this->table_name = 'tigtag_user';
  }
  
  /**
   * Setters and getters
   */
  public function setId($id) {
    $this->setDbFieldId($id);
  }
  public function getId() {
    return $this->getDbFieldId();
  }
  public function setUsername($u) {
    $this->setDbFieldUsername($u);
  }
  public function getUsername() {
    return $this->getDbFieldUsername();
  }
  public function setPassword($p) {
    $this->setDbFieldPassword($p);
  }
  public function getPassword() {
    return $this->getDbFieldPassword();
  }
  public function setCreated($c) {
    $this->setDbFieldCreated($c);
  }
  public function getCreated($format = false) {
    if ($format) {
      return date($format, $this->getDbFieldCreated());
    }
    return $this->getDbFieldCreated();
  }
  public function setValid($v) {
    $this->setDbFieldValid($v);
  }
  public function getValid() {
    return $this->getDbFieldValid();
  }
  public function setLastSuccessCookieRefresh($l) {
    $this->setDbFieldLast_success_cookie_refresh($l);
  }
  public function getLastSuccessCookieRefresh() {
    return $this->getDbFieldLast_success_cookie_refresh();
  }
  public function setLastUsed($l) {
    $this->setDbFieldLast_used($l);
  }
  public function getLastUsed($format = false) {
    if ($format) {
      return date($format, $this->getDbFieldLast_used());
    }
    return $this->getDbFieldLast_used();
  }
  
  /**
   * self functions
   */
  private  $cookie_path;
  
  public function removeCookie() {
    if (is_file($this->cookie_path)) {
      unlink($this->cookie_path);
    }
  }
  
  public function clearCookie() {
    // empty cookie file
    if (is_file($this->cookie_path)) {
      $f = fopen($this->cookie_path, 'w');
      fclose($f);
    }
  }
  
  public function getCookiePath() {
    if (isset($this->cookie_path) && is_file($this->cookie_path)) {
      return $this->cookie_path;
    } elseif ($this->getUsername()) {
      $this->cookie_path = CACHE_FOLDER . DS . 'cookie-tigtaguser-' . $this->getUsername();
      if (!is_file($this->cookie_path)) {
        $f = fopen($this->cookie_path, 'w');
        fclose($f);
        chmod($this->cookie_path, 0666);
      }
      return $this->cookie_path;
    } else {
      throw new Exception('Cookie path does not exist');
      return null;
    }
  }

  public function getAuthor() {
    return User::findById($this->getUid());
  }
  
  static function dropTable() {
    return parent::dropTableByName('tigtag_user');
  }
  
  static function tableExist() {
    return parent::tableExistByName('tigtag_user');
  }
  
  static function createTableIfNotExist() {
    global $mysqli;

    if (!self::tableExist()) {
      return $mysqli->query('
CREATE  TABLE `tigtag_user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(32) NOT NULL ,
  `password` VARCHAR(32) NOT NULL ,
  `created` INT NOT NULL ,
  `valid` TINYINT NOT NULL DEFAULT 0 ,
  `last_success_cookie_refresh` INT ,
  `last_used` INT ,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;
      ');
    }
    
    return true;
  }
  
  static function findById($id, $instance = 'TigtagUser') {
    global $mysqli;
    $query = 'SELECT * FROM tigtag_user WHERE id=' . $id;
    $result = $mysqli->query($query);
    if ($result && $t = $result->fetch_object()) {
      $tigtag_user = new $instance();
      DBObject::importQueryResultToDbObject($t, $tigtag_user);
      return $tigtag_user;
    }
    return null;
  }
  
  static function findByUsername($username, $instance = 'TigtagUser') {
    global $mysqli;
    $query = 'SELECT * FROM tigtag_user WHERE id=' . $username;
    $result = $mysqli->query($query);
    if ($result && $t = $result->fetch_object()) {
      $tigtag_user = new $instance();
      DBObject::importQueryResultToDbObject($t, $tigtag_user);
      return $tigtag_user;
    }
    return null;
  }
  
  static function findAll() {
    global $mysqli;
    $query = "SELECT * FROM tigtag_user";
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $t = $result->fetch_object()) {
      $tigtag_user = new TigtagUser();
      DBObject::importQueryResultToDbObject($t, $tigtag_user);
      $rtn[] = $tigtag_user;
    }
    
    return $rtn;
  }
  
  static function findAllWithPage($page, $entries_per_page, $orderby = 'last_success_cookie_refresh', $order = 'ASC') {
    global $mysqli;
    $query = "SELECT * FROM tigtag_user" .  " ORDER BY `$orderby` $order " . " LIMIT " . ($page - 1) * $entries_per_page . ", " . $entries_per_page;
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $t = $result->fetch_object()) {
      $tigtag_user = new TigtagUser();
      DBObject::importQueryResultToDbObject($t, $tigtag_user);
      $rtn[] = $tigtag_user;
    }
    
    return $rtn;
  }
  
  static function countAll() {
    global $mysqli;
    $query = "SELECT COUNT(*) as 'count' FROM tigtag_user";
    if ($result = $mysqli->query($query)) {
      return $result->fetch_object()->count;
    }
  }
  
  static function findAllValid() {
    global $mysqli;
    $query = "SELECT * FROM tigtag_user WHERE valid=1";
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $t = $result->fetch_object()) {
      $tigtag_user = new TigtagUser();
      DBObject::importQueryResultToDbObject($t, $tigtag_user);
      $rtn[] = $tigtag_user;
    }
    
    return $rtn;
  }
  
  static function findAllValidWithPage($page, $entries_per_page) {
    global $mysqli;
    $query = "SELECT * FROM tigtag_user WHERE valide=1 LIMIT " . ($page - 1) * $entries_per_page . ", " . $entries_per_page;
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $t = $result->fetch_object()) {
      $tigtag_user = new TigtagUser();
      DBObject::importQueryResultToDbObject($t, $tigtag_user);
      $rtn[] = $tigtag_user;
    }
    
    return $rtn;
  }
  
  static function countAllValid() {
    global $mysqli;
    $query = "SELECT COUNT(*) as 'count' FROM tigtag_user WHERE valid=1";
    $result = $mysqli->query($query)->fetch_object();
    return $result->count;
  }
  
  static function getFirstValidUser($last_success_refresh_period = 29) {
    // we only get user that succussfully refreshed in last xx days
    $last_success_refresh_period = $last_success_refresh_period * 24 * 60 * 60;
            
    global $mysqli;
    $query = "SELECT * FROM tigtag_user WHERE valid=1 AND (" . time() . " - last_success_cookie_refresh <= $last_success_refresh_period) ORDER BY last_used ASC, created ASC LIMIT 1";
    $result = $mysqli->query($query);
    if ($result && $t = $result->fetch_object()) {
      $tigtag_user = new TigtagUser();
      DBObject::importQueryResultToDbObject($t, $tigtag_user);
      return $tigtag_user;
    }
    return null;
  }
  
  function validate() {
    $crawler = new Crawler();
    $crawler->setCookiePath($this->getCookiePath());
    $html = $crawler->read('http://bbs.tigtag.com/member.php?mod=logging&action=login');
    $valid = strpos($html, '<div id="messagetext" class="alert_right">') ? true : false;
    //_debug(htmlspecialchars(iconv('GBK', 'UTF-8', $html)));
    return $valid;
  }
  
  function login() {
    $this->clearCookie();
    
    // prepare crawler
    $crawler = new Crawler();
    $crawler->setCookiePath($this->getCookiePath());
    $crawler->setUseTor();
    
    // crawl
    $html = $crawler->read('http://bbs.tigtag.com/member.php?mod=logging&action=login');
    load_library_simple_html_dom();
    $dom = str_get_html($html);
    
    // get vars from login page
    $form_hash = $dom->find('input[name="formhash"]', 0)->value;
    $seccode_hash = $dom->find('input[name="seccodeverify"]', 0)->id;
    $tokens = explode('_', $seccode_hash);
    $seccode_hash = array_pop($tokens);
    $login_hash = $dom->find('input[name="cookietime"]', 0)->id;
    $tokens = explode('_', $login_hash);
    $login_hash = array_pop($tokens);
//echo "<pre>";
//print_r(array(
//    'form_hash' => $form_hash, 
//    'seccode_hash' => $seccode_hash, 
//    'login_hash' => $login_hash
//));
//die("</per>");
    $dom->clear();
    
    // get seccode
  }
}