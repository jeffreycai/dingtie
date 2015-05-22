<?php

require_once __DIR__ . '/../../../bootstrap.php';

$now = time();
if ($now > strtotime(date('Y-m-d 10:10:00')) && $now < strtotime(date('Y-m-d 20:00:00'))) {
  for ($i = 0; $i < 10; $i++) {
    $fid = "";
    $tid = rand(3571411, 3581411);

    $alternative_message = '顶顶顶顶';

    require __DIR__ . DS . 'tigtag_inc.random.php';
  }
}

