<?php

$id = isset($vars[1]) ? $vars[1] : null;
$object = StXinping::findById($id);
if (is_null($object)) {
  HTML::forward('core/404');
}

// handle form submission
if (isset($_POST['submit'])) {
  $error_flag = false;

  /// validation
  
  // validation for $title
  $title = isset($_POST["title"]) ? strip_tags($_POST["title"]) : null;  
  // validation for $email
  $email = isset($_POST["email"]) ? strip_tags($_POST["email"]) : null;  
  // validation for $mobile
  $mobile = isset($_POST["mobile"]) ? strip_tags($_POST["mobile"]) : null;  
  // validation for $editpwd
  $editpwd = isset($_POST["editpwd"]) ? strip_tags($_POST["editpwd"]) : null;  
  // validation for $jiaoyifangshi
  $jiaoyifangshi = isset($_POST["jiaoyifangshi"]) ? strip_tags($_POST["jiaoyifangshi"]) : null;  
  // validation for $shifousonghuo
  $shifousonghuo = isset($_POST["shifousonghuo"]) ? strip_tags($_POST["shifousonghuo"]) : null;  
  // validation for $chanpingfenlei
  $chanpingfenlei = isset($_POST["chanpingfenlei"]) ? strip_tags($_POST["chanpingfenlei"]) : null;  
  // validation for $jiage
  $jiage = isset($_POST["jiage"]) ? strip_tags($_POST["jiage"]) : null;  
  // validation for $content
  $content = isset($_POST["content"]) ? $_POST["content"] : null;  
  // validation for $images
  $images = isset($_POST["images"]) ? strip_tags(trim($_POST["images"])) : null;  
  // validation for $nid
  $nid = isset($_POST["nid"]) ? strip_tags($_POST["nid"]) : null;  /// proceed submission
  
  // proceed for $title
  $object->setTitle($title);
  
  // proceed for $email
  $object->setEmail($email);
  
  // proceed for $mobile
  $object->setMobile($mobile);
  
  // proceed for $editpwd
  $object->setEditpwd($editpwd);
  
  // proceed for $jiaoyifangshi
  if (!empty($jiaoyifangshi)) {
    $object->setJiaoyifangshi($jiaoyifangshi);
  }
  
  // proceed for $shifousonghuo
  if (!empty($shifousonghuo)) {
    $object->setShifousonghuo($shifousonghuo);
  }
  
  // proceed for $chanpingfenlei
  if (!empty($chanpingfenlei)) {
    $object->setChanpingfenlei($chanpingfenlei);
  }
  
  // proceed for $jiage
  $object->setJiage($jiage);
  
  // proceed for $content
  $object->setContent($content);
  
  // proceed for $images
  $object->setImages($images);
  
  // proceed for $nid
  $object->setNid($nid);
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
  'en' => 'Edit SydneyToday Xinping',
  'zh' => 'Edit 今日悉尼 - 新品',
  )),
));
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');


$html->renderOut('sydneytoday/backend/st_xinping_edit', array(
  'object' => $object
));


$html->output('</div>');

$html->renderOut('core/backend/html_footer');

exit;

