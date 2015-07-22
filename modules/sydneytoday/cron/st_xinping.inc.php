<?php

require_once __DIR__ . '/../../../bootstrap.php';

$object = StXinping::findById(1);
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
//if ($object->getFid() && $object->getPostId()) {
//  $fid = $object->getFid();
//  $id = $object->getPostId();
//  $password = $object->getEditpwd();
//  
//  $crawler = new Crawler();
////  $crawler->setCookiePath($cookie_file);
////  $crawler->clearCookie();
////  $crawler->read('http://www.sydneytoday.com/post.php?action=del&fid='.$fid.'&id='.$id);
//  $crawler->setReferer('http://www.sydneytoday.com/post.php?action=del&fid='.$fid.'&id='.$id);
//  $result = $crawler->post('http://www.sydneytoday.com/post.php?action=del&fid='.$fid.'&id='.$id,'pwd='.urlencode($password).'&Submit=%CC%E1%BD%BB');
//
//  $matches = array();
//  preg_match("/<!\-\-\s+alert\('([^']+)'\)/", $result, $matches);
//  if (isset($matches[1])) {
//    $error_msg = iconv('gb2312', 'utf-8', $matches[1]);
//    sendemailAdmin('Dingtie - SydneyToday新品 error', 'For st_xinping id:'.$object->getId().' == '.$error_msg);
//    die('<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />Error: ' . $error_msg);
//  } else {
//    // when we don't have '新品超市' in the return result, we failed
//    if (!mb_strpos($result, iconv('utf-8', 'gb2312', '新品超市'), 0, 'gb2312')) {
//      sendemailAdmin('Dingtie - SydneyToday新品 error', "Error: failed to delete post");
//      die("Error: failed to delete post");
//    }
//  }
//}


// setup crawler
$crawler = new Crawler();
$crawler->setCookiePath($cookie_file);
$crawler->clearCookie();

// get form_build_id
$result = $crawler->read('http://www.sydneytoday.com/node/add/newssupermarket');
$matches = array();
preg_match('/name="form_build_id" value="([^"]+)"/', $result, $matches);
if (!isset($matches[1])) {
  sendemailAdmin('Dingtie - SydneyToday新品 error', 'Can not get form_build_id');
  die('Can not get form_build_id');
}
$form_build_id = $matches[1];

// upload images first
$images = explode("\n", trim($object->getImages()));
foreach ($images as $img) {
  $basename = strtolower(basename($img));
 
  if (preg_match('/\.jpe?g/', $basename)) {
    $mime_type = 'image/jpeg';
  } else if (preg_match('/\.png/', $basename)) {
    $mime_type = 'image/png';
  }
  
  $crawler->setMultipart();
  $crawler->setReferer('http://www.sydneytoday.com/node/add/newssupermarket');
  $result = $crawler->post('http://www.sydneytoday.com/file/ajax/field_image/und/form-'.$form_build_id, array(
      'title' => $object->getTitle(),
      'form_build_id' => $form_build_id,
      'form_id' => 'newssupermarket_node_form',
      'field_domain_name[und]' => "2113",
      'field_cateinfo[und]' => "170",
      'field_email[und][0][value]' => $object->getEmail(),
      'field_manage_password[und][0][value]' => $object->getEditpwd(),
      'field_buy_or_sell[und]' => $object->getJiaoyifangshi(),
      'field_delivery_or_not[und]' => $object->getShifousonghuo(),
      'field_product_category[und]' => $object->getChanpingfenlei(),
      'field_jia_ge[und][0][value]' => $object->getJiage(),
      'field_companyprofile[und][0][value]' => $object->getContent(),
      'files[field_image_und_0]' => new CURLFile(WEBROOT . DS . $img, $mime_type, $basename)
  ), true);
  _debug($result);
}


/*
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
*/