<?php


define('OURSTEPS_CACHE_FOLDER', WEBROOT . DS . 'cache' . DS . 'oursteps');
if (!is_dir(OURSTEPS_CACHE_FOLDER)) {
  mkdir(OURSTEPS_CACHE_FOLDER);
}
if (!is_writable(OURSTEPS_CACHE_FOLDER)) {
  die('Oursteps cache folder needs to be writable');
}


// register admin
$user = User::getInstance();
if (is_backend() && $user->isLogin()) {
  Backend::registerSideNav(
  '
  <li>
    <a href="#"><i class="fa fa-folder-open"></i> '.i18n(array('en' => 'Oursteps user','zh' => '新足迹用户',)).'<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
      <li><a href="'.uri('admin/os_user/list').'">'.i18n(array(
          'en' => 'List',
          'zh' => '列表'
      )).'</a></li>
      <li><a href="'.uri('admin/os_user/create').'">'.i18n(array(
          'en' => 'Create',
          'zh' => '创建'
      )).'</a></li>
    </ul>
  </li>
  '        
  );
}