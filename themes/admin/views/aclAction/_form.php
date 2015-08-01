<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'acl-action-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>
<?php echo $form->errorSummary($model); ?>
<?php //echo $form->DropDownListRow($model, 'controller_id', CHtml::listData(AclController::model()->findAll(array('condition' => '', "order" => "controller")), 'id', 'controller'), array('empty' => '--please select--', 'class' => 'span5')); ?>
<?php echo $form->hiddenField($model, 'controller_id', array('value' => $_GET['cid'], 'class' => 'span5', 'maxlength' => 150)); ?>
<?php echo $form->textFieldRow($model, 'action', array('class' => 'span5', 'maxlength' => 150)); ?>
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
</div>

<?php $this->endWidget(); ?>
