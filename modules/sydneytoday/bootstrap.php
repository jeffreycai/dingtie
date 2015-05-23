<?php

// check user cache folder
define('SYDNEYTODAY_CACHE_FOLDER', WEBROOT . DS . 'cache' . DS . 'sydneytoday');
define('SYDNEYTODAY_CACHE_REGISTER_COOKIE', WEBROOT . DS . 'cache' . DS . 'sydneytoday' . DS . 'register.cookie');
if (!is_dir(SYDNEYTODAY_CACHE_FOLDER)) {
  mkdir(SYDNEYTODAY_CACHE_FOLDER);
}
if (!is_writable(SYDNEYTODAY_CACHE_FOLDER)) {
  die('Please set SYDNEYTODAY_CACHE_FOLDER writable.');
}


// register admin
$user = User::getInstance();
if (is_backend() && $user->isLogin()) {
  Backend::registerSideNav(
  '
  <li>
    <a href="#"><i class="fa fa-folder-open"></i> '.i18n(array('en' => 'SydneyToday User','zh' => '今日悉尼用户',)).'<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
      <li><a href="'.uri('admin/st_user/list').'">'.i18n(array(
          'en' => 'List',
          'zh' => '列表'
      )).'</a></li>
      <li><a href="'.uri('admin/st_user/create').'">'.i18n(array(
          'en' => 'Create',
          'zh' => '创建'
      )).'</a></li>
    </ul>
  </li>
  '        
  );
}


// register admin
$user = User::getInstance();
if (is_backend() && $user->isLogin()) {
  Backend::registerSideNav(
  '
  <li>
    <a href="#"><i class="fa fa-folder-open"></i> '.i18n(array('en' => 'SydneyToday Zhekou','zh' => '今日悉尼 - zhekou',)).'<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
      <li><a href="'.uri('admin/st_zhekou/list').'">'.i18n(array(
          'en' => 'List',
          'zh' => '列表'
      )).'</a></li>
      <li><a href="'.uri('admin/st_zhekou/create').'">'.i18n(array(
          'en' => 'Create',
          'zh' => '创建'
      )).'</a></li>
    </ul>
  </li>
  '        
  );
}