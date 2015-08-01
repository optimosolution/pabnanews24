<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'content-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data')
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>
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
<?php echo $form->errorSummary($model); ?>
<?php echo $form->textFieldRow($model, 'title', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php //echo $form->textFieldRow($model, 'alias', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->DropDownListRow($model, 'catid', CHtml::listData(ContentCategory::model()->findAll(array('condition' => 'published=1', "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>
<?php echo $form->fileFieldRow($model, 'profile_picture', array('size' => 36, 'maxlength' => 255)); ?>
<?php //echo $form->textAreaRow($model, 'introtext', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
<?php echo $form->labelEx($model, 'introtext'); ?>
<?php $this->widget('application.extensions.widgets.redactorjs.Redactor', array('model' => $model, 'attribute' => 'introtext', 'editorOptions' => array('autoresize' => true),)); ?>
<?php
/*
$this->widget('application.extensions.tinymce.ETinyMce', array(
    'model' => $model,
    'attribute' => 'introtext',
    'useSwitch' => false,
    'editorTemplate' => 'full'
        )
);
 * 
 */
?>

<?php //echo $form->labelEx($model, 'fulltext'); ?>
<?php //$this->widget('application.extensions.widgets.redactorjs.Redactor', array('model' => $model, 'attribute' => 'fulltext', 'editorOptions' => array('autoresize' => true),)); ?>

<?php echo $form->DropDownListRow($model, 'state', array('1' => 'Yes', '0' => 'No'), array('class' => 'span5')); ?>
<?php echo $form->DropDownListRow($model, 'featured', array('1' => 'Yes', '0' => 'No'), array('class' => 'span5')); ?>
<?php echo $form->textFieldRow($model, 'ordering', array('class' => 'span5')); ?>
<?php //echo $form->textAreaRow($model, 'metakey', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
<?php //echo $form->textAreaRow($model, 'metadesc', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

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
