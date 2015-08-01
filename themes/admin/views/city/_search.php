<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>
<div class="alert alert-block">
    <?php echo $form->DropDownListRow($model, 'country_id', CHtml::listData(Country::model()->findAll(array('condition' => 'published=1', "order" => "country_name")), 'id', 'country_name'), array('empty' => '--please select--', 'class' => 'span5')); ?>
    <?php echo $form->DropDownListRow($model, 'state_id', CHtml::listData(State::model()->findAll(array('condition' => 'published=1', "order" => "state_name")), 'id', 'state_name'), array('empty' => '--please select--', 'class' => 'span5')); ?>
    <?php echo $form->textFieldRow($model, 'city_name', array('class' => 'span5', 'maxlength' => 255)); ?>
    <?php echo $form->textFieldRow($model, 'city_3_code', array('class' => 'span5', 'maxlength' => 9)); ?>
    <?php echo $form->textFieldRow($model, 'city_2_code', array('class' => 'span5', 'maxlength' => 6)); ?>

    <?php echo $form->DropDownListRow($model, 'published', array('1' => 'Yes', '0' => 'No'), array('class' => 'span5')); ?>
</div>
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
