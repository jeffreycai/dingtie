<?php

$object = new StUser();
  
// handle form submission
if (isset($_POST['submit'])) {
  $error_flag = false;
  
  // validation for $email
  $email = isset($_POST["email"]) ? strip_tags($_POST["email"]) : null;
  if (empty($email)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "email is required.", "zh" => "请填写email"))));
    $error_flag = true;
  }
  
  // validation for $password
  $password = isset($_POST["password"]) ? strip_tags($_POST["password"]) : null;
  $retype_password = isset($_POST["retype_password"]) ? strip_tags($_POST["retype_password"]) : null;
  if (empty($password)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "password is required.", "zh" => "请填写password"))));
    $error_flag = true;
  }

  if ($password != $retype_password) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "Retype value does not match for password", "zh" => "再次输入的password与原值不匹配"))));
    $error_flag = true;
  }
  
  // validation for $last_used
  $last_used = isset($_POST["last_used"]) ? strip_tags($_POST["last_used"]) : null;  
  // validation for $registered_at
  $registered_at = isset($_POST["registered_at"]) ? strip_tags($_POST["registered_at"]) : null;  /// proceed submission
  
  // proceed for $email
  $object->setEmail($email);
  
  // proceed for $password
  $object->setPassword($password);
  
  // proceed for $last_used
  $object->setLastUsed($last_used);
  
  // proceed for $registered_at
  $object->setRegisteredAt($registered_at);
  if ($error_flag == false) {
    
    // call sydneytoday register page
    $crawler = new Crawler();
    $crawler->setCookiePath(SYDNEYTODAY_CACHE_REGISTER_COOKIE);
    $html = $crawler->post('http://www.sydneytoday.com/do/reg.php?f', "username=".urlencode($email)."&password=$password&password2=$retype_password&yzimg=".$_POST['yzimg']."&sex=0&truename=&oicq=&mobphone=&agreement=on&step=2&jumpto=http%3A%2F%2Fwww.sydneytoday.com%2Flist.php%3Ffid%3D194");
    
    // when success
    $matches = array();
    preg_match_all('/fid=194/', $html, $matches);
    if (sizeof($matches[0] > 100)) {
      if ($object->save()) {
        Message::register(new Message(Message::SUCCESS, i18n(array("en" => "Record saved", "zh" => "记录保存成功"))));
        HTML::forwardBackToReferer();
      } else {
        Message::register(new Message(Message::DANGER, i18n(array("en" => "Record failed to save", "zh" => "记录保存失败"))));
      }
    } else {
      Message::register(new Message(Message::DANGER, htmlentities($html)));
    }
  }
}



$cralwer = new Crawler();
$cralwer->setCookiePath(SYDNEYTODAY_CACHE_REGISTER_COOKIE);
$cralwer->clearCookie();
$img_content = $cralwer->read('http://www.sydneytoday.com/do/yzimg.php????');




$html = new HTML();

$html->renderOut('core/backend/html_header', array(
  'title' => i18n(array(
  'en' => 'Create SydneyToday User',
  'zh' => 'Create 今日悉尼用户',
  )),
));
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');


$html->renderOut('sydneytoday/backend/st_user_create', array(
  'object' => $object,
  'email' => htmlentities(make_email('videoreap@gmail.com')),
  'password' => '0172122a',
  'yzimg' => '<img src="data:image/png;base64,' . base64_encode($img_content) . '" />'
));


$html->output('</div>');

$html->renderOut('core/backend/html_footer');

exit;

