<?php
  //-- StUser:Clear cache
  if ($command == "cc") {
    if ($arg1 == "all" || $arg1 == "sydneytoday") {
      echo " - Drop table 'st_user' ";
      echo StUser::dropTable() ? "success\n" : "fail\n";
    }
  }

  //-- StUser:Import DB
  if ($command == "import" && $arg1 == "db" && (is_null($arg2) || $arg2 == "st_user") ) {
  //- create tables if not exits
  echo " - Create table 'st_user' ";
  echo StUser::createTableIfNotExist() ? "success\n" : "fail\n";
  }
  