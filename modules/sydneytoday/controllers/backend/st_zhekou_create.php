<?php

$object = new StZhekou();
  
// handle form submission
if (isset($_POST['submit'])) {
  $error_flag = false;

  /// validation
  
  // validation for $title
  $title = isset($_POST["title"]) ? strip_tags($_POST["title"]) : null;  
  // validation for $email
  $email = isset($_POST["email"]) ? strip_tags($_POST["email"]) : null;  
  // validation for $editpwd
  $editpwd = isset($_POST["editpwd"]) ? strip_tags($_POST["editpwd"]) : null;  
  // validation for $sortid
  $sortid = isset($_POST["sortid"]) ? strip_tags($_POST["sortid"]) : null;  
  // validation for $content
  $content = isset($_POST["content"]) ? $_POST["content"] : null;  
  // validation for $outurl1
  $outurl1 = isset($_POST["outurl1"]) ? strip_tags($_POST["outurl1"]) : null;  
  // validation for $outurl2
  $outurl2 = isset($_POST["outurl2"]) ? strip_tags($_POST["outurl2"]) : null;  
  // validation for $outurl3
  $outurl3 = isset($_POST["outurl3"]) ? strip_tags($_POST["outurl3"]) : null;  
  // validation for $outurl4
  $outurl4 = isset($_POST["outurl4"]) ? strip_tags($_POST["outurl4"]) : null;  
  // validation for $outurl5
  $outurl5 = isset($_POST["outurl5"]) ? strip_tags($_POST["outurl5"]) : null;  
  // validation for $outurl6
  $outurl6 = isset($_POST["outurl6"]) ? strip_tags($_POST["outurl6"]) : null;  
  // validation for $outurl7
  $outurl7 = isset($_POST["outurl7"]) ? strip_tags($_POST["outurl7"]) : null;  
  // validation for $outurl8
  $outurl8 = isset($_POST["outurl8"]) ? strip_tags($_POST["outurl8"]) : null;  /// proceed submission
  
  // proceed for $title
  $object->setTitle($title);
  
  // proceed for $email
  $object->setEmail($email);
  
  // proceed for $editpwd
  $object->setEditpwd($editpwd);
  
  // proceed for $sortid
  $object->setSortid($sortid);
  
  // proceed for $content
  $object->setContent($content);
  
  // proceed for $outurl1
  $object->setOuturl1($outurl1);
  
  // proceed for $outurl2
  $object->setOuturl2($outurl2);
  
  // proceed for $outurl3
  $object->setOuturl3($outurl3);
  
  // proceed for $outurl4
  $object->setOuturl4($outurl4);
  
  // proceed for $outurl5
  $object->setOuturl5($outurl5);
  
  // proceed for $outurl6
  $object->setOuturl6($outurl6);
  
  // proceed for $outurl7
  $object->setOuturl7($outurl7);
  
  // proceed for $outurl8
  $object->setOuturl8($outurl8);
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
  'en' => 'Create SydneyToday Zhekou',
  'zh' => 'Create 今日悉尼 - zhekou',
  )),
));
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');


$html->renderOut('sydneytoday/backend/st_zhekou_create', array(
  'object' => $object
));


$html->output('</div>');

$html->renderOut('core/backend/html_footer');

exit;

