<?php
$this->breadcrumbs = array(
    'Currencies' => array('admin'),
    $model->currency_name,
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Edit', 'url' => array('update', 'id' => $model->id), 'active' => true, 'icon' => 'icon-pencil'),
    array('label' => 'Delete', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?'), 'active' => true, 'icon' => 'icon-remove'),
);
?>

<div class="form-actions">
    <h2><?php echo $model->currency_name; ?></h2>
</div>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'currency_name',
        'currency_code_2',
        'currency_code_3',
        'currency_numeric_code',
        'currency_exchange_rate',
        'currency_symbol',
        'currency_decimal_place',
        'currency_decimal_symbol',
        'currency_thousands',
        'ordering',
        array(
            'name' => 'published',
            'value' => $model->published ? "Yes" : "No",
        ),
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
        array(
            'name' => 'modified_on',
            'type' => 'raw',
            'value' => date("F j, Y, g:i A", strtotime($model->modified_on)),
        ),
        array(
            'name' => 'modified_by',
            'type' => 'raw',
            'value' => $model->getUserName($model->modified_by),
        ),
        array(
            'name' => 'locked_on',
            'type' => 'raw',
            'value' => date("F j, Y, g:i A", strtotime($model->locked_on)),
        ),
        array(
            'name' => 'locked_by',
            'type' => 'raw',
            'value' => $model->getUserName($model->locked_by),
        ),
    ),
));
?>
