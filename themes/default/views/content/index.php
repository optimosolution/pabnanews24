<?php
$this->breadcrumbs = array(
    $this->get_category_name($_GET['id']),
);
?>
<h1><?php echo $this->get_category_name($_GET['id']); ?></h1>

<?php
$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
