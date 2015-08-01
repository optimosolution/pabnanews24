<?php

$this->breadcrumbs = array(
    'Acl Actions' => array('actions', 'cid' => $_GET['cid']),
    getControllerName($_GET['cid']),
);

$this->menu = array(
    array('label' => 'Controllers', 'url' => array('aclController/admin'), 'active' => true, 'icon' => 'icon-arrow-up'),
    array('label' => 'Manage', 'url' => array('actions', 'cid' => $_GET['cid']), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create', 'cid' => $_GET['cid']), 'active' => true, 'icon' => 'icon-file'),
);
?>
<?php

$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'id' => 'acl-action-grid',
    'dataProvider' => $model->actions($_GET['cid']),
    'filter' => $model,
    'columns' => array(
        'id',
        array(
            'name' => 'controller_id',
            'type' => 'raw',
            'value' => 'getControllerName($data->controller_id)',
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Controller'),
        ),
        'action',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{update}{delete}',
            'buttons' => array
                (
                'view' => array
                    (
                    'label' => 'View',
                    'url' => 'yii::app()->createUrl("aclAction/view", array("id"=>"$data->id","cid"=>"$_GET[cid]"))',
                    'options' => array('class' => 'view')
                ),
                'update' => array
                    (
                    'label' => 'Update',
                    'url' => 'yii::app()->createUrl("aclAction/update", array("id"=>"$data->id","cid"=>"$_GET[cid]"))',
                    'options' => array('class' => 'edit'),
                ),
                'delete' => array
                    (
                    'label' => 'Delete',
                    'url' => 'yii::app()->createUrl("aclAction/delete", array("id"=>"$data->id","cid"=>"$_GET[cid]"))',
                    'options' => array('class' => 'delete'),
                ),
            ),
        ),
    ),
));

/**
 * Retrieves Controller name by ID.
 * @return string.
 */
function getControllerName($id) {
    $returnValue = Yii::app()->db->createCommand()
            ->select('controller')
            ->from('{{acl_controller}}')
            ->where('id=:id', array(':id' => $id))
            ->queryScalar();

    return $returnValue;
}
?>
