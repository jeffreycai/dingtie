

<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><?php i18n_echo(array('en' => 'SydneyToday Xinping','zh' => '今日悉尼 - 新品',)); ?></h1>
    </div>
  </div>
  
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading"><?php i18n_echo(array('en' => 'List', 'zh' => '列表')) ?></div>
        <div class="panel-body">
          
        <?php echo Message::renderMessages(); ?>
          
<table class="table table-striped table-bordered table-hover dataTable no-footer">
  <thead>
      <tr role="row">
                <th>id</th>
                <th>title</th>
                <th>email</th>
                <th>mobile</th>
                <th>editpwd</th>
                <th>jiaoyifangshi</th>
                <th>shifousonghuo</th>
                <th>chanpingfenlei</th>
                <th>jiage</th>
                <th>content</th>
                <th>images</th>
                <th>nid</th>
                <th>Actions</th>
      </tr>
  </thead>
  <tbody>
    <?php foreach ($objects as $object): ?>
    <tr>
            <td><?php echo $object->getId() ?></td>
            <td><?php echo $object->getTitle() ?></td>
            <td><?php echo $object->getEmail() ?></td>
            <td><?php echo $object->getMobile() ?></td>
            <td><?php echo $object->getEditpwd() ?></td>
            <td><?php echo $object->getJiaoyifangshi() ?></td>
            <td><?php echo $object->getShifousonghuo() ?></td>
            <td><?php echo $object->getChanpingfenlei() ?></td>
            <td><?php echo $object->getJiage() ?></td>
            <td><?php echo $object->getContent() ?></td>
            <td><?php echo $object->getImages() ?></td>
            <td><?php echo $object->getNid() ?></td>
            <td>
        <div class="btn-group">
          <a class="btn btn-default btn-sm" href="<?php echo uri('admin/st_xinping/edit/' . $object->getId()); ?>"><i class="fa fa-edit"></i></a>
          <a onclick="return confirm('<?php echo i18n(array('en' => 'Are you sure to delete this record ?', 'zh' => '你确定删除这条记录吗 ?')); ?>');" class="btn btn-default btn-sm" href="<?php echo uri('admin/st_xinping/delete/' . $object->getId(), false); ?>"><i class="fa fa-remove"></i></a>
        </div>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div class="row">
  <div class="col-sm-12" style="text-align: right;">
  <?php i18n_echo(array(
      'en' => 'Showing ' . $start_entry . ' to ' . $end_entry . ' of ' . $total . ' entries', 
      'zh' => '显示' . $start_entry . '到' . $end_entry . '条记录，共' . $total . '条记录',
  )); ?>
  </div>
  <div class="col-sm-12" style="text-align: right;">
  <?php echo $pager; ?>
  </div>
</div>
          
        </div>
      </div>
    </div>
  </div>
</div>