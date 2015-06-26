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
  
  //-- StZhekou:Clear cache
  if ($command == "cc") {
    if ($arg1 == "all" || $arg1 == "sydneytoday") {
      echo " - Drop table 'st_zhekou' ";
      echo StZhekou::dropTable() ? "success\n" : "fail\n";
    }
  }

  //-- StZhekou:Import DB
  if ($command == "import" && $arg1 == "db" && (is_null($arg2) || $arg2 == "st_zhekou") ) {
  //- create tables if not exits
  echo " - Create table 'st_zhekou' ";
  echo StZhekou::createTableIfNotExist() ? "success\n" : "fail\n";
  }
  
  //-- StXinping:Clear cache
  if ($command == "cc") {
    if ($arg1 == "all" || $arg1 == "sydneytoday") {
      echo " - Drop table 'st_xinping' ";
      echo StXinping::dropTable() ? "success\n" : "fail\n";
    }
  }

  //-- StXinping:Import DB
  if ($command == "import" && $arg1 == "db" && (is_null($arg2) || $arg2 == "st_xinping") ) {
  //- create tables if not exits
  echo " - Create table 'st_xinping' ";
  echo StXinping::createTableIfNotExist() ? "success\n" : "fail\n";
  }
  
  //-- StZufang:Clear cache
  if ($command == "cc") {
    if ($arg1 == "all" || $arg1 == "sydneytoday") {
      echo " - Drop table 'st_zufang' ";
      echo StZufang::dropTable() ? "success\n" : "fail\n";
    }
  }

  //-- StZufang:Import DB
  if ($command == "import" && $arg1 == "db" && (is_null($arg2) || $arg2 == "st_zufang") ) {
  //- create tables if not exits
  echo " - Create table 'st_zufang' ";
  echo StZufang::createTableIfNotExist() ? "success\n" : "fail\n";
  }
  