<div id="page-wrapper">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header"><?php i18n_echo(array(
        'en' => 'SydneyToday Zufang',
        'zh' => '今日悉尼 - 租房',
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
          
<form role="form" method="POST" action="<?php echo uri('admin/st_zufang/edit/' . $object->getId()) ?>">
  
<div class='form-group'>
  <label for='title'>title</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['title']) ? strip_tags($_POST['title']) : '') : $object->getTitle()))) ?>' type='text' class='form-control' id='title' name='title' />
</div>
  
<div class='form-group'>
  <label for='email'>email</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['email']) ? strip_tags($_POST['email']) : '') : $object->getEmail()))) ?>' type='text' class='form-control' id='email' name='email' required />
</div>
  
<div class='form-group'>
  <label for='editpwd'>editpwd</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['editpwd']) ? strip_tags($_POST['editpwd']) : '') : $object->getEditpwd()))) ?>' type='text' class='form-control' id='editpwd' name='editpwd' required />
</div>
  
<div class='form-group'>
  <label>jiaoyixingzhi</label>
    <select class='form-control' id='jiaoyixingzhi' name='jiaoyixingzhi'>
      <option value='个人' <?php echo ($object->isNew() ? (isset($_POST['jiaoyixingzhi']) ? ($_POST['jiaoyixingzhi'] == '个人' ? 'selected="selected"' : '') : '') : ($object->getJiaoyixingzhi() == "个人" ? "selected='selected'" : "")) ?>>个人</option>
      <option value='中介' <?php echo ($object->isNew() ? (isset($_POST['jiaoyixingzhi']) ? ($_POST['jiaoyixingzhi'] == '中介' ? 'selected="selected"' : '') : '') : ($object->getJiaoyixingzhi() == "中介" ? "selected='selected'" : "")) ?>>中介</option>
    </select>
</div>
  
<div class='form-group'>
  <label>chuzufangshi</label>
    <div class='checkbox'>
      <label><input type='checkbox' name='chuzufangshi[]' value='整租' /> 整租</label>
      <label><input type='checkbox' name='chuzufangshi[]' value='单间' /> 单间</label>
      <label><input type='checkbox' name='chuzufangshi[]' value='客厅' /> 客厅</label>
      <label><input type='checkbox' name='chuzufangshi[]' value='Share' /> Share</label>
    </div>
</div>
  
<div class='form-group'>
  <label for='jiage'>jiage</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['jiage']) ? strip_tags($_POST['jiage']) : '') : $object->getJiage()))) ?>' type='text' class='form-control' id='jiage' name='jiage' required />
</div>
  
<div class='form-group'>
  <label>huxing</label>
    <select class='form-control' id='huxing' name='huxing'>
      <option value='Apartment' <?php echo ($object->isNew() ? (isset($_POST['huxing']) ? ($_POST['huxing'] == 'Apartment' ? 'selected="selected"' : '') : '') : ($object->getHuxing() == "Apartment" ? "selected='selected'" : "")) ?>>Apartment</option>
      <option value='Studio' <?php echo ($object->isNew() ? (isset($_POST['huxing']) ? ($_POST['huxing'] == 'Studio' ? 'selected="selected"' : '') : '') : ($object->getHuxing() == "Studio" ? "selected='selected'" : "")) ?>>Studio</option>
      <option value='Unit' <?php echo ($object->isNew() ? (isset($_POST['huxing']) ? ($_POST['huxing'] == 'Unit' ? 'selected="selected"' : '') : '') : ($object->getHuxing() == "Unit" ? "selected='selected'" : "")) ?>>Unit</option>
      <option value='House' <?php echo ($object->isNew() ? (isset($_POST['huxing']) ? ($_POST['huxing'] == 'House' ? 'selected="selected"' : '') : '') : ($object->getHuxing() == "House" ? "selected='selected'" : "")) ?>>House</option>
      <option value='Town House' <?php echo ($object->isNew() ? (isset($_POST['huxing']) ? ($_POST['huxing'] == 'Town House' ? 'selected="selected"' : '') : '') : ($object->getHuxing() == "Town House" ? "selected='selected'" : "")) ?>>Town House</option>
      <option value='仓库/车库' <?php echo ($object->isNew() ? (isset($_POST['huxing']) ? ($_POST['huxing'] == '仓库/车库' ? 'selected="selected"' : '') : '') : ($object->getHuxing() == "仓库/车库" ? "selected='selected'" : "")) ?>>仓库/车库</option>
      <option value='Office' <?php echo ($object->isNew() ? (isset($_POST['huxing']) ? ($_POST['huxing'] == 'Office' ? 'selected="selected"' : '') : '') : ($object->getHuxing() == "Office" ? "selected='selected'" : "")) ?>>Office</option>
      <option value='其它' <?php echo ($object->isNew() ? (isset($_POST['huxing']) ? ($_POST['huxing'] == '其它' ? 'selected="selected"' : '') : '') : ($object->getHuxing() == "其它" ? "selected='selected'" : "")) ?>>其它</option>
    </select>
</div>
  
<div class='form-group'>
  <label for='suozaiquyu'>suozaiquyu</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['suozaiquyu']) ? strip_tags($_POST['suozaiquyu']) : '') : $object->getSuozaiquyu()))) ?>' type='text' class='form-control' id='suozaiquyu' name='suozaiquyu' required />
</div>
  
<div class='form-group'>
  <label for='fangwudizhi'>fangwudizhi</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['fangwudizhi']) ? strip_tags($_POST['fangwudizhi']) : '') : $object->getFangwudizhi()))) ?>' type='text' class='form-control' id='fangwudizhi' name='fangwudizhi' />
</div>
  
<div class='form-group'>
  <label>fangwupeizhi</label>
    <div class='checkbox'>
      <label><input type='checkbox' name='fangwupeizhi[]' value='包水' /> 包水</label>
      <label><input type='checkbox' name='fangwupeizhi[]' value='包电' /> 包电</label>
      <label><input type='checkbox' name='fangwupeizhi[]' value='包宽带' /> 包宽带</label>
      <label><input type='checkbox' name='fangwupeizhi[]' value='包煤气' /> 包煤气</label>
      <label><input type='checkbox' name='fangwupeizhi[]' value='床' /> 床</label>
      <label><input type='checkbox' name='fangwupeizhi[]' value='洗衣机' /> 洗衣机</label>
      <label><input type='checkbox' name='fangwupeizhi[]' value='空调' /> 空调</label>
      <label><input type='checkbox' name='fangwupeizhi[]' value='冰箱' /> 冰箱</label>
      <label><input type='checkbox' name='fangwupeizhi[]' value='微波炉' /> 微波炉</label>
      <label><input type='checkbox' name='fangwupeizhi[]' value='电视机' /> 电视机</label>
      <label><input type='checkbox' name='fangwupeizhi[]' value='停车位' /> 停车位</label>
      <label><input type='checkbox' name='fangwupeizhi[]' value='其它' /> 其它</label>
    </div>
</div>
  
<div class='form-group'>
  <label>fujingsheshi</label>
    <div class='checkbox'>
      <label><input type='checkbox' name='fujingsheshi[]' value='火车站' /> 火车站</label>
      <label><input type='checkbox' name='fujingsheshi[]' value='公车站' /> 公车站</label>
      <label><input type='checkbox' name='fujingsheshi[]' value='学校' /> 学校</label>
      <label><input type='checkbox' name='fujingsheshi[]' value='超市' /> 超市</label>
      <label><input type='checkbox' name='fujingsheshi[]' value='健身房' /> 健身房</label>
      <label><input type='checkbox' name='fujingsheshi[]' value='游泳池' /> 游泳池</label>
      <label><input type='checkbox' name='fujingsheshi[]' value='其它' /> 其它</label>
    </div>
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

