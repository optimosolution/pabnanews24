<?php
$this->breadcrumbs = array(
    'Acl Actions' => array('actions', 'cid' => $_GET['cid']),
    'Create',
);

$this->menu = array(
    array('label' => 'Controllers', 'url' => array('aclController/admin'), 'active' => true, 'icon' => 'icon-arrow-up'),
    array('label' => 'Manage', 'url' => array('actions', 'cid' => $_GET['cid']), 'active' => true, 'icon' => 'icon-home'),
);
?>
<div class="form-actions">
    <h2>New</h2>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>