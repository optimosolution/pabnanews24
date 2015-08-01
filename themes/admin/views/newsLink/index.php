<?php
$this->breadcrumbs=array(
	'News Links',
);

$this->menu=array(
	array('label'=>'Create NewsLink','url'=>array('create')),
	array('label'=>'Manage NewsLink','url'=>array('admin')),
);
?>

<h1>News Links</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
