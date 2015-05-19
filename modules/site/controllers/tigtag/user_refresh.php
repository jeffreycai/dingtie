<?php
$uid = isset($vars[1]) ? $vars[1] : null;
$user = TigtagUser::findById($uid);

if ($user) {
  
  // handle form submission
  if (isset($_POST['submit'])) {
    $seccode = $_POST['seccode'];
    $seccode_hash = $_POST['seccode_hash'];
    $form_hash = $_POST['form_hash'];
    $login_hash = $_POST['login_hash'];
    $cookie_path = $_POST['cookie_path'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $url = "http://bbs.tigtag.com/member.php?mod=logging&action=login&loginsubmit=yes&loginhash=$login_hash&inajax=1";
    $post_data = "formhash=$form_hash&referer=http%3A%2F%2Fbbs.tigtag.com%2F.%2F&loginfield=username&username=".$username."&password=".$password."&questionid=0&answer=&sechash=$seccode_hash&seccodeverify=$seccode&cookietime=2592000";
    
    $crawler = new Crawler();
    $crawler->setCookiePath($user->getCookiePath());
//    $crawler->setUseTor();
    
    $html = $crawler->post($url, $post_data);
    
    if (strstr($html, 'error')) {
      Message::register(new Message(Message::DANGER, 'An error occurred, login failed:<br />' . htmlspecialchars(iconv('GBK', 'UTF-8', $html))));
      $user->setValid(0);
      $user->save();
    } else {
      Message::register(new Message(Message::SUCCESS, 'Cookie refreshed successfully!<br />' . htmlspecialchars(iconv('GBK', 'UTF-8', $html))));
      $user->setValid(1);
      $user->setLastSuccessCookieRefresh(time());
      $user->save();
    }
    
    
    HTML::forward('admin/tigtag/user/list');
    exit;
  }
  
  
  
  // declare all vars used in form
  $seccode;
  $seccode_markup;
  $seccode_hash;
  $form_hash;
  $login_hash;
  $cookie_path;
  $username;
  $password;
  
  $username = $user->getUsername();
  $password = $user->getPassword();
  
  // 1st request to read login page
  $crawler = new Crawler();
  $crawler->setCookiePath($user->getCookiePath());
  $crawler->clearCookie();
//  $crawler->setUseTor();
  $html = $crawler->read('http://bbs.tigtag.com/member.php?mod=logging&action=login');
  load_library_simple_html_dom();
  // get vars from login page
  $dom = str_get_html($html);
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
  
  // 2nd request to get $update_url
  $content = $crawler->read("http://bbs.tigtag.com/misc.php?mod=seccode&action=update&idhash=$seccode_hash&inajax=1&ajaxtarget=seccode_$seccode_hash");
  $matches = array();
  preg_match('/src="(([^"]+)update=(\d+)[^"]+)"/', $content, $matches);
  $update_url = "http://bbs.tigtag.com/" . $matches[1];
  $update_id = $matches[3];
  
  // 3rd request to get seccode
  $header = array(
    'Referer: http://bbs.tigtag.com/member.php?mod=logging&action=login',
  );
  $crawler->setHeader($header);
  $seccode_content = $crawler->read($update_url);
  $seccode_markup = '<img src="data:image/png;base64,' . base64_encode($seccode_content) . '" />';
  
  
  
  
  /** presentation **/
  $html = new HTML();

  $html->renderOut('core/backend/html_header', array(
    'title' => 'Tigtag refresh user ' . $user->getName(),
    'body_class' => 'tigtag'
  ), true);
  $html->output('<div id="wrapper">');
  $html->renderOut('core/backend/header');

  $html->renderOut('site/tigtag/user_refresh', array(
      'seccode_markup' => $seccode_markup,
      'seccode_hash' => $seccode_hash,
      'form_hash' => $form_hash,
      'cookie_path' => $user->getCookiePath(),
      'login_hash' => $login_hash,
      'username' => $user->getUsername(),
      'password' => $user->getPassword(),
  ));
  $html->output('</div>');
  $html->renderOut('core/backend/html_footer');

  exit;
  
  
} else {
  HTML::forward('core/404');
}