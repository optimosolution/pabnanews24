<?php
$this->breadcrumbs = array(
    'Acl Controllers' => array('admin'),
    'Create',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
);
?>
<div class="form-actions">
    <h2>New</h2>
</div>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>