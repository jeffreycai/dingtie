<div id="page-wrapper">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header"><?php i18n_echo(array(
        'en' => 'SydneyToday User',
        'zh' => '今日悉尼用户',
      )); ?></h1>
    </div>
  </div>
  
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading"><?php i18n_echo(array(
            'en' => 'Create', 
            'zh' => '创建'
        )) ?></div>
        <div class="panel-body">
          
        <?php echo Message::renderMessages(); ?>
          
<form role="form" method="POST" action="<?php echo uri('admin/st_user/create') ?>">
  
<div class='form-group'>
  <label for='email'>email</label>
  <input value='<?php echo $email ?>' type='text' class='form-control' id='email' name='email' required />
</div>
  
<div class='form-group'>
  <label for='password'>password</label>
  <input type='password' class='form-control' id='password' name='password' value="<?php echo $password ?>" required />
</div>
<div class='form-group'>
  <label for='retype_password'><?php echo i18n(array('en' => 'Retype', 'zh' => '再输一次')) ?> password</label>
  <input type='password' class='form-control' id='retype_password' name='retype_password' value="<?php echo $password ?>" required />
</div>
  
<div class='form-group'>
  <label for='last_used'>last_used</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['last_used']) ? strip_tags($_POST['last_used']) : '') : $object->getLastUsed()))) ?>' type='text' class='form-control' id='last_used' name='last_used' />
</div>
  
<div class='form-group'>
  <label for='registered_at'>registered_at</label>
  <input value='<?php echo time() ?>' type='text' class='form-control' id='registered_at' name='registered_at' />
</div>

<div class='form-group'>
  <label>yzimg</label>
  <?php echo $yzimg; ?>
  <input value='' type='text' class='form-control' name='yzimg' required />
</div>
  
  <input type="submit" name="submit" value="<?php i18n_echo(array(
      'en' => 'Create', 
      'zh' => '创建'
  )) ?>" class="btn btn-default">
</form>
          
        </div>
      </div>
    </div>
  </div>
</div>

