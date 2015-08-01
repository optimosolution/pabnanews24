<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'country-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'worldzone_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'country_name', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'country_3_code', array('class' => 'span5', 'maxlength' => 3)); ?>

<?php echo $form->textFieldRow($model, 'country_2_code', array('class' => 'span5', 'maxlength' => 2)); ?>

<?php echo $form->textFieldRow($model, 'ordering', array('class' => 'span5')); ?>

<?php echo $form->DropDownListRow($model, 'published', array('1' => 'Yes', '0' => 'No'), array('class' => 'span5')); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
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
