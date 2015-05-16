<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Tigtag</h1>
    </div>
  </div>
  
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">Create new user</div>
        <div class="panel-body">
          
        <?php echo Message::renderMessages(); ?>
          
          <form action="" method="POST" autocomplete="off">
            <div class="form-group">
              <label>Username *</label>
              <input type="text" required="required" class="form-control" name="username" value="<?php echo $username; ?>" />
            </div>
            <div class="form-group">
              <label>Password *</label>
              <input type="password" required="required" class="form-control" name="password" value="<?php echo $password ?>" />
            </div>
            <div class="form-group">
              <label>Email *</label>
              <input type="email" required="required" class="form-control" name="email" value="<?php echo $email ?>" />
            </div>
            <div class="form-group">
              <lable>Captcha</lable>
              <span class="captcha"><?php echo $seccode_markup; ?></span>
            </div>
            <div class="form-group">
              <label>Seccode *</label>
              <input type="text" required="required" class="form-control" name="seccode" autocomplete="off" />
            </div>
            <input type="submit" class="btn btn-default" value="submit" name="submit" />
            
            
    <input type="hidden" name='seccode_hash' value="<?php echo $seccode_hash ?>" />
    <input type="hidden" name='formhash' value="<?php echo $formhash ?>" />
    <input type="hidden" name='cookie_path' value="<?php echo $cookie_path ?>" />
    <input type="hidden" name='username_id' value="<?php echo $username_id ?>" />
    <input type="hidden" name='password_id' value="<?php echo $password_id ?>" />
    <input type="hidden" name='password_confirm_id' value="<?php echo $password_confirm_id ?>" />
    <input type="hidden" name='email_id' value="<?php echo $email_id ?>" />
    <input type="hidden" name='status' value="<?php echo $status ?>" />
    <input type="hidden" name='status_id' value="<?php echo $status_id ?>" />
    <input type="hidden" name='referer' value="<?php echo $referer ?>" />
    <input type="hidden" name='regsubmit' value="<?php echo $regsubmit ?>" />
            
          </form>
          
        </div>
      </div>
    </div>
  </div>
</div>