<?php

$this->pageTitle = 'Weblinks - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Weblinks',
);
?>
<p class="news_heading">Weblinks</p>

<?php

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'weblink-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'category_id',
            'type' => 'raw',
            'value' => 'getCategoryName($data->category_id)',
            'filter' => CHtml::activeDropDownList($model, 'category_id', CHtml::listData(WeblinkCategory::model()->findAll(array('condition' => '', "order" => "title")), 'id', 'title'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Category'),
        ),
        array(
            'name' => 'title',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->title),$data->click_url,array("target"=>"_blank"))',
        ),
        'description',
    ),
));

function getCategoryName($id) {
    $returnValue = Yii::app()->db->createCommand()
            ->select('title')
            ->from('{{weblink_category}}')
            ->where('id=:id', array(':id' => $id))
            ->queryScalar();
    if ($returnValue <= '0') {
        $returnValue = 'No set!';
    } else {
        $returnValue = $returnValue;
    }
    return $returnValue;
}
?>
