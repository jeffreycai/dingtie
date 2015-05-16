<?php 
$start_entry = ($current_page - 1)*$settings['backend_per_page'] + 1;
$end_entry = min(array($total, $current_page*$settings['backend_per_page']));
?>

<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Tigtag</h1>
    </div>
  </div>
  
  <div class="row">
    <div class="col-lg-12">
      <a href="<?php echo uri('admin/tigtag/user/export') ?>" target="_blank">Export</a>
      <div class="panel panel-default">
        <div class="panel-heading">User list</div>
        <div class="panel-body">
          
        <?php echo Message::renderMessages(); ?>
          
<table class="table table-striped table-bordered table-hover dataTable no-footer">
  <thead>
      <tr role="row">
        <th>Username</th>
        <th>isValid?</th>
<!--        <th>Created at</th>-->
        <th>Last refresh</th>
        <th>Last used</th>
        <th><?php i18n_echo(array('en' => 'Actions', 'zh' => '操作')) ?></th>
      </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user): ?>
    <tr id="user_<?php echo $user->getId(); ?>">
      <td><?php echo $user->getUsername(); ?></td>
      <td class="isValid"><i class="fa <?php if ($user->getValid()): ?>fa-check<?php else: ?>fa-times<?php endif; ?>"></i></td>
      
      <!--<td><?php echo $user->getCreated('Y-m-d'); ?></td>-->
      <td><?php echo $user->getLastSuccessCookieRefresh() ? time_ago($user->getLastSuccessCookieRefresh()) : 'N/A' ?></td>
      <td><?php echo $user->getLastUsed() ? time_ago($user->getLastUsed()) : 'N/A' ?></td>
      <td class="actions">
        <span class="validate">
          <a title="validate" href="#"><i class="fa fa-search"></i></a>
          <i class="loading fa fa-spinner fa-spin"></i>
        </span>
        <span class="refresh">
          <a title="refresh" href="<?php echo uri('admin/tigtag/user/refresh/' . $user->getId(), false) ?>"><i class="fa fa-refresh"></i></a>
        </span>
        <span class="delete">
          <a title="delete" href="#"><i class="fa fa-times"></i></a>
          <i class="loading fa fa-spinner fa-spin"></i>
        </span>
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