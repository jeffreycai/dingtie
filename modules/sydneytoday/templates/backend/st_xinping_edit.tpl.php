<div id="page-wrapper">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header"><?php i18n_echo(array(
        'en' => 'SydneyToday Xinping',
        'zh' => '今日悉尼 - 新品',
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
          
<form role="form" method="POST" action="<?php echo uri('admin/st_xinping/edit/' . $object->getId()) ?>">
  
<div class='form-group'>
  <label for='title'>title</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['title']) ? strip_tags($_POST['title']) : '') : $object->getTitle()))) ?>' type='text' class='form-control' id='title' name='title' />
</div>
  
<div class='form-group'>
  <label for='email'>email</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['email']) ? strip_tags($_POST['email']) : '') : $object->getEmail()))) ?>' type='text' class='form-control' id='email' name='email' />
</div>
  
<div class='form-group'>
  <label for='editpwd'>editpwd</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['editpwd']) ? strip_tags($_POST['editpwd']) : '') : $object->getEditpwd()))) ?>' type='text' class='form-control' id='editpwd' name='editpwd' />
</div>
  
<div class='form-group'>
  <label>jiaoyifangshi</label>
    <select class='form-control' id='jiaoyifangshi' name='jiaoyifangshi'>
      <option value='出售' <?php echo ($object->isNew() ? (isset($_POST['jiaoyifangshi']) ? ($_POST['jiaoyifangshi'] == '出售' ? 'selected="selected"' : '') : '') : ($object->getJiaoyifangshi() == "出售" ? "selected='selected'" : "")) ?>>出售</option>
      <option value='求购' <?php echo ($object->isNew() ? (isset($_POST['jiaoyifangshi']) ? ($_POST['jiaoyifangshi'] == '求购' ? 'selected="selected"' : '') : '') : ($object->getJiaoyifangshi() == "求购" ? "selected='selected'" : "")) ?>>求购</option>
    </select>
</div>
  
<div class='form-group'>
  <label>shifousonghuo</label>
    <select class='form-control' id='shifousonghuo' name='shifousonghuo'>
      <option value='是' <?php echo ($object->isNew() ? (isset($_POST['shifousonghuo']) ? ($_POST['shifousonghuo'] == '是' ? 'selected="selected"' : '') : '') : ($object->getShifousonghuo() == "是" ? "selected='selected'" : "")) ?>>是</option>
      <option value='否' <?php echo ($object->isNew() ? (isset($_POST['shifousonghuo']) ? ($_POST['shifousonghuo'] == '否' ? 'selected="selected"' : '') : '') : ($object->getShifousonghuo() == "否" ? "selected='selected'" : "")) ?>>否</option>
    </select>
</div>
  
<div class='form-group'>
  <label>chanpingfenlei</label>
    <select class='form-control' id='chanpingfenlei' name='chanpingfenlei'>
      <option value='家居用品' <?php echo ($object->isNew() ? (isset($_POST['chanpingfenlei']) ? ($_POST['chanpingfenlei'] == '家居用品' ? 'selected="selected"' : '') : '') : ($object->getChanpingfenlei() == "家居用品" ? "selected='selected'" : "")) ?>>家居用品</option>
      <option value='家电/电脑' <?php echo ($object->isNew() ? (isset($_POST['chanpingfenlei']) ? ($_POST['chanpingfenlei'] == '家电/电脑' ? 'selected="selected"' : '') : '') : ($object->getChanpingfenlei() == "家电/电脑" ? "selected='selected'" : "")) ?>>家电/电脑</option>
      <option value='手机及配件' <?php echo ($object->isNew() ? (isset($_POST['chanpingfenlei']) ? ($_POST['chanpingfenlei'] == '手机及配件' ? 'selected="selected"' : '') : '') : ($object->getChanpingfenlei() == "手机及配件" ? "selected='selected'" : "")) ?>>手机及配件</option>
      <option value='服装饰品' <?php echo ($object->isNew() ? (isset($_POST['chanpingfenlei']) ? ($_POST['chanpingfenlei'] == '服装饰品' ? 'selected="selected"' : '') : '') : ($object->getChanpingfenlei() == "服装饰品" ? "selected='selected'" : "")) ?>>服装饰品</option>
      <option value='美容护肤' <?php echo ($object->isNew() ? (isset($_POST['chanpingfenlei']) ? ($_POST['chanpingfenlei'] == '美容护肤' ? 'selected="selected"' : '') : '') : ($object->getChanpingfenlei() == "美容护肤" ? "selected='selected'" : "")) ?>>美容护肤</option>
      <option value='烟酒食品' <?php echo ($object->isNew() ? (isset($_POST['chanpingfenlei']) ? ($_POST['chanpingfenlei'] == '烟酒食品' ? 'selected="selected"' : '') : '') : ($object->getChanpingfenlei() == "烟酒食品" ? "selected='selected'" : "")) ?>>烟酒食品</option>
      <option value='游戏娱乐' <?php echo ($object->isNew() ? (isset($_POST['chanpingfenlei']) ? ($_POST['chanpingfenlei'] == '游戏娱乐' ? 'selected="selected"' : '') : '') : ($object->getChanpingfenlei() == "游戏娱乐" ? "selected='selected'" : "")) ?>>游戏娱乐</option>
      <option value='汽车及配件' <?php echo ($object->isNew() ? (isset($_POST['chanpingfenlei']) ? ($_POST['chanpingfenlei'] == '汽车及配件' ? 'selected="selected"' : '') : '') : ($object->getChanpingfenlei() == "汽车及配件" ? "selected='selected'" : "")) ?>>汽车及配件</option>
      <option value='成人用品' <?php echo ($object->isNew() ? (isset($_POST['chanpingfenlei']) ? ($_POST['chanpingfenlei'] == '成人用品' ? 'selected="selected"' : '') : '') : ($object->getChanpingfenlei() == "成人用品" ? "selected='selected'" : "")) ?>>成人用品</option>
      <option value='其它' <?php echo ($object->isNew() ? (isset($_POST['chanpingfenlei']) ? ($_POST['chanpingfenlei'] == '其它' ? 'selected="selected"' : '') : '') : ($object->getChanpingfenlei() == "其它" ? "selected='selected'" : "")) ?>>其它</option>
    </select>
</div>
  
<div class='form-group'>
  <label for='content'>content</label>
  <textarea class='form-control' rows='5' id='content' name='content'><?php echo ($object->isNew() ? (isset($_POST['content']) ? htmlentities($_POST['content']) : '') : htmlentities($object->getContent())) ?></textarea>
</div>
  
<div class='form-group'>
  <label for='outurl1'>outurl1</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['outurl1']) ? strip_tags($_POST['outurl1']) : '') : $object->getOuturl1()))) ?>' type='text' class='form-control' id='outurl1' name='outurl1' />
</div>
  
<div class='form-group'>
  <label for='outurl2'>outurl2</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['outurl2']) ? strip_tags($_POST['outurl2']) : '') : $object->getOuturl2()))) ?>' type='text' class='form-control' id='outurl2' name='outurl2' />
</div>
  
<div class='form-group'>
  <label for='outurl3'>outurl3</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['outurl3']) ? strip_tags($_POST['outurl3']) : '') : $object->getOuturl3()))) ?>' type='text' class='form-control' id='outurl3' name='outurl3' />
</div>
  
<div class='form-group'>
  <label for='outurl4'>outurl4</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['outurl4']) ? strip_tags($_POST['outurl4']) : '') : $object->getOuturl4()))) ?>' type='text' class='form-control' id='outurl4' name='outurl4' />
</div>
  
<div class='form-group'>
  <label for='outurl5'>outurl5</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['outurl5']) ? strip_tags($_POST['outurl5']) : '') : $object->getOuturl5()))) ?>' type='text' class='form-control' id='outurl5' name='outurl5' />
</div>
  
<div class='form-group'>
  <label for='outurl6'>outurl6</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['outurl6']) ? strip_tags($_POST['outurl6']) : '') : $object->getOuturl6()))) ?>' type='text' class='form-control' id='outurl6' name='outurl6' />
</div>
  
<div class='form-group'>
  <label for='outurl7'>outurl7</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['outurl7']) ? strip_tags($_POST['outurl7']) : '') : $object->getOuturl7()))) ?>' type='text' class='form-control' id='outurl7' name='outurl7' />
</div>
  
<div class='form-group'>
  <label for='outurl8'>outurl8</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['outurl8']) ? strip_tags($_POST['outurl8']) : '') : $object->getOuturl8()))) ?>' type='text' class='form-control' id='outurl8' name='outurl8' />
</div>
  
<div class='form-group'>
  <label for='fid'>fid</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['fid']) ? strip_tags($_POST['fid']) : '') : $object->getFid()))) ?>' type='text' class='form-control' id='fid' name='fid' />
</div>
  
<div class='form-group'>
  <label for='post_id'>post_id</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['post_id']) ? strip_tags($_POST['post_id']) : '') : $object->getPostId()))) ?>' type='text' class='form-control' id='post_id' name='post_id' />
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

