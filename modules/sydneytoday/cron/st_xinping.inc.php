<?php

require_once __DIR__ . '/../../../bootstrap.php';

$object = StXinping::findById($id);
//$object = new StXinping();
if (!$object) {
  die('Can not find StXinping');
}

// check cookie file exists
$cookie_file = CACHE_FOLDER . DS  . 'sydneytoday_cookie.txt';
if (!is_file($cookie_file)) {
  touch($cookie_file);
}
if (!is_writable($cookie_file)) {
  die('Cookie file needs to be writable');
}


//$crawler->setUseTor();

// do deletion first
if ($object->getFid() && $object->getPostId()) {
  $fid = $object->getFid();
  $id = $object->getPostId();
  $password = $object->getEditpwd();
  
  $crawler = new Crawler();
//  $crawler->setCookiePath($cookie_file);
//  $crawler->clearCookie();
//  $crawler->read('http://www.sydneytoday.com/post.php?action=del&fid='.$fid.'&id='.$id);
  $crawler->setReferer('http://www.sydneytoday.com/post.php?action=del&fid='.$fid.'&id='.$id);
  $result = $crawler->post('http://www.sydneytoday.com/post.php?action=del&fid='.$fid.'&id='.$id,'pwd='.urlencode($password).'&Submit=%CC%E1%BD%BB');

  $matches = array();
  preg_match("/<!\-\-\s+alert\('([^']+)'\)/", $result, $matches);
  if (isset($matches[1])) {
    $error_msg = iconv('gb2312', 'utf-8', $matches[1]);
    sendemailAdmin('Dingtie - SydneyToday新品 error', 'For st_xinping id:'.$object->getId().' == '.$error_msg);
    die('<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />Error: ' . $error_msg);
  } else {
    // when we don't have '新品超市' in the return result, we failed
    if (!mb_strpos($result, iconv('utf-8', 'gb2312', '新品超市'), 0, 'gb2312')) {
      sendemailAdmin('Dingtie - SydneyToday新品 error', "Error: failed to delete post");
      die("Error: failed to delete post");
    }
  }
}



// setup crawler
$crawler = new Crawler();
$crawler->setCookiePath($cookie_file);
$crawler->clearCookie();

// qaptcha code
$qaptcha_key = get_random_string(32, 'azertyupqsdfghjkmwxcvbn23456789AZERTYUPQSDFGHJKMWXCVBN_-#@');
$crawler->setReferer("http://www.sydneytoday.com/post.php?fid=23");
$html = $crawler->post('http://www.sydneytoday.com/qaptcha/Qaptcha.jquery.php', 'action=qaptcha&qaptcha_key='.$qaptcha_key);
if (strpos($html, 'false') === false) {
  sendemailAdmin('Dingtie - SydneyToday新品 error', 'For st_xinping id:'.$object->getId().' == '.'Error: qacode failed');
  die('Error: qacode failed');
}
//_debug('<meta charset=gb2312></meta>'.iconv('utf8','gb2312', $object->getContent()));
$content = iconv('utf8','gb2312//IGNORE', $object->getContent());
if ($content == false) {
  sendemailAdmin('Dingtie - SydneyToday新品 error', 'For st_xinping id:'.$object->getId().' == '.'Error: content iconv failed');
  die('Error: content iconv failed');
}
        
$crawler->setMultipart();
$result = $crawler->post('http://www.sydneytoday.com/post.php?action=postnew', array(
    'postdb[title]' => iconv('utf8', 'gb2312', $object->getTitle()),
    'postdb[email]' => $object->getEmail(),
    'postdb[editpwd]' => $object->getEditpwd(),
    'postdb[city_id]' => 1,
    'postdb[my_790gq]' => iconv('utf8', 'gb2312', $object->getJiaoyifangshi()),
    'postdb[my_697shsm]' => iconv('utf8', 'gb2312', $object->getShifousonghuo()),
    'postdb[my_781xf]' => iconv('utf8', 'gb2312', $object->getChanpingfenlei()),
    'postdb[content]' => str_replace("\n", "<br />", implode('', array_fill(0, rand(1,10), ' ')) .$content . implode('', array_fill(0, rand(1,20), ' '))),
    'photodb[1]' => $object->getOuturl1(),
    'ftype[1]' => 'out',
    'photodb[2]' => $object->getOuturl2(),
    'ftype[2]' => 'out',
    'photodb[3]' => $object->getOuturl3(),
    'ftype[3]' => 'out',
    'photodb[4]' => $object->getOuturl4(),
    'ftype[4]' => 'out',
    'photodb[5]' => $object->getOuturl5(),
    'ftype[5]' => 'out',
    'photodb[6]' => $object->getOuturl6(),
    'ftype[6]' => 'out',
    'photodb[7]' => $object->getOuturl7(),
    'ftype[7]' => 'out',
    'photodb[8]' => $object->getOuturl8(),
    'ftype[8]' => 'out',
    'nums' => 1,
    'submit' => '提 交',
    'fid' => 23,
    'id' => 0,
    $qaptcha_key => ''
));


$matches = array();
preg_match("/<!\-\-\s+alert\('([^']+)'\)/", $result, $matches);
if (isset($matches[1])) {
  $error_msg = iconv('gb2312', 'utf-8', $matches[1]);
  sendemailAdmin('Dingtie - SydneyToday新品 error', 'For st_xinping id:'.$object->getId().' == '.'Error: ' . $error_msg);
  die('<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />Error: ' . $error_msg);
} else {
  $matches = array();
  preg_match('/fid=(\d+)&id=(\d+)/', $result, $matches);
  if (isset($matches[1]) && isset($matches[2])) {
    $object->setFid($matches[1]);
    $object->setPostId($matches[2]);
    $object->save();
    
    echo('success!');
  } else {
    echo $result;
  }
  
}
