<?php
$this->breadcrumbs = array(
    'Advertisements' => array('admin'),
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
        array(
            'name' => 'picture',
            'type' => 'raw',
            'value' => CHtml::image('../../uploads/advertisement/' . $model->picture),
        ),
        array(
            'name' => 'category_id',
            'type' => 'raw',
            'value' => get_category($model->category_id),
        ),
        'title',
        'url',
        array(
            'name' => 'description',
            'type' => 'raw',
            'value' => $model->description,
        ),
        'created_date',
        'ordering',
    ),
));

function get_category($id) {
    if (!empty($id)) {
        $value = Yii::app()->db->createCommand()
                ->select('title')
                ->from('{{advertisement_category}}')
                ->where('id=' . $id)
                ->queryScalar();
    } else {
        $value = 'Not set';
    }
    return $value;
}
?>
