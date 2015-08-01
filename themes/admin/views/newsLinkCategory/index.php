<?php
$this->breadcrumbs=array(
	'News Link Categories',
);

$this->menu=array(
	array('label'=>'Create NewsLinkCategory','url'=>array('create')),
	array('label'=>'Manage NewsLinkCategory','url'=>array('admin')),
);
?>

<h1>News Link Categories</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
