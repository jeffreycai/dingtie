<?php
/**
 * Form submission handling
 */
if (isset($_POST['submit'])) {
  // get data from form
  $seccode = $_POST['seccode'];
  $seccode_hash = $_POST['seccode_hash'];
  $formhash = $_POST['formhash'];
  $cookie_path = $_POST['cookie_path'];
  $username = $_POST['username'];
  $username_id = $_POST['username_id'];
  $password = $_POST['password'];
  $password_id = $_POST['password_id'];
  $password_confirm = $_POST['password'];
  $password_confirm_id = $_POST['password_confirm_id'];
  $email = $_POST['email'];
  $email_id = $_POST['email_id'];
  $status = $_POST['status'];
  $status_id = $_POST['status_id'];
  $referer = $_POST['referer'];
  $regsubmit = $_POST['regsubmit'];
  
  
  
  $crawler = new Crawler();
  $crawler->setCookiePath($cookie_path);
  $crawler->setHeader(array(
      'Referer: http://bbs.tigtag.com/member.php?mod=register',
  ));
  $crawler->setUseTor();
  
  $post_url = "http://bbs.tigtag.com/member.php?mod=register&inajax=1";
  $post_data = array(
    'regsubmit' => $regsubmit,
    'formhash' => $formhash,
    'referer' => $referer,
    'activationauth' => '',
    $username_id => $username,
    $password_id => $password,
    $password_confirm_id => $password_confirm,
    $email_id => $email,
    $status_id => iconv('UTF-8', 'GBK', $status),
    'sechash' => $seccode_hash,
    'seccodeverify' => $seccode,
  );
  
  $html = $crawler->post($post_url, $post_data);
  
  if (strstr($html, 'error')) {
    Message::register(new Message(Message::DANGER, 'An error occurred, login failed:<br />' . htmlspecialchars(iconv('GBK', 'UTF-8', $html))));

    if (is_file($cookie_path)) { unlink($cookie_path); }
  } else {
    Message::register(new Message(Message::SUCCESS, 'User registered successfully!<br />' . htmlspecialchars(iconv('GBK', 'UTF-8', $html))));
    
    // store in db
    $user = new TigtagUser();
    $user->setCreated(time());
    $user->setPassword($password);
    $user->setUsername($username);
    $user->save();
  }
  
  HTML::forwardBackToReferer();
}




/**
 *  Read register page and prepare for our form 
 */

// declare all vars used in form
$seccode;
$seccode_markup;
$seccode_hash;
$formhash;
//  $register_hash;
$cookie_path;
$username;
$username_id;
$password;
$password_id;
$password_confirm_id;
$email;
$email_id;
$status;
$status_id;
$cellphone;
$cellphone_id;
$referer;
$regsubmit;
  
// read the register page
$crawler = new Crawler();
$crawler->setUseTor();
$crawler->setCookiePath(CACHE_FOLDER . DS . 'cookie-tigtaguser-create');
$crawler->clearCookie();
$cookie_path = $crawler->getCookiePath();
$html = $crawler->read('http://bbs.tigtag.com/member.php?mod=register');
load_library_simple_html_dom();
$dom = str_get_html($html);
// get the form tokens
$regsubmit = $dom->find('#registerform input[name="regsubmit"]', 0)->value;
$formhash = $dom->find('#registerform input[name="formhash"]', 0)->value;
$referer = 'http://bbs.tigtag.com/';

$seccode_hash = $dom->find('#registerform input[name="seccodeverify"]', 0)->id;
$tokens = explode('_', $seccode_hash);
$seccode_hash = array_pop($tokens);

$username_id = $dom->find('#reginfo_a .rfm', 0)->find('input', 0)->id;
$password_id = $dom->find('#reginfo_a .rfm', 1)->find('input', 0)->id;
$password_confirm_id = $dom->find('#reginfo_a .rfm', 2)->find('input', 0)->id;
$email_id = $dom->find('#reginfo_a .rfm', 3)->find('input', 0)->id;
$status_id = $dom->find('#reginfo_a .rfm', 4)->find('input', 0)->name;
$status = $dom->find('#reginfo_a .rfm', 4)->find('input', 0)->value;
$cellphone_id = $dom->find('#reginfo_a .rfm', 5)->find('input', 0)->name;

//echo "<pre>";
//print_r(array(
//   '$regsubmit' => $regsubmit,
//    '$formhash' => $formhash,
//    '$referer' => $referer,
//    '$seccode_hash' => $seccode_hash,
//    '$username_id' => $username_id,
//    '$password_id' => $password_id,
//    '$password_confirm_id' => $password_confirm_id,
//    '$email_id' => $email_id,
//    '$status_id' => $status_id,
//    '$status' => $status,
//    '$cellphone_id' => $cellphone_id
//));
//die("</pre>");

$dom->clear();

// a second request to get seccode update url
$content = $crawler->read("http://bbs.tigtag.com/misc.php?mod=seccode&action=update&idhash=$seccode_hash&inajax=1&ajaxtarget=seccode_$seccode_hash");
$matches = array();
preg_match('/src="(([^"]+)update=(\d+)[^"]+)"/', $content, $matches);
$update_url = "http://bbs.tigtag.com/" . $matches[1];
$update_id = $matches[3];
// a third request to get seccode image
$header = array(
  'Referer: http://bbs.tigtag.com/member.php?mod=logging&action=login',
);
$crawler->setHeader($header);
$seccode_content = $crawler->read($update_url);
$seccode_markup = '<img src="data:image/png;base64,' . base64_encode($seccode_content) . '" />';


/** presentation **/
$html = new HTML();

$html->renderOut('core/backend/html_header', array(
  'title' => 'Tigtag create new user',
  'body_class' => 'tigtag'
), true);
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');
$html->renderOut('site/tigtag/user_create', array(
    'seccode_markup' => $seccode_markup,
    'seccode_hash' => $seccode_hash,
    'formhash' => $formhash,
    'cookie_path' => $cookie_path,
    'username_id' => $username_id,
    'password_id' => $password_id,
    'password_confirm_id' => $password_confirm_id,
    'email_id' => $email_id,
    'status' => $status,
    'status_id' => $status_id,
    'referer' => $referer,
    'regsubmit' => $regsubmit,
    
    'username' => make_username(),
    'password' => $settings['tigtag']['general_pwd'],
    'email' => make_email($settings['tigtag']['general_email'])
));
$html->output('</div>');
$html->renderOut('core/backend/html_footer');

exit;