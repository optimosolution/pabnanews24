<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'poll-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->textFieldRow($model, 'title', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($model, 'yes', array('class' => 'span5')); ?>
<?php echo $form->textFieldRow($model, 'no', array('class' => 'span5')); ?>
<?php echo $form->textFieldRow($model, 'no_comments', array('class' => 'span5')); ?>
<?php echo $form->DropDownListRow($model, 'published', array('1' => 'Yes', '0' => 'No')); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
