<div id="page-wrapper">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header"><?php i18n_echo(array(
        'en' => 'Oursteps user',
        'zh' => '新足迹用户',
      )); ?></h1>
    </div>
  </div>
  
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading"><?php i18n_echo(array(
            'en' => 'Edit', 
            'zh' => '编辑'
        )) ?></div>
        <div class="panel-body">
          
        <?php echo Message::renderMessages(); ?>
          
<form role="form" method="POST" action="<?php echo uri('admin/os_user/edit/' . $object->getId()) ?>">
  
<div class='form-group'>
  <label for='username'>username</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['username']) ? strip_tags($_POST['username']) : '') : $object->getUsername()))) ?>' type='text' class='form-control' id='username' name='username' required />
</div>
  
<div class='form-group'>
  <label for='password'>password</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['password']) ? strip_tags($_POST['password']) : '') : $object->getPassword()))) ?>' type='text' class='form-control' id='password' name='password' required />
</div>
  
<div class='form-group'>
  <label for='email'>email</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['email']) ? strip_tags($_POST['email']) : '') : $object->getEmail()))) ?>' type='text' class='form-control' id='email' name='email' required />
</div>
  
<div class='checkbox'>
  <label>
    <input type='checkbox' <?php echo ($object->isNew() ? (isset($_POST['valid']) ? ($_POST['valid'] ? 'checked="checked"' : '') : '') : ($object->getValid() ? "checked='checked'" : "")) ?> id='valid' name='valid' value='1' /> valid
  </label>
</div>
  
<div class='form-group'>
  <label for='last_used'>last_used</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['last_used']) ? strip_tags($_POST['last_used']) : '') : $object->getLastUsed()))) ?>' type='text' class='form-control' id='last_used' name='last_used' />
</div>
  
<div class='form-group'>
  <label for='last_success_cookie_refresh'>last_success_cookie_refresh</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['last_success_cookie_refresh']) ? strip_tags($_POST['last_success_cookie_refresh']) : '') : $object->getLastSuccessCookieRefresh()))) ?>' type='text' class='form-control' id='last_success_cookie_refresh' name='last_success_cookie_refresh' />
</div>
  
<div class='form-group'>
  <label for='registered_at'>registered_at</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['registered_at']) ? strip_tags($_POST['registered_at']) : '') : $object->getRegisteredAt()))) ?>' type='text' class='form-control' id='registered_at' name='registered_at' />
</div>
  
<div class='form-group'>
  <label for='rank'>rank</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['rank']) ? strip_tags($_POST['rank']) : '') : $object->getRank()))) ?>' type='text' class='form-control' id='rank' name='rank' />
</div>

  <input type="submit" name="submit" value="<?php i18n_echo(array(
      'en' => 'Edit', 
      'zh' => '编辑'
  )) ?>" class="btn btn-default">
</form>
          
        </div>
      </div>
    </div>
  </div>
</div>

