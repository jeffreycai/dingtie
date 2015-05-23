

<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><?php i18n_echo(array('en' => 'SydneyToday Zhekou','zh' => '今日悉尼 - zhekou',)); ?></h1>
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
                <th>editpwd</th>
                <th>sortid</th>
                <th>my_expressurl</th>
                <th>content</th>
                <th>outurl1</th>
                <th>outurl2</th>
                <th>outurl3</th>
                <th>outurl4</th>
                <th>outurl5</th>
                <th>outurl6</th>
                <th>outurl7</th>
                <th>outurl8</th>
                <th>Actions</th>
      </tr>
  </thead>
  <tbody>
    <?php foreach ($objects as $object): ?>
    <tr>
            <td><?php echo $object->getId() ?></td>
            <td><?php echo $object->getTitle() ?></td>
            <td><?php echo $object->getEmail() ?></td>
            <td><?php echo $object->getEditpwd() ?></td>
            <td><?php echo $object->getSortid() ?></td>
            <td><?php echo $object->getMyExpressurl() ?></td>
            <td><?php echo $object->getContent() ?></td>
            <td><?php echo $object->getOuturl1() ?></td>
            <td><?php echo $object->getOuturl2() ?></td>
            <td><?php echo $object->getOuturl3() ?></td>
            <td><?php echo $object->getOuturl4() ?></td>
            <td><?php echo $object->getOuturl5() ?></td>
            <td><?php echo $object->getOuturl6() ?></td>
            <td><?php echo $object->getOuturl7() ?></td>
            <td><?php echo $object->getOuturl8() ?></td>
            <td>
        <div class="btn-group">
          <a class="btn btn-default btn-sm" href="<?php echo uri('admin/st_zhekou/edit/' . $object->getId()); ?>"><i class="fa fa-edit"></i></a>
          <a onclick="return confirm('<?php echo i18n(array('en' => 'Are you sure to delete this record ?', 'zh' => '你确定删除这条记录吗 ?')); ?>');" class="btn btn-default btn-sm" href="<?php echo uri('admin/st_zhekou/delete/' . $object->getId(), false); ?>"><i class="fa fa-remove"></i></a>
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