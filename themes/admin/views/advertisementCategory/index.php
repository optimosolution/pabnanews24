<?php
$this->breadcrumbs=array(
	'Advertisement Categories',
);

$this->menu=array(
	array('label'=>'Create AdvertisementCategory','url'=>array('create')),
	array('label'=>'Manage AdvertisementCategory','url'=>array('admin')),
);
?>

<h1>Advertisement Categories</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
