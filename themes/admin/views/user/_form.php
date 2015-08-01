<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'user-admin-form',
    'enableAjaxValidation' => false,
        ));
?>
<p class="help-block">Fields with <span class="required">*</span> are required.</p>
<?php echo $form->errorSummary($model); ?>
<?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($model, 'username', array('class' => 'span5', 'maxlength' => 150)); ?>
<?php echo $form->textFieldRow($model, 'email', array('class' => 'span5', 'maxlength' => 100)); ?>
<?php echo $form->labelEx($model, 'registerDate'); ?>
<?php
echo $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    'language' => 'en',
    'model' => $model, // Model object
    'attribute' => 'registerDate',
    'options' => array(
        'mode' => 'date',
        'changeYear' => true,
        'changeMonth' => true,
        'yearRange' => '1900:2200',
        'dateFormat' => 'yy-mm-dd',
        'timeFormat' => '',
        'showTimepicker' => false,
    ),
    'htmlOptions' => array(
        'placeholder' => 'Register Date',
        'style' => 'width:460px !important;',
        'class' => 'span5',
        'class' => 'input' . ( $model->getError('registerDate') ? ' error' : '')
    ),
        ), true);
?>
<?php echo $form->labelEx($model, 'lastvisitDate'); ?>
<?php
echo $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    'language' => 'en',
    'model' => $model, // Model object
    'attribute' => 'lastvisitDate',
    'options' => array(
        'mode' => 'date',
        'changeYear' => true,
        'changeMonth' => true,
        'yearRange' => '1900:2200',
        'dateFormat' => 'yy-mm-dd',
        'timeFormat' => '',
        'showTimepicker' => false,
    ),
    'htmlOptions' => array(
        'placeholder' => 'Last Visit Date',
        'style' => 'width:460px !important;',
        'class' => 'span5',
        'class' => 'input' . ( $model->getError('lastvisitDate') ? ' error' : '')
    ),
        ), true);
?>
<?php echo $form->dropDownListRow($model, 'group_id', CHtml::listData(UserGroup::model()->findAll(array("order" => "id")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>
<?php echo $form->dropDownListRow($model, 'status', CHtml::listData(UserStatus::model()->findAll(array("order" => "status")), 'id', 'status'), array('empty' => '--please select--', 'class' => 'span5')); ?>
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
