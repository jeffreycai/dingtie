<?php

$object = new OsUser();
  
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
  
  
  
  
  ///***** Remote post on Oursteps ********
  $secqaa = $_POST['secqaa'];
  $seccode = $_POST['seccode'];
  $cralwer = new Crawler();
  $cralwer->setUseTor();
  $cralwer->setCookiePath(OURSTEPS_CACHE_FOLDER . DS  .'register.cookie');
  $cralwer->setHeader(array(
      'Referer: http://www.oursteps.com.au/bbs/member.php?mod=register.php',
      'Content-Type: multipart/form-data'
  ));
  $data = array(
      'regsubmit' => $_SESSION['oursteps']['regsubmit'],
      'formhash' => $_SESSION['oursteps']['formhash'],
      'referer' => $_SESSION['oursteps']['referer'],
      'activationauth' => "",
      $_SESSION['oursteps']['un_name'] => $username,
      $_SESSION['oursteps']['pw_name'] => $password,
      $_SESSION['oursteps']['cpw_name'] => $password,
      $_SESSION['oursteps']['em_name'] => $email,
      'sechash' => $_SESSION['oursteps']['sechash'],
      'secanswer' => $secqaa,
      'seccodeverify' => $seccode,
      'agreebbrule' => $_SESSION['oursteps']['agreebbrule']
  );
  unset($_SESSION['oursteps']); $_SESSION['oursteps'] = null;
  $html = $cralwer->post('http://www.oursteps.com.au/bbs/member.php?mod=register.php&inajax=1', $data);
  
  
  ///// if failed on ourstep side
  if (strpos($html, 'errorhandle')) {
    Message::register(new Message(Message::DANGER, htmlentities($html)));
    HTML::forwardBackToReferer();
 ///// if succeed on ourstep side
  } else {
    Message::register(new Message(Message::SUCCESS, htmlentities($html)));
    
    
    //////// save the user as local user
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
    $object->setRegisteredAt(empty($registered_at) ? time() : $registered_at);

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

  
  
  
  

}


//// prepopulate
$username = make_username();
$email = make_email('findloveinsydney@gmail.com');
$password = 'Password94Mima';






///// get form vars from oursteps
$cralwer = new Crawler();
$cralwer->setUseTor();
$cralwer->setCookiePath(OURSTEPS_CACHE_FOLDER . DS  .'register.cookie');
$cralwer->clearCookie();
$html = $cralwer->read('http://www.oursteps.com.au/bbs/member.php?mod=register.php');
load_library_simple_html_dom();
$dom = str_get_html($html);
$_SESSION['oursteps'] = array();
$_SESSION['oursteps']['regsubmit'] = $dom->find('#registerform input[name=regsubmit]', 0)->value;
$_SESSION['oursteps']['formhash'] = $dom->find('#registerform input[name=formhash]', 0)->value;
$_SESSION['oursteps']['referer'] = 'http://www.oursteps.com.au/bbs/forum.php';
$_SESSION['oursteps']['agreebbrule'] = $dom->find('#agreebbrule', 0)->value;

$i = 0;
foreach ($dom->find('#reginfo_a input') as $input) {
  switch ($i) {
    case 0:
      $_SESSION['oursteps']['un_name'] = $input->id;
      break;
    case 1:
      $_SESSION['oursteps']['pw_name'] = $input->id;
      break;
    case 2:
      $_SESSION['oursteps']['cpw_name'] = $input->id;
      break;
    case 3:
      $_SESSION['oursteps']['em_name'] = $input->id;
      break;
    case 4:
      $_SESSION['oursteps']['sechash'] = $input->value;
      break;
  }
  $i++;
}
$cralwer->setHeader(array(
    'Referer: http://www.oursteps.com.au/bbs/member.php?mod=register.php',
));
// get secqaa question
$html = $cralwer->read('http://www.oursteps.com.au/bbs/misc.php?mod=secqaa&action=update&idhash='.$_SESSION['oursteps']['sechash'].'&inajax=1&ajaxtarget=secqaa_'.$_SESSION['oursteps']['sechash']);
$matches = array();
preg_match('/br \/>([^\]]+)/', $html, $matches);
$secqaa_question = isset($matches[1]) ? $matches[1] : null;

// get seccode question
$html = $cralwer->read('http://www.oursteps.com.au/bbs/misc.php?mod=seccode&action=update&idhash='.$_SESSION['oursteps']['sechash'].'&inajax=1&ajaxtarget=seccode_'.$_SESSION['oursteps']['sechash']);
$matches = array();
preg_match('/src="([^"]+)"/', $html, $matches);
$url = 'http://www.oursteps.com.au/bbs/'.$matches[1];
$cralwer->setHeader(array(
    'Referer: http://www.oursteps.com.au/bbs/member.php?mod=register.php',
));
$seccode_content = $cralwer->read($url);
$seccode_markup = '<img src="data:image/png;base64,' . base64_encode($seccode_content) . '" />';





$html = new HTML();

$html->renderOut('core/backend/html_header', array(
  'title' => i18n(array(
  'en' => 'Create Oursteps user',
  'zh' => 'Create 新足迹用户',
  )),
));
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');


$html->renderOut('oursteps/backend/os_user_create', array(
  'object' => $object,
  'username' => $username,
  'password' => $password,
  'email' => $email,
  
  'secqaa_question' => $secqaa_question,
  'seccode_markup' => $seccode_markup
));


$html->output('</div>');

$html->renderOut('core/backend/html_footer');

exit;

