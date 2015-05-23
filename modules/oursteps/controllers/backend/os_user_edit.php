<?php

$id = isset($vars[1]) ? $vars[1] : null;
$object = OsUser::findById($id);
if (is_null($object)) {
  HTML::forward('core/404');
}

// handle form submission
if (isset($_POST['submit'])) {
  $error_flag = false;

  /// validation
  
  // validation for $username
  $username = isset($_POST["username"]) ? strip_tags($_POST["username"]) : null;
  if (empty($username)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "username is required.", "zh" => "请填写username"))));
    $error_flag = true;
  }
  
  // validation for $password
  $password = isset($_POST["password"]) ? strip_tags($_POST["password"]) : null;
  if (empty($password)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "password is required.", "zh" => "请填写password"))));
    $error_flag = true;
  }
  
  // validation for $email
  $email = isset($_POST["email"]) ? strip_tags($_POST["email"]) : null;
  if (empty($email)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "email is required.", "zh" => "请填写email"))));
    $error_flag = true;
  }
  
  // validation for $valid
  $valid = isset($_POST["valid"]) ? 1 : 0;  
  // validation for $last_used
  $last_used = isset($_POST["last_used"]) ? strip_tags($_POST["last_used"]) : null;  
  // validation for $last_success_cookie_refresh
  $last_success_cookie_refresh = isset($_POST["last_success_cookie_refresh"]) ? strip_tags($_POST["last_success_cookie_refresh"]) : null;  
  // validation for $registered_at
  $registered_at = isset($_POST["registered_at"]) ? strip_tags($_POST["registered_at"]) : null;  
  // validation for $rank
  $rank = isset($_POST["rank"]) ? strip_tags($_POST["rank"]) : null;  /// proceed submission
  
  // proceed for $username
  $object->setUsername($username);
  
  // proceed for $password
  $object->setPassword($password);
  
  // proceed for $email
  $object->setEmail($email);
  
  // proceed for $valid
  $object->setValid($valid);
  
  // proceed for $last_used
  $object->setLastUsed($last_used);
  
  // proceed for $last_success_cookie_refresh
  $object->setLastSuccessCookieRefresh($last_success_cookie_refresh);
  
  // proceed for $registered_at
  $object->setRegisteredAt($registered_at);
  
  // proceed for $rank
  $object->setRank($rank);
  if ($error_flag == false) {
    if ($object->save()) {
      Message::register(new Message(Message::SUCCESS, i18n(array("en" => "Record saved", "zh" => "记录保存成功"))));
      HTML::forwardBackToReferer();
    } else {
      Message::register(new Message(Message::DANGER, i18n(array("en" => "Record failed to save", "zh" => "记录保存失败"))));
    }
  }
}



$html = new HTML();

$html->renderOut('core/backend/html_header', array(
  'title' => i18n(array(
  'en' => 'Edit Oursteps user',
  'zh' => 'Edit 新足迹用户',
  )),
));
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');


$html->renderOut('oursteps/backend/os_user_edit', array(
  'object' => $object
));


$html->output('</div>');

$html->renderOut('core/backend/html_footer');

exit;

