<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>
<?php echo $form->DropDownListRow($model, 'parent_id', CHtml::listData(ContentCategory::model()->findAll(array('condition' => 'parent_id=0', "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>
<?php echo $form->textFieldRow($model, 'title', array('class' => 'span5', 'maxlength' => 255)); ?>
<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Search',
    ));
    ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Reset',
        'type' => 'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => '', // null, 'large', 'small' or 'mini'
        'buttonType' => 'reset', //link, button, submit, submitLink, reset, ajaxLink, ajaxButton and ajaxSubmit
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
