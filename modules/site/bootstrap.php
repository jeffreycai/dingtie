<?php
define('UID_CONTACT_FORM', 'KLKLdieowe');
define('CACHE_FOLDER', WEBROOT . DS . 'cache');

// check cache folder
if (!is_dir(CACHE_FOLDER) || !is_writable(CACHE_FOLDER)) {
  die('CACHE_FOLDER needs to be writable.');
}


// backend registration
$user = User::getInstance();

if (is_backend() && $user->isLogin()) {
  Backend::registerSideNav(
  '
  <li>
    <a href="#"><i class="fa fa-clock-o"></i> Tigtag<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
      <li><a href="'.uri('admin/tigtag/user/list').'">User list</a></li>
      <li><a href="'.uri('admin/tigtag/user/create').'">Create user</a></li>
    </ul>
  </li>
  '        
  );
}