<?php
$uid = isset($vars[1]) ? $vars[1] : null;

$user = TigtagUser::findById($uid);

if ($user) {
  $user->setValid($user->getValid() ? 0 : 1);
  $user->save();
  

  
  echo $user->getValid();
} else {
  echo 'failed';
}