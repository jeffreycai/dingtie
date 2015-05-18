<?php

$id = isset($vars[1]) ? $vars[1] : null;
$object = StUser::findById($id);
if (is_null($object)) {
  HTML::forward('core/404');
}

// handle form submission
if (isset($_POST['submit'])) {
  $error_flag = false;

  /// validation
  
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
  'en' => 'Edit SydneyToday User',
  'zh' => 'Edit 今日悉尼用户',
  )),
));
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');


$html->renderOut('sydneytoday/backend/st_user_edit', array(
  'object' => $object
));


$html->output('</div>');

$html->renderOut('core/backend/html_footer');

exit;

