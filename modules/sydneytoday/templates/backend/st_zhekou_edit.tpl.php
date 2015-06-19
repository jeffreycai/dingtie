<div id="page-wrapper">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header"><?php i18n_echo(array(
        'en' => 'SydneyToday Zhekou',
        'zh' => '今日悉尼 - 折扣',
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
          
<form role="form" method="POST" action="<?php echo uri('admin/st_zhekou/edit/' . $object->getId()) ?>">
  
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
  <label>sortid</label>
    <select class='form-control' id='sortid' name='sortid'>
      <option value='1' <?php echo ($object->isNew() ? (isset($_POST['sortid']) ? ($_POST['sortid'] == '1' ? 'selected="selected"' : '') : '') : ($object->getSortid() == "1" ? "selected='selected'" : "")) ?>>免费 / Sample</option>
      <option value='2' <?php echo ($object->isNew() ? (isset($_POST['sortid']) ? ($_POST['sortid'] == '2' ? 'selected="selected"' : '') : '') : ($object->getSortid() == "2" ? "selected='selected'" : "")) ?>>时尚 / 美妆</option>
      <option value='3' <?php echo ($object->isNew() ? (isset($_POST['sortid']) ? ($_POST['sortid'] == '3' ? 'selected="selected"' : '') : '') : ($object->getSortid() == "3" ? "selected='selected'" : "")) ?>>美食 / 旅游</option>
      <option value='4' <?php echo ($object->isNew() ? (isset($_POST['sortid']) ? ($_POST['sortid'] == '4' ? 'selected="selected"' : '') : '') : ($object->getSortid() == "4" ? "selected='selected'" : "")) ?>>电子 / 科技</option>
      <option value='5' <?php echo ($object->isNew() ? (isset($_POST['sortid']) ? ($_POST['sortid'] == '5' ? 'selected="selected"' : '') : '') : ($object->getSortid() == "5" ? "selected='selected'" : "")) ?>>其他</option>
    </select>
</div>
  
<div class='form-group'>
  <label for='my_expressurl'>my_expressurl</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['my_expressurl']) ? strip_tags($_POST['my_expressurl']) : '') : $object->getMyExpressurl()))) ?>' type='text' class='form-control' id='my_expressurl' name='my_expressurl' />
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

