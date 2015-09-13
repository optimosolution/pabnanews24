<?php
$this->breadcrumbs = array(
    'Advertisements' => array('admin'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => '', 'class' => 'search-button', 'url' => '#', 'active' => true, 'icon' => 'icon-search search-button'),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('advertisement-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'advertisement-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'category_id',
            'header' => "Category",
            'value' => 'get_category($data->category_id)',
            'filter' => CHtml::activeDropDownList($model, 'category_id', CHtml::listData(AdvertisementCategory::model()->findAll(array('condition' => '', "order" => "title")), 'id', 'title'), array('empty' => '')),
            'htmlOptions' => array('style' => "text-align:left;"),
        ),
        'title',
        'url',
        array(
            'name' => 'picture',
            'type' => 'raw',
            'value' => 'CHtml::image("../../uploads/advertisement/" . $data->picture,"",array("width"=>"150"))',
        ),
        'created_date',
        'ordering',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
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
