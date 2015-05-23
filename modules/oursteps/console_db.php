<?php
  //-- OsUser:Clear cache
  if ($command == "cc") {
    if ($arg1 == "all" || $arg1 == "oursteps") {
      echo " - Drop table 'os_user' ";
      echo OsUser::dropTable() ? "success\n" : "fail\n";
    }
  }

  //-- OsUser:Import DB
  if ($command == "import" && $arg1 == "db" && (is_null($arg2) || $arg2 == "os_user") ) {
  //- create tables if not exits
  echo " - Create table 'os_user' ";
  echo OsUser::createTableIfNotExist() ? "success\n" : "fail\n";
  }
  