<?php
$uid = isset($vars[1]) ? $vars[1] : null;

$user = TigtagUser::findById($uid);

if ($user) {
  $valid = $user->validate() ? 1 : 0;
  $user->setValid($valid);
  $user->save();
  
  if ($valid) {
    $rank = $user->refreshRank();
  }
  
  echo $valid ? $rank : 'failed';
} else {
  echo 'failed';
}