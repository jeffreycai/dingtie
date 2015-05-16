<?php
$users = TigtagUser::findAll();

header('Content-type: text/plain');

foreach ($users as $user) {
  echo "  - " . $user->getUsername() . "\n";
}
exit;