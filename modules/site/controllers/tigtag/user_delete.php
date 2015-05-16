<?php
$uid = isset($vars[1]) ? $vars[1] : null;
$user = TigtagUser::findById($uid);

if ($user) {
  $user->delete();
  echo 'success';
} else {
  echo 'failed';
}

