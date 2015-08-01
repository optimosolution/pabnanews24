<?php
$this->breadcrumbs = array(
    'Users' => array('admin'),
    $model->name => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Details', 'url' => array('view', 'id' => $model->id), 'active' => true, 'icon' => 'icon-th-large'),
    array('label' => 'Change Password', 'url' => array('edit', 'id' => $model->id), 'active' => true, 'icon' => 'icon-edit'),
);
?>
<div class="form-actions">
    <h2><?php echo $model->name; ?></h2>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>