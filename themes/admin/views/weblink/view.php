<?php
$this->breadcrumbs = array(
    'Weblinks' => array('admin'),
    $model->title,
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Edit', 'url' => array('update', 'id' => $model->id), 'active' => true, 'icon' => 'icon-pencil'),
    array('label' => 'Delete', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?'), 'active' => true, 'icon' => 'icon-remove'),
);
?>
<div class="form-actions">
    <h2><?php echo $model->title; ?></h2>
</div>
<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        array(
            'name' => 'category_id',
            'type' => 'raw',
            'value' => $model->getCategoryName($model->category_id),
        ),
        'title',
        'description',
        'click_url',
        array(
            'name' => 'created_on',
            'type' => 'raw',
            'value' => date("F j, Y, g:i A", strtotime($model->created_on)),
        ),
        array(
            'name' => 'created_by',
            'type' => 'raw',
            'value' => $model->getUserName($model->created_by),
        ),
        'hits',
        array(
            'name' => 'published',
            'value' => $model->published ? "Yes" : "No",
        ),
    ),
));
?>
