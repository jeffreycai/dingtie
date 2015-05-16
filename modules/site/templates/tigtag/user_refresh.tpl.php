<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Tigtag</h1>
    </div>
  </div>
  
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">Refresh user <?php echo $username ?></div>
        <div class="panel-body">
          
        <?php echo Message::renderMessages(); ?>
          
          <form action="" method="POST" autocomplete="off">
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
    <input type="hidden" name='form_hash' value="<?php echo $form_hash ?>" />
    <input type="hidden" name='login_hash' value="<?php echo $login_hash ?>" />
    <input type="hidden" name='cookie_path' value="<?php echo $cookie_path ?>" />
    <input type="hidden" name='username' value="<?php echo $username ?>" />
    <input type="hidden" name='password' value="<?php echo $password ?>" />
            
          </form>
          
        </div>
      </div>
    </div>
  </div>
</div>