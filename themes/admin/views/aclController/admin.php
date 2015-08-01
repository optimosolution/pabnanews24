<?php
$this->breadcrumbs = array(
    'Acl Controllers' => array('admin'),
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
	$.fn.yiiGridView.update('acl-controller-grid', {
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
    'type' => 'striped bordered condensed',
    'id' => 'acl-controller-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        array(
            'name' => 'controller',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->controller), array("aclAction/actions","cid"=>$data->id))',
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Acceass'),
        ),
        array(
            'name' => 'controller_type',
            'value' => '$data->controller_type?Yii::t(\'app\',\'Backend\'):Yii::t(\'app\', \'Frontend\')',
            'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'Frontend'), '1' => Yii::t('app', 'Backend')),
            'htmlOptions' => array('style' => "text-align:left;"),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
