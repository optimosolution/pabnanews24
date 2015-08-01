<?php
$this->breadcrumbs = array(
    $this->get_category_name($_GET['id']),
);
?>

<h5><?php echo $this->get_category_name($_GET['id']); ?></h5>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'id' => 'content-grid',
    'dataProvider' => $model->search_category($_GET['id']),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'title',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->title), array("content/view","id"=>$data->id))',
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Title'),
        ),
    ),
));
?>