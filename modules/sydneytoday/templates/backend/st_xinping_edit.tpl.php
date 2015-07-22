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
  <label for='mobile'>mobile</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['mobile']) ? strip_tags($_POST['mobile']) : '') : $object->getMobile()))) ?>' type='text' class='form-control' id='mobile' name='mobile' />
</div>
  
<div class='form-group'>
  <label for='editpwd'>editpwd</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['editpwd']) ? strip_tags($_POST['editpwd']) : '') : $object->getEditpwd()))) ?>' type='text' class='form-control' id='editpwd' name='editpwd' />
</div>
  
<div class='form-group'>
  <label>jiaoyifangshi</label>
    <select class='form-control' id='jiaoyifangshi' name='jiaoyifangshi'>
      <option value='_none' <?php echo ($object->isNew() ? (isset($_POST['jiaoyifangshi']) ? ($_POST['jiaoyifangshi'] == '_none' ? 'selected="selected"' : '') : '') : ($object->getJiaoyifangshi() == "_none" ? "selected='selected'" : "")) ?>>_none</option>
      <option value='102' <?php echo ($object->isNew() ? (isset($_POST['jiaoyifangshi']) ? ($_POST['jiaoyifangshi'] == '102' ? 'selected="selected"' : '') : '') : ($object->getJiaoyifangshi() == "102" ? "selected='selected'" : "")) ?>>出售</option>
      <option value='103' <?php echo ($object->isNew() ? (isset($_POST['jiaoyifangshi']) ? ($_POST['jiaoyifangshi'] == '103' ? 'selected="selected"' : '') : '') : ($object->getJiaoyifangshi() == "103" ? "selected='selected'" : "")) ?>>求购</option>
    </select>
</div>
  
<div class='form-group'>
  <label>shifousonghuo</label>
    <select class='form-control' id='shifousonghuo' name='shifousonghuo'>
      <option value='_none' <?php echo ($object->isNew() ? (isset($_POST['shifousonghuo']) ? ($_POST['shifousonghuo'] == '_none' ? 'selected="selected"' : '') : '') : ($object->getShifousonghuo() == "_none" ? "selected='selected'" : "")) ?>>_none</option>
      <option value='98' <?php echo ($object->isNew() ? (isset($_POST['shifousonghuo']) ? ($_POST['shifousonghuo'] == '98' ? 'selected="selected"' : '') : '') : ($object->getShifousonghuo() == "98" ? "selected='selected'" : "")) ?>>不限</option>
      <option value='99' <?php echo ($object->isNew() ? (isset($_POST['shifousonghuo']) ? ($_POST['shifousonghuo'] == '99' ? 'selected="selected"' : '') : '') : ($object->getShifousonghuo() == "99" ? "selected='selected'" : "")) ?>>是</option>
      <option value='100' <?php echo ($object->isNew() ? (isset($_POST['shifousonghuo']) ? ($_POST['shifousonghuo'] == '100' ? 'selected="selected"' : '') : '') : ($object->getShifousonghuo() == "100" ? "selected='selected'" : "")) ?>>否</option>
    </select>
</div>
  
<div class='form-group'>
  <label>chanpingfenlei</label>
    <select class='form-control' id='chanpingfenlei' name='chanpingfenlei'>
      <option value='_none' <?php echo ($object->isNew() ? (isset($_POST['chanpingfenlei']) ? ($_POST['chanpingfenlei'] == '_none' ? 'selected="selected"' : '') : '') : ($object->getChanpingfenlei() == "_none" ? "selected='selected'" : "")) ?>> - 无 -</option>
      <option value='104' <?php echo ($object->isNew() ? (isset($_POST['chanpingfenlei']) ? ($_POST['chanpingfenlei'] == '104' ? 'selected="selected"' : '') : '') : ($object->getChanpingfenlei() == "104" ? "selected='selected'" : "")) ?>>不限</option>
      <option value='105' <?php echo ($object->isNew() ? (isset($_POST['chanpingfenlei']) ? ($_POST['chanpingfenlei'] == '105' ? 'selected="selected"' : '') : '') : ($object->getChanpingfenlei() == "105" ? "selected='selected'" : "")) ?>>家居用品</option>
      <option value='106' <?php echo ($object->isNew() ? (isset($_POST['chanpingfenlei']) ? ($_POST['chanpingfenlei'] == '106' ? 'selected="selected"' : '') : '') : ($object->getChanpingfenlei() == "106" ? "selected='selected'" : "")) ?>>家电/电脑</option>
      <option value='107' <?php echo ($object->isNew() ? (isset($_POST['chanpingfenlei']) ? ($_POST['chanpingfenlei'] == '107' ? 'selected="selected"' : '') : '') : ($object->getChanpingfenlei() == "107" ? "selected='selected'" : "")) ?>>手机及配件</option>
      <option value='108' <?php echo ($object->isNew() ? (isset($_POST['chanpingfenlei']) ? ($_POST['chanpingfenlei'] == '108' ? 'selected="selected"' : '') : '') : ($object->getChanpingfenlei() == "108" ? "selected='selected'" : "")) ?>>服装饰品</option>
      <option value='109' <?php echo ($object->isNew() ? (isset($_POST['chanpingfenlei']) ? ($_POST['chanpingfenlei'] == '109' ? 'selected="selected"' : '') : '') : ($object->getChanpingfenlei() == "109" ? "selected='selected'" : "")) ?>>美容护肤</option>
      <option value='110' <?php echo ($object->isNew() ? (isset($_POST['chanpingfenlei']) ? ($_POST['chanpingfenlei'] == '110' ? 'selected="selected"' : '') : '') : ($object->getChanpingfenlei() == "110" ? "selected='selected'" : "")) ?>>烟酒食品</option>
      <option value='111' <?php echo ($object->isNew() ? (isset($_POST['chanpingfenlei']) ? ($_POST['chanpingfenlei'] == '111' ? 'selected="selected"' : '') : '') : ($object->getChanpingfenlei() == "111" ? "selected='selected'" : "")) ?>>游戏娱乐</option>
      <option value='112' <?php echo ($object->isNew() ? (isset($_POST['chanpingfenlei']) ? ($_POST['chanpingfenlei'] == '112' ? 'selected="selected"' : '') : '') : ($object->getChanpingfenlei() == "112" ? "selected='selected'" : "")) ?>>学习资料</option>
      <option value='113' <?php echo ($object->isNew() ? (isset($_POST['chanpingfenlei']) ? ($_POST['chanpingfenlei'] == '113' ? 'selected="selected"' : '') : '') : ($object->getChanpingfenlei() == "113" ? "selected='selected'" : "")) ?>>汽车及配件</option>
      <option value='114' <?php echo ($object->isNew() ? (isset($_POST['chanpingfenlei']) ? ($_POST['chanpingfenlei'] == '114' ? 'selected="selected"' : '') : '') : ($object->getChanpingfenlei() == "114" ? "selected='selected'" : "")) ?>>成人用品</option>
      <option value='115' <?php echo ($object->isNew() ? (isset($_POST['chanpingfenlei']) ? ($_POST['chanpingfenlei'] == '115' ? 'selected="selected"' : '') : '') : ($object->getChanpingfenlei() == "115" ? "selected='selected'" : "")) ?>>其它</option>
    </select>
</div>
  
<div class='form-group'>
  <label for='jiage'>jiage</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['jiage']) ? strip_tags($_POST['jiage']) : '') : $object->getJiage()))) ?>' type='text' class='form-control' id='jiage' name='jiage' />
</div>
  
<div class='form-group'>
  <label for='content'>content</label>
  <textarea class='form-control' rows='5' id='content' name='content'><?php echo ($object->isNew() ? (isset($_POST['content']) ? htmlentities($_POST['content']) : '') : htmlentities($object->getContent())) ?></textarea>
</div>
  
<div class='form-group' id='images'>
  <label>images</label>
  <textarea name='images' style='display: none;'></textarea>
  <div class='file-fields' style='border: 1px solid #999; padding: 6px;'></div>
  <button style='margin-top:6px;' class='add btn btn-primary btn-sm' type='button'><?php echo i18n(array('en' => 'Add image', 'zh' => '添加图片')) ?></button>
</div>

<?php
  // get json string of prepopulated image links
  $prepopulate = $object->isNew() ? '' : $object->getImages();
  if ($prepopulate != '') {
    $tokens = explode("\n", trim($prepopulate));
    $prepopulate = array();
    foreach ($tokens as $token) {
      $prepopulate[] = trim($token, "\n\r");
    }
  }
?>

<script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js'></script>

<script>
  $(function(){
    var container = $('#images');

    $('.file-fields', container).sortable({
      update: function(event, ui) {updateHiddenTextarea(container);}
    });

    // initial value to pop
    var initial_images = <?php echo $prepopulate == '' ? '""' : json_encode($prepopulate); ?>;
    if (initial_images != '') {
      for (var i in initial_images) {
        img = initial_images[i];
        var html = addImageRow(img, false);
        $('.file-fields', container).append(html);
      }
    } else {
      var html = addImageRow(false, true);
      $('.file-fields', container).append(html);
    }

    updateHiddenTextarea(container);
    // action when click select file button
    $(document).on('click', '#images .select', function(){
      var tr = $(this).parents('.file-field');
      $('input[type=file]', tr).click();
      $('.upload', tr).prop('disabled', false);
    });
    // action when file filed is changed (we do validation here)
    $(document).on('change', '#images input[type=file]', function(){
      var tr = $(this).parents('.file-field');
      var file = this.files[0];
      if (!file.type.match(/^image/)) {
        alert('<?php echo i18n(array('en' => 'Upload file needs to be an image file', 'zh' => '上传文件需为图片文件')) ?>');
      } else if (file.size > (1 * 1000 * 1000)) {
        alert('<?php echo i18n(array('en' => 'File size should be less than', 'zh' => '文件大小应小于')) . ' 2MB' ?>');
      } else {
        var reader = new FileReader();
        reader.onload = (function(e){
          $('.preview', tr).html('<img src="'+e.target.result+'" style="height:150px;" />');
        });
        reader.readAsDataURL(this.files[0]);
      }
    });
    // action when adding an new image row
    $(document).on('click', '#images .add', function(){
      var html = addImageRow(false, true);
      $('.file-fields', container).append(html);
    });
    // action when uploading image via ajax
    $(document).on('click', '#images .upload', function(){
      var tr = $(this).parents('.file-field');
      var file_field = $('input[type=file]', tr);
      var file = file_field[0].files[0];

      var formData = new FormData();
      formData.append('file', file, file.name);
      $('.btn', tr).prop('disabled', true);
      $('.upload i', tr).removeClass('fa-upload').addClass('fa-spin').addClass('fa-spinner');
      $.ajax({
        url: '<?php echo uri("modules/sydneytoday/controllers/backend/st_xinping_form_field_images.php" ,false) ?>',
        type: 'POST',
        data: formData,
        cache: false,
        dataType: 'json',
        processData: false, // Don't process the files
        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
        success: function(data, textStatus, jqXHR) {
          if (typeof(data.error) !== 'undefined') {
            alert('<?php echo i18n(array('en' => 'Error: ', 'zh' => '错误: ')) ?>' + data.error);
          } else {
            tr.html(addImageRow(data.uri, false));;
            $('.remove',tr).data('uri', data.uri);
            updateHiddenTextarea(container);
          }
          $('.btn', tr).prop('disabled', false);
          $('.upload i', tr).removeClass('fa-spin').removeClass('fa-spinner').addClass('fa-upload');
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('<?php echo i18n(array('en' => 'ajax error: ', 'zh' => 'ajax失败')) ?>: ' + textStatus);
          $('.btn', tr).prop('disabled', false);
          $('.upload i', tr).removeClass('fa-spin').removeClass('fa-spinner').addClass('fa-upload');
        }
      });
    });
    // action when removing an image
    $(document).on('click', '#images .remove', function(){
      var tr = $(this).parents('.file-field');
      if (typeof($(this).data('uri')) !== 'undefined') {
        var img = $(this).data('uri');
        $('.btn', tr).prop('disabled', true);
        $('.remove i', tr).addClass('fa-spin').addClass('fa-spinner').removeClass('fa-remove');
        // ajax to remove the image
        $.ajax({
          url: '<?php echo uri("modules/sydneytoday/controllers/backend/st_xinping_form_field_images"."_remove.php" ,false) ?>?path=' + encodeURIComponent(img),
          type: 'POST',
          dataType: 'json',
          success: function(data, textStatus, jqXHR) {
            if (typeof(data.error) !== 'undefined') {
              alert('<?php echo i18n(array('en' => 'Error: ', 'zh' => '错误: ')) ?>' + data.error);
tr.fadeOut(function(){tr.remove();});
              updateHiddenTextarea(container);
            } else {
tr.fadeOut(function(){tr.remove();});
              updateHiddenTextarea(container);
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            alert('<?php echo i18n(array('en' => 'ajax error: ', 'zh' => 'ajax失败')) ?>: ' + textStatus);
            $('.btn', tr).prop('disabled', false);
            $('.remove i', tr).removeClass('fa-spin').removeClass('fa-spinner').addClass('fa-remove');
            updateHiddenTextarea(container);  
          }
        });
      } else {
tr.fadeOut();
      }
    });

    // functions
    function addImageRow(img, isnew) {
      var img_html = img ? '<img src="/<?php echo get_sub_root() ?>'+img+'" style="height:150px;" />' : '<div style="height:150px;width:200px;background-color:#AAA;"></div>';
      var upload_button = isnew ? 
        '<button type="button" class="btn btn-default btn-sm upload" disabled><i class="fa fa-upload"></i></button>' :
        '<!-- <button type="button" class="btn btn-default btn-sm upload" disabled><i class="fa fa-upload"></i></button> -->';
      var select_button = isnew ?
        '<button type="button" class="btn btn-default btn-sm select"><i class="fa fa-file"></i></button>' :
        '<!-- <button type="button" class="btn btn-default btn-sm select"><i class="fa fa-file"></i></button> -->';
      var data_uri = isnew ? '' : 'data-uri="'+img+'"';
      return ('\n\
    <div class="file-field" style="margin-bottom:6px; position:relative;">\n\
      <div class="preview">'+img_html+'</div>\n\
      <div class="btn-group" style="position:absolute; bottom:5px; left:5px; " aria-label="...">\n\
        <input type="file" class="btn btn-default btn-sm" style="display:none;" />\n\
        '+select_button+'\n\
        '+upload_button+'\n\
        <button type="button" class="btn btn-default btn-sm remove" '+data_uri+'><i class="fa fa-remove"></i></button>\n\
      </div>\n\
    </div>');
    }

    function updateHiddenTextarea(container) {
      var html = '';
      $('.preview img', container).each(function(){
        var uri = $(this).attr('src');
        // remove subroot
        var subroot = '<?php echo get_sub_root() ?>';
        uri = uri.substr(subroot.length+1, uri.length-1);
        html = html + uri + "\n";
      });
      $('textarea', container).val(html);
    }
  });
</script>
  
<div class='form-group'>
  <label for='nid'>nid</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['nid']) ? strip_tags($_POST['nid']) : '') : $object->getNid()))) ?>' type='text' class='form-control' id='nid' name='nid' />
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

