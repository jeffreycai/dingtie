<?php

require_once __DIR__ . '/../../../bootstrap.php';

$now = time();
if ($now > strtotime(date('Y-m-d 10:10:00')) && $now < strtotime(date('Y-m-d 19:50:00'))) {
  
  
  // get a list of topics to ding
  $forums = array(
      'http://bbs.tigtag.com/forum-267-1.html',
      'http://bbs.tigtag.com/forum-49-1.html'
  );
  $url = $forums[rand(0, sizeof($forums) - 1)];
  $html = file_get_contents($url);
  $matches = array();
  preg_match_all('/normalthread_(\d+)/', $html, $matches);
  
  $tids = array();
  foreach ($matches[1] as $tid) {
    $tids[] = $tid;
  }
  
  
  for ($ccc = 25; $ccc < 35; $ccc++) {
echo "\n-------------  $ccc  -------------\n";
    $fid = "";
    $tid = $tids[$ccc];
    $alternative_messages = array(
        '帮顶一下',
        'ding ding ding',
        'ding yixia',
        'ding ding',
        'up up  up up',
        '顶顶哈，，，',
        '我是活雷锋',
        '帮你顶顶',
        'ding ni bu xie',
        'ding a ding',
        'xiexie ding',
        'thank you',
        'please contact',
        'please call me',
        'xiexie ding xia',
        'ding ding',
        'ding ni bu keqi',
        'bang ding',
        '顶个贴，好心情',
        '顶贴啊顶',
        '顶顶顶顶顶',
        '顶顶顶ding'
    );
    $alternative_message = $alternative_messages[rand(0, sizeof($alternative_messages) - 1)];

    require __DIR__ . DS . 'tigtag_inc.random.php';
  }

}

