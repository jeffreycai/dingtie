<?php
//-- Clear cache
if ($command == 'cc') {

  if ($arg1 == 'all') {
    echo " - Drop table 'tigtag_user' ";
    echo TigtagUser::dropTable() ? "success\n" : "fail\n";
  }
}

//-- Import DB
if ($command == 'import' && $arg1 == 'db' && (is_null($arg2) || $arg2 == 'tigtag_user') ) {
  //- create tables if not exits
  echo " - Create table 'tigtag_user' ";
  echo TigtagUser::createTableIfNotExist() ? "success\n" : "fail\n";
}


//-- Import Tigtag user
if ($command == 'import' && $arg1 == 'tigtag_user') {
  $fixture = load_fixture('site', 'fixture_tigtagusers.yml');
  $counter = 0;
  foreach ($fixture['tigtag_users'] as $username) {
    if (is_null(TigtagUser::findByUsername($username))) {
      $user = new TigtagUser();
      $user->setUsername($username);
      $user->setCreated(time());
      $user->setPassword($settings['tigtag']['general_pwd']);
      $user->save();
      $counter++;
    }
  }
  echo " - $counter Tigtag users imported.\n";
}